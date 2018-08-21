@extends('backend.master')
@section('site-title')
    Edit Loan
@endsection
@section('style')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

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
            <!-- BEGIN PAGE CONTENT-->
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

                    <div class="portlet box yellow-gold">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Edit Loan
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body form">

                            <form method="POST" action="{{route('update.office.loan',$office_loan->id )}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Employee Name: <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <select class="form-control selectpicker" data-live-search="true" name="employee_id" >
                                                <option value="{{$office_loan->employee->id}}">{{$office_loan->employee->name}}</option>
                                                @foreach($employee as $data)
                                                    <option value="{{$data->id }}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Amount: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" required name="amount" value="{{$office_loan->amount}}" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Date: </label>
                                        <div class="col-md-6">
                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="date" value="{{$office_loan->date}}" readonly >
                                                <span class="input-group-btn">
                                 <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                 </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Detail: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="detail" rows="6">{!! $office_loan->detail !!}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn yellow-gold col-md-12"><i class="fa fa-check"></i>Update Loan</button>
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
</div>
@endsection