@extends('layouts.admin')

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('index') }}">{{ config('app.name') }}</a>
    <a class="breadcrumb-item" href="">Coupon</a>
    {{-- <span class="breadcrumb-item active">{{ $edit_data->category_name }}</span> --}}
  </nav>


      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-default">Coupon Form</div>
            <div class="card-body">

              {{-- @if (session('product_insert_success'))
                <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Well done!</strong> {{ session('product_insert_success') }}.</span>
                  </div>
                </div>
              @endif --}}
              
              <form method="post" action="{{ route('Coupon.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group mb-3">
                  <label >Coupon Name</label>
                  <input type="text" class="form-control" name="coupon_name" placeholder="Enter coupon name" value="">

                  @error('coupon_name')
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
                </div>

                <div class="form-group mb-3">
                  <input type="hidden" class="form-control" name="added_by" value="{{ $user_id }}">
                </div>

                <div class="form-group mb-3">
                  <label >Minimum Purchase Amount</label>
                  <input type="number" class="form-control" name="minimum_purchase_amount" placeholder="Enter minimum purchase amount" value="">

                  @error('minimum_purchase_amount')
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
                </div>

                <div class="form-group mb-3">
                  <label >Offerd Discount Percent</label>
                  <input type="number" class="form-control" name="offerd_discount" placeholder="Enter offerd discount percent" value="">

                  @error('offerd_discount')
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
                </div>

                <div class="form-group">
                  <label>Validation Time</label>
                  <input type="date" class="form-control" name="valid_till" placeholder="Enter validation time" value="">

                  @error('valid_till')
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
                </div>

                <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10">Create Product</button>
              </form>
            </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card mb-5 mt-5">
          <div class="card-header card-header-default">Activate Coupon Table</div>
            <div class="card-body">
              <div>
                
                {{-- @if(session('product_trashed'))
                  <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Warning!</strong> Better check yourself.</span>
                  </div>
                  </div>
                @endif --}}
              </div>
              {{-- Added products table start --}}
              <div class="table-responsive mb-5 mt-5">
                <table class="table table-hover mg-b-0">
                  <thead>
                    <tr>
                      <th scope="col">Mark <input type="checkbox" id="checkAll"></th>
                      <th scope="col">Serial No</th>
                      <th scope="col">Coupon Id</th>
                      <th scope="col">Coupon Name</th>
                      <th scope="col">Minimum Purchase Amount</th>
                      <th scope="col">Offerd Discount Percent</th>
                      <th scope="col">Validation Time</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @forelse($coupons_data as $coupon)
                      <tr>
                        <td>
                          <input class="ckbox mg-b-0" type="checkbox" name="product_data" value= "$coupon->id" id="checkItem">
                        </td>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->coupon_name }}</td>
                        <td>{{ $coupon->minimum_purchase_amount }}</td>
                        <td>{{ $coupon->offerd_discount }}</td>
                        <td>{{ $coupon->valid_till }}</td>
                        <td>--</td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="100" class="text-center text-danger"> No more data available </td>  
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              {{-- Added products table end --}}
            </div>
        </div>
      </div>



</div>

@endsection

