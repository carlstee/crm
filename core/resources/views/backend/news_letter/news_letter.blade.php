@extends('backend.master')
@section('site-title')
    News Letter
@endsection
@section('main-content')
    <div class="page-content-wrapper">

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
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue-madison">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-edit"></i>Send News Letter
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <form method="POST" action="{{route('letter.store')}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-12">Subject: <span class="required">
                                    * </span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" required name="title" placeholder="Subject" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Detail: </label>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="detail" rows="10"></textarea>
                                    </div>
                                </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="demo-loading-btn btn blue-madison col-md-12"><i class="fa fa-check"></i> Post</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection