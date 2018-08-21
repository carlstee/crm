@extends('backend.master')
@section('site-title')
    Knowledge Base List
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
                                <i class="fa fa-trophy"></i>Knowledge Base List
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="awards">
                                <thead>
                                <tr>
                                    <th> Blog Category </th>
                                    <th> Blog Title </th>
                                    <th> Blog Detail </th>
                                    <th> Raised Time </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $knoledge as $key=>$data)
                                <tr>
                                    <td>{{$data->know_category->name}}</td>
                                    <td><b>{{$data->title}}</b></td>
                                    <td class="col-md-5" >{!! $data->detail !!}</td>
                                    <td>{{date('l jS \of F Y h:i:s A', strtotime($data->created_at))}}</td>
                                    <td>
                                        <a class="btn green" href="{{route('knowledge.edit', $data->id)}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn red" data-toggle="modal"  href="#deleteModal{{$data->id}}"><i class="fa fa-trash-o"></i></a>
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
                                                <a href="{{route('knowledge.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$knoledge->links()}}
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