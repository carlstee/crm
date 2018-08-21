@extends('backend.master')
@section('site-title')
    Catering Office
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
            <h3 class="page-title bold">Due List
                <small> Office-managment </small>
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
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <hr>
                    <div class="portlet box red-mint">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Due List
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Serial ID</th>
                                    <th>Deal Date</th>
                                    <th>Company Name</th>
                                    <th>Food Package</th>
                                    <th>Total Amount</th>
                                    <th>Given Amount</th>
                                    <th>Due Amount</th>
                                    <th>Action</th>
                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cate as $key=> $data)
                                    <tr id="row1">
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->date}}</td>
                                        <td>{{$data->company->office_name}}</td>
                                        <td>{{$data->package->package_name}}</td>
                                        <td>{{$total = $data->package->package_price * $data->quantity}} {{$general->currency}} </td>
                                        <td>{{$data->due_amount }} {{$general->currency}} </td>
                                        <td>{{$total - $data->due_amount }} {{$general->currency}} </td>
                                        <td>
                                            <a class="btn red" href="{{route('catering.paid', $data->id)}}">Paid</a>
                                        </td>
                                        <td>
                                            <a class="btn green-dark" href="{{route('print.invoice', $data->id)}}">
                                                <i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">{{$cate->links()}}</div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
                        <!-- END PAGE CONTENT-->



        </div>
    </div>
@endsection
@section('script')

@endsection