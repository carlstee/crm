@extends('backend.master')
@section('site-title')
    Employee List
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
            <h3 class="page-title bold">Employee Management
                <a href="{{route('employee.add')}}" class="btn bg-dark bg-font-dark pull-right">
                    Add New Employee <i class="fa fa-plus"></i>
                </a>
                <hr>
            </h3>
            <!-- END PAGE TITLE-->




            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">

                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-users"></i>Employees List
                            </div>

                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_employees">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        EmployeeID
                                    </th>
                                    <th class="text-center">
                                        Image
                                    </th>
                                    <th style="text-align: center">
                                        Name
                                    </th>
                                    <th class="text-center">
                                        Dept/Designation
                                    </th>
                                    <th class="text-center">
                                        At Work
                                    </th>
                                    <th class="text-center">
                                        Phone
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employee as $data)
                                <tr id="row">
                                    <td>
                                        {{$data->employee_id}}
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset('assets/images/employee/images/'.$data->image)}}" height="80px" alt="ProfileImage">
                                    </td>
                                    <td>
                                        {{$data->name}}
                                    </td>
                                    <td>
                                        @php $dep = \App\Department::where('id', $data->dept_id )->first() @endphp
                                        @php $deg = \App\Designation::where('id', $data->deg_id )->first() @endphp
                                        @php
                                            if ($dep == ''){

                                            }elseif($deg == ''){

                                            }else{
                                                $dep = \App\Department::where('id', $data->dept_id )->first();
                                                 $deg = \App\Designation::where('id', $data->deg_id )->first();
                                            }
                                        @endphp

                                        @if($dep == '')
                                            <p>Department: <strong>None</strong></p>
                                            <p>Designation: <strong>None</strong></p>
                                        @elseif($deg == '')
                                            <p>Department: <strong>None</strong></p>
                                            <p>Designation: <strong>None</strong></p>
                                        @else
                                            <p>Department: <strong>{{$dep->name}}</strong></p>
                                            <p>Designation: <strong>{{$deg->deg_name}}</strong></p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{$data->date}}
                                    </td>
                                    <td>
                                        {{$data->phone}}
                                    </td>

                                    <td class="">
                                        <p> <a class="btn bg-dark bg-font-dark" href="{{route('employee.edit', $data->id)}}"><i class="fa fa-edit"></i> View/Edit</a></p>
                                        <p> <a class="btn red" style="width: 105px;" href="{{route('employee.delete', $data->id)}}"><i class="fa fa-trash"></i> Delete</a></p>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">{{ $employee->links() }}</div>
                            </div>
                        </div>


                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

        </div>
    </div>
@endsection