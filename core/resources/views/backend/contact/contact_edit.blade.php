

@extends('backend.master')
@section('site-title')
    Contact Edit
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">Contact Edit
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
                        <form action="{{route('contact.update', $contact->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="form-group clearfix">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <strong >First Name:</strong>
                                                        <input type="text" class="form-control" value="{{$contact->name}}" required name="name">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <strong >Last Name:</strong>
                                                        <input type="text" class="form-control" value="{{$contact->last_name}}" required name="last_name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <strong for="inputEmail1" class="col-md-12">Email</strong>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" value="{{$contact->email}}" required name="email">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <strong class="col-md-12">Contact Numbers:</strong>
                                            <div class="col-md-12">
                                                <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px" >

                                                    <div class="col-md-12" id="planDescriptionContainer">
                                                        @foreach($contact->number as $value)
                                                        <div class="input-group">
                                                            <input type="hidden" name="item_id[]" value="{{$value->id}}">
                                                            <input name="number[]" id="designaion_id" data_value="{{$value->id }}" class="form-control margin-top-10" type="text" required value="{{$value->number}}">
                                                            <span class="input-group-btn">
                                                        <button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class='fa fa-times'></i></button></span>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-right margin-top-10">
                                                            <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Number</button>
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
                '<input name="number[]" class="form-control margin-top-10" type="text" required placeholder="Contact Number">\n' +
                '<span class="input-group-btn">'+
                '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>'
            );
        }
    </script>
@endsection

