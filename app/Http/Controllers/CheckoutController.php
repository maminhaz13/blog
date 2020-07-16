<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Carbon\Carbon;
use App\BillingDetails;
use App\ShippingDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function checkout()
    {
        return view('admin.frontend.checkout', [
            'countries' => Country::all(),
        ]);
    }

    function checkout_post(Request $request)
    {
        if (isset($request->shipping_address)) {
            BillingDetails::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'notes' => $request->notes,
                // 'payment_method' => $request->payment_method,
                'created_at' => Carbon::now(),
            ]);

            ShippingDetails::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                // 'payment_method' => $request->payment_method,
                'created_at' => Carbon::now(),
            ]);
        } else {
            BillingDetails::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'notes' => $request->notes,
                // 'payment_method' => $request->payment_method,
                'created_at' => Carbon::now(),
            ]);
        }
    }

    function get_city_list_ajax(Request $request)
    {
        echo City::where('country_id', $request->country_id)->get();
        // return $request->country_id;
    }
}
