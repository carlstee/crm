@extends('backend.master')
@section('site-title')
    Note List
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

                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-trophy"></i>Notes List
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body">


                            <table class="table table-striped table-bordered table-hover" id="awards">
                                <thead>
                                <tr>
                                    <th> Note Title </th>
                                    <th> Detail </th>
                                    <th> Date </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $note as $key=>$data)
                                <tr>
                                    <td>{{$data->note_name}}</td>
                                    <td class="col-md-6">{!! $data->note_detail !!}</td>
                                    <td>{{date('Y, M-j', strtotime($data->created_at))}}</td>
                                    <td>
                                        <a class="btn green" href="{{route('note.edit', $data->id)}}">Edit</a>
                                        <a class="btn red" data-toggle="modal"  href="#deleteModal{{$data->id}}">Delete</a>
                                    </td>
                                </tr>
                                <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Sure Delete</h4>
                                            </div>
                                            <div class="modal-body" id="info">
                                                <p>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <a href="{{route('note.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$note->links()}}
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