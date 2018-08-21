@extends('layouts.app')
@section('content')
    <br>
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
            <div class="portlet box grey-gallery">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-calendar"></i> <b id="mmm">Holydays</b>
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