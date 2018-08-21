@extends('backend.master')
@section('site-title')
    Edit Notice
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
                        <i class="fa fa-plus"></i>Edit Notice
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body form">

                    <!-- BEGIN FORM-->
                    <form method="POST" action="{{route('notice.update', $notice->id)}}" class="form-horizontal form-bordered">
                       {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-1 control-label">Title: <span class="required">
                                        * </span>
                                </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="title" value="{{$notice->title}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">Description: <span class="required">* </span>
                                </label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="description" >{{$notice-> description}}</textarea>

                                </div>
                            </div>


                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">

                                        <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn grey-salt col-md-12">
                                            <i class="fa fa-plus"></i>Update</button>

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