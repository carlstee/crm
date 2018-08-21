@extends('backend.master')
@section('site-title')
    Paid Payment
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
            <h3 class="page-title">Paid Payment
                <small> </small>
            </h3>
            <br>
            <br>
            <div class="portlet box purple">
                <div class="portlet-title col-md-12">
                    <div class="caption col-md-4">
                        <i class="fa fa-th"></i>Individual Paid Payment</div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover" id="order_table">
                            <thead>
                            <tr>
                                <th scope="col"> Employee ID </th>
                                <th scope="col"> Employee Name </th>
                                <th scope="col"> Total Attend Days</th>
                                <th scope="col"> Payment </th>
                                <th scope="col"> Date </th>
                                <th scope="col"> Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $employee = \App\Employee::where('employee_id',$employee_select)->first() @endphp
                                <tr>
                                    <td>{{$employee->employee_id}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$total_attendense}}</td>
                                    <td>{{$total_salary}}</td>
                                    <td>{{date('jS M Y',strtotime($form_date))}}-{{date('jS M Y',strtotime($to_date))}}</td>
                                    <td>
                                        @if($status_paid)
                                            <span class="label label-sm label-success">Paid</span>
                                            @elseif($status_pending)
                                            <span class="label label-sm label-success">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
