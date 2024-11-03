<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VendorOrderController extends Controller
{
    public function VendorOrder()
    {
        DB::enableQueryLog();
        $status = $_GET['status'] ?? 'confirm';  // default to 'confirmed'
        $id = Auth::user()->id;

        // Fetch OrderItems with related Order data where Order's status is confirmed and vendor_id matches
        $orderitem  = OrderItem::with(['order' => function ($query) {
            $query->where('status', 'confirm'); // Assuming 'confirmed' is a boolean or integer column
        }])
        ->where('vendor_id', $id)
        ->orderBy('id', 'DESC')
        ->get();


                Log::info("Successfully created product for row ", [
                    'product_id' => $id,
                    'queries' => DB::getQueryLog()
                ]);
        return view('vendor.backend.orders.pending_orders', compact('orderitem'));
    }

    public function VendorReturnOrder(){

         $id = Auth::user()->id;
        $orderitem = OrderItem::with('order')->where('vendor_id',$id)->orderBy('id','DESC')->get();
        return view('vendor.backend.orders.return_orders',compact('orderitem'));

    } // End Method

      public function VendorCompleteReturnOrder(){

         $id = Auth::user()->id;
        $orderitem = OrderItem::with('order')->where('vendor_id',$id)->orderBy('id','DESC')->get();
        return view('vendor.backend.orders.complete_return_orders',compact('orderitem'));

    } // End Method

    public function VendorOrderDetails($order_id){

        $order = Order::with('category','subcat','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('vendor.backend.orders.vendor_order_details',compact('order','orderItem'));

    }// End Method



}
