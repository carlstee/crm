@extends('backend.master')
@section('site-title')
    Account Management
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

            <h3 class="page-title bold">Account Management
                <small> </small>
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab"> Income Purpose</a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab"> Expense Purpose</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab_1_1">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title col-md-12">
                                        <div class="caption col-md-2">
                                            <i class="fa fa-th"></i>Income Chart
                                        </div>
                                        <div class="tools">
                                            <form method="post" action="{{route('income.search')}}">
                                                {{csrf_field()}}
                                                <input style="color: blue" class="input-small date date-picker"  data-date-format="yyyy-mm-dd" type="text" name="from_date" id="from_date" placeholder="From Date" readonly >
                                                <input style="color: blue"  class="input-small date date-picker"  data-date-format="yyyy-mm-dd" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly>
                                                <button class="button btn-success" name="filter" id="filter">Search</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover" id="order_table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"> Income Item </th>
                                                    <th scope="col"> Amount </th>
                                                    <th scope="col"> Purpose(If have) </th>
                                                    <th scope="col"> Date</th>
                                                    <th scope="col"> Created Post </th>
                                                    <th scope="col"> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($income as $data)
                                                    <tr>
                                                        <td>{{$data->joinIncome['income']}}</td>
                                                        <td>{{$data->amount}}</td>
                                                        <td>{{$data->note}}</td>
                                                        <td>{{date('d M Y', strtotime($data->date))}}</td>
                                                        <td>{{date('d M Y ', strtotime($data->created_at))}}</td>
                                                        <td>
                                                            <a class="btn blue-sharp" data-toggle="modal" href="{{route('income.update', $data->id)}}" data-target="#myModal{{$data->id}}">Edit</a>
                                                            <a class="btn btn-danger" href="{{route('income.delete', $data->id)}}">Delete</a>

                                                        <!-- Modal -->
                                                            <div class="modal fade" id="myModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{route('income.update', $data->id)}}" method="post" class="form-horizontal">
                                                                            {{csrf_field()}}
                                                                            {{method_field('put')}}
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                                            <h4 class="modal-title">Update</h4>
                                                                            Amount: <input type="number" value="{{$data->amount}}" name="amount" class="form-control" required>
                                                                            <br>
                                                                            Note: <input type="text" value="{{$data->note}}" name="note" class="form-control" required>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <div class="form-body">
                                                                                    Date:
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-4">
                                                                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                                                <input type="text" class="form-control" readonly name="date" value="{{$data->date}}" required>
                                                                                                <span class="input-group-btn">
                                                                                                 <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                                                                 </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    Item:
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-4">
                                                                                            <select name="income_id" class="form-control">
                                                                                        <option value="{{$data->joinIncome['id']}}">{{$data->joinIncome['income']}}</option>
                                                                                            @foreach( $in as $value)
                                                                                                    <option value="{{$value->id}}">{{$value->income}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn blue-sharp">Save changes</button>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                            </form>

                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$income->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab_1_2">
                                <div class="portlet box blue-sharp">
                                    <div class="portlet-title col-md-12">
                                        <div class="caption col-md-2">
                                            <i class="fa fa-th"></i>Expense Chart
                                        </div>
                                        <div class="tools">
                                            <form method="post" action="{{route('expense.search')}}">
                                                {{csrf_field()}}
                                                <input style="color: blue" class="input-small date date-picker"  data-date-format="yyyy-mm-dd" type="text" name="from_date" id="from_date" placeholder="From Date" readonly >
                                                <input style="color: blue"  class="input-small date date-picker"  data-date-format="yyyy-mm-dd" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly>
                                                <button class="button btn-success" name="filter" id="filter" value="Filter">Search</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover" id="order_table">
                                                <thead>
                                                <tr>
                                                    <th scope="col"> Expense Item </th>
                                                    <th scope="col"> Amount </th>
                                                    <th scope="col"> Purpose(If have) </th>
                                                    <th scope="col"> Date</th>
                                                    <th scope="col"> Created Date </th>
                                                    <th scope="col"> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($expense as $data)
                                                    <tr>
                                                        <td>{{ $data->expense['expense']}}</td>
                                                        <td>{{$data->amount}}</td>
                                                        <td>{{$data->note}}</td>
                                                        <td>{{date('d M Y', strtotime($data->date))}}</td>
                                                        <td>{{date('d M Y ', strtotime($data->created_at))}}</td>
                                                        <td>
                                                            <a class="btn btn-info" data-toggle="modal" href="{{route('expense.update', $data->id)}}" data-target="#myModal{{$data->id}}">Edit</a>
                                                            <a class="btn btn-danger" href="{{route('expense.delete', $data->id)}}">Delete</a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="myModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{route('expense.update', $data->id)}}" method="post" class="form-horizontal">
                                                                            {{csrf_field()}}
                                                                            {{method_field('put')}}
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                                                <h4 class="modal-title">Update</h4>
                                                                                Amount: <input type="number" value="{{$data->amount}}" name="amount" class="form-control" required>
                                                                                <br>
                                                                                Note: <input type="text" value="{{$data->note}}" name="note" class="form-control" required>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-body">
                                                                                    Date:
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-4">
                                                                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                                                <input type="text" class="form-control" readonly name="date" value="{{$data->date}}" required>
                                                                                                <span class="input-group-btn">
                                                                                                 <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                                                                 </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    Item:
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-4">
                                                                                            <select name="expense_id" class="form-control">
                                                                                                <option value="{{$data->expense['id']}}">{{$data->expense['expense']}}</option>
                                                                                                @foreach( $out as $some)
                                                                                                    <option value="{{$some->id}}">{{$some->expense}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$expense->links()}}
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
    <!--support bar management-->
@endsection

