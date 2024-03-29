@extends('layouts.frontend')

@section('menu_contact_active')
    active
@endsection


@section('frontend_content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Contact Us</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><span>Contact</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- contact-area start -->
    {{-- <div class="google-map">
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen></iframe>
        </div>
    </div> --}}
    <div class="contact-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="contact-form form-style">
                        <div class="cf-msg"></div>
                        <form action="{{ route('contactpost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <input type="text" placeholder="Name" name="contact_name">
                                </div>
                                <div class="col-12  col-sm-6">
                                    <input type="email" placeholder="Email" name="contact_email">
                                </div>
                                <div class="col-12">
                                    <input type="text" placeholder="Subject" name="contact_subject">
                                </div>
                                <div class="col-12">
                                    <textarea class="contact-textarea" placeholder="Message" name="contact_message"></textarea>
                                </div>
                                <div class="col-12">
                                    <input type="file" name="contact_attachment">
                                </div>
                                <div class="col-12">
                                    <button type="submit">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-wrap">
                        <ul>
                            <li>
                                <i class="fa fa-home"></i> Address:
                                @foreach(contact_info() as $contact_h)
                                    <p>{{ $contact_h->address }}</p>
                                @endforeach
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> Email address:
                                @foreach(contact_info() as $contact_h)
                                    <p>
                                        <span>{{ $contact_h->email }} </span>
                                    </p>
                                @endforeach
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> phone number:
                                @foreach(contact_info() as $contact_h)
                                    <p>
                                        <span>{{ $contact_h->phone }}</span>
                                    </p>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area end -->


@endsection

