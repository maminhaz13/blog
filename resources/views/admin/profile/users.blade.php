@extends('layouts.admin')


@section('home_active')
    active
@endsection

@section('title')
    Home
@endsection


@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
        <span class="breadcrumb-item active">Home</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Home Page</h5>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="card bg-gray-200">
                        <h3 class="">Total Users : {{ $total_users }} </h3>
                            <div class="card-body">
                                @if (session('status'))
                                    <div role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                
                                <div class="table-responsive">
                                    <table class="table table-hover mg-b-0">
                                        <thead>
                                            <tr>
                                            <th scope="col">Serial No</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email Address</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $users->firstItem() + $loop->index  }}</td>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ Str::title($user->name) }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @isset($user->created_at)
                                                            <li> Date: {{ $user->created_at->format('d:m:Y') }}</li>
                                                            <li> Time: {{ $user->created_at->timezone('Asia/Dhaka')->format('h:i:s A') }}</li>
                                                            <li>{{ $user->created_at->diffForHumans() }}</li>
                                                        @endisset
                                                    </td>
                                                    <td>
                                                        @isset($user->updated_at)
                                                            <li> Date: {{ $user->updated_at->format('d:m:Y') }}</li>
                                                            <li> Time: {{ $user->updated_at->timezone('Asia/Dhaka')->format('h:i:s A') }}</li>
                                                            <li>Duration: {{ $user->updated_at->diffForHumans() }}</li>
                                                        @endisset
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $users->links() }}
                            </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header card-header-default bg-gray-400 justify-content-between">
                            <h6 class="mg-b-0 tx-14 tx-inverse">Newsletter</h6>
                        </div>

                        <div class="card-body bg-gray-200">
                            <p class="mg-b-0">Send latest news and updates all of your users...</p>
                        </div>

                        <div class="card-footer tx-center bg-gray-300">
                            <a href="{{ route('sendnewsletter') }}" class="btn btn-info">Send</a>
                            <a href="{{ route('home') }}" class="btn btn-secondary">Back to home</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection  
