@extends('backend.master')
@section('site-title')
    Bank Transaction
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Bank Transaction
                <small> Office-managment </small>
                <a class="btn blue pull-right" data-toggle="modal" href="#basic">
                    Credit Money
                    <i class="fa fa-plus"></i>
                </a>
            </h3>
            <hr>
            <!-- END PAGE TITLE-->
                        <!-- BEGIN PAGE CONTENT-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-briefcase"></i>Balance List
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
                                                    Current Balance
                                                </th>

                                            </thead>
                                            <tbody>
                                            @foreach($deposit as $key=> $data)
                                            <tr id="row1">
                                                <td> {{$data->bank->bank_name}}</td>
                                                <td> {{$data->bank->account_number}}</td>
                                                <td> {{ \App\BankTransaction::where('bank_id', $data->bank_id)->sum('amount') }} {{$general->currency}}</td>
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
            <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Deposit Money</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{ route('save.bank.balance') }}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Select Bank</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="bank_id">
                                        @foreach($bank as $data)
                                            <option value="{{ $data->id }}">{{$data->bank_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Amount ({{$general->currency}})</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Amount" required name="amount">
                                    <span class="badge-success">Note: </span>It's will use for only Credit
                                </div>

                            </div>


                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue"><i class="fa fa-floppy-o"></i> Credit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
