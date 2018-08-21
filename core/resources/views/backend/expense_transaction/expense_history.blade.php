@extends('backend.master')
@section('site-title')
    Expense History
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
            <h3 class="page-title bold">Expense History
            </h3>
            <hr>
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title text-center">
                            <div class="caption ">
                                Expense History
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Bank Name
                                    </th>
                                    <th>
                                        Bank AC Number
                                    </th>
                                    <th>
                                        Expense
                                    </th>
                                    <th>
                                        Note
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                </thead>
                                <tbody>
                                @foreach($trans as $key=> $data)

                                    <tr>
                                        <td> {{$data->bank->bank_name}}</td>
                                        <td> {{$data->bank->account_number}}</td>
                                        <td> {{	abs($data->amount)}} {{$general->currency}}</td>
                                        <td> {!! $data->note !!}</td>
                                        <td> {{date('Y, M-d',strtotime($data->updated_at))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection
