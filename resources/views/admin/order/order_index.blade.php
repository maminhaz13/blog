    @extends('layouts.admin')

    @section('order_manage_active')

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

            <div class="card bg-gray-200 mt-5">
                <div class="card-header card-header-default">
                Customer order details
                </div>
                <div class="card-body">
                    <div class="card-body-title">
                    <h5>You will find all of Customer order details here..</h5>
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

                        @csrf
                        <div class="table-responsive">
                            <table id="table" class="table table-hover mg-b-0">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">Mark <input type="checkbox" id="checkAll" ></th> --}}
                                        <th scope="col">Serial No</th>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Orderer Name</th>
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
                                @forelse($order_info as $orders)
                                    <tr>
                                        {{-- <td>
                                            <input class="ckbox mg-b-0" type="checkbox" name="" value="" id="checkItem">
                                        </td> --}}
                                        <td>{{ $loop->index +1 }}</td>
                                        <td>{{ $orders->id }}</td>
                                        <td>{{ $orders->user->name }}</td>
                                        <td>
                                            @if($orders->payment_method == 1)
                                                Cash On Delivery
                                            @else
                                                Credit Card
                                            @endif
                                        </td>
                                        <td>
                                            @if($orders->payment_status == 1)
                                                <span class="badge badge-pill badge-danger">Unpaid</span>
                                            @elseif($orders->payment_status == 2)
                                                <span class="badge badge-pill badge-success">Paid</span>
                                            @elseif($orders->payment_status == 3)
                                                <span class="badge badge-pill badge-warning">Canceled</span>
                                            @endif
                                        </td>
                                        <td>{{ $orders->subtotal }}</td>
                                        <td>{{ $orders->discount_amount }}</td>
                                        <td>{{ $orders->coupon_name }}</td>
                                        <td>{{ $orders->subtotal - $orders->discount_amount }}</td>
                                        <td>
                                            @if($orders->payment_status == 1)
                                                <form action="{{ route('order.update', $orders->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                    <button name="order_id" type="submit" class="btn btn-info active btn-btn-sm mg-b-10 btn btn sm">
                                                        Paid
                                                    </button>
                                                </form>

                                                <a href="{{ route('order.cancel', $orders->id) }}" class="btn btn-danger active btn-btn-sm mg-b-10 btn btn sm" >
                                                    Cancel Order
                                                </a>
                                            @elseif($orders->payment_status == 2)
                                                <span class="badge badge-pill badge-warning">All task implemented</span>
                                            @elseif($orders->payment_status == 3)
                                                <span class="badge badge-pill badge-warning">Canceled</span>
                                            @endif
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



    @endsection

    @section('footer_scripts')
        <script>
            $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
            });
        </script>
        <script>
            $(document).ready( function () {
                $('#table').DataTable();
            } );
        </script>
    @endsection
