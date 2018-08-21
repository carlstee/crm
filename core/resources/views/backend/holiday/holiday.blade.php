@extends('backend.master')
@section('site-title')
    Holiday List
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
            <h3 class="page-title bold">Holiday Management
                <div class="col-md-3 pull-right"><a class="btn grey-mint" data-toggle="modal" href="#static">
                        Add Holidays
                        <i class="fa fa-plus"></i> </a>
                </div>
            </h3>
            <!-- END PAGE TITLE-->
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

            <div class="row">

                <div class="col-md-offset-6 col-md-3 ">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                        @foreach($months as $data)
                            <li  >
                                <a id="holiday" data-toggle="tab" href="#{{ $data }}">
                                    <i class="fa fa-calendar"></i> {{ $data }} </a>
                                <span class="after">
                            </span>
                            </li>
                            {{csrf_field()}}
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9">
                            <div class="portlet box grey-mint">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i> <b id="mmm">Holidays</b>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable" >
                                        <table class="table table-hover" id="holiday_date">
                                            <thead>
                                            <tr>
                                                <th> Date </th>
                                                <th> Occasion </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><strong>Holidays</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form method="POST" action="{{route('holiday.post')}}" class="form-horizontal ">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <h4>Start Date</h4>
                                                <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                    <input type="text" class="form-control" readonly name="start_date" required>
                                                    <span class="input-group-btn">
                                                     <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                     </span>
                                                </div>
                                                <h4>End Date</h4>
                                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input type="text" class="form-control" readonly name="end_date" required>
                                                        <span class="input-group-btn">
                                                         <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                         </span>
                                                    </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h4>Occasion</h4>
                                                <input class="form-control form-control-inline"  type="text" name="occasion" required placeholder="Occasion"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn grey-mint"><i class="fa fa-check"></i> Submit</button>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </div>
        </div>
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

    <!-- END CONTENT -->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click','#holiday',function(){
                var name = $(this).text();
//                alert($(this).text());
//                alert(name);
                $("#mmm").html(name);
                $.ajax({
                    type:"POST",
                    url:"{{route('holiday.pass')}}",
                    data:{
                        'name' : name,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){

                        $('#holiday_date tbody').html(data);
                    }
                });
            });
        });
    </script>
@endsection