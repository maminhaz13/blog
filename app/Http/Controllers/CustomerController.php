<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function customer_home(){
        return view('customer.home');
    }
}
