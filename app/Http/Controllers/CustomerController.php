<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    function customer_home(){
        return view('customer.home');
    }

    function customer_order(){
        return view('admin.frontend.orders', [
            'order_data' => Order::where('user_id', Auth::user()->id)->with(['order_details'])->get(),
        ]);
    }
}
