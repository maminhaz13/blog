<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Order_details;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.order_index', [
            'order_info' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Order::find($id)->update([
            'payment_status' => 2,
            'updated_at' => Carbon::now(),
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Cancel any kind of orders.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order_cancel($order_id)
    {
        $order_details = Order_details::where('order_id', $order_id)->get();
        
        foreach ($order_details as $order_detail) {
            Product::find($order_detail->product_id)->increment('product_quantity', $order_detail->product_quantity);
        }
        
        Order::find($order_id)->update([
            'payment_status' => 3,
            'updated_at' => Carbon::now(),
        ]);

        return back();
    }
}
