@extends('backend.master')
@section('site-title')
    Expense Transaction
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
            <h3 class="page-title bold">Expense Transaction
                <small> Office-managment </small>
                <a class="btn green-dark pull-right" href="{{route('add.expense')}}">
                    Debit
                    <i class="fa fa-plus"></i>
                </a>
                <a class="btn green-dark" href="{{route('expense.history')}}">
                    Debit History
                    <i class="fa fa-minus"></i>
                </a>
            </h3>
            <hr>
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box green-dark">
                        <div class="portlet-title text-center">
                            <div class="caption ">
                                Transaction
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
                                        View
                                    </th>

                                </thead>
                                <tbody>
                                @foreach($trans as $key=> $data)

                                    <tr>
                                        <td> {{$data->bank->bank_name}}</td>
                                        <td> {{$data->bank->account_number}}</td>
                                        <td>
                                            <a class="btn green-dark" href="{{route('report.bank.wise.transaction', $data->bank_id)}}"><i class="fa fa-eye"></i> View Transactions</a>
                                        </td>
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
