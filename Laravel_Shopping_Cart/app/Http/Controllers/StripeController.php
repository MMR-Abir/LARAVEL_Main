<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{



    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $orderName =time();
        $productname = $request->get('productDetails');
        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";


//orderEntry
DB::table('orders')->insert([
'order_number'=>$orderName,
'total_amount'=>$totalprice,
'payment_method'=>'stripe'

]);


//orderDetails
foreach(session()->get('cart') as $key =>$val){
    DB::table('orders_details')->insert([
        'order_number'=>$orderName,
        'book_id'=>$key,
         'quantity'=>$val['quantity'],
        'price'=>$val['price']

        ]);
}



        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('shopping.checkout'),
        ]);
session()->forget('cart');
        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('success') ;
    }

}
