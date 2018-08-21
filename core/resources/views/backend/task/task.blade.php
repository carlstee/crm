@extends('backend.master')
@section('site-title')
    Task List
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
                <a href="{{route('task.add')}}" class="btn red-pink pull-right">
                    Add Task <i class="fa fa-plus"></i>
                </a>
            </h3>
            <hr>
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">

                    <div class="portlet box red-pink">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Task Mangement Table</div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col"> Employee Email </th>
                                        <th scope="col"> Employee Name </th>
                                        <th scope="col"> Task </th>
                                        <th scope="col" style="width:450px !important"> Description </th>
                                        <th scope="col"> Deal Time </th>
                                        <th scope="col"> Death Time </th>
                                        <th scope="col"> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($task as $data)
                                    <tr>
                                        <td> {{$data->employee_Id }} </td>
                                        <td> {{$data->employee_name }} </td>
                                        <td> {{$data->task_name }} </td>
                                        <td> {!!  $data->description !!} </td>
                                        <td> {{ date('jS F, Y',strtotime($data->start_date ))  }} </td>
                                        <td> {{ date('jS F, Y',strtotime($data->end_date ))  }} </td>
                                        <td>
                                            <a href="{{route('task.delete', $data->id)}}" class="btn btn-block red">Delete</a>
                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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