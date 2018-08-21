@extends('backend.master')
@section('site-title')
    Individual Attendance
@endsection
@section('main-content')

    <div class="page-content-wrapper">
        <div class="page-content">

            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Individual Attendance
                <small> </small>
            </h3>
            <!-- END PAGE TITLE-->
            <div class="portlet box purple">
                <div class="portlet-title col-md-12">
                    <div class="caption col-md-4">
                        <i class="fa fa-cogs"></i>Individual Attendance</div>
                </div>
                <div class="portlet-body">
                    <div class="table">

                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="form-horizontal">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Start Date</h4>
                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                <input class="form-control" type="text" name="from_date" id="from_date" placeholder="From Date" readonly />                                                 <span class="input-group-btn">
                                                     <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                     </span>
                                            </div>
                                            <h4>End Date</h4>
                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                <input class="form-control" type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly/>                                                  <span class="input-group-btn">
                                                         <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                         </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Employee Select</h4>
                                            <select id="employee_select" name="employee_select"  class="form-control">
                                                @foreach($employee as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet box purple" id="full_table" style="display: none">
                                    <div class="portlet-title col-md-12">
                                        <div class="caption col-md-2">
                                            <i class="fa fa-user"></i>Attendance Count</div>
                                        <div class="tools">
                                            <div class="well well-sm">
                                                <span style="color: green; float: left">Total:</span><p id="lenght" style="color: red; float: left"></p><span style="color: blue; float: left">Days</span>
                                                <span style="float: left" >&nbsp; 	&nbsp;</span>
                                                <span style="color: green; float: left">Attend:</span><p id="count" style="color: red; float: left"></p><span style="color: blue; float: left">Days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover" id="order_table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"> Attend Days</th>
                                                    <th scope="col"> Attend/Late </th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
            });
            $('#employee_select').change(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var employee_select = $('#employee_select').val();

//                alert(employee).val();

                if(from_date != '' && to_date != '')
                {
                    $.ajax({
                        type:"POST",
                        url:"{{route('attend.search')}}",
                        data:{
                            from_date:from_date,
                            to_date:to_date,
                            employee_select:employee_select,
                            '_token' : $('input[name=_token]').val()

                        },
                        success:function(data)
                        {
                            var output = data.output;
                            var length = data.length;
                            var count = data.count;

                            $('#lenght').text(length);
                            $('#count').text(count);
                            //  console.log(data);
                            if(output==''){
                                $('#full_table').css('display','none');
                                $('#message').css('display','block');
                            }else{
                                $('#message').css('display','none');
                                $('#full_table').css('display','block');
                                $('#order_table tbody').html(output);
                            }

                        }
                    });
                }
                else
                {
                    alert("Please Select Date");
                }
            });
        });
    </script>
@endsection