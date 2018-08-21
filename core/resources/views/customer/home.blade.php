
@extends('customer.layout.auth')
@section('site-title')
    DashBoard Of Customer
@endsection

@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            @if (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h4>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <h3 class="page-title uppercase bold"> Customer Dashboard</h3>
            <hr>
            <div class="note note-success">
                <h3 class="bold">Welcome, {{Auth::guard('customer')->user()->full_name}}</h3>
                <p> {{Auth::guard('customer')->user()->include_word}} </p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{\App\SalePoint::where('customer_id', Auth::guard('customer')->user()->id)->count('id')}}"></span>
                            </div>
                            <div class="desc"> Total Invoice Number</div>
                        </div>
                        <a class="more" href="{{url('customer/invoice/history')}}"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-ticket"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{\App\Ticket::where('customer_id', Auth::guard('customer')->user()->id)->count('id')}}"></span>
                            </div>
                            <div class="desc"> Total Tickets </div>
                        </div>
                        <a class="more" href="{{url('customer/home')}}"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



