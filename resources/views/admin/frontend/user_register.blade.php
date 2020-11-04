@extends('layouts.frontend')

@section('frontend_content')


    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Account</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Register</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->

    <!-- checkout-area start -->
    <div class="account-ar ptb-100">
        <div class="container">
            <div>
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-close alert-icon tx-24"></i>
                            <span><strong> {{ $message }}.</strong></span>
                        </div>
                    </div>
                @enderror

                @error('email')
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-close alert-icon tx-24"></i>
                            <span><strong> {{ $message }}.</strong></span>
                        </div>
                    </div>
                @enderror

                @error('phone_number')
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-close alert-icon tx-24"></i>
                            <span><strong> {{ $message }}.</strong></span>
                        </div>
                    </div>
                @enderror

                @error('birthday')
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-close alert-icon tx-24"></i>
                            <span><strong> {{ $message }}.</strong></span>
                        </div>
                    </div>
                @enderror

                @error('password')
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-close alert-icon tx-24"></i>
                            <span><strong> {{ $message }}.</strong></span>
                        </div>
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                        <form action="{{ route('user.registration.post') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>User Name </label>
                                <input type="text" name="name" placeholder="Enter your user name">
                            </div>

                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" placeholder="Enter your email account">
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" placeholder="Enter your phone number">
                            </div>

                            <div class="form-group">
                                <label>Birth Day</label>
                                <input type="date" name="birthday">
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Gender</label>
                                    <select multiple class="form-control" name="gender" id="exampleFormControlSelect2">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Transgender</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter your password">
                            </div>

                            <button class="submit">Register</button>
                            <div class="text-center">
                                <a href="{{ route('login') }}">Or Login</a>
                            </div>
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

