@extends('backend.master')
@section('site-title')
    Proposal
@endsection
@section('style')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
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
                            <i class="fa fa-edit"></i>Send New Proposal To Customer
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <form method="POST" action="{{route('send.proposal.customer')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-12">Select Customer:
                                    </label>
                                    <div class="col-md-12">

                                        <select class="form-control" name="customer_id" required>
                                            @foreach($customer as $data)
                                            <option value="{{$data->id}}">{{$data->full_name}} ({{$data->address}})</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Attachment : <span class="badge-success">ONLY PDF / DOC / DOCX / ZIP </span></label>
                                    <div class="col-md-12">
                                       <input type="file" class="form-control" required name="document">
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
                                            <button type="submit" class="demo-loading-btn btn blue-madison col-md-12"><i class="fa fa-check"></i> Send</button>
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