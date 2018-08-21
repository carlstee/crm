@extends('backend.master')
@section('site-title')
    Sale Point
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
            @if(Session::has('delmsg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('delmsg')}}","", "warning");
                    });

                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Sale Product To Customer
                <small> Office-managment </small>
            </h3>
            <hr>

            <div class="portlet box yellow-gold">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>Add New Sale
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body form">

                    <form method="POST" action="{{route('sale.product')}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                        {{csrf_field()}}
                        <input type="hidden" name="invoice_id" value="{{time().rand()}}">
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-2 control-label">Warehouse Select:</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="warehouse_id" required>
                                        @foreach($warehouse as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Customer Select:</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="customer_id" required>
                                    @foreach($customer as $data)
                                    <option value="{{$data->id}}">{{$data->full_name}}</option>
                                    @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Category Select:</label>

                                <div class="col-md-6">
                                    <select class="form-control select2me" id="department" required>
                                    @foreach($category as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                        {{csrf_field()}}
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Product Select:</label>

                                <div class="col-md-6">
                                    <select class="form-control select2me" name="product_id" id="product" required>

                                    </select>
                                    {{csrf_field()}}

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Selling price: ( {{$general->currency}} )</label>

                                <div class="col-md-6">
                                    <input type="hidden" id="product_price" name="selling_price" value="">
                                    <span id="pranto" class="bold"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Quantity: </label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="quantity" >
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="demo-loading-btn btn yellow-gold col-md-12"><i class="fa fa-check"></i> Submit Sale</button>
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
        $(document).ready(function(){
            $(document).on('change','#department',function(){
                var id = $(this).val();
//                alert(id)
                $.ajax({
                    type:"POST",
                    url:"{{route('product.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
//                        console.log(data)
                        $('#product').html("");
                        $('#product').append(data.output);
//
                    }
                });
            });

            $(document).on('change','#product',function(){
                var id = $(this).val();
//                alert(id)
                $.ajax({
                    type:"POST",
                    url:"{{route('product.element.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
//                        $('#product').html("");
//                        $('#product').append(data.output);
                        $('#pranto').text(data.selling_price);
                        $('#product_price').val(data.selling_price);
                        $('#roy').text(data.unit);
//                        console.log(data.selling_price);
                    }
                });
            });
        });
    </script>
@endsection