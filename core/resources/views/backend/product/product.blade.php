@extends('backend.master')
@section('site-title')
    Product
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
            <h3 class="page-title bold">Product List
                <small> Office-managment </small>
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add Product
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

                                <div class="portlet box blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-briefcase"></i>Product List
                                        </div>
                                        <div class="tools">
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th> Serial </th>
                                                <th> Product ID </th>
                                                <th>Product Name</th>
                                                <th>Product Category</th>
                                                <th>Product Unit</th>
                                                <th>Buying Price</th>
                                                <th>Selling Price</th>
                                                <th style="text-align: center"> Action </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product as $key => $data)
                                                <tr id="table_tr_{{$data->id}}">
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$data->product_id}}</td>
                                                    <td><b>{{$data->product_name}}</b></td>
                                                    <td>{{$data->category->name }}</td>
                                                    <td>{{$data->unit}}</td>
                                                    <td>{{$data->buying_price}} {{$general->currency}}</td>
                                                    <td>{{$data->selling_price}} {{$general->currency}}</td>
                                                    <td>
                                                        <a class="btn blue-chambray" href="{{route('product.edit', $data->id)}}"><i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a class="btn red" data-status="{{$data->id}}" data-toggle="modal" class="deleteModal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                                <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                <a type="submit" href="{{route('product.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                            <h4 class="modal-title">Add New Product</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{route('product.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Select Category</label>
                                            <select class="form-control" name="category_id">
                                                @foreach($category as $a)
                                                    <option value="{{$a->id}}" >{{$a->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Product Id</label>
                                        <input class="form-control text-capitalize" placeholder="Product Id" type="text" required name="product_id">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Product Name</label>
                                        <input class="form-control text-capitalize" placeholder="Product Name" type="text" required name="product_name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Buying Price </label>
                                        <input class="form-control text-capitalize" placeholder="Buying Price" type="number" required name="buying_price">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Selling Price </label>
                                        <input class="form-control text-capitalize" placeholder="Selling Price" type="number" required name="selling_price">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Unit</label>
                                        <select class="form-control" name="unit">
                                            <option value="Kg">Kg</option>
                                            <option value="Feet">Feet</option>
                                            <option value="Pieces">Pieces</option>
                                            <option value="Liter">Liter</option>
                                            <option value="Lb">Pound</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-chambray"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection