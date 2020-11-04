@extends('layouts.frontend')

@section('frontend_content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Profile</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li aria-selected="true"><span>Profile</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- contact-area start -->
    <div class="contact-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form form-style">
                        <form action="{{ route('contactpost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Name</label>
                                    <input type="text" placeholder="Your Name" name="name" value="{{ $user_details->name }}">
                                </div>

                                <div class="col-12  col-sm-6">
                                    <label>Birth Date</label>
                                    <input type="date" placeholder="Your Birthdate" name="birthday"  value="{{ $user_details->birthday }}">
                                </div>

                                <div class="col-12">
                                    <label>Email address</label>
                                    <input type="text" placeholder="Your email address" name="email" value="{{ $user_details->email }}">
                                </div>

                                <div class="col-12">
                                    <label>Phone Number</label>
                                    <input type="text" placeholder="Your phone number" name="phone_number" value="{{ $user_details->phone_number }}">
                                </div>

                                <div class="col-12  col-sm-6">
                                    <label>Password</label>
                                    <input type="password" placeholder="Your password" name="password">
                                </div>

                                    <div class="col-12 col-sm-6">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="1" {{ ($user_details->gender == 1) ? "selected" :" " }}>Male</option>
                                            <option value="2" {{ ($user_details->gender == 2) ? "selected" :" " }}>Female</option>
                                            <option value="3" {{ ($user_details->gender == 3) ? "selected" :" " }}>Transgender</option>
                                        </select>
                                    </div>

                                <div class="col-12">
                                    <button type="submit">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-12">
                    <div class="contact-wrap">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- contact-area end -->


@endsection

