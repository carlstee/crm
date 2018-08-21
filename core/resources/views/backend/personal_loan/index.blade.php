@extends('backend.master')
@section('site-title')
    Personal Loan
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
        @endif <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Personal Loan Management
            </h3>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box yellow-gold">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-money"></i>Personal Loan List
                            </div>

                        </div>

                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="awards">
                                <thead>
                                <tr>
                                    <th> Name </th>
                                    <th>  Phone </th>
                                    <th> Email </th>
                                    <th> Given Amount </th>
                                    <th> Date </th>
                                    <th> Detail </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $personal_loan as $key=>$data)
                                <tr>

                                    <td>{{$data->name}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->amount}}</td>
                                    <td>{{date('Y, M-j',strtotime($data->date))}}</td>
                                    <td>{!! $data->detail !!}</td>

                                    <td>
                                        <a class="btn yellow-gold" href="{{route('personal.loan.edit', $data->id)}}">Edit/View</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$personal_loan->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->

                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection