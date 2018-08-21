@extends('backend.master')
@section('site-title')
    Supply Management
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
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
                @if(Session::has('msg'))
                    <script>
                        $(document).ready(function(){
                            swal("{{Session::get('msg')}}","", "success");
                        });
                    </script>
            @endif
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Supply Management
            </h3>
            <!-- END PAGE TITLE-->
            <!--category table start-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>SUPPLY MANAGEMENT </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <form action="{{route('store.supply.manage')}}" class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-section">
                                    <button type="button" class="btn dark pull-right" id="addService" disabled="disabled"> Add Another Item </button>

                                    <label class="col-md-2 control-label pull-left bold">Select Supplier </label>
                                    <div class="col-md-6">
                                        <select class="form-control selectpicker" data-live-search="true" name="supplier_id" id="department" required>
                                            @foreach($supply as $data)
                                                <option value="{{$data->id}}">{{$data->supplier_name}}</option>
                                            @endforeach
                                            {{csrf_field()}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-md-1 control-label">Trasaction Select</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input id="due" type="radio" value="0" name="status">Unsubscribe</label>

                                        <div class="row" style="display: none" id="due_amount">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">From Date:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input class="form-control" type="text" name="form_date" id="from_date" placeholder="From Date" readonly />                                                 <span class="input-group-btn">
                                                     <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                     </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"  >
                                                <label class="control-label col-md-4">To Date:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input class="form-control" type="text" name="to_date" id="from_date" placeholder="From Date" readonly />                                                 <span class="input-group-btn">
                                                     <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                     </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="radio-inline"><input type="radio" id="paid" value="1" required name="status">Subscribe</label>
                                    </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="col-md-11">
                                        <label>Select Service</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col-md-10">
                                        <label>Rate:</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col-md-10">
                                        <label>Quantity:</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col-md-10">
                                        <label>Amount:</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="col-md-10">
                                        <label>Action</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row serviceRow redBorder"  id="orderBox">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <select class="form-control" id="product" name="item_id[]" required>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control service_price" placeholder="Rate" required name="service_price[]" id="service_price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control service_qty" placeholder="Quantity" required id="service_qty[]" name="service_quantity[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control amount" placeholder="Total" id="amount" readonly name="service_amount[]" >
                                        </div>	</div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <button type="button" class="btn removeService red btn-block" id="removeService" disabled="disabled"> Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="form-action">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-success pull-left">Total Amount</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control total" id="total" name="total_amount" style="font-size:25px; font-weight: bold" readonly>
                                    </div>
                                </div>


                                <div class="col-md-3 pull-right">
                                    <button type="submit" class="btn purple btn-block ">Submit</button>
                                </div>
                            </div>
                        </div>
                        <!--End Form Footer Area-->
                    </form>
                </div>

            </div>
            <!--category table end-->
        </div>
        <!-- END CONTENT BODY -->
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#due', function () {
                $("#due_amount").show();
            });
            $(document).on('click', '#paid', function () {
                $("#due_amount").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('change','#department',function(){
                var id = $(this).val();

                $.ajax({
                    type:"POST",
                    url:"{{route('item.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
//                        console.log(data);
                        $('#product').html("");
                        $('#product').append(data.output);

                    }
                });
            });


        });
    </script>
    <script>

        jQuery(document).ready(function() {
            $(document).on('keyup', '.service_price , .service_qty', function () {
                var tr =  $(this).parent().parent().parent().parent();
                var price = tr.find('.service_price').val();
                var quantity = tr.find('.service_qty').val();
                var total = parseInt(price) * parseInt(quantity);
                var amount_total = tr.find('.amount').val(total);
                totalamount();
            });

            //Commom Script
            $('.dpicker').datepicker({
                autoclose: true
            });
            var currentDate = new Date();
            $(".createdpicker").datepicker("setDate",currentDate);
            $("#loader").css("display",'none');
            $("#myDiv").removeAttr("style");
            $("#addService").removeAttr("disabled");

            $("#addService").click(function(){
                var serviceRowQty = $('.serviceRow').length;
                $("#orderBox:last").clone(true).insertAfter("div.serviceRow:last");
                $("div.serviceRow:last input").val('');
                $("div.serviceRow:last textarea").val('');
                $("div.serviceRow:last select").prop('selectedIndex',0);
                $("div.serviceRow:last label").text('');
                $("div.serviceRow .removeService").prop('disabled', false);
                return false;
            });

            $(document).on("click" , "#removeService" , function()  {
                var pTotal = parseInt($('.total').val());
                var tr = $(this).parent().parent().parent().parent();
                var amount = parseInt(tr.find('.amount').val());
                var total = pTotal - amount;
                $('.total').val(total);


                var serviceRowQty = $('.serviceRow').length;
                if (serviceRowQty == 1){
                    $("div.serviceRow .removeService").prop('disabled', true);
                    return false;
                    $(".serviceRow").css("display", "block");
                }else{
                    $(this).closest('.serviceRow').remove();
                    if(serviceRowQty==1){
                        $("div.serviceRow .removeService").prop('disabled', true);
                        return false
                    }else{
                        $("div.serviceRow .removeService").prop('disabled', false);
                    }
                    return false;
                }
                alert();
                return false;
            });

            function totalamount(t){
                var t = 0;

                $('.amount').each(function(i,e){
                    var amt = $(this).val();
                    t += parseInt(amt);
//                    console.log(t);
                });
                total = t;
                $('.total').val(t);
            }

            $('.serviceRow').each(function() {
                $(this).find('select').change(function(){//alert($(this).val())
                    if( $('.serviceRow').find('select option[value='+$(this).val()+']:selected').length>1){
                        $(this).val($(this).css("border","1px red solid"));
                        alert('option is already selected');
                        $(this).val($(this).find("option:first").val());
                    }else{
                        $(this).css("border","1px #D2D6DE solid");
                    }

                });
            });
        });
    </script>
@endsection
