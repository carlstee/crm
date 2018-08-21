@extends('backend.master')
@section('site-title')
    Catering System
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold">Catering System
                <small> Office-managment </small>
                <a class="btn purple-medium pull-right" data-toggle="modal" href="{{route('add.food.comapny')}}">
                    Send Meal To Company
                    <i class="fa fa-plus"></i> </a>
            </h3>
            <!-- END PAGE TITLE-->
                        <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box yellow-crusta">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>Catering Service History</div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> Serial </th>
                                    <th>Date</th>
                                    <th> Invoice ID </th>
                                    <th> Comapny Name </th>
                                    <th> Package Name </th>
                                    <th> Transaction </th>
                                    <th> Quantity</th>
                                    <th> Action </th>
                                    <th> Print </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($service as $key => $data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->date}}</td>
                                        <td>{{$data->invoice_id}}</td>
                                        <td>{{$data->company->office_name}}</td>
                                        <td>{{$data->package->package_name}}</td>
                                        <td>
                                            @if($data->payment == 1)
                                                <div class="btn-info" style="text-align: center">Paid</div>
                                            @elseif($data->payment == 0 )
                                                <div class="btn-danger" style="text-align: center">Due</div>
                                            @endif
                                        </td>
                                        <td>{{$data->quantity}}</td>
                                        <td><a class="btn purple" href="{{route('catering.edit', $data->id)}}">
                                            <i class="fa fa-edit"></i>Edit/View</a></td>
                                        <td><a class="btn green" href="{{route('print.invoice', $data->id)}}">
                                                <i class="fa fa-print"></i></a></td>
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
