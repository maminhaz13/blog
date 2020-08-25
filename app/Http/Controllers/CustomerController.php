<?php

namespace App\Http\Controllers;

use PDF;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    function customer_order(){
        return view('admin.frontend.orders', [
            'order_data' => Order::where('user_id', Auth::user()->id)->with(['order_details'])->get(),
        ]);
    }

    function customer_invoice_download($order_id){
        // return $order_id;
        $order_infos = Order::find($order_id);
        $pdf = PDF::loadView('pdf.invoice', compact('order_infos'));
        return $pdf->download('ironman '.'invoice'.'-'.$order_id.'.'.'pdf');
    }
}
