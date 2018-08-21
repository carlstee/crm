@extends('layouts.app')
@section('content')
    <br>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">

                <div id="load">

                </div>
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-clipboard"></i>Notice List
                        </div>
                        <div class="tools">
                        </div>
                    </div>

                    <div class="portlet-body">


                        <table class="table table-striped table-bordered table-hover" id="notices">
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th> Title </th>
                                <th> Description </th>
                                <th> Created on </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notice as $key=>$not)
                                <tr >
                                    <td>{{$key+1}}</td>
                                    <td>{{$not->title}}</td>
                                    <td>{!! $not->description !!}</td>
                                    <td>{{$not->created_at}}</td>
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



