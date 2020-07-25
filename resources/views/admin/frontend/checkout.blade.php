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
                        <form action="{{ route('checkout.post') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>Name *</p>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}">
                                </div>

                                <div class="col-sm-6 col-12">
                                    <p>Email Address *</p>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}">
                                </div>

                                <div class="col-sm-6 col-12">
                                    <p>Phone No. *</p>
                                    <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                </div>

                                <div class="col-12">
                                    <p>Country *</p>
                                    <select class="js-example-basic-single" id="country_id_p1" name="country_id">
                                        <option>Select a country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-6 col-12">
                                    <p>Your Address *</p>
                                    <input type="text" name="address">
                                </div>

                                <div class="col-sm-6 col-12">
                                    <p>Town/City *</p>
                                    <select id="city_id_p1" name="city_id">
                                        <option value="">Select a city</option>
                                    </select>
                                </div>


                                <div class="col-12">
                                    <input id="toggle2" type="checkbox" name="shipping_address" value="1">
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
                                            <input type="text" >
                                        </div>

                                        <div class="col-12">
                                            <p>Country *</p>
                                            <select class="js-example-basic-single" id="country_id_p2">
                                                <option>Select a country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <p>Your Address *</p>
                                            <input type="text">
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <p>Town/City *</p>
                                            <select id="city_id_p2">
                                                <option value="">Select a City</option>
                                            </select>

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
                                <li>Discount Amount ( {{ session('coupon_name') ? session('coupon_name') : 'No coupon added'  }} ) <span class="pull-right">${{ session('discount_amount') }}</span></li>
                                <li>Shipping <span class="pull-right">Free</span></li>
                                <li>Total<span class="pull-right">${{ session('sub_total') - session('discount_amount') }}</span></li>
                            </ul>
                            <ul class="payment-method">
                                <li>
                                    <input name="payment_method" id="card" type="radio" value="1">
                                    <label for="card">Credit Card</label>
                                </li>
                                <li>
                                    <input name="payment_method" id="delivery" type="radio" value="2">
                                    <label for="delivery">Cash on Delivery</label>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-primary">Place Order</button>
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

@section('footer_scripts')
    <script>
        // Country Search code
        $(document).ready(function() {
            //search in country list dropdown
            $('#country_id_p1').select2();
            $('#country_id_p2').select2();
            //search in city list dropdown
            $('#city_id_p1').select2();
            $('#city_id_p2').select2();

            $('#country_id_p1').change(function(){
                var country_id = $(this).val();
                    // alert(country_id);

                    //ajax setup
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    //ajax response start
                    $.ajax({
                        type : 'post',
                        url : '/get/city/list/ajax',
                        data : {country_id : country_id},
                        success : function(data){
                            $('#city_id_p1').html(data);
                        }
                    });
                    //ajax response end
            });

            $('#country_id_p2').change(function(){
                var country_id = $(this).val();
                    // alert(country_id);

                    //ajax setup
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    //ajax response start
                    $.ajax({
                        type : 'post',
                        url : '/get/city/list/two/ajax',
                        data : {country_id : country_id},
                        success : function(data){
                            $('#city_id_p2').html(data);
                        }
                    });
                    //ajax response end
            });
        });
    </script>
@endsection
