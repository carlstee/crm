@extends('backend.master')
@section('site-title')
    Attendance
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
            <h3 class="page-title bold">Attendance Management (Timezone: {{$time->country}})
                <a data-toggle="modal" href="#basic1" class="btn purple-soft pull-right">
                    Select Timezone <i class="fa fa-plus"></i>
                </a> <hr>
            </h3>
            <!-- END PAGE TITLE-->



            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">

                    <div class="portlet box purple-soft">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-users"></i>Attendance Chart
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_employees">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        EmployeeID
                                    </th>

                                    <th style="text-align: center">
                                        Name
                                    </th>

                                    <th class="text-center">
                                        Dept/Designation
                                    </th>

                                    <th class="text-center">
                                        Date
                                    </th>

                                    <th class="text-center">
                                        Time
                                    </th>
                                    <th class="text-center">
                                        Status
                                    </th>
                                    <th class="text-center">
                                        IP & Device
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($attendance as $value)
                                        @php $data = \App\Employee::where('id',$value->user_id)->first() @endphp
                                    <tr id="row">
                                        <td>
                                            @if($data=='')
                                              @php $a = 'None'@endphp
                                                {{$a}}
                                            @else
                                                {{$data->employee_id}}
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if($data=='')
                                                @php $a = 'None'@endphp
                                                {{$a}}
                                            @else
                                                {{$data->name}}
                                            @endif
                                        </td>

                                        <td>
                                            @if($data=='')
                                                @php $a = 'None'@endphp
                                                {{$a}}
                                            @else
                                                @php $dep = \App\Department::where('id', $data->dept_id )->first() @endphp
                                                @php $deg = \App\Designation::where('id', $data->deg_id  )->first() @endphp
                                                <p>Department: <strong>{{$dep->name}}</strong></p>
                                                <p>Designation: <strong>{{$deg->deg_name}}</strong></p>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $today = Carbon\Carbon::today()->toDateString();
                                                $date = $value->date;
                                            if ($today == $date){
                                              echo $date;
                                            }else{
                                                echo Carbon\Carbon::parse($date)->diffForHumans();
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            {{ date('M j, Y - h:ia', strtotime($value->created_at)) }}

                                        </td>
                                        <td>
                                            @if($value->status == 0 )
                                            <a class="label label-sm label-danger" href="{{route('approve.attend', $value->id)}}"> Pending </a>
                                            @elseif($value->status == 9)
                                                <span class="label label-sm label-success">Approved</span>
                                                @else
                                                <span class="label label-sm label-success">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            <p>IP: <strong>{{$value->ip}}</strong></p>
                                            <p>Device: <strong>{{$value->device}}</strong></p>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{--paginate option--}}
                            <div class="col-md-12 text-center">
                                {{$attendance->links()}}
                            </div>
                        </div>


                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->


            <div class="modal fade" id="basic1" tabindex="-1" role="basic1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Timezone Select</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" method="post" action="{{route('timezone.update', $time->id)}}">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Select Country</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="timezone" name="name_nai">
                                            <option value="1">Africa</option>
                                            <option value="2">America</option>
                                            <option value="3">Antarctica</option>
                                            <option value="4">Asia</option>
                                            <option value="5">Atlantic</option>
                                            <option value="6">Australia</option>
                                            <option value="7">Europe</option>
                                            {{csrf_field()}}
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Select Area</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="area" name="country">

                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                    <button class="btn green">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->




        </div>
    </div>
@endsection
@section('script')
 <script>
     $(document).ready(function () {
         $(document).on('change','#timezone', function () {
             var id = $(this).val();
//    alert(id);
    if(id == 1){

        $('#area').html("");
        $('#area').append(

            '<option value="Africa/Abidjan">Abidjan</option>\'\n' +
            '<option value="Africa/Asmara">Asmara</option>\'\n' +
            '<option value="Africa/Bissau">Bissau</option>\'\n' +
            '<option value="Africa/Cairo">Cairo</option>\'\n' +
            '<option value="Africa/El_Aaiun">El_Aaiun</option>\'\n' +
            '<option value="Africa/Johannesburg">Johannesburg</option>\'\n' +
            '<option value="Africa/Kigali">Kigali</option>\'\n' +
            '<option value="Africa/Lome">Lome</option>\'\n' +
            '<option value="Africa/Malabo">Malabo</option>\'\n' +
            '<option value="Africa/Mogadishu">Mogadishu</option>\'\n' +
            '<option value="Africa/Niamey">Niamey</option>\'\n' +
            '<option value="Africa/Niamey">Niamey</option>\'\n' +
            '<option value="Africa/Sao_Tome">Sao_Tome</option>\'\n' +
            '<option value="Africa/Accra">Accra</option>\'\n' +
            '<option value="Africa/Bamako">Bamako</option>\'\n' +
            '<option value="Africa/Blantyre">Blantyre</option>\'\n' +
            '<option value="Africa/Casablanca">Casablanca</option>\'\n' +
            '<option value="Africa/Dar_es_Salaam">Dar_es_Salaam</option>\'\n' +
            '<option value="Africa/Freetown">Freetown</option>\'\n' +
            '<option value="Africa/Juba">Juba</option>\'\n' +
            '<option value="Africa/Maputo">Maputo</option>\'\n' +
            '<option value="Africa/Nouakchott">Nouakchott</option>\'\n' +
            '<option value="Africa/Tripoli">Tripoli</option>\'\n' +
            '<option value="Africa/Addis_Ababa">Addis_Ababa</option>\'\n' +
            '<option value="Africa/Bangui">Bangui</option>\'\n' +
            '<option value="Africa/Brazzaville">Brazzaville</option>\'\n' +
            '<option value="Africa/Ceuta">Brazzaville</option>\'\n' +
            '<option value="Africa/Kampala">Kampala</option>\'\n' +
            '<option value="Africa/Lagos">Lagos</option>\'\n' +
            '<option value="Africa/Lubumbashi">Lubumbashi</option>\'\n' +
            '<option value="Africa/Maseru">Maseru</option>\'\n' +
            '<option value="Africa/Dakar">Dakar</option>'
        );
    }

    if(id == 2){

        $('#area').html("");
        $('#area').append(

            '<option value="America/Adak">Adak </option>\'\n' +
            '<option value="America/Araguaina">Araguaina</option>\'\n' +
            '<option value="America/Argentina/Jujuy">Argentina/Jujuy</option>\'\n' +
            '<option value="America/Argentina/Salta">Argentina/Salta</option>\'\n' +
            '<option value="America/ABelize">Belize</option>\'\n' +
            '<option value="America/Boise">Boise</option>\'\n' +
            '<option value="America/Caracas">Caracas</option>\'\n' +
            '<option value="America/Chihuahua">Chihuahua</option>\'\n' +
            '<option value="America/Curacao">Curacao</option>\'\n' +
            '<option value="America/Denver">Denver</option>\'\n' +
            '<option value="America/Eirunepe">Eirunepe</option>\'\n' +
            '<option value="America/Glace_Bay">Glace_Bay</option>\'\n' +
            '<option value="America/Grenada">Grenada</option>\'\n' +
            '<option value="America/Indiana/Indianapolis">Indiana/Indianapolis</option>\'\n' +
            '<option value="America/Inuvik">Inuvik</option>\'\n' +
            '<option value="America/Lima">Lima</option>\'\n' +
            '<option value="America/Managua">Managua</option>\'\n' +
            '<option value="America/Matamoros">Matamoros</option>\'\n' +
            '<option value="America/Metlakatla">Metlakatla</option>\'\n' +
            '<option value="America/Monterrey">Monterrey</option>\'\n' +
            '<option value="America/New_York">New_York</option>\'\n' +
            '<option value="America/North_Dakota/Beulah">North_Dakota/Beulah</option>\'\n' +
            '<option value="America/Panama">Panama</option>\'\n' +
            '<option value="America/Port-au-Prince">Port-au-Prince</option>\'\n' +
            '<option value="America/Punta_Arenas">Punta_Arenas</option>\'\n' +
            '<option value="America/Regina">Regina</option>\'\n' +
            '<option value="America/Santiago">Santiago</option>\'\n' +
            '<option value="America/Sitka">Sitka</option>\'\n' +
            '<option value="America/St_Lucia">St_Lucia</option>\'\n' +
            '<option value="America/Tegucigalpa">Tegucigalpa</option>\'\n' +
            '<option value="America/Toronto">Toronto</option>\'\n' +
            '<option value="America/Winnipeg">Winnipeg</option>\'\n' +
            '<option value="America/Anchorage">Anchorage</option>\'\n' +
            '<option value="America/Argentina/Ushuaia">Argentina/Ushuaia</option>'
        );
    }

             if(id == 3){

                 $('#area').html("");
                 $('#area').append(

                     '<option value="Antarctica/Casey">Casey </option>\'\n' +
                     '<option value="Antarctica/Syowa">Syowa </option>\'\n' +
                     '<option value="Antarctica/Davis">Davis </option>\'\n' +
                     '<option value="Antarctica/McMurdo">McMurdo </option>\'\n' +
                     '<option value="Antarctica/Troll">Troll </option>\'\n' +
                     '<option value="Antarctica/DumontDUrville">DumontDUrville </option>\'\n' +
                     '<option value="Antarctica/Palmer">Palmer </option>\'\n' +
                     '<option value="Antarctica/Vostok">Vostok </option>\'\n' +
                     '<option value="Antarctica/Macquarie">Macquarie </option>\'\n' +
                     '<option value="Antarctica/Vostok">Vostok </option>\'\n' +

                     '<option value="Antarctica/Mawson">Argentina/Mawson</option>'
                 );
             }

             if(id == 4){

                 $('#area').html("");
                 $('#area').append(

                     '<option value="Asia/Aden">Aden </option>\'\n' +
                     '<option value="Asia/Baghdad">Baghdad </option>\'\n' +
                     '<option value="Asia/Barnaul">Barnaul </option>\'\n' +
                     '<option value="Asia/Chita">Chita </option>\'\n' +
                     '<option value="Asia/Dhaka">Dhaka </option>\'\n' +
                     '<option value="Asia/Hong_Kong">Hong_Kong </option>\'\n' +
                     '<option value="Asia/Karachi">Karachi </option>\'\n' +
                     '<option value="Asia/Muscat">Muscat </option>\'\n' +
                     '<option value="Asia/Sakhalin">Sakhalin </option>\'\n' +
                     '<option value="Asia/Tbilisi">Tbilisi </option>\'\n' +
                     '<option value="Asia/Tomsk">Tomsk </option>\'\n' +
                     '<option value="Asia/Vientiane">Vientiane </option>\'\n' +
                     '<option value="Asia/Yekaterinburg">Yekaterinburg </option>\'\n' +
                     '<option value="Asia/Aqtobe">Aqtobe </option>\'\n' +
                     '<option value="Asia/Gaza">Gaza </option>\'\n' +
                     '<option value="Asia/Qatar">Qatar </option>\'\n' +
                     '<option value="Asia/Samarkand">Samarkand </option>\'\n' +
                     '<option value="Asia/Amman">Amman </option>\'\n' +
                     '<option value="Asia/Baku">Baku </option>\'\n' +
                     '<option value="Asia/Colombo">Colombo </option>\'\n' +
                     '<option value="Asia/Colombo">Colombo </option>\'\n' +
                     '<option value="Asia/Dubai">Dubai </option>\'\n' +
                     '<option value="Asia/Makassar">Makassar </option>\'\n' +
                     '<option value="Asia/Kolkata">Kolkata </option>\'\n' +
                     '<option value="Asia/Kuwait">Kuwait </option>\'\n' +
                     '<option value="Asia/Pontianak">Pontianak </option>\'\n' +
                     '<option value="Asia/Tokyo">Tokyo </option>\'\n' +
                     '<option value="Asia/Yangon">Yangon </option>\'\n' +


                     '<option value="Asia/Aqtau">Aqtau</option>'
                 );
             }

             if(id == 5){

                 $('#area').html("");
                 $('#area').append(

                     '<option value="Atlantic/Azores">Azores</option>\'\n' +
                     '<option value="Atlantic/Canary">Canary</option>\'\n' +
                     '<option value="Atlantic/Cape_Verde">Cape_Verde</option>\'\n' +
                     '<option value="Atlantic/Madeira">Madeira</option>\'\n' +
                     '<option value="Atlantic/Reykjavik">Reykjavik</option>\'\n' +
                     '<option value="Atlantic/Bermuda">Bermuda</option>'
                 );
             }

             if(id == 6){

                 $('#area').html("");
                 $('#area').append(

                     '<option value="Australia/Adelaide">Adelaide</option>\'\n' +
                     '<option value="Australia/Brisbane">Brisbane</option>\'\n' +
                     '<option value="Australia/Eucla">Eucla</option>\'\n' +
                     '<option value="Australia/Hobart">Hobart</option>\'\n' +
                     '<option value="Australia/Perth">Perth</option>\'\n' +
                     '<option value="Australia/Sydney">Sydney</option>\'\n' +
                     '<option value="Australia/Darwin">Darwin</option>'
                 );
             }

             if(id == 7){

                 $('#area').html("");
                 $('#area').append(

                     '<option value="Europe/Amsterdam">Amsterdam</option>\'\n' +
                     '<option value="Europe/Belgrade">Belgrade</option>\'\n' +
                     '<option value="Europe/Bucharest">Bucharest</option>\'\n' +
                     '<option value="Europe/Malta">Malta</option>\'\n' +
                     '<option value="Europe/Moscow">Moscow</option>\'\n' +
                     '<option value="Europe/Berlin">Berlin</option>\'\n' +
                     '<option value="Europe/Dublin">Dublin</option>\'\n' +
                     '<option value="Europe/London">London</option>\'\n' +
                     '<option value="Europe/Oslo">Oslo</option>\'\n' +
                     '<option value="Europe/Sarajevo">Sarajevo</option>\'\n' +
                     '<option value="Europe/Sofia">Sofia</option>\'\n' +
                     '<option value="Europe/Vienna">Vienna</option>\'\n' +
                     '<option value="Europe/Astrakhan">Astrakhan</option>\'\n' +
                     '<option value="Europe/Busingen">Busingen</option>\'\n' +
                     '<option value="Europe/Istanbul">Istanbul</option>\'\n' +
                     '<option value="Europe/Luxembourg">Luxembourg</option>\'\n' +
                     '<option value="Europe/Paris">Paris</option>\'\n' +
                     '<option value="Europe/Rome">Rome</option>\'\n' +
                     '<option value="Europe/Stockholm">Stockholm</option>\'\n' +
                     '<option value="Europe/Vilnius">Vilnius</option>\'\n' +
                     '<option value="Europe/Zurich">Zurich</option>\'\n' +
                     '<option value="Europe/Vaduz">Vaduz</option>\'\n' +
                     '<option value="Europe/Simferopol">Simferopol</option>\'\n' +
                     '<option value="Europe/Simferopol">Simferopol</option>\'\n' +
                     '<option value="Europe/Podgorica">Podgorica</option>\'\n' +
                     '<option value="Europe/Madrid">Madrid</option>\'\n' +
                     '<option value="Europe/Lisbon">Lisbon</option>\'\n' +
                     '<option value="Australia/Darwin">Darwin</option>'
                 );
             }

         })
     })
 </script>

@endsection