@extends('backend.master')
@section('site-title')
    Knowledge Based
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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
                <h3 class="page-title bold">Knowledge Based
                    <a href="#shift" data-toggle="modal" class="btn bg-dark bg-font-dark pull-right">
                        Knowledge Based Category  <i class="fa fa-plus"></i>
                    </a>
                    <hr>
                </h3>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Add New Knowledge Based
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body form">

                            <!------------------------ BEGIN FORM---------------------->
                            <form method="POST" action="{{route('knowledge.store')}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group">
                                        <strong class="col-md-12">Select Category: <span class="required">
                                        * </span>
                                        </strong>
                                        <div class="col-md-12">
                                           <select class="form-control" name="category_id">
                                               @foreach($category as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <strong class="col-md-12">Title Name: <span class="required">
                                        * </span>
                                        </strong>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" required name="title" placeholder="Title Name" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <strong class="col-md-12">Detail: </strong>

                                        <div class="col-md-12">
                                            <textarea class="form-control" name="detail" rows="10"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="demo-loading-btn btn green col-md-12"><i class="fa fa-check"></i> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        <div id="shift" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Category For Knowledge Based</h4>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="{{route('knowledge.category.store')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong class="col-md-12">Category Name</strong>
                                <div class="col-md-12">
                                    <input class="form-control" placeholder="Category Name" type="text" required name="name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet box">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <th>Category Name</th>
                                            <th>Delete</th>
                                            </thead>
                                            <tbody>
                                            @foreach($category as $data)
                                                <tr>
                                                    <td>{{$data->name}}</td>
                                                    <td><a class="btn red" href="{{route('knowledge.delete.category', $data->id)}}">Delete</a></td>
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
            <!-- END PAGE CONTENT-->
    </div>
@endsection