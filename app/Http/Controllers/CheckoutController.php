<?php

namespace App\Http\Controllers;

use Auth;
use App\City;
use App\Order;
use App\Country;
use App\Product;
use Carbon\Carbon;
use App\Order_details;
use App\BillingDetails;
use App\ShippingDetails;
use Illuminate\Http\Request;
use App\Mail\PurchaseConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
            $billing_id = BillingDetails::insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'notes' => $request->notes,
                'created_at' => Carbon::now(),
            ]);

            $shipping_id = ShippingDetails::insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'created_at' => Carbon::now(),
            ]);
        }

        else {
            $billing_id = BillingDetails::insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'notes' => $request->notes,
                'created_at' => Carbon::now(),
            ]);

            $shipping_id = ShippingDetails::insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'created_at' => Carbon::now(),
            ]);
        }

            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'subtotal' => session('sub_total'),
                'discount_amount' => session('discount_amount'),
                'coupon_name' => session('coupon_name'),
                'total' => (session('sub_total') - session('discount_amount')),
                'payment_method' => $request->payment_method,
                // 'payment_status' => $request->payment_status,
                'billing_details_id' => $billing_id,
                'shipping_details_id' => $shipping_id,
                'created_at' => Carbon::now(),
            ]);

        foreach (cart_items() as $cart_data) {
            $order_details_id = Order_details::insertGetId([
                'order_id' => $order_id,
                'user_id' => Auth::id(),
                'product_id' => $cart_data->product_id,
                'product_quantity' => $cart_data->product_quantity,
                'product_price' => $cart_data->relationship_with_cart->product_price,
                'created_at' => Carbon::now(),
            ]);

            Product::find($cart_data->product_id)->decrement('product_quantity', $cart_data->product_quantity);
            $cart_data->forceDelete();
        }
        $order_details_details = Order_details::where('order_id', $order_id)->get();
        Mail::to($request->email)->send(new PurchaseConfirmation($order_details_details));
        session(['order_id_checkout' => $order_id]);
        if($request->payment_method == 2){
            return redirect('stripe');
        }
        else{
            return redirect('/');
        }
    }

    function testsms(){
        $url = "http://66.45.237.70/api.php";
        $number="01757059666,01305799269";
        $text="";
        $data= array(
            'username'=>"01840416216",
            'password'=>"CKT4SMZF",
            'number'=>"$number",
            'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        return $sendstatus = $p[0];
    }

    function get_city_list_ajax(Request $request)
    {
        $datas_to_send = '';
        $cities = City::where('country_id', $request->country_id)->get();
        foreach ($cities as $city) {
            $datas_to_send .= "<option value='". $city->id ."'>". $city->name ."</option>";

        }
        return $datas_to_send;
    }

    function get_city_list_two_ajax(Request $request)
    {
        $datas_to_send = '';
        $cities = City::where('country_id', $request->country_id)->get();
        foreach ($cities as $city) {
            $datas_to_send .= "<option value='". $city->id ."'>". $city->name ."</option>";

        }
        return $datas_to_send;
    }
}
