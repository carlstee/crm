@extends('backend.master')
@section('site-title')
    Supplier Management
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
            <h3 class="page-title bold">Supplier Management
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add New Supplier
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
                        <div class="row">
                            <div class="col-md-12">

                                <div class="portlet box blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-briefcase"></i>Supplier List
                                        </div>
                                        <div class="tools">
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Supplier Name
                                                </th>
                                                <th>
                                                    Supplier Mobile
                                                </th>
                                                <th>
                                                    Supplier Email
                                                </th>
                                                <th>
                                                    Supplier Address
                                                </th>
                                                <th>
                                                    Product Item
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($supply as $key=> $data)
                                            <tr id="row1">
                                                <td>{{$key+1}}</td>
                                                <td> {{$data->supplier_name}}</td>
                                                <td> {{$data->supplier_mobile}}</td>
                                                <td> {{$data->supplier_email}}</td>
                                                <td> {{$data->supplier_address}}</td>
                                                <td>
                                                <a type="button" class="btn btn-info" data-toggle="modal" href="#viewtable{{$data->id}}" >View Item</a>
                                                <div id="viewtable{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">View Detail Item</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="portlet-body">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                        <th>Serial Id</th>
                                                                        <th>Item</th>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($data->item as $key=> $value)
                                                                            <tr type = "circle">
                                                                                <td>{{$key+1}}</td>
                                                                                <td>{{$value->item}}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </td>
                                                <td>
                                                    <a class="btn blue-chambray"  data-toggle="modal" href="{{route('supplier.edit',$data->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
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
                                                            <a type="submit" href="{{route('supplier.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a>
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
                            <h4 class="modal-title">Add New Supplier</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{route('store.supplier')}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Supplier Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Supplier Name" required name="supplier_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Supplier Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Supplier Mobile Number" required name="supplier_mobile">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Supplier Email</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Supplier Email" required name="supplier_email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Supplier Address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Supplier Address" required name="supplier_address">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="inputEmail1" class="col-md-4 control-label">Supplier Product Item:</label>
                                    <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px" >
                                            <div class="col-md-12" id="planDescriptionContainer">
                                                <div class="input-group">
                                                    <input name="item[]" class="form-control margin-top-10" type="text" required placeholder="Item Name">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class='fa fa-times'></i></button></span>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right margin-top-10">
                                                <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Food Item</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var max = 1;
        $(document).ready(function () {
            $("#btnAddDescription").on('click', function () {
                appendPlanDescField($("#planDescriptionContainer"));
            });

            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').remove();
            });
        });

        function appendPlanDescField(container) {
            max++;
            container.append(
                '<div class="input-group">' +
                '<input name="item[]'+max+'" value="" class="form-control margin-top-10" type="text" required placeholder="Item Name">\n' +
                '<span class="input-group-btn">'+
                '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>'
            );
        }
    </script>
@endsection