<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Order;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
/**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        if(session('order_id_checkout')){
            return view('stripe');
        }
        else {
            abort(404);
        }
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => (session('sub_total') - session('discount_amount')) * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment from Ironman." 
        ]);
  
        Session::flash('success', 'Payment successful!');

        //updating payment status start
        Order::find(session('order_id_checkout'))->update([
            'payment_status' => 2,
            'updated_at' => Carbon::now(),
        ]);
        //updating payment status end

        //removing session data after payment start
        session([
            'coupon_name' => '',
            'sub_total' => '',
            'discount_amount' => '',
            'order_id_checkout' => '',
        ]);
        session()->forget('user_id_checkout');
        //removing session data after payment end

        // //bulk sms start
        // $url = "http://66.45.237.70/api.php";
        // $number="01757059666,01305799269";
        // $text="Thanks for staying with us and buy some products from us. Kindly wait for your product delivery. You are wolcomed for your next visit.";
        // $data= array(
        //     'username'=>"01840416216",
        //     'password'=>"CKT4SMZF",
        //     'number'=>"$number",
        //     'message'=>"$text"
        // );

        // $ch = curl_init(); // Initialize cURL
        // curl_setopt($ch, CURLOPT_URL,$url);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $smsresult = curl_exec($ch);
        // $p = explode("|",$smsresult);
        // return $sendstatus = $p[0];
        // //bulk sms end

        return redirect('/');
    }
}
