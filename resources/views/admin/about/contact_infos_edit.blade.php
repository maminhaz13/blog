@extends('layouts.admin')

@section('frontend_active')
    active
@endsection

@section('admin_content')

<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
  <a class="breadcrumb-item" href="{{ route('about.index') }}">About Us</a>
  <span class="breadcrumb-item active">Edit About Us</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
        <div class="card text-center mt-5 mb-3">
            <div class="card-header">
                Edit your about information
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('custom.contact.update', $contact_info->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-12 form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="" name="address" value="{{ $contact_info->address }}">
                    </div>

                    <div class="col-md-12 form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="" name="email" value="{{ $contact_info->email }}">
                    </div>

                    <div class="col-md-12 form-group">
                        <label>Telephone</label>
                        <input type="number" class="form-control" id="" name="telephone" value="{{ $contact_info->telephone }}">
                    </div>

                    <div class="col-md-12 form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" id="" name="phone" value="{{ $contact_info->phone }}">
                    </div>

                    <button type="submit" class="btn btn-dark active mg-b-10 btn-btn-sm">Submit</button>
                </form>
            </div>
        </div>

  </div>
</div>


@endsection

