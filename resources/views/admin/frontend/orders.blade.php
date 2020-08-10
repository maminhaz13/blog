@extends('layouts.admin')

@section('order_active')

    active

@endsection

@section('admin_content')

<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="index.html">Starlight</a>
  <a class="breadcrumb-item" href="index.html">Pages</a>
  <span class="breadcrumb-item active">Blank Page</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Blank Page</h5>
    <p>This is a starter page</p>
  </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="card bg-gray-200 mt-5">
                <div class="card-header card-header-default">
                Your order details
                </div>
                <div class="card-body">
                    <div class="card-body-title">
                    <h5>You will find all of your order details here..</h5>
                    </div>

                    {{-- @if(session()->has('delete_status'))
                        <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                            <span><strong>Warning!</strong> {{ session()->get('delete_status') }}.</span>
                        </div>
                        </div>
                    @endif

                    @if(session()->has('edit_status'))
                        <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                            <span><strong>Well done!</strong> {{ session()->get('edit_status') }}.</span>
                        </div>
                        </div>
                    @endif --}}

                        <form method="post" action="{{ url('markdeletecategory') }}">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-hover mg-b-0">
                                <thead>
                                <tr>
                                    {{-- <th scope="col">Mark <input type="checkbox" id="checkAll" ></th> --}}
                                    <th scope="col">Serial No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Discount Amount</th>
                                    <th scope="col">Coupon Name</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($order_data as $orders)
                                    <tr>
                                        {{-- <td>
                                            <input class="ckbox mg-b-0" type="checkbox" name="" value="" id="checkItem">
                                        </td> --}}
                                        <td>{{ $loop->index +1 }}</td>
                                        <td>{{ $orders->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if($orders->payment_method == 1)
                                                Cash On Delivery
                                            @else
                                                Credit Card
                                            @endif
                                        </td>
                                        <td>
                                            @if($orders->payment_status == 2)
                                                <span class="badge badge-pill badge-success">Paid</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Unpaid</span>
                                            @endif
                                        </td>
                                        <td>{{ $orders->subtotal }}</td>
                                        <td>{{ $orders->discount_amount }}</td>
                                        <td>{{ $orders->coupon_name }}</td>
                                        <td>{{ $orders->subtotal - $orders->discount_amount }}</td>
                                        <td>
                                            <a href="{{ route('customer.invoice.download', $orders->id) }}"> <i class="fa fa-download"> download invoice</i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="100" class="text-center text-dark">
                                            @foreach($orders->order_details as $orderdetail)
                                                <p>{{ $orderdetail->product->product_name }} * {{ $orderdetail->product_quantity }} pcs - ${{ $orderdetail->product->product_price }}</p>
                                            @endforeach
                                        </td>  
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100" class="text-center text-danger"> Orders data unavailable </td>  
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- @if($categories->count() > 0)
                            <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10"> Mark Delete</button>  
                        @endif --}}
                    {{-- </form>      --}}
                </div>
            </div>
        </div>

      </div>
    </div>

  </div>
</div>


@endsection


