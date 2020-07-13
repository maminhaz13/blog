<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillingDetails;
use Carbon\Carbon;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function checkout(){
        return view('admin.frontend.checkout');
    }

    function checkout_post(Request $request){
        BillingDetails::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'notes' => $request->notes,
        ]);
        return 'done';
    }

}
