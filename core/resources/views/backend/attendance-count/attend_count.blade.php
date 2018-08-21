@extends('backend.master')
@section('site-title')
    Attendance Counter
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{route('admin.dashboard')}}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Accounts</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                        <i class="icon-calendar"></i>&nbsp;
                        <span class="thin uppercase hidden-xs"></span>&nbsp;
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">Attandance Management
                <small> </small>
            </h3>
            <!-- END PAGE TITLE-->



            <div class="portlet box purple">
                <div class="portlet-title col-md-12">
                    <div class="caption col-md-2">
                        <i class="fa fa-cogs"></i>Attendance Count</div>
                    <div class="tools">
                        <input style="color: blue" class="input-small date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years" type="text" name="strat_date" id="start_date">
                        <input style="color: blue"  class="input-small date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years" type="text" name="end_date" id="end_date">
                        <button class="button btn-success" id="search">Search</button>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col"> Employee ID </th>
                                <th scope="col"> Employee Name </th>
                                <th scope="col"> Department/Designation </th>
                                <th scope="col" style="width:450px !important"> Total Attend Days</th>
                                <th scope="col"> Absent days </th>
                                <th scope="col"> Holiday </th>
                                <th scope="col"> Counter </th>

                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td> dfdf </td>
                                    <td>  fddf</td>
                                    <td> fdfdf </td>
                                    <td>  dfdf</td>
                                    <td> fdfd </td>
                                    <td> dfdf </td>
                                    <td>  dfd</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection