@extends('backend.master')
@section('site-title')
    Edit Award
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

                    <div class="portlet box yellow-gold">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Edit Award
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body form">

                            <!------------------------ BEGIN FORM---------------------->
                            <form method="POST" action="{{route('award.update',$award->id)}}" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Award Name:
                                        * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="award_name" value="{{$award->award_name}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Gift Item:
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="gift" value="{{$award->gift}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Cash price: ( <span class="fa fa-usd"></span> )</label>

                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="price" value="{{$award->price}}" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Employee name:</label>

                                        <div class="col-md-8">
                                            <select class="form-control input-xlarge select2me" name="employee_name">
                                                <option value="name">{{$award->employee_name}}</option>
                                            </select>

                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Month:</label>

                                            <div class="col-md-3">
                                                <select class="form-control" name="month">
                                                    <option value="{{$award->month}}"> {{$award->month}}</option>
                                                    <option value="january"   >January</option>
                                                    <option value="february" >February</option>
                                                    <option value="march"    >March</option>
                                                    <option value="april"    >April</option>
                                                    <option value="may"      >May</option>
                                                    <option value="june"     >June</option>
                                                    <option value="july"     >July</option>
                                                    <option value="august"   >August</option>
                                                    <option value="september" >September</option>
                                                    <option value="october">October</option>
                                                    <option value="november" >November</option>
                                                    <option value="december" >December</option>
                                                </select>

                                            </div>

                                            <label class="col-md-2 control-label">Year:</label>

                                            <div class="col-md-3">
                                                <select class="form-control" name="year">
                                                    <option value="{{$award->year}}">{{$award->year}}</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="demo-loading-btn btn yellow-gold col-md-12"><i class="fa fa-check"></i> Update</button>

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