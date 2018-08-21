@extends('backend.master')
@section('site-title')
    Income/Expense
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
                                <form method="post" action="{{route('account.income')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Income Source
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="income" class="form-control" required/>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn green-seagreen">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade" id="tab_1_2">
                                <form method="post" action="{{route('account.expense')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Expense Purpose
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="expense" class="form-control" required/>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn green-seagreen">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--support bar management-->
@endsection

