@extends('backend.master')
@section('site-title')
    Project List
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
            <div class="row">
                <div class="col-md-12">

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-trophy"></i>Projects List
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body table-responsive">
                            <table class="table table-striped table-scrollable table-bordered table-hover" id="awards">
                                <thead>
                                <tr>
                                    <th> Project Name </th>
                                    <th> Project Budget </th>
                                    <th> Advance Money </th>
                                    <th> Due Money </th>
                                    <th> Start Date </th>
                                    <th> End Date </th>
                                    <th> Description </th>
                                    <th>Documents</th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $project as $key=>$data)
                                    <tr>
                                        <td>{{$data->project_name}}</td>
                                        <td>{{$data->budget}} {{$general->currency}}</td>
                                        <td>{{$data->advance}}  {{$general->currency}}</td>
                                        <td>{{$data->due}}  {{$general->currency}}</td>
                                        <td>{{date('Y, M-j', strtotime($data->start_date))}}</td>
                                        <td>{{date('Y, M-j', strtotime($data->end_date))}}</td>
                                        <td class="col-md-4">{!! $data->description !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info" data-toggle="modal" href="#viewtable{{$data->id}}" >View Documents</a>
                                            <div id="viewtable{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">View Documents</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="portlet-body">
                                                                <table class="table table-striped table-scrollable table-bordered table-hover">
                                                                    <thead>
                                                                    <th>Number</th>
                                                                    <th>Click To View</th>
                                                                    </thead>
                                                                    @foreach($data->project_file as $key=>$name)

                                                                        <tr>
                                                                            <td class="text-center">{{$key+1}}</td>
                                                                            <td>
                                                                                <a href="{{asset('assets/project/'.$name->file)}}" target="_blank" class="btn dark btn-block">View</a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn blue-ebonyclay" href="{{route('project.edit', $data->id)}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title" style="color: red">Are You Sure?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <a href="{{route('project.delete', $data->id)}}" class="btn red"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$project->links()}}
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