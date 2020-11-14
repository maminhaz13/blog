@extends('layouts.admin')

@section('category_active')
    active
@endsection

@section('title')
    Child-Category
@endsection


@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Category Page</h5>
                <p>This is the page where you can add the category you want,delete the category or recover the category
                    you deleted mistakenly..</p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-gray-200 mt-5">
                            <div class="card-header card-header-default">Add Category Form</div>
                                <div class="card-body">

                                    @if(session()->has('child_category_added'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                            <span><strong>{{ session()->get('child_category_added') }}.</strong></span>
                                        </div>
                                    </div>
                                    @endif

                                    @error('category_name')
                                    <div class="alert alert-warning" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i
                                                class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                            <span><strong>Warning!</strong> {{ $message }}.</span>
                                        </div><!-- d-flex -->
                                    </div>
                                    @enderror

                                    @error('category_description')
                                    <div class="alert alert-warning" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i
                                                class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                            <span><strong>Warning!</strong> {{ $message }}.</span>
                                        </div><!-- d-flex -->
                                    </div>
                                    @enderror

                                    <form method="post" action="{{ route('child_category.edit.post') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <input type="hidden" value="{{ $child_categories->id }}" name="id">
                                            <label>Child Category</label>
                                            <input type="text" class="form-control" name="child_category_name" placeholder="Enter Category Name" value="{{ $child_categories->child_category_name }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select class="form-control" data-placeholder="Choose one parent category" tabindex="-1" aria-hidden="true" name="category_id">
                                                <option label="Choose one"></option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $child_categories->category_id == $category->id ? "selected" : "" }}>{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Child Category Description</label>
                                            <input type="text" class="form-control" name="child_category_desc" placeholder="Enter Category description" value='{{ $child_categories->child_category_desc }}'>
                                        </div>

                                            {{-- <div class="form-group">
                                                <label>Add Category Picture</label>
                                                <input type="file" class="form-control" name="category_picture" value="">
                                                @error('category_description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <label class="custom-file">
                                                <input type="file" class="custom-file-input">
                                                <span class="custom-file-control custom-file-control-inverse"></span>
                                            </label> --}}

                                            <button type="submit"
                                                class="btn btn-dark active btn-btn-sm mg-b-10"><i class="fa fa-send mg-r-10"> Insert Category </i>
                                            </button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection