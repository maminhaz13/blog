@extends('layouts.admin')

@section('title')
    Edit Category    
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
    <a class="breadcrumb-item" href="{{ route('addcategory') }}">Category</a>
    <span class="breadcrumb-item active">{{ $edit_data->category_name }}</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Welcome to edit category page. You can Edit your category here..</h5>
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-default">Edit Category</div>
            <div class="card-body">

              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Well done!</strong> {{ session('status') }}.</span>
                  </div>
                </div>
              @endif

              @error('category_name')
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

              @error('category_description')
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
              
              <form method="post" action="{{ route('editcategorypost') }}">
                @csrf
                <div class="form-group">
                  <input type="hidden" class="hidden" value="{{ $edit_data->id }}" name = "category_id">
                  <label >Edit Category</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name" value="{{ $edit_data->category_name }}">        
                </div>

                <div class="form-group">
                  <label >Edit Category Decription</label>
                  <input type="text" class="form-control" name="category_description" placeholder="Enter Category description" value='{{ $edit_data->category_description }}'>
                </div>
                  <button type="submit" class="btn btn-primary">Edit Category</button>
              </form>        
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection  
