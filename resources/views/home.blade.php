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
        @if(Auth::user()->role == 1)
            <h1>Welcome to admin panel..</h1>
        @else
            <h1>Hello mr./ms./mrs. customer, you are welcomed...</h1>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mt-5">
                    <div class="card text-center">
                      <div class="card-header">Graph one</div>
                      <div class="card-body">
                          <canvas id="myChart"></canvas>
                      </div>
                    </div>
                </div>

                <div class="col-md-6 mb-5 mt-5">
                    <div class="card text-center">
                      <div class="card-header">Graph two</div>
                      <div class="card-body">
                          <canvas id="myChart_2"></canvas>
                      </div>
                    </div>
                </div>

                <div class="col-md-6 mb-5 mt-5">
                    <div class="card text-center">
                      <div class="card-header">Graph three</div>
                      <div class="card-body">
                          <canvas></canvas>
                      </div>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection  

@section('footer_scripts')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
                labels: ['paid', 'unpaid', 'canceled'],
                datasets: [{
                    label: 'Payment statistics',
                    backgroundColor: [
                        'green',
                        'red',
                        'blue',
                    ],
                    borderColor: 'rgb(300, 300, 132)',
                    data: [{{ $total_paid }}, {{ $total_unpaid }}, {{ $total_canceled }}],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart_2').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['total stock price', 'total sale'],
                datasets: [{
                    label: ['total stock price vs total sale'],
                    backgroundColor: [
                        'green',
                        'violet'
                    ],
                    borderColor: 'rgb(300, 300, 132)',
                    data: [{{ $inventory_total }}, {{ $total_sale }}],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
@endsection
