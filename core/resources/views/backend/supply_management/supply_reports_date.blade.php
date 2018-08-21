@extends('backend.master')
@section('site-title')
Supply Reports With Date
@endsection
@section('style')
    <style>
        #sample_2_filter label {
            float: right;
        }
        .portlet.box .dataTables_wrapper .dt-buttons {
            margin-top: -48px;
        }
        .dt-button.buttons-pdf.btn.default {
            margin-top: -5px;
            margin-left: 5px;
            margin-right: 5px;
        }
        .dt-button.buttons-print.btn.default {
            margin-top: -5px;
        }
        .dt-button.buttons-pdf.btn.default {
            margin-top: -5px;
        }
        .dt-button.buttons-csv.btn.default {
            margin-top: -5px;
        }
    </style>
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
            <h3 class="page-title">Supply Reports of {{date('Y, M-j', strtotime($date))}}

            </h3>
            <hr>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Supply Reports</div>
                    <div class="tools"> </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">

                        <thead>
                        <tr>
                            <th> Serial </th>
                            <th> Process Of Supplier </th>
                            <th> Invoice ID </th>
                            <th> Item Name</th>
                            <th> Quantity </th>
                            <th> Item Rate </th>
                            <th> Total </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($supplier as $key => $data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if($data->to_date == null)
                                        <span class=" badge badge-success">Subscribe!</span>

                                        @else
                                        <span class=" badge badge-danger">Unsubscribe!</span>
                                        From:{{date('Y,M-j', strtotime($data->form_date))}}
                                        To:{{date('Y,M-j', strtotime($data->to_date))}}

                                    @endif
                                </td>
                                <td>
                                    {{$data->invoice_id}}
                                </td>
                                <td>
                                    {{ $data->item->item}}
                                </td>
                                <td>
                                    {{$data->service_quantity}}
                                </td>
                                <td>
                                    {{$data->service_price}}
                                </td>
                                <td>
                                    {{$data->service_amount}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection