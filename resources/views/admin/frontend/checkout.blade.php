@extends('layouts.frontend')

@section('frontend_content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3>Billing Details</h3>
                        <form action="{{ url('shop/checkout/post') }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>Name *</p>
                                    <input type="text" name="name">
                                </div>

                                <div class="col-sm-6 col-12">
                                    <p>Email Address *</p>
                                    <input type="email" name="email">
                                </div>

                                <div class="col-sm-6 col-12">
                                    <p>Phone No. *</p>
                                    <input type="text" name="phone_number">
                                </div>

                                <div class="col-12">
                                    <p>Country *</p>
                                    <select id="s_country" name="country_id">
                                        <option value="1">Select a country</option>
                                        <option value="2">bangladesh</option>
                                        <option value="3">Algeria</option>
                                        <option value="4">Afghanistan</option>
                                        <option value="5">Ghana</option>
                                        <option value="6">Albania</option>
                                        <option value="7">Bahrain</option>
                                        <option value="8">Colombia</option>
                                        <option value="9">Dominican Republic</option>
                                    </select>
                                </div>

                                <div class="col-sm-6 col-12">
                                    <p>Your Address *</p>
                                    <input type="text" name="address">
                                </div>

                                <div class="col-sm-6 col-12">
                                    <p>Town/City *</p>
                                    <input type="text" name="city_id">
                                </div>


                                <div class="col-12">
                                    <input id="toggle2" type="checkbox">
                                    <label class="fontsize" for="toggle2">Ship to a different address?</label>
                                    <div class="row" id="open2">
                                        <div class="col-sm-12">
                                            <p>Name *</p>
                                            <input type="text">
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <p>Email Address *</p>
                                            <input type="email">
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <p>Phone No. *</p>
                                            <input type="text">
                                        </div>

                                        <div class="col-12">
                                            <p>Country *</p>
                                            <select id="s_country">
                                                <option value="1">Select a country</option>
                                                <option value="2">bangladesh</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">Afghanistan</option>
                                                <option value="5">Ghana</option>
                                                <option value="6">Albania</option>
                                                <option value="7">Bahrain</option>
                                                <option value="8">Colombia</option>
                                                <option value="9">Dominican Republic</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <p>Your Address *</p>
                                            <input type="text">
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <p>Town/City *</p>
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p>Order Notes </p>
                                    <textarea name="notes" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-area">
                        <h3>Your Order</h3>
                            <ul class="total-cost">
                                @foreach (cart_items() as $cart_item)
                                    <li>{{ $cart_item->relationship_with_cart->product_name." * ".$cart_item->product_quantity }}  <span class="pull-right">${{ $cart_item->relationship_with_cart->product_price }}</span></li>
                                @endforeach
                                <li>Subtotal <span class="pull-right"><strong>${{ session('sub_total') }}</strong></span></li>
                                <li>Discount Amount <span class="pull-right">${{ session('discount_amount') }}</span></li>
                                <li>Shipping <span class="pull-right">Free</span></li>
                                <li>Total<span class="pull-right">${{ session('sub_total') - session('discount_amount') }}</span></li>
                            </ul>
                            <ul class="payment-method">
                                <li>
                                    <input name="payment_method" id="bank" type="radio">
                                    <label for="bank">Direct Bank Transfer</label>
                                </li>
                                <li>
                                    <input name="payment_method" id="paypal" type="radio">
                                    <label for="paypal">Paypal</label>
                                </li>
                                <li>
                                    <input name="payment_method" id="card" type="radio">
                                    <label for="card">Credit Card</label>
                                </li>
                                <li>
                                    <input name="payment_method" id="delivery" type="radio">
                                    <label for="delivery">Cash on Delivery</label>
                                </li>
                            </ul>
                        <button>Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->


@endsection

