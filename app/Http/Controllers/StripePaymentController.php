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
        return redirect('/');
    }
}
