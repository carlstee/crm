@extends('layouts.app')
@section('content')
    <br>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">

                <div id="load">


                </div>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-money"></i>Payment List
                        </div>
                        <div class="tools">
                        </div>
                    </div>

                    <div class="portlet-body">


                        <table class="table table-striped table-bordered table-hover" id="notices">
                            <thead>
                            <tr>
                                <th> Amount </th>
                                <th> For The Month </th>
                                <th> Get Payment(Action)</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payment as $data)
                                <tr >
                                    <td>{{number_format($data->salary,2)}} Taka</td>
                                    <td>{{date('jS M Y',strtotime($data->from_date))}} - {{date('jS M Y', strtotime($data->to_date))}}</td>
                                    <td>
                                        @if($data->status == 0 )
                                            <a class="label label-md label-success" href="{{route('user.payment.get', $data->id)}}"> Got it </a>
                                        @else
                                            <span class="label label-md label-info">Paid</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>

    </div>
@endsection



