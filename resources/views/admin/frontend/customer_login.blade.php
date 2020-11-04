@extends('layouts.frontend')

@section('customer_login')

        <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Account</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><span>Login</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                            @if($errors->all())
                                @foreach($errors->all() as $login_error)
                                    <div class="alert alert-danger" role="alert">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i class="icon ion-ios-close alert-icon tx-24"></i>
                                            <span><strong> {{ $login_error }}.</strong></span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="form-group">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" placeholder="Enter your E-Mail Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password" class="">{{ __('Password') }}</label>
                                <input placeholder="Enter your password" id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="password">Save Password</label>
                                    <input type="checkbox" name="remember" id="remember {{ old('remember') ? 'checked' : '' }} checked">
                                </div>

                                <div class="col-lg-6 text-right">
                                    @if(Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forget Your Password?</a>
                                    @endif
                                </div>
                            </div>
                            <button type="submit">SIGN IN</button>
                            <div class="text-center">
                                <a href="{{ route('user.login') }}">Or Create an Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->

@endsection

