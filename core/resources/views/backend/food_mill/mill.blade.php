@extends('backend.master')
@section('site-title')
    Food Mell Package
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
            <h3 class="page-title bold">Meal List
                <small> Office-managment </small>
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
                        <!-- BEGIN PAGE CONTENT-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <a class="btn dark" data-toggle="modal" href="#shift">
                                    Add New Meal Shift
                                    <i class="fa fa-plus"></i>
                                </a>

                                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                                    Add New Meal Package
                                    <i class="fa fa-plus"></i>
                                </a>
                                <hr>
                                <div class="portlet box blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-briefcase"></i>Office List
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
                                                    Package Name
                                                </th>
                                                <th>
                                                    Shift Name
                                                </th>
                                                <th>
                                                    Time
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Food Item
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($meal as $key=> $data)
                                            <tr id="row1">
                                                <td>{{$key+1}}</td>
                                                <td> {{$data->package_name}}</td>
                                                <td> {{$data->shift->shift_name}}</td>
                                                <td> {{$data->shift->time}}</td>
                                                <td> {{$data->package_price}} {{$general->currency}}</td>
                                                <td>
                                                    @foreach($data->food_item as $value)
                                                        <ul>
                                                            <li>{{$value->item}}</li>
                                                        </ul>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a class="btn blue-chambray"  data-toggle="modal" href="{{route('meal.package.update',$data->id)}}"><i class="fa fa-edit"></i> Edit</a>
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
                                                            <a type="submit" href="{{route('meal.package.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a>
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
                            <h4 class="modal-title">Add New Meal</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{route('meal.package.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Select Shift</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="shift_id">
                                        @foreach($shift as $data)
                                            <option value="{{$data->id}}">{{$data->shift_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Package Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Package Name" required name="package_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Package Price</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Package Price" required name="package_price">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
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

            <div id="shift" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New Shift</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{route('shift.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Shift Name</label>
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Example: Breakfast" type="text" required name="shift_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Without Seconds</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker timepicker-no-seconds" required name="time">
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button">
                                                <i class="fa fa-clock-o"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet box blue">
                                        <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <th>Shift Name</th>
                                            <th>Delete</th>
                                            </thead>
                                            <tbody>
                                            @foreach($shift as $data)
                                            <tr>
                                                <td>{{$data->shift_name}}</td>
                                                <td><a class="btn red" href="{{route('delete.shift', $data->id)}}">Delete</a></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn dark"><i class="fa fa-floppy-o"></i> Save</button>
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