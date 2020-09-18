@extends('layouts.frontend')

@section('frontend_content')


    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><span>Shopping Cart</span></li>
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
                    @if(session('null_order'))
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                <span><strong>{{ session('null_order') }}</strong></span>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sub_total = 0;
                                $flag = 0;
                                @endphp
                                @forelse(cart_items() as $cart_item)
                                    <tr class="{{ ($cart_item->relationship_with_cart->product_quantity < $cart_item->product_quantity) ? 'bg-danger':'' }}">
                                        <td class="images"><img src="{{ asset('uploads') }}/product_thumbnail_picture/{{ $cart_item->relationship_with_cart->product_thumbnail_picture }}" alt=""></td>
                                        <td class="product">
                                            <a href="single-product.html">{{ $cart_item->relationship_with_cart->product_name }}</a>
                                            <br>
                                            <span>{{ "Available Products - ".$cart_item->relationship_with_cart->product_quantity }}</span>
                                            @if($cart_item->relationship_with_cart->product_quantity < $cart_item->product_quantity)
                                                <span>{{ "Available Products - ".$cart_item->relationship_with_cart->product_quantity.".."."You have to delete this product from cart or decrease the products quantity." }}</span>
                                                @php
                                                    $flag = 1;
                                                @endphp
                                            @endif
                                        </td>
                                        </td>
                                        <td class="ptice">${{ $cart_item->relationship_with_cart->product_price }}</td>
                                        <td class="quantity cart-plus-minus">
                                            <input type="text" name="product_info[{{ $cart_item->id }}]" value="{{ $cart_item->product_quantity }}" />
                                        <td class="total">${{ $cart_item->product_quantity * $cart_item->relationship_with_cart->product_price }}</td>
                                        <td class="remove"><a href="{{ route('cart.delete', $cart_item->id) }}"><i class="fa fa-times"></i></a></td>
                                        @php
                                            $sub_total = $sub_total + ($cart_item->product_quantity * $cart_item->relationship_with_cart->product_price);
                                        @endphp
                                        @empty
                                            <tr>
                                                <td colspan="50" class="text-center alert alert-danger"> No available products..</td>
                                            </tr>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button type="submit">Update Cart</button>
                                        </li>
                                        <li><a href="{{ route('shop') }}">Continue Shopping</a></li>
                                    </ul>
                                    </form>

                                    <div class="alert alert-warning  mb-3" role="alert">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                            <span><strong>{{ $coupon_error }}</strong></span>
                                        </div>
                                    </div>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <input type="text" id="apply_coupon_input" placeholder="Cupon Code" value="{{ $coupon_name }}">
                                        @php
                                            session(['coupon_name' => $coupon_name]);
                                        @endphp
                                        <button type="button" id="apply_coupon_btn">Apply Cupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>${{ $sub_total }}</li>
                                        @php
                                            session([ 'sub_total' => $sub_total ])
                                        @endphp
                                        <li><span class="pull-left">Discount(%) </span>{{ $coupon_discount }}%</li>
                                        <li><span class="pull-left">Discount ( {{ session('coupon_name') ? session('coupon_name') : 'No coupon added'  }} )</span>${{ ($sub_total * $coupon_discount)/ 100 }}</li>
                                        @php
                                            session([ 'discount_amount' => ($sub_total * $coupon_discount)/ 100 ])
                                        @endphp
                                        <li><span class="pull-left"> Total </span> ${{ $sub_total - (($sub_total * $coupon_discount)/ 100) }}</li>
                                    </ul>
                                    @if($flag == 1)
                                        <a>Solve this issue first.</a>
                                    @else
                                        <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->


@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function(){
            $('#apply_coupon_btn').click(function(){
                var apply_coupon_input = $('#apply_coupon_input').val();
                var link_to_go = "{{ url('cart') }}/"+apply_coupon_input;
                window.location.href = link_to_go;
            });
        });
    </script>
@endsection
{{-- apply_coupon_input --}}

