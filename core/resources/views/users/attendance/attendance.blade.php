@extends('layouts.app')
@section('content')
    <br>
    @if(Session::has('msg'))
        <script>
            $(document).ready(function(){
                swal("{{Session::get('msg')}}","", "success");
            });
        </script>
    @endif
    <!-- BEGIN PAGE TITLE-->
    <div class="col-md-12">

        <form method="POST" action="{{route('attendance.post')}}" class="form-horizontal">
            {{csrf_field()}}
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <div class="portlet box purple-wisteria">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i>Attendance of Day
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{$auth_employee->id}}" >
                    @php $device = $_SERVER['HTTP_USER_AGENT'] @endphp
                    @php $ip = $_SERVER['REMOTE_ADDR'] @endphp
                    <input type="hidden" name="ip" value="{{$ip}}" >
                    <input type="hidden" name="device" value="{{$device}}" >
                    @php
                        $date = \Carbon\Carbon::today();
                        $today = date('Y-m-d',strtotime($date));
                        $input_date = \App\Attendance::where('user_id', $auth_employee->id)->orderBy('id', 'desc')->first();
                    @endphp
                    <div class="portlet-body" id="body">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-2">Pick Date</label>

                                <div class="col-md-6">
                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                        <input type="text" class="form-control" readonly name="date" required>
                                        <span class="input-group-btn">
                                 <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                 </span>
                                    </div>
                                </div>

                                    <div class="col-md-4">
                                        <input type="hidden" name="status" value="0"  >
                                        <button type="submit" id="submit" @if($today  == $input_date->date) disabled @endif class="demo-loading-btn btn  purple-wisteria">
                                            <i class="fa fa-plus"></i>	I am IN</button>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection


