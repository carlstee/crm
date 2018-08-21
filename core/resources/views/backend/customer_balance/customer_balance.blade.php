@extends('backend.master')
@section('site-title')
    Customer Balance
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
            <h3 class="page-title bold">Customer Balance
                <small> Customer-managment </small>

                <a class="btn grey-cascade pull-right" data-toggle="modal" href="#basic">
                    Add Balance To Customer
                    <i class="fa fa-plus"></i>
                </a>
            </h3>
            <hr>
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
            <!-- END PAGE TITLE-->
                        <!-- BEGIN PAGE CONTENT-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet box grey-cascade">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-briefcase"></i>Customer Balance Chart
                                        </div>
                                        <div class="tools">
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Full Name
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Amount
                                                </th>

                                                <th>
                                                    Note
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($balance as $key=> $data)
                                            <tr id="row1">
                                                <td>{{$key+1}}</td>
                                                <td> {{$data->customer->full_name}}</td>
                                                <td> {{$data->customer->email}}</td>
                                                <td> {{$data->amount}} {{$general->currency}} </td>
                                                <td> {{$data->note}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        </div>
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
                            <h4 class="modal-title">Add Balance To Customer</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{route('customer.balance.store')}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Full Name</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="customer_id">
                                        @foreach($customer as $cus)
                                            <option value="{{$cus->id}}" >{{$cus->full_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Put Amount</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" placeholder="Amount" required name="amount">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Note:</label>
                                <div class="col-md-12">
                                    <div class="col-md-12 ">
                                        <input type="text" class="form-control" placeholder="Your Text (Not Required)" name="note">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn grey-cascade"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
