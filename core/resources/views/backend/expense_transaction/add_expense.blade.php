@extends('backend.master')
@section('site-title')
   Add Expense Transaction
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
            @if(Session::has('delmsg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('delmsg')}}","", "warning");
                    });

                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Expense Transaction
                <small> Office-managment </small>
            </h3>
            <hr>
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
                    <div class="portlet box green-dark">
                        <div class="portlet-title text-center">
                            <div class="caption ">
                                Add Expense
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('store.expense.transaction')}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Select Bank:</label>

                                        <div class="col-md-8">
                                            <select class="form-control" name="bank_id" required>
                                                @foreach($bank as $data)
                                                    <option value="{{$data->id}}">{{$data->bank_name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Amount: <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="amount" placeholder="Amount" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Purpose Note:</label>

                                        <div class="col-md-8">
                                            <textarea class="form-control" name="note" rows="8"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="demo-loading-btn btn green-dark col-md-12"><i class="fa fa-check"></i> Submit</button>
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
