@extends('layouts.login')

@section('login_content')

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">{{ env('APP_NAME') }} <span
                    class="tx-info tx-normal">admin</span></div>
            <div class="tx-center mg-b-60">Log in to your system..</div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if($errors->all())
                    @foreach($errors->all() as $login_error)
                        <div class="alert alert-danger" role="alert">
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="icon ion-ios-close alert-icon tx-24"></i>
                                <span><strong>Oh snap!</strong> {{ $login_error }}.</span>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control" placeholder="Enter your E-Mail Address"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div class="form-group">
                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                    <input placeholder="Enter your password" id="password" type="password" class="form-control"
                        name="password" required autocomplete="current-password">
                    <br>
                    <div class="mg-t-20 mg-lg-t-0">
                        <label class="ckbox">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked><span>Remember Me</span>
                        </label>
                    </div>

                    @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-info btn-block"><i class="fa fa-sign-in" aria-hidden="true"> Sign In</i></button>
            </form>
            <div class="justify-content-center mt-3"><a href="{{ url('login/github') }}"
                    class="btn-block btn btn-dark"><i class="fa fa-github" aria-hidden="true"> Log in with
                        Github</i></a></div>
            <div class="justify-content-center mt-3"><a href="#" class="btn-block btn btn-danger"><i
                        class="fa fa-google" aria-hidden="true"> Log in with Google</i></a></div>

            <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign
                    Up</a></div>
        </div>
    </div>

@endsection