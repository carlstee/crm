

@extends('backend.master')
@section('site-title')
   Customer Edit
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">View/Edit
                <small> Customer-Edit </small>
            </h3>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                        <form action="{{route('customer.update', $customer->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-body">

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Customer Name</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{$customer->full_name}}" required name="full_name">
                                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Customer Phone</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" value="{{$customer->phone}}" required name="phone">
                                                    <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Customer Email</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="email" class="form-control" value="{{$customer->email}}" required name="email">
                                                    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Customer Address</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{$customer->address}}" required name="address">
                                                    <span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Suggestions or topics you would like to be included:</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{$customer->include_word}}" required name="include_word">
                                                    <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group clearfix">
                                            <div class="col-md-12">
                                                <button class="btn btn-info col-md-12" type="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                    Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

