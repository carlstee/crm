@extends('backend.master')
@section('site-title')
    Edit Food To Comapny
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->


        @if(Session::has('msg'))
            <script>
                $(document).ready(function(){
                    swal("{{Session::get('msg')}}","", "success");
                });
            </script>
        @endif
        <div class="page-content">
            <h3 class="page-title">Catering System
                <small> Office-managment </small>
            </h3>
            <hr>
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
                    <form action="{{route('catering.update', $service->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-body">
                                    <div class="form-group clearfix">
                                        <label class="col-md-3 control-label">Company Name</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="comapany_id">
                                                <option value="{{$service->comapany_id}}">{{$service->company->office_name}}</option>
                                                @foreach($company as $data)
                                                    <option value="{{$data->id}}">{{$data->	office_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <label class="col-md-3 control-label">Package Select</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="package_id">
                                                <option value="{{$service->package_id}}">{{$service->package->package_name}}</option>
                                                @foreach($package as $data)
                                                    <option value="{{$data->id}}">{{$data->package_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <label class="col-md-3 control-label">Quantity</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="{{$service->quantity}}" required name="quantity">
                                                <span class="input-group-addon">{{$general->currency}}
                                                    </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <label class="col-md-3 control-label">Trasaction Select</label>

                                        <div class="col-md-9">

                                            <label class="radio-inline"><input id="due"  @if($service->payment == 0) checked @endif type="radio"  value="0" name="payment">Due</label>

                                            <input @if($service->payment == 0)  @else style="display: none" @endif id="due_amount" placeholder="Due Amount" type="number" value="{{$service->due_amount}}" name="due_amount">


                                            <label class="radio-inline"><input type="radio" @if($service->payment == 1) checked @endif id="paid" value="1" required name="payment">Paid</label>

                                        </div>


                                    </div>

                                    <div class="form-group clearfix">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="description" placeholder="Not Required" rows="5">{!! $service->description !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <div class="col-md-12">
                                            <button class="btn btn-info col-md-12" type="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                Order Updated</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#due', function () {
                $("#due_amount").show();
            });
            $(document).on('click', '#paid', function () {
                $("#due_amount").remove();
            });
        });
    </script>
@endsection