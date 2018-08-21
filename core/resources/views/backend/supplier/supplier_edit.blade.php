

@extends('backend.master')
@section('site-title')
    Supplier Detail Edit
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">Supplier Detail Edit
            </h3>
            <!-- END PAGE TITLE-->
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
                    <div class="portlet-body" style="height: auto;">
                        <form action="{{route('supplier.update', $supply->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-body">

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Supplier Name</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{$supply->supplier_name}}" required name="supplier_name">
                                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Supplier Mobile</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{$supply->supplier_mobile}}" required name="supplier_mobile">
                                                    <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Supplier Email</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{$supply->supplier_email}}" required name="supplier_email">
                                                    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Supplier Address</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{$supply->supplier_address}}" required name="supplier_address">
                                                    <span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group clearfix">
                                            <div class="col-md-12">
                                                <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px" >
                                                    <label class="col-md-3 control-label">Item Name</label>
                                                    <div class="col-md-12" id="planDescriptionContainer">
                                                        @foreach($supply->item as $value)
                                                        <div class="input-group">
                                                            <input type="hidden" name="item_id[]" value="{{$value->id}}">
                                                            <input name="item[]" id="designaion_id" data_value="{{$value->id }}" class="form-control margin-top-10" type="text" required value="{{$value->item}}">
                                                            <span class="input-group-btn">
                                                        <button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class='fa fa-times'></i></button></span>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-right margin-top-10">
                                                            <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Food Item</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <div class="col-md-12">
                                                <button class="btn btn-info col-md-12" type="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                    Update</button>
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
    </div>
@endsection
@section('script')
    <script>
        var max = 1;
        $(document).ready(function () {
            $("#btnAddDescription").on('click', function () {
                appendPlanDescField($("#planDescriptionContainer"));
            });

            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').remove();
                var dep = $(this).closest('.input-group');
                var a = dep.find('#designaion_id').attr('data_value');

                $.ajax({
                    type:'GET',
                    url:'{{route('supply.item.delete')}}',
                    data:{
                        id:a
                    },
                    success:function(data){
                        console.log(data);
                        location.reload();
                    }
                });
            });
        });


        function appendPlanDescField(container) {
            max++;
            container.append(
                '<div class="input-group">' +
                '<input type="hidden" name="item_id[]">' +
                '<input name="item[]" class="form-control margin-top-10" type="text" required placeholder="Item Name">\n' +
                '<span class="input-group-btn">'+
                '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>'
            );
        }
    </script>
@endsection

