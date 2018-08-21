@extends('layouts.app')
@section('content')
    <br>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">

                <div class="portlet box yellow-soft">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Task Mangement Table</div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col"> Task </th>
                                    <th scope="col" style="width:450px !important"> Description </th>
                                    <th scope="col"> Deal Time </th>
                                    <th scope="col"> Death Time </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($task_manage as $data)
                                    <tr>
                                        <td> {{$data->task_name }} </td>
                                        <td> {!!  $data->description !!} </td>
                                        <td> {{ date('jS F, Y',strtotime($data->start_date ))  }} </td>
                                        <td> {{ date('jS F, Y',strtotime($data->end_date ))  }} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$task_manage->links()}}
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection



