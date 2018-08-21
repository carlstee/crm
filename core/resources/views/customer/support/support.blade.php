@extends('customer.layout.auth')
@section('site-title')
    Get Support
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
            <h3 class="page-title bold">Get Support
                <a href="{{route('create.new.ticket')}}" class="btn blue-madison pull-right">
                    Open A New  Ticket <i class="fa fa-plus"></i>
                </a>
            </h3>
            <hr>
        <!-- BEGIN PAGE TITLE-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-madison">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-th"></i>All Ticket List
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="awards">
                                <thead>
                                <tr>
                                    <th> Ticket Id </th>
                                    <th> Subject </th>
                                    <th> Raised Time </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $all_ticket as $key=>$data)
                                <tr>
                                    <td>{{$data->ticket}}</td>
                                    <td><b>{{$data->subject}}</b></td>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i A') }}</td>
                                    <td>
                                        @if($data->status == 1)
                                            <button class="btn btn-warning"> Opened</button>
                                        @elseif($data->status == 2)
                                            <button type="button" class="btn btn-success">  Answered </button>
                                        @elseif($data->status == 3)
                                            <button type="button" class="btn btn-info"> Customer Reply </button>
                                        @elseif($data->status == 9)
                                            <button type="button" class="btn btn-danger">  Closed </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn blue-madison" href="{{route('ticket.customer.reply', $data->ticket )}}">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$all_ticket->links()}}
                                </div>
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