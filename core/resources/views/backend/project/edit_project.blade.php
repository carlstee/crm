@extends('backend.master')
@section('site-title')
    Project Edit
@endsection

@section('style')
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>
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
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <div id="load">

                    </div>
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Edit Project
                            </div>
                        </div>

                        <div class="portlet-body">

                            <form method="POST" action="{{route('project.update', $project->id)}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <strong class="col-md-12">Project Name:</strong>
                                            <input type="text" class="form-control" name="project_name" value="{{$project->project_name}}" >
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <strong class="col-md-12">Upload Project Documents:</strong>
                                        <div class="col-md-12">
                                            <div class="description" style="width: 100%;padding: 10px 0px;border-radius: 5px" >

                                                <div class="col-md-12" id="planDescriptionContainer">
                                                    @foreach($project->project_file as $data)
                                                    <div class="input-group row">
                                                        <input id="designaion_id" name="file[]" data_value="{{$data->id }}" class="form-control margin-top-10" type="file" required>
                                                        <span class="input-group-btn">
                                                            <button id="" class="btn btn-danger margin-top-10 delete_desc" type="button"><i class='fa fa-times'></i></button>
                                                        </span>
                                                    </div>
                                                        <a href="{{asset('assets/project/'. $data->file)}}" target="_blank"  class="btn btn-info">View Document</a>
                                                    @endforeach
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 text-right margin-top-10">
                                                        <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Document</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <strong class="col-md-12">Start Date:</strong>
                                            <input class=" date date-picker form-control"  data-date-format="yyyy-mm-dd" value="{{$project->start_date}}"  data-date-viewmode="years" type="text" name="start_date" id="start_date">
                                        </div>

                                        <div class="col-md-6">
                                            <strong class="col-md-12">End Date:</strong>
                                            <input class=" date date-picker form-control"  data-date-format="yyyy-mm-dd" value="{{$project->end_date}}"  data-date-viewmode="years" type="text" name="end_date" id="end_date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <strong class="col-md-12">Total Budget:</strong>
                                            <input class="form-control"  type="number" value="{{$project->budget}}"  name="budget">
                                        </div>

                                        <div class="col-md-4">
                                            <strong class="col-md-12">Advance Money:</strong>
                                            <input class=" form-control" type="number" value="{{$project->advance}}"  name="advance">
                                        </div>

                                        <div class="col-md-4">
                                            <strong class="col-md-12">Due Money:</strong>
                                            <input class="form-control" type="number" value="{{$project->due}}"  name="due" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <strong class="col-md-12  ">Project Summary:</strong>
                                        <div class="col-md-12">
                                            <textarea rows="7" name="description" class="form-control">{!! $project->description !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="demo-loading-btn btn blue col-md-12"><i class="fa fa-check"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
@endsection
@section('script')
    <script>
        var max = 1;
        $(document).ready(function () {
            $("#btnAddDescription").on('click', function () {
                appendPlanDescField($("#planDescriptionContainer"));
            });

            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').remove();
                var dep = $(this).closest('.input-group');
                var a = dep.find('#designaion_id').attr('data_value');
//                console.log(a);
                $.ajax({
                    type:'GET',
                    url:'{{route('project.document.delete')}}',
                    data:{
                        desing_id:a
                    },
                    success:function(data){
//                        console.log(data);
                        location.reload();
                    }
                });
            });
        });

        function appendPlanDescField(container) {
            max++;
            container.append(
                '<div class="input-group row">' +
                '<input name="file[]" class="form-control margin-top-10" type="file" required >' +
                '<span class="input-group-btn">'+
                '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>'

            );
        }
    </script>
@endsection