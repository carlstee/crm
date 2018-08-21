@extends('backend.master')
@section('site-title')
    Purchase
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
        @endif <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Purchase Reports</h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-money"></i>Purchase Reports
                            </div>

                        </div>

                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="awards">
                                <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Total </th>
                                    <th> Detail </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchase as $key=>$data)
                                <tr>

                                    <td>{{$data->date}}</td>
                                    <td>
                                        {{$data->amount}} {{$general->currency}}
                                    </td>
                                    <td>
                                        {!! $data->detail !!}
                                    </td>

                                    <td>
                                        <a class="btn blue-ebonyclay" href="{{route('purchase.edit', $data->id)}}">Detail/Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$purchase->links()}}
                                </div>
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