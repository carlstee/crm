

@extends('backend.master')
@section('site-title')
    Department List
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
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">View/Edit Department
                <small> Department-Edit </small>
            </h3>
            <!-- END PAGE TITLE-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Department Update
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">

                                <!-- BEGIN FORM-->
                                <form method="POST" action="{{route('department.update', $dep->id)}}" class="form-horizontal">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    <div class="form-body">
                                        <p style="color: black">
                                            Department
                                        </p>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input class="form-control form-control-inline " name="name" type="text" value="{{$dep->name}}" placeholder="Department Name"/>
                                            </div>
                                        </div>
                                        <hr>
                                        {{--dugignation--}}
                                        <div class="form-group">
                                            <label class="col-md-2"  style="color: black"> Designation : </label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px" >
                                                        <div class="row">
                                                            <div class="col-md-12" id="planDescriptionContainer">
                                                                @php
                                                                    $designations = \App\Designation::where('dept_id', $dep->id)->get();
                                                                @endphp
                                                                @foreach($designations as $deg )
                                                                    <div class="input-group">
                                                                        <input type="hidden" name="deg_id[]" value="{{$deg->id}}">
                                                                        <input name="deg_name[]" id="designaion_id" data_value="{{$deg->id }}" class="form-control margin-top-10" type="text" value="{{$deg->deg_name }}" placeholder="Designation Name">
                                                                        <span class="input-group-btn">
                                                                 <button id="" class="btn btn-danger margin-top-10 delete_desc" type="button"><i class='fa fa-times'></i></button></span>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 text-right margin-top-10">
                                                                <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Designation</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn blue col-md-12"><i class="fa fa-check"></i>Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>

                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </div>

        </div>
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
                $.ajax({
                    type:'GET',
                    url:'{{route('dep-delete')}}',
                    data:{
                        desing_id:a
                    },
                    success:function(data){
                        console.log(data);
                        location.reload();
                    }
                });
            });
        });


        function appendPlanDescField(container) {
            max++;
            container.append(
                '<div class="input-group">' +
                '<input type="hidden" name="deg_id[]">' +
                '<input name="deg_name[]" class="form-control margin-top-10" type="text" required placeholder="Designation">\n' +
                '<span class="input-group-btn">'+
                '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>'
            );
        }
    </script>
@endsection

