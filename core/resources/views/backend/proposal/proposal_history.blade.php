@extends('backend.master')
@section('site-title')
    Proposal List
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
                    <div class="portlet box blue-dark">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-envelope-o"></i>Send Proposal History
                            </div>
                        </div>
                        <div class="portlet-body table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="awards">
                                <thead>
                                <tr>
                                    <th> Send To </th>
                                    <th> Detail </th>
                                    <th> Document </th>
                                    <th> Send Time </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($proposal as $key=>$data)
                                <tr>
                                    <td>{{$data->customer->full_name}}</td>
                                    <td class="col-md-8">{!! $data->detail !!}</td>
                                    <td>
                                        <a href="{{asset('assets/proposal/'.$data->document)}}" target="_blank" class="btn dark">View</a>
                                    </td>
                                    <td>{{date('g:ia \o\n l jS F Y',strtotime($data->created_at))}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$proposal->links()}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection