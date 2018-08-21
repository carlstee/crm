@extends('backend.master')
@section('site-title')
    Stock
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
            <h3 class="page-title bold">Stock Product List
                <small> Office-managment </small>
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add Product To Stock  <i class="fa fa-plus"></i>
                </a>

                <a class="btn blue-ebonyclay" data-toggle="modal" href="#warehouse">
                    Create Warehouse
                    <i class="fa fa-plus"></i>
                </a>
            </h3>
            <hr>
            <!-- END PAGE TITLE-->
                        <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-6">

                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Product Stock In Warehouse
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> Serial </th>
                                    <th> Warehouse Name </th>
                                    <th>Location</th>
                                    <th style="text-align: center"> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stock_product as $key => $data)
                                    <tr id="table_tr_{{$data->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->warehouse->name}}</td>
                                        <td><b>{{$data->warehouse->location}}</b></td>

                                        <td>
                                            <a class="btn blue-chambray" href="{{route('product.detail.warehouse', $data->warehouse->id)}}"><i class="fa fa-eye"></i>View Product</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>

                <div class="col-md-6">

                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Warehouse List
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> Serial </th>
                                    <th> Warehouse Name </th>
                                    <th style="text-align: center"> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($warehouse as $key => $data)
                                    <tr id="table_tr_{{$data->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>
                                            <a class="btn blue-chambray" data-toggle="modal" href="#editWarehouse{{$data->id}}"><i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
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
                                                    <a type="submit" href="{{route('warehouse.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="editWarehouse{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title">Edit Warehouse</h2>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('warehouse.update', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                       <div class="row">
                                                           <div class="form-group">
                                                               <div class="col-md-12">
                                                                   <div class="col-md-12">
                                                                       <label class="control-label">Warehouse Name </label>
                                                                       <input class="form-control text-capitalize" placeholder="Name" type="text" value="{{$data->name}}" required name="name">
                                                                   </div>
                                                               </div>
                                                           </div>

                                                           <div class="form-group">
                                                               <div class="col-md-12">
                                                                   <div class="col-md-12">
                                                                       <label class="control-label">Warehouse Location </label>
                                                                       <input class="form-control text-capitalize" placeholder="Location" type="text" value="{{$data->location}}"  required name="location">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn green-dark"> Update</button>
                                                        </div>
                                            </form>
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
                        <form class="form-horizontal" role="form" method="post" action="{{route('product.stock.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Select Warehouse</label>
                                            <select class="form-control" name="warehouse_id">
                                                @foreach($warehouse as $a)
                                                    <option value="{{$a->id}}" >{{$a->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Select Product</label>
                                            <select class="form-control" name="product_id">
                                                @foreach($product as $a)
                                                    <option value="{{$a->id}}" >{{$a->product_name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Quantity </label>
                                        <input class="form-control text-capitalize" placeholder="Quantity" type="number" required name="quantity">
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-chambray"><i class="fa fa-floppy-o"></i> Store To Stock</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="warehouse" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Create Warehouse</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{route('warehouse.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Warehouse Name </label>
                                        <input class="form-control text-capitalize" placeholder="Name" type="text" required name="name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Warehouse Location </label>
                                        <input class="form-control text-capitalize" placeholder="Location" type="text" required name="location">
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-chambray"><i class="fa fa-floppy-o"></i>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection