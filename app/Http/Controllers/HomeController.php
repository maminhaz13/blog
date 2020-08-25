<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function index()
    {
        $inventory_total = 0;
        foreach (Product::all() as $product) {
            $inventory_total += $product->product_price * $product->product_quantity;
        }
        return view('home', [
            'total_unpaid' => Order::where('payment_status', 1)->count(),
            'total_paid' => Order::where('payment_status', 2)->count(),
            'total_canceled' => Order::where('payment_status', 3)->count(),
            'total_sale' => Order::where('payment_status', 2)->sum('total'),
            'inventory_total' => $inventory_total,
            'total_products' => Product::sum('product_quantity'),
        ]);
    }
}
