@extends('backend.master')
@section('site-title')
    Income Sheet
@endsection
@section('style')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">

        <div class="page-content">

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
            <!-- END PAGE BAR -->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <div class="portlet box">

                <div class="portlet-title col-md-12">
                    <div class="caption col-md-4">
                        <h2 style="color: #0b1014;" >Icome Sheet</h2>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table">
                        <table id="example" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th scope="col"> Serial</th>
                                <th scope="col"> Item </th>
                                <th scope="col"> Note(If have)</th>
                                <th scope="col"> Date</th>
                                <th scope="col"> Amounts </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($income as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->joinIncome['income']}}</td>
                                    <td>{{$data->note}}</td>
                                    <td>{{$data->date}}</td>
                                    <td style="text-align: center" >{{$data->amount}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Total:{{$lenght}} Days</td>
                                <td>Total:{{$total_amount}} Taka</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
@endsection