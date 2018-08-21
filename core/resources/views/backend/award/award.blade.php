@extends('backend.master')
@section('site-title')
    Award List
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
            <h3 class="page-title bold">Award Management
                <a class="btn yellow-gold pull-right" data-toggle="modal" href="{{route('award.create')}}">
                    Add New Award
                    <i class="fa fa-plus"></i> </a>
            </h3>

            <hr>
            <div class="row">
                <div class="col-md-12">

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <div class="portlet box yellow-gold">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-trophy"></i>Awards List
                            </div>
                            <div class="tools">
                            </div>
                        </div>

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


                                    <th> Action </th>
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

                                    <td>
                                        <a class="btn yellow-gold" href="{{route('award.edit', $awards->id)}}">Edit/View</a>
                                        <a class="btn red" href="{{route('award.delete', $awards->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$award->links()}}
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->

                </div>
            </div>
            <!-- END PAGE CONTENT-->

            <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body" id="info">
                            <p>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                            <button type="button" data-dismiss="modal" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>








        </div>
    </div>
@endsection