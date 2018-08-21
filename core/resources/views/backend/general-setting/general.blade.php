@extends('backend.master')
@section('site-title')
    General Setting
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
            <h3 class="page-title bold">General Management
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

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box grey-mint">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Edit Settings
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body form">

                            <!------------------------ BEGIN FORM---------------------->
                            <form method="POST" action="{{route('general.update', $general->id)}}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Website Logo</label>
                                        <div class="col-md-6">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    <img src="{{asset('assets/images/logo/'. $general->image)}}">
                                                </div>
                                                       <span class="btn default btn-file">
                                                       <span class="fileinput-new">
                                                       Change image </span>
                                                       <span class="fileinput-exists">
                                                       Change </span>
                                                       <input type="file" name="image">
                                                       </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                        Remove </a>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                        <span class="label label-danger">
                                                        NOTE! </span> Image Size must be 117px x 30px

                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Website: <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="title" placeholder="Website Title" value="{{$general->title}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{$admin}}" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mobile: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="mobile" placeholder="Mobile" value="{{$general->mobile}}" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Name: <span class="required">  * </span></label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$general->name}}">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-md-2">Currency</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="currency" placeholder="Currency" value="{{$general->currency}}">
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" data-loading-text="Updating..." class="demo-loading-btn btn grey-mint col-md-12"><i class="fa fa-check"></i> Update</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection
