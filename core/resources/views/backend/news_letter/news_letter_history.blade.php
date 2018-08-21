@extends('backend.master')
@section('site-title')
    Newsletter List
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
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-trophy"></i>Newsletter List
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="awards">
                                <thead>
                                <tr>
                                    <th> Mail Datetime </th>
                                    <th> Mail Subject </th>
                                    <th> Content </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $key=>$data)
                                <tr>
                                    <td>{{date('g:ia \o\n l jS F Y',strtotime($data->created_at))}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{!! $data->detail !!}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$news->links()}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection