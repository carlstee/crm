@extends('backend.master')
@section('site-title')
    Department List
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
            <h3 class="page-title bold">Add New Notice
                <small> </small>
            </h3>
            <!-- END PAGE TITLE-->
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


            <div class="portlet box grey-salt">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i>New Notice
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body form">

                    <!-- BEGIN FORM-->
                    <form method="POST" action="{{route('notice.post')}}" class="form-horizontal form-bordered"><input name="_token" type="hidden" value="dMv6hWKD4FNHVKwltiqOY9L481faTvpsrop3FFEm">

                        {{csrf_field()}}
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-1 control-label">Title: <span class="required">
                                        * </span>
                                </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">Description: <span class="required">* </span>
                                </label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="description" ></textarea>

                                </div>
                            </div>


                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn grey-salt col-md-12">
                                            <i class="fa fa-plus"></i>	Submit </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->

                </div>
            </div>
        </div>
    </div>
@endsection