@extends('backend.master')
@section('site-title')
    Sold History
@endsection
@section('main-content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Sold Product History</h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box grey-salt">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-clipboard"></i>History List
                            </div>
                        </div>

                        <div class="portlet-body">


                            <table class="table table-striped table-bordered table-hover" id="notices">
                                <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Invoice ID </th>
                                    <th> Customer </th>
                                    <th> Warehouse From </th>
                                    <th> Product </th>
                                    <th> Quantity </th>
                                    <th> Total </th>
                                    <th> Print </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $key=>$not)
                                    <tr >
                                        <td>{{date('Y,M-j', strtotime($not->date))}}</td>
                                        <td>{{$not->invoice_id}}</td>
                                        <td>{{$not->customer->full_name}}</td>
                                        <td>{{$not->warehouse->name }}</td>
                                        <td>{{$not->product->product_name }}</td>
                                        <td>{{$not->quantity }} {{$not->product->unit}}</td>
                                        <td>{{$not->total_amount }} {{$general->currency}}</td>
                                        <td>
                                            <a class="btn green" href="{{route('print.history.soldproduct', $not->invoice_id)}}">
                                                <i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
