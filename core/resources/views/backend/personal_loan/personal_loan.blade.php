@extends('backend.master')
@section('site-title')
    Add Personal Loan
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <div id="load">

                    </div>
                    <div class="portlet box yellow-gold">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Add Personal Loan
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body form">

                            <!------------------------ BEGIN FORM---------------------->
                            <form method="POST" action="{{route('personal.loan.store')}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Person Name: <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" required placeholder="Person Name" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Phone: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" required name="phone" placeholder="Contact Number"  >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" required name="email" placeholder="Email"  >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Amount: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" required name="amount" placeholder="Amount"  >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Date: </label>
                                        <div class="col-md-6">
                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="date"  readonly >
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
                                            <textarea class="form-control" name="detail" rows="6"></textarea>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn yellow-gold col-md-12"><i class="fa fa-check"></i>Add Loan</button>
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
            <!-- END PAGE CONTENT-->
    </div>
@endsection