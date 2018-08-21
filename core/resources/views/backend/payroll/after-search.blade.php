@extends('backend.master')
@section('site-title')
Payment Sheet
@endsection
@section('style')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Accounts</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        @if(Session::has('msg'))
        <script>
            $(document).ready(function(){
                swal("{{Session::get('msg')}}","", "success");
            });
        </script>
        @endif
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
        <div class="portlet box">

            <div class="portlet-title col-md-12">
                <div class="caption col-md-4">
                    <h2 style="color: #0b1014;" >Payment Sheet</h2>
                </div>
            </div>

            <div class="portlet-body">
                <div class="table">
                    <form method="post" action="{{route('payment.save')}}">
                        {{csrf_field()}}
                    <table id="example" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col"> Employee ID </th>
                                <th scope="col"> Employee Name </th>
                                <th scope="col"> Contact</th>
                                <th scope="col"> Total Attend Days</th>
                                <th scope="col"> Payment </th>
                                <th scope="col"> Month </th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($abir as $data)

                            <tr>
                                <td><input type="hidden" name="employee_id[]" value="{{$data['employee_id']}}">{{$data['employee_id']}}</td>

                                <td>{{$data['name']}}</td>
                                <td>{{$data['mobile']}}</td>

                                <td style="text-align: center"><input type="hidden" name="attend[]" value="{{$data['sum_attend']}}">{{$data['sum_attend']}}</td>

                                <td><input type="hidden" name="salary[]" value="{{$data['total_salary']}}">{{$data['total_salary']}}</td>

                                <td>
                                    <input type="hidden" name="from_date[]" value="{{$data['from'] }}">
                                    <input type="hidden" name="to_date[]" value="{{$data['to']}}">
                                    {{$data['from'] }}- {{$data['to']}}
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                        <button type="submit" class="btn btn-info">Save</button>
                    </form>
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