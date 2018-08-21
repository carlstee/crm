@extends('backend.master')
@section('site-title')
    Notice
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
            <h3 class="page-title bold">Notice Management
                <a class="btn grey-salt pull-right" data-toggle="modal" href="{{route('notice.add')}}">
                    Add New Notice
                    <i class="fa fa-plus"></i> </a>
            </h3>
            <!-- END PAGE TITLE-->

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div id="load">


                    </div>
                    <div class="portlet box grey-salt">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-clipboard"></i>Notice List
                            </div>
                        </div>

                        <div class="portlet-body">


                            <table class="table table-striped table-bordered table-hover" id="notices">
                                <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Title </th>
                                    <th> Description </th>
                                    <th> Created on </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notice as $key=>$not)
                                <tr >
                                    <td>{{$key+1}}</td>
                                    <td>{{$not->title}}</td>
                                    <td>{!! $not->description !!}</td>
                                    <td>{{$not->created_at}}</td>
                                    <td>
                                        <a class="btn grey-salt" href="{{route('notice.edit',$not->id)}}">Edit</a>
                                        <a class="btn red" href="{{route('notice.delete', $not->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->

                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection