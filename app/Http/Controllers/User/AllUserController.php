<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AllUserController extends Controller
{
    public function UserAccount()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $departments = Category::get();
        return view('frontend.userdashboard.account_details', compact('userData', 'departments'));
    } // End Method


    public function UserChangePassword()
    {
        return view('frontend.userdashboard.user_change_password');
    } // End Method


    public function UserOrderPage()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('frontend.userdashboard.user_order_page', compact('orders'));
    } // End Method


    public function UserOrderCollection()
    {
        $id = Auth::user()->id;
        $orders = Order::where('adress', $id)->where('given', 'No')->orderBy('id', 'DESC')->get();
        $orders2 = Order::where('adress', $id)->where('given', 'Yes')->orderBy('id', 'DESC')->get();
        if (Auth::user()->is_hoc == "Yes") {
            return view('frontend.userdashboard.user_order_hoc', compact('orders', 'orders2'));
        } else {
            $notification = array(
                'message' => 'You are not HOC Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user.order.page')->with($notification);
        }
    } // End Method


    public function UserOrderDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('frontend.order.order_details', compact('order', 'orderItem'));
    } // End Method


    public function UserOrderInvoice($order_id)
    {

        $order = Order::with('category', 'subcat', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();


        $pdf = Pdf::loadView('frontend.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    } // End Method



    public function ReturnOrder(Request $request, $order_id)
    {

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.order.page')->with($notification);
    } // End Method


    public function UserOrderGiven(Request $request, $order_id)
    {

        Order::findOrFail($order_id)->update([
            'given_date' => Carbon::now()->format('Y-m-d'),
            'given' => 'Yes',

        ]);

        $notification = array(
            'message' => 'Marked as Given Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.collection.page')->with($notification);
    } // End Method




    public function ReturnOrderPage()
    {

        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.order.return_order_view', compact('orders'));
    } // End Method


    public function UserTrackOrder()
    {
        return view('frontend.userdashboard.user_track_order');
    } // End Method

    public function About()
    {
        return view('frontend.pages.about');
    } // End Method

    public function OrderTracking(Request $request)
    {

        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {
            return view('frontend.traking.track_order', compact('track'));
        } else {

            $notification = array(
                'message' => 'Invoice Number Is Invalid',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // End Method

}
