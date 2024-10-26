<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use App\Models\User;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id)
    {

        $ship = SubCategory::where('category_id', $division_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($ship);
    } // End Method

    public function StateGetAjax($district_id)
    {

        $ship = Category::where('category_id', $district_id)->orderBy('category_name', 'ASC')->get();
        return json_encode($ship);
    } // End Method



    public function CheckoutStore(Request $request)
    {


        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = '102141';

        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = 1;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();

        if ($request->payment_option == 'stripe') {
            return view('frontend.payment.stripe', compact('data', 'cartTotal'));
        } elseif ($request->payment_option == 'card') {


            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'state_id' => 1,
                'name' => $request->shipping_name,
                'email' => $request->shipping_email,
                'phone' => $request->shipping_phone,
                'adress' => $request->shipping_address,
                'post_code' => $request->post_code,
                'notes' => $request->notes,

                'payment_type' => 'Online',
                'payment_method' => 'PayStack',
                'transaction_id' =>  mt_rand(10000000, 99999999),
                'currency' => 'NGN',
                'amount' => $request->total_amount,
                'order_number' => uniqid(),

                'invoice_no' => 'INV' . mt_rand(10000000, 99999999),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'callback_url' => url('/paystack/callback'),

            ]);
            $carts = Cart::content();
            foreach ($carts as $cart) {
                $purchase_price = Product::where('id', $cart->id)->value('purchase_price');
                OrderItem::insert([
                    'order_id' => $order_id,
                    'product_id' => $cart->id,
                    'vendor_id' => $cart->options->vendor,
                    'color' => $cart->options->color,
                    'size' => $cart->options->size,
                    'qty' => $cart->qty,
                    'price' => $cart->price,
                    'purchase_price' => $purchase_price,
                    'created_at' => Carbon::now(),


                ]);
            } // End Foreach

            if (Session::has('coupon')) {
                Session::forget('coupon');
            }

            Cart::destroy();


            $url = "https://api.paystack.co/transaction/initialize";
            $amount = ((($cartTotal * 1.5) / 100) + 100) + $cartTotal;
            $fields = [
                'email' => $request->shipping_email,
                'amount' => $amount * 100,
                'callback_url' => 'http://localhost:8000/paystack/callback',
            ];

            $fields_string = http_build_query($fields);

            //open connection
            $ch = curl_init();
            $s_key = env('PAYSTACK_SECRET_KEY');
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer $s_key",
                "Cache-Control: no-cache",
            ));

            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute post
            $result = curl_exec($ch);



            // Update the last inserted record using the retrieved ID


            // Decode the JSON string into an associative array
            $data = json_decode($result, true);

            if ($data) {
                $updatedRecord =  Order::where('id', $order_id)->update([

                    'reference' => $data['data']['reference'],
                    'authorization_url' => $data['data']['authorization_url'],

                ]);
                return redirect()->away($data['data']['authorization_url']);
            } else {
                dd('error');
            }

            //dd($updatedRecord);





            //  return view('frontend.payment.paystack', compact('data', 'cartTotal'));
        } else {
            return view('frontend.payment.cash', compact('data', 'cartTotal'));
        }
    } // End Method


}
