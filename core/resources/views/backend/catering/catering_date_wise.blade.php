@extends('backend.master')
@section('site-title')
    Catering System
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
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold">Catering System
                <small> Office-managment </small>
                <a class="btn purple-medium pull-right" data-toggle="modal" href="{{route('add.food.comapny')}}">
                    Send Meal To Company
                    <i class="fa fa-plus"></i> </a>
            </h3>
            <!-- END PAGE TITLE-->
                        <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box grey-gallery">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>Catering Service History</div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> Serial </th>
                                    <th>Date</th>
                                    <th>Detail </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($service as $key => $data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->date}}</td>
                                        <td><a class="btn grey-gallery col-md-12" href="{{route('show.detail.catring', $data->date)}}">Detail</a> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">{{$service->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
