@extends('layouts.frontend')

@section('menu_orders_active')
    active
@endsection

@section('frontend_content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Your Orders</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><span>Your Orders</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table-responsive cart-wrap">
                        <thead>
                                <th scope="col">Serial No</th>
                                <th scope="col">Date</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col">Discount Amount</th>
                                <th scope="col">Coupon Name</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                                {{-- <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th> --}}
                        </thead>
                        <tbody>
                            @forelse($order_data as $orders)
                                <tr>
                                    {{-- <td>
                                        <input class="ckbox mg-b-0" type="checkbox" name="" value="" id="checkItem">
                                    </td> --}}
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $orders->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if($orders->payment_method == 1)
                                            Cash On Delivery
                                        @else
                                            Credit Card
                                        @endif
                                    </td>
                                    <td>
                                        @if($orders->payment_status == 2)
                                            <span class="badge badge-pill badge-success">Paid</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Unpaid</span>
                                        @endif
                                    </td>
                                    <td>{{ $orders->subtotal }}</td>
                                    <td>{{ $orders->discount_amount }}</td>
                                    <td>{{ $orders->coupon_name }}</td>
                                    <td>{{ $orders->subtotal - $orders->discount_amount }}</td>
                                    <td>
                                        <a href="{{ route('customer.invoice.download', $orders->id) }}"> <i class="fa fa-download"> download invoice</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="100" class="text-center text-dark">
                                        @foreach($orders->order_details as $orderdetail)
                                            <p>{{ $orderdetail->product->product_name }} * {{ $orderdetail->product_quantity }} pcs - ${{ $orderdetail->product->product_price }}</p>
                                        @endforeach
                                    </td>  
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100" class="text-center text-danger"> Orders data unavailable </td>  
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->

@endsection


