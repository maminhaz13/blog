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

                                <div>
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

                                    @if(session()->has('child_category_edited'))
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                                <span><strong>{{ session()->get('child_category_edited') }}.</strong></span>
                                            </div>
                                        </div>
                                    @endif

                                    @if(session()->has('child_category_restored'))
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                                <span><strong>{{ session()->get('child_category_restored') }}.</strong></span>
                                            </div>
                                        </div>
                                    @endif

                                    @if(session()->has('child_category_trashed'))
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <i
                                                    class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                                <span><strong>{{ session('child_category_trashed') }}</strong></span>
                                            </div><!-- d-flex -->
                                        </div>
                                    @endif

                                    @if(session()->has('child_cat_mark_deleted_err'))
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <i
                                                    class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                                <span><strong>{{ session('child_cat_mark_deleted_err') }}</strong></span>
                                            </div><!-- d-flex -->
                                        </div>
                                    @endif

                                    @if(session()->has('child_cat_mark_deleted'))
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <i
                                                    class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                                <span><strong>{{ session('child_cat_mark_deleted') }}</strong></span>
                                            </div><!-- d-flex -->
                                        </div>
                                    @endif

                                    @if(session('child_category_delete'))
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <i class="icon ion-ios-close alert-icon tx-24"></i>
                                                <span><strong>{{ session('child_category_delete') }}</strong></span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                    <form method="post" action="{{ route('child_category.add') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label>Child Category</label>
                                            <input type="text" class="form-control" name="child_category_name" placeholder="Enter Category Name" value="{{ old('category_name') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select class="form-control" data-placeholder="Choose one parent category" tabindex="-1" aria-hidden="true" name="category_id">
                                                <option label="Choose one"></option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Child Category Description</label>
                                            <input type="text" class="form-control" name="child_category_desc" placeholder="Enter Category description" value='{{ old('category_description') }}'>
                                        </div>

                                        <div class="form-group custom-file">
                                            {{-- <P class="mg-b-auto tx-black">Child Category Picture</P> --}}
                                            <label class="custom-file">

                                                <input type="file" class="custom-file-input" name="child_category_pic">
                                                <span class="custom-file-control custom-file-control-inverse"></span>
                                            </label>
                                        </div>
                                        <br>
                                        <p class="pos-relative">Choose your Child category picture</p>
                                        <br>
                                        <br>

                                        <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10"><i class="fa fa-send mg-r-10"> Insert Child-Category </i></button>
                                    </form>
                                </div>
                        </div>

                        <div class="card bg-gray-200 mt-5">
                            <div class="card-header card-header-default">
                                Active Category List
                            </div>
                            <div class="card-body">
                                <div class="card-body-title">
                                    <h5>All of your activated category will be listed here.. You can edit this categories or delete these categories here..</h5>
                                </div>

                                <div class="table-responsive">
                                    <form action="{{ route('child_category.mark_trash') }}" method="post">
                                        @csrf
                                        <table id="ditto" class="table table-hover mg-b-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Mark <input type="checkbox" id="checkAll"></th>
                                                    <th scope="col">Serial No</th>
                                                    <th scope="col">Child Category Name</th>
                                                    <th scope="col">Child Category Description</th>
                                                    <th scope="col">Parent Category</th>
                                                    <th scope="col">Child Category Picture</th>
                                                    <th scope="col">Created By</th>
                                                    <th scope="col">Created Time</th>
                                                    <th scope="col">Updated Time</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($child_categories as $child_category)
                                                <tr>
                                                    <td><input class="ckbox mg-b-0" type="checkbox" name="child_category_id[]" value="{{ $child_category->id }}" id="checkItem"></td>
                                                    <td>{{ $loop->index +1 }}</td>
                                                    <td>{{ $child_category->child_category_name }}</td>
                                                    <td>{{ $child_category->child_category_desc }}</td>
                                                    <td>{{ $child_category['category_data'],['category_name'] }}</td>
                                                    <td>
                                                        <img src="{{ asset('uploads') }}/child_category_pic/{{ $child_category->child_category_pic }}"
                                                            class="img-fluid" alt="image not found">
                                                    </td>
                                                    <td>{{ users()->find($child_category->addedby)->name }}</td>
                                                    <td>
                                                        @isset($child_category->created_at)
                                                            <li>Time : {{ $child_category->created_at->format('h:i:s A') }}</li>
                                                            <li>Date : {{ $child_category->created_at->format('d:m:Y') }}</li>
                                                            <li>Duration : {{ $child_category->created_at->diffForHumans() }}</li>
                                                        @endisset
                                                    </td>
                                                    <td>
                                                        @isset($child_category->updated_at)
                                                            <li>Time : {{ $child_category->updated_at->format('h:i:s A') }}</li>
                                                            <li>Date : {{ $child_category->updated_at->format('d:m:Y') }}</li>
                                                            <li>Duration : {{ $child_category->updated_at->diffForHumans() }}</li>
                                                        @endisset
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ route('child_category.edit', $child_category->id) }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">
                                                                Edit
                                                            </a>
                                                            <a href="{{ route('child_category.trash', $child_category->id) }}" type="button" class="btn btn-danger btn-btn-sm mg-b-10">
                                                                Trash
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="100" class="text-center text-danger"> No more data available </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        @if($child_categories->count() > 0)
                                            <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10"> Mark Delete</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-gray-200 mt-5">
                            <div class="card-header card-header-default">
                                Deleted Category List
                            </div>
                            <div class="card-body">
                                <div class="card-body-title">
                                    <h5>All of your deleted category will be listed here.. You can restore this
                                        categories or delete these categories here..</h5>
                                </div>

                                <form action="" method="post">
                                    @csrf
                                    <table id="table" class="table table-hover mg-b-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mark <input type="checkbox" id="checkAll"></th>
                                                <th scope="col">Serial No</th>
                                                <th scope="col">Child Category Name</th>
                                                <th scope="col">Child Category Description</th>
                                                <th scope="col">Parent Category</th>
                                                <th scope="col">Child Category Picture</th>
                                                <th scope="col">Created By</th>
                                                <th scope="col">Created Time</th>
                                                <th scope="col">Updated Time</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($trashed_child_categories as $t_child_category)
                                                <tr>
                                                    <td><input class="ckbox mg-b-0" type="checkbox" name="child_category_id[]" value="" id="checkItem"></td>
                                                    <td>{{ $loop->index +1 }}</td>
                                                    <td>{{ $t_child_category->child_category_name }}</td>
                                                    <td>{{ $t_child_category->child_category_desc }}</td>
                                                    <td>{{ $t_child_category->category_data->category_name }}</td>
                                                    <td>
                                                        <img src="{{ asset('uploads') }}/child_category_pic/{{ $t_child_category->child_category_pic }}" class="img-fluid" alt="image not found">
                                                    </td>
                                                    <td>{{ users()->find($t_child_category->addedby)->name }}</td>
                                                    <td>
                                                        @isset($t_child_category->created_at)
                                                            <li>Time : {{ $t_child_category->created_at->format('h:i:s A') }}</li>
                                                            <li>Date : {{ $t_child_category->created_at->format('d:m:Y') }}</li>
                                                            <li>Duration : {{ $t_child_category->created_at->diffForHumans() }}</li>
                                                        @endisset
                                                    </td>
                                                    <td>
                                                        @isset($t_child_category->updated_at)
                                                            <li>Time : {{ $t_child_category->updated_at->format('h:i:s A') }}</li>
                                                            <li>Date : {{ $t_child_category->updated_at->format('d:m:Y') }}</li>
                                                            <li>Duration : {{ $t_child_category->updated_at->diffForHumans() }}</li>
                                                        @endisset
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ route('child_category.recover', $t_child_category->id) }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">
                                                                restore
                                                            </a>
                                                            <a href="{{ route('child_category.delete', $t_child_category->id) }}" type="button" class="btn btn-danger btn-btn-sm mg-b-10">
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="100" class="text-center text-danger"> No more data available </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('footer_scripts')
    {{-- script to mark for delete or restore --}}
    <script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    </script>

    {{-- script for datatable one --}}
    <script>
        $(document).ready( function () {
            $('#ditto').DataTable();
        } );
    </script>

    {{-- script for datatable two --}}
    <script>
        $(document).ready( function () {
            $('#tableOne').DataTable();
        } );
    </script>

    {{-- <script>
        $(function(){

            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });

            // // Select2 by showing the search
            // $('.select2-show-search').select2({
            //     minimumResultsForSearch: ''
            // });
        });
    </script> --}}

    @endsection
