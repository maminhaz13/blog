@extends('layouts.admin')
@php
error_reporting(0);
@endphp
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <a class="breadcrumb-item" href="{{ route('Product.index') }}">Product</a>
        <a class="breadcrumb-item" href="{{ route('product.discount') }}">Product discount manager</a>
        <span class="breadcrumb-item active">{{ $product_info->product_name }}</span>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 mt-3">
                    <div class="card-header card-header-default tx-orange">Product Discount Edit</div>
                    <div class="card-body">

                        {{-- <div>
                @if (session('product_insert_success'))
                  <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                      <span><strong>Well done!</strong> {{ session('product_insert_success') }}.</span>
                    </div>
                </div>
                @endif

                @error('product_name')
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-24"></i>
                        <span><strong>Oh snap!</strong> {{ $message }}.</span>
                    </div>
                </div>
                @enderror

                @error('product_short_description')
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-24"></i>
                        <span><strong>Oh snap!</strong> {{ $message }}.</span>
                    </div>
                </div>
                @enderror

                @error('product_long_description')
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-24"></i>
                        <span><strong>Oh snap!</strong> {{ $message }}.</span>
                    </div>
                </div>
                @enderror

                @error('product_quantity')
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-24"></i>
                        <span><strong>Oh snap!</strong> {{ $message }}.</span>
                    </div>
                </div>
                @enderror

                @error('product_alert_quantity')
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-24"></i>
                        <span><strong>Oh snap!</strong> {{ $message }}.</span>
                    </div>
                </div>
                @enderror

                @error('product_price')
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-24"></i>
                        <span><strong>Oh snap!</strong> {{ $message }}.</span>
                    </div>
                </div>
                @enderror
            </div> --}}

            <form method="POST" action="{{ route('product.discount.upd') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="tx-orange tx-bold">Selected Product</label>
                    <select id="one" class="js-example-basic-single custom-select tx-15 tx-bold tx-inverse" name="product_id">
                        <option value="{{ $product_info->id }}" selected>
                            {{ $product_info->product_name }}
                        </option>
                    </select>
                </div>

                <div class="col-md-12 form-group tx-15 tx-bold tx-orange">
                    <label>Product Discount Parcent</label>
                    <input type="text" class="form-control" id="" name="product_discount" value="{{ $product_info->product_discount }}">
                </div>

                <div class="col-md-12 form-group tx-15 tx-bold tx-orange">
                    <label>Product Discount Amount</label>
                    <input type="text" class="form-control" id="" name="product_discount_amount" value="{{ $product_info->product_discount_amount }}">
                </div>

                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-dark active mg-b-10 btn-btn-sm">Add discount</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
