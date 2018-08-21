@extends('layouts.app')
@section('content')
    <br>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Award Box</span>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <div class="portlet-body">


                        <table class="table table-striped table-bordered table-hover" id="awards">
                            <thead>
                            <tr>
                                <th> EmployeeID </th>
                                <th> Employee Name </th>
                                <th> Awardee Name </th>
                                <th> Gift </th>
                                <th> Price </th>
                                <th> For the Month </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $award as $key=>$awards)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$awards->employee_name}}</td>
                                    <td>{{$awards->award_name}}</td>
                                    <td>{{$awards->gift}}</td>
                                    <td>{{$awards->price}}</td>
                                    <td>{{$awards->month}}( {{$awards->year}} )</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
@endsection



