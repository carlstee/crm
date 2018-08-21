@extends('backend.master')
@section('site-title')
    Transaction Purpose
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
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
            <h3 class="page-title bold">Transaction Management
                <small> </small>
            </h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab"> Income Source</a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab"> Expense Source</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab_1_1">
                                <form action="{{route('income.post')}}" method="post" id="form_sample_1" class="form-horizontal">
                                    {{csrf_field()}}

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Date
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                    <input type="text" class="form-control" readonly name="date" required>
                                                    <span class="input-group-btn">
                                                     <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                     </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Income Source
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                            <select name="income_id" class="form-control">
                                                @foreach($income as $in)
                                                    <option value="{{$in->id}}">{{$in->income}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Amount
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" name="amount" data-required="1" class="form-control" required/> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Note (Not Required)
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="note"  class="form-control" /> </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn green-seagreen">Submit</button>
                                                <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                            <div class="tab-pane fade" id="tab_1_2">
                                <!-- BEGIN FORM-->
                                <form action="{{route('expense.post')}}" method="post" id="form_sample_1" class="form-horizontal">
                                    {{csrf_field()}}

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Date
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                    <input type="text" class="form-control" readonly name="date" required>
                                                    <span class="input-group-btn">
                                                     <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                     </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Expense Source
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                            <select name="expense_id" class="form-control">
                                                @foreach($expense as $out)
                                                    <option value="{{$out->id}}">{{$out->expense}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Amount
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" name="amount" data-required="1" class="form-control" required/> </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Note (Not Required)
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="note" data-required="1" class="form-control" /> </div>
                                        </div>

                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn green-seagreen">Submit</button>
                                                <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection