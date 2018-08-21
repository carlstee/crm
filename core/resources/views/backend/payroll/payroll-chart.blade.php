@extends('backend.master')
@section('site-title')
Payroll Chart
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


        <h3 class="page-title">Search to get Salary Chart

        </h3>

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


            <div class="col-md-8">
                <form method="post" class="form-inline" action="{{route('salary.sheet')}}">
                    {{csrf_field()}}
                    <input style="color: blue" class="input-small date date-picker form-control"  data-date-format="yyyy-mm-dd" type="text" name="from_date" id="from_date" placeholder="From Date" readonly >
                    <input style="color: blue"  class="input-small date date-picker form-control"  data-date-format="yyyy-mm-dd" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly>
                    <button class="btn purple" name="filter">Search</button>
                </form>
            </div>



            <br>
        <hr>
            <br>
        <div class="portlet box purple">
            <div class="portlet-title col-md-12">
                <div class="caption col-md-4">
                    <i class="fa fa-th"></i>Paid Payment Chart</div>
                <div class="tools">
                    <form method="post" action="{{route('individual-salary.search')}}">
                        {{csrf_field()}}
                        <select style="color: blue" name="employee_select" >
                            @foreach($employe as $data)
                            <option value="{{$data->employee_id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        <input style="color: blue" class="input-small date date-picker"  data-date-format="yyyy-mm-dd" type="text" name="from_date" id="from_date" placeholder="From Date" readonly >
                        <input style="color: blue"  class="input-small date date-picker"  data-date-format="yyyy-mm-dd" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly>
                        <button class="button btn-success" name="filter" id="filter" value="Filter">Find</button>
                    </form>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover" id="order_table">
                        <thead>
                            <tr>
                                <th scope="col"> Employee ID </th>
                                <th scope="col"> Employee Name </th>
                                <th scope="col"> Total Attend Days</th>
                                <th scope="col"> Payment </th>
                                <th scope="col"> Date </th>
                                <th scope="col"> Status </th>
                                <th scope="col"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($payment as $data)

                            <tr>
                                <td>{{$data->employee_id}}</td>
                                <td>{{$data->employee->name}}</td>
                                <td>{{$data->attend}}</td>
                                <td>{{$data->salary}}</td>
                                <td>{{date('jS M Y',strtotime($data->from_date))}} - {{date('jS M Y', strtotime($data->to_date))}}</td>
                                <td>

                                    @if($data->status == 0)
                                       <p class="label label-sm label-info">Pending</p>
                                    @else
                                        <span class="label label-sm label-success">Paid</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('salary-chart.delete', $data->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{$payment->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
