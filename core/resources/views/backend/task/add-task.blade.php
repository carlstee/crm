

@extends('backend.master')
@section('site-title')
    Add Task
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
            <h3 class="page-title">Task Management
            </h3>
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
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" method="post" action="{{route('task.post')}}">
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Select Employee</label>
                                <div class="col-md-10">
                                    <select class="form-control" id="employee" name="employee_name">
                                        @foreach($employee as $data)
                                        <option value="{{$data->name}}">{{$data->name}}</option>
                                        @endforeach
                                            {{csrf_field()}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Employee ID</label>
                                <div class="col-md-10">

                                    <select class="form-control" id="employee_id" name="employee_Id">



                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Task Name</label>
                                <div class="col-md-10">
                                    <input class="form-control form-control-inline"  type="text" name="task_name" required placeholder="Task Name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Star Time</label>
                                <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" readonly name="start_date" required>
                                    </div>
                                    <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                                </div>
                                <br>
                                <label for="inputEmail1" class="col-md-2 control-label">Death Time</label>
                                <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" readonly name="end_date" required>
                                    </div>
                                    <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="description" rows="5" ></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn red-pink col-md-12">Post</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('change','#employee',function(){
                var id = $(this).val();
                //alert(id)
                $.ajax({
                    type:"POST",
                    url:"{{route('employee.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('#employee_id').html("");
                        //console.log(data);
                        $('#employee_id').append(data)
                    }
                });
            });
        });
    </script>
@endsection