<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Statement;
use App\Models\Stock;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class OrderController extends Controller
{
    public function PendingOrder()
    {
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders'));
    } // End Method


    public function AdminOrderDetails($order_id)
    {

        $order = Order::with('category', 'subcat', 'state', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        //dd( $orderItem);
        return view('backend.orders.admin_order_details', compact('order', 'orderItem'));
    } // End Method


    public function AdminConfirmedOrder()
    {
        $orders = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders'));
    } // End Method


    public function AdminProcessingOrder()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    } // End Method


    public function AdminDeliveredOrder()
    {
        $orders = Order::where('status', 'deliverd')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    } // End Method


    public function AllPayment()
    {
        $totalAmount = Statement::where('reason', 'payment')->sum('amount_out');
        $payments = Statement::with('user')->where('reason', 'payment')->orderBy('id', 'DESC')->get();
        return view('backend.orders.all_payment', compact('payments', 'totalAmount'));
    } // End Method



    public function AllIncome()
    {
        $totalAmount = Statement::where('reason', 'income')->sum('amount_in');
        $incomes = Statement::with('user')->where('reason', 'income')->orderBy('id', 'DESC')->get();
        return view('backend.orders.all_income', compact('incomes', 'totalAmount'));
    } // End Method




    public function MakePayment()
    {
        $users = User::where('status', 'active')->orderBy('email', 'ASC')->get();
        return view('backend.orders.add_vendor_payment', compact('users'));
    } // End Method


    public function MakeIncome()
    {
        $users = User::where('status', 'active')->orderBy('email', 'ASC')->get();
        return view('backend.orders.add_income', compact('users'));
    } // End Method






    public function PendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'confirm',
            'confirmed_by' => auth()->user()->id,

        ]);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.confirmed.order')->with($notification);
    } // End Method

    public function ConfirmToProcess($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'processing']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.processing.order')->with($notification);
    } // End Method

    public function removeFromExistingStock($productId, $newStock)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($productId);

        // decrement the quantity column by the new stock amount
        $product->decrement('product_qty', $newStock);

        // Optionally, return the updated product
        return $product->product_qty;
    }


    public function ProcessToDelivered($order_id)
    {

        $product = OrderItem::where('order_id', $order_id)->get();

        foreach ($product as $item) {

            //Product::where('id', $item->product_id)->update(['product_qty' => FacadesDB::raw('product_qty-' . $item->qty)]);
            //dd($item->id);

            $new_product_qty = $this->removeFromExistingStock($item->product_id, $item->qty);

            $last_id = Stock::insertGetId([
                'item_id' => $item->product_id,
                'amount' => $item->price,
                'item_out' => $item->qty,
                'item_in' => 0,
                'item_balance' => $new_product_qty,
                'user_id' => $item->vendor_id,
                'user_type' => 'Student',
            ]);
        }

        Order::findOrFail($order_id)->update(['status' =>'deliverd',
            'delivered_by' => auth()->user()->id,
        ]);

        $notification = array(
            'message' => 'Order Deliverd Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.delivered.order')->with($notification);
    } // End Method


    public function AdminInvoiceDownload($order_id)
    {

        $order = Order::with('category', 'subcat', 'state', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('backend.orders.admin_order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    } // End Method


    public function StorePayment(Request  $request)
    {


        $request->validate([
            'user_id' => ['required', 'numeric'],
            'amount_out' => ['required'],


        ]);


        Statement::insert([

            'user_id' => $request->user_id,
            'amount_in' => 0.00,
            'amount_out' => $request->amount_out,
            'reason' => 'payment',
            'trans_id' => 1,
            'created_at' =>  $request->date,
            'comment' => $request->comment,

        ]);

        $notification = array(
            'message' => 'Payment added Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.all.payment')->with($notification);
    } // End Method


    public function StoreIncome(Request  $request)
    {


        $request->validate([
            'user_id' => ['required', 'numeric'],
            'amount_in' => ['required'],


        ]);


        Statement::insert([

            'user_id' => $request->user_id,
            'amount_in' => $request->amount_in,
            'amount_out' => 0.00,
            'reason' => 'income',
            'trans_id' => 1,
            'created_at' =>  $request->date,
            'comment' => $request->comment,

        ]);

        $notification = array(
            'message' => 'Income added Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.make.income')->with($notification);
    } // End Method


    public function DeleteIncome($id)
    {




        Statement::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Income Deleted Successfully',
            'alert-type' => 'success'
        );



        return redirect()->back()->with($notification);
    } // End Method

    public function DeletePayment($id)
    {




        Statement::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Payment Deleted Successfully',
            'alert-type' => 'success'
        );



        return redirect()->back()->with($notification);
    } // End Method

}
