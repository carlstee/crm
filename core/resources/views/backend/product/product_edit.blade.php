

@extends('backend.master')
@section('site-title')
    Product Edit
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">View/Edit
                <small> Product-Edit </small>
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
                        <form action="{{route('product.update', $product->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet-body" style="height: auto;">
                                        <form action="{{route('product.update', $product->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-body">
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Product ID</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="category_id">
                                                                    <option></option>
                                                                    @foreach($category as $a)
                                                                        <option value="{{$a->id}}" >{{$a->name}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Product ID</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="product_id" value="{{$product->product_id}}">
                                                                    <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Product Name</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
                                                                    <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Buying Price</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="buying_price" value="{{$product->buying_price}}">
                                                                    <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Selling Price</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="selling_price" value="{{$product->selling_price}}">
                                                                    <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Unit</label>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <select class="form-control" name="unit">
                                                                        <option value="{{$product->unit}}">{{$product->unit}}</option>
                                                                        <option value="Kilogram">Kilogram</option>
                                                                        <option value="Feet">Feet</option>
                                                                        <option value="Pieces">Pieces</option>
                                                                        <option value="Liter">Liter</option>
                                                                        <option value="Pound">Lb</option>
                                                                    </select>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
