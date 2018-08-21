@extends('backend.master')
@section('site-title')
    Edit Knowledge
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
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">

                    <div class="portlet box blue-madison">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Edit Knowledge
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body form">

                            <!------------------------ BEGIN FORM---------------------->
                            <form method="POST" action="{{route('knowledge.update', $knowledge->id)}}" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Select Category:
                                        </label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="category_id">
                                                    <option value="{{$knowledge->category_id}}">{{$knowledge->know_category->name}}</option>
                                                @foreach($category as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Title Name:
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" required name="title" value="{{$knowledge->title}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Detail:
                                        </label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="detail" rows="10">{!! $knowledge->detail !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="demo-loading-btn btn blue-madison col-md-12"><i class="fa fa-check"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection