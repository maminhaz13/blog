<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
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
        return view('stripe');
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
          
        return redirect('/');
    }
}
