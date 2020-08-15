@extends('layouts.frontend')

@section('frontend_content')
  <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Wish Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Wishlist</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(session()->has('wish_added'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                <span><strong>Well done!</strong> {{ session()->get('wish_added') }}.</span>
                            </div>
                        </div>
                    @endif

                    @if(session('already_added_wish'))
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                <span><strong>{{ session('already_added_wish') }}</strong></span>
                            </div>
                        </div>
                    @endif

                    @if(session('wish_deleted'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="icon ion-ios-close alert-icon tx-24"></i>
                                <span><strong>{{ session('wish_deleted') }}</strong></span>
                            </div>
                        </div>
                    @endif

                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(wish_items() as $wish_item)
                                <tr class = "">
                                    <td class="images"><img src="{{ asset('uploads/product_thumbnail_picture') }}/{{ $wish_item->product->product_thumbnail_picture }}" alt=""></td>
                                    <td class="product"><a href="{{ url('product/details') }}/{{ $wish_item->product->slug }}" target = "blank">{{ $wish_item->product->product_name }}</a></td>
                                    <td class="ptice">${{ $wish_item->product->product_price }}</td>
                                    <td>
                                        <ul>
                                            <li class="mb-3">
                                                <a href="{{ route('removeWishList', $wish_item->id) }}" class = "btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                            </li>
                                            <li class="input-style">
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $wish_item->product->id }}">
                                                    <li class="quantity cart-plus-minus">
                                                        <input type="text" value="1" name="product_quantity"/>
                                                    </li>
                                                    <li><button type="submit" class="btn btn-danger">Add to Cart</button></li>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="100" class="text-center">
                                    <div class="alert alert-info" role="alert">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                            <span><strong>Wishlist Empty</strong></span>
                                        </div>
                                    </div>
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection
