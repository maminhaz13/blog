@extends('layouts.admin')

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
    <a class="breadcrumb-item" href="{{ route('Product.index') }}">Product</a>
    <span class="breadcrumb-item active">{{ $product_info->product_name }}</span>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3 mt-3">
          <div class="card-header card-header-default">Product Edit</div>
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
              </div>  --}}
              
              <form method="post" action="{{ route('Product.update', $product_info->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                  <label >Product Name</label>
                      <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" value="{{ $product_info->product_name }}">        
                </div>

                <div class="form-group mb-3">
                  <label>Product category</label>
                  <select class="form-control" name="">
                    <option value="">Select one--</option>
                    @foreach($category_info as $cat_data)
                      <option {{ ($cat_data->id == $product_info->category_id) ? "selected":"" }} value="{{ $cat_data->id }}">{{ $cat_data->category_name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group mb-3">
                  <label >Product Short Description</label>
                  <input type="text" class="form-control" name="product_short_description" placeholder="Enter Product Short Description" value="{{ $product_info->product_short_description }}">
                </div>

                <div class="form-group mb-3">
                  <label >Product Long Description</label>
                  <textarea type="text" class="form-control" name="product_long_description" id="" cols="30" rows="10" placeholder="Enter Product Long Description" >{{ $product_info->product_long_description }}</textarea>
                </div>

                <div class="form-group mb-3">
                  <label >Product Quantity</label>
                  <input type="number" class="form-control" name="product_quantity" placeholder="Enter Product Quantity" value="{{ $product_info->product_quantity }}">
                </div>

                <div class="form-group mb-3">
                  <label >Product Quantity Alert</label>
                  <input type="number" class="form-control" name="product_alert_quantity" placeholder="Enter Product Quantity Alert" value="{{ $product_info->product_alert_quantity }}">
                </div>

                <div class="form-group">
                  <label >Product Price </label>
                  <input type="number" class="form-control" name="product_price" placeholder="Enter Product Price" value="{{ $product_info->product_price }}">
                </div>

                <div class="form-group mb-3">
                  <label>Product Thumbnail Picture</label>
                  <input type="file" class="form-control" name="product_thumbnail_picture" placeholder="Enter Product Thumbnail Picture" value="{{ $product_info->product_thumbnail_picture }}">
                </div>

                <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10">Edit Product</button>
              </form>        
            </div>
        </div>        
      </div>
    </div>
  </div>
</div>
@endsection
