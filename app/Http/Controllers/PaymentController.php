<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Statement;
use App\Models\Stock;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        dd(5);
        $client = new Client();
        $response = $client->post('https://api.paystack.co/transaction/initialize', [
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'amount' => $request->amount,
                'email' => $request->email,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return redirect($data['data']['authorization_url']);
    }

    public function addToExistingStock($productId, $newStock)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($productId);

        // Increment the quantity column by the new stock amount
        $product->decrement('product_qty', $newStock);

        // Optionally, return the updated product
        return $product->product_qty;
    }




    public function callback1(Request $request)
    {

        $reference = $request->input('reference');
        $s_key = env('PAYSTACK_SECRET_KEY');
        // Verify payment
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $s_key",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response;
            $data = json_decode($response, true);
            if ($data) {
                $updatedRecord =  Order::where('user_id', Auth::id())->where('reference', $reference)->update([

                    'gateway_response' => $data['data']['gateway_response'],
                    'channel' => $data['data']['channel'],
                    'paid_at' => $data['data']['paid_at'],
                    'paystack_other' => $response,
                    'status' => 'confirm',
                    'amount_charged' => $data['data']['amount'],

                ]);

                $get_order_id  =  Order::where('user_id', Auth::id())->where('reference', $reference)->value('id');
                $get_order_amt  =  Order::where('user_id', Auth::id())->where('reference', $reference)->value('amount');

                $stockToUpdate = OrderItem::where('order_id', $get_order_id)->get();

                foreach ($stockToUpdate as $stock) {
                    $qty_balance = $this->addToExistingStock($stock->product_id, $stock->qty);

                    $last_id = Stock::insert([
                        //	id	user_id	mat_no	item_id	user_type	item_in	item_out	item_balance	amount	reg_date	status
                        'item_id' => $stock->product_id,

                        'amount' => ($stock->qty * $stock->price),
                        'item_out' => $stock->qty,
                        'item_in' => 0,
                        'item_balance' => $qty_balance,
                        'user_id' => Auth::id(),
                        'user_type' => 'Student',


                    ]);
                }

                Statement::insert([

                    'user_id' => Auth::id(),
                    'amount_in' => 0.00,
                    'amount_out' => $get_order_amt,
                    'reason' => 'order',
                    'trans_id' => $get_order_id,
                    'comment' => 'item purchased',

                ]);



                return redirect()->away(url('/user/order/page#no'));
            } else {
                dd('error');
            }
        }
    }
    //for nomba
    public function callback(Request $request)
    {

        $reference = $request->input('reference');
        $NOMBA_CLIENT_ID = env('NOMBA_CLIENT_ID');
        $NOMBA_CLIENT_SECRET = env('NOMBA_CLIENT_SECRET');
        $NOMBA_ACCOUNT_ID = env('NOMBA_ACCOUNT_ID');


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nomba.com/v1/auth/token/issue",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"grant_type\": \"client_credentials\",\n  \"client_id\": \"$NOMBA_CLIENT_ID\",\n  \"client_secret\": \"$NOMBA_CLIENT_SECRET\"\n}",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "accountId: $NOMBA_ACCOUNT_ID"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        // dd($response);
        $auth_data = json_decode($response, true);
        $access_token = $auth_data['data']['access_token'];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nomba.com/v1/checkout/transaction?idType=ORDER_REFERENCE&id=$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $access_token",
                "accountId: $NOMBA_ACCOUNT_ID"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response;
            $data = json_decode($response, true);
            // dd($data);
            if ($data) {
                if ($data['data']['message'] == "success") {

                    $updatedRecord =  Order::where('user_id', Auth::id())->where('reference', $reference)->update([

                        'gateway_response' => '',
                        'channel' => '',
                        'paid_at' => $data['data']['transactionDetails']['transactionDate'],
                        'paystack_other' => $response,
                        'status' => 'confirm',
                        'amount_charged' => $data['data']['amount'],
                        'message' => $data['data']['message'],

                    ]);

                    $get_order_id  =  Order::where('user_id', Auth::id())->where('reference', $reference)->value('id');
                    $get_order_amt  =  Order::where('user_id', Auth::id())->where('reference', $reference)->value('amount');

                    $stockToUpdate = OrderItem::where('order_id', $get_order_id)->get();

                    foreach ($stockToUpdate as $stock) {
                        $qty_balance = $this->addToExistingStock($stock->product_id, $stock->qty);

                        $last_id = Stock::insert([
                            //	id	user_id	mat_no	item_id	user_type	item_in	item_out	item_balance	amount	reg_date	status
                            'item_id' => $stock->product_id,

                            'amount' => ($stock->qty * $stock->price),
                            'item_out' => $stock->qty,
                            'item_in' => 0,
                            'item_balance' => $qty_balance,
                            'user_id' => Auth::id(),
                            'user_type' => 'Student',


                        ]);
                    }

                    Statement::insert([

                        'user_id' => Auth::id(),
                        'amount_in' => 0.00,
                        'amount_out' => $get_order_amt,
                        'reason' => 'order',
                        'trans_id' => $get_order_id,
                        'comment' => 'item purchased',

                    ]);
                } else {
                    dd($data['data']['message']);
                }
                return redirect()->away(url('/user/order/page#no'));
            } else {
                dd('error');
            }
        }
    }
}
