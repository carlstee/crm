@extends('backend.master')
@section('site-title')
    Deposit Management
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
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>{{$page_title}}</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                        <i class="icon-calendar"></i>&nbsp;
                        <span class="thin uppercase hidden-xs"></span>&nbsp;
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">Deposit Management
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
            <!-- END PAGE TITLE-->
                <div class="row">
                    <!--paypal details-->
                    <div class="col-md-6">
                        <div class="portlet portlet-sortable box green">
                            <div class="portlet-title ui-sortable-handle">
                                <div class="caption">
                                    <i class="fa fa-cc-paypal" aria-hidden="true"></i> PayPal Account Setup </div>
                                <div class="actions">
                                    <a class="btn btn-sm btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                </div>
                            </div>
                            <div class="portlet-body" style="height: auto;">
                                <form action="{{route('paypal.store')}}" method="POST" enctype="multipart/form-data" id="paypal_from">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                                    <div class="form-body">
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Display Name</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="display_name" placeholder="Display Name" value="{{$paypal_details->display_name}}">
                                                                    <span class="input-group-addon"><i class="fa fa-file-word-o" aria-hidden="true"></i></span>
                                                                </div>
                                                                @if($errors->has('display_name') )
                                                                    <p class="alert alert-danger">{{$errors->first('display_name')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Email</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="tel" class="form-control" name="paypal_email" placeholder="Paypal Business Email" value="{{$paypal_details->paypal_email}}">
                                                                    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>
                                                                @if($errors->has('paypal_email') )
                                                                    <p class="alert alert-danger">{{$errors->first('paypal_email')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label"> Status  </label>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <div class="col-md-9">
                                                                        <input type="checkbox" name="status" class="make-switch" @if($paypal_details->status == "on") checked @endif data-size="small" data-on-color="success" data-off-color="danger">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label"> Change Picture  </label>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <div class="col-md-9">
                                                                        <input type="file" name="paypal_picture" id="paypal_picture">
                                                                        <div id="preview-box" style="margin-left:-15px;">
                                                                        </div>
                                                                        <div class="image" style="margin-left:-15px;">
                                                                            @if(file_exists("images/payment/paypal-1.{$paypal_details->payment_picture}"))
                                                                                <h4 class="text text-danger">Old Image</h4>
                                                                                <img src="{{url('/')}}/images/payment/paypal-1.{{$paypal_details->payment_picture}}" alt="Paypal Image">
                                                                            @else
                                                                                <img src="{{url('/')}}/images/noImageFound.jpg" style="width: 100px;" alt="No Image Found">
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <div class="col-md-9">
                                                                        <input type="submit" class="btn green custom-class-for-btn" value="Save Change">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    <!--perfect Money details-->
                    <div class="col-md-6">
                                <div class="portlet portlet-sortable box green">
                                    <div class="portlet-title ui-sortable-handle">
                                        <div class="caption">
                                            <i class="" aria-hidden="true"></i> Perfect Money Account Setup </div>
                                        <div class="actions">
                                            <a class="btn btn-sm btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body" style="height: auto;">
                                        <form action="{{route('perfect.money.store')}}" method="POST" enctype="multipart/form-data" id="perfect_money_from">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-body">
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Display Name</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="display_name" value="{{$perfect_money_details->display_name}}">
                                                                    <span class="input-group-addon"><i class="fa fa-file-word-o" aria-hidden="true"></i></span>
                                                                </div>
                                                                @if($errors->has('display_name') )
                                                                    <p class="alert alert-danger">{{$errors->first('display_name')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-12 control-label">PERFECT MONEY USD ACCOUNT</label>
                                                            <div class="col-md-12">
                                                                <div class="input-group">
                                                                    <input type="tel" class="form-control" name="perfect_usd"  value="{{$perfect_money_details->usd}}">
                                                                    <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i>
                                                                                        </span>
                                                                </div>
                                                                @if($errors->has('perfect_usd') )
                                                                    <p class="alert alert-danger">{{$errors->first('perfect_usd')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-12 control-label">PERFECT MONEY ALTERNATE PASSPHRASE</label>
                                                            <div class="col-md-12">
                                                                <div class="input-group">
                                                                    <input type="tel" class="form-control" name="passphrase" value="{{$perfect_money_details->passpharase}}">
                                                                    <span class="input-group-addon"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                                        </span>
                                                                </div>
                                                                @if($errors->has('passphrase') )
                                                                    <p class="alert alert-danger">{{$errors->first('passphrase')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label"> Status  </label>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <div class="col-md-9">
                                                                        <input type="checkbox" name="status" class="make-switch" @if($perfect_money_details->status == "on") checked @endif data-size="small" data-on-color="success" data-off-color="danger">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label"> Change Picture  </label>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <div class="col-md-9">
                                                                        <input type="file" name="perfect_money_picture" id="perfect_money_picture">
                                                                        <div id="preview-box_perfect_picture" style="margin-left:-15px;">
                                                                        </div>
                                                                        <div class="image" style="margin-left:-15px;">
                                                                            @if(file_exists("images/payment/perfect-money-1.{$perfect_money_details->prefect_money_picture}"))
                                                                                <h4 class="text text-danger">Old Image</h4>
                                                                                <img src="{{url('/')}}/images/payment/perfect-money-1.{{$perfect_money_details->prefect_money_picture}}" alt="Paypal Image">
                                                                            @else
                                                                                <img src="{{url('/')}}/images/noImageFound.jpg" style="width: 100px;" alt="No Image Found">
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <div class="col-md-9">
                                                                        <input type="submit" class="btn green custom-class-for-btn" value="Save Change">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                    <!--Btc Bitcoin Payment Method Start Form here-->
                    <div class="col-md-6">
                        <div class="portlet portlet-sortable box green">
                            <div class="portlet-title ui-sortable-handle">
                                <div class="caption">
                                    <i class="fa fa-btc" aria-hidden="true"></i> BTC - BlockChain Account Setup </div>
                                <div class="actions">
                                    <a class="btn btn-sm btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                </div>
                            </div>
                            <div class="portlet-body" style="height: auto;">
                                <form action="{{route('btc.store')}}" method="POST" enctype="multipart/form-data" id="btc_from">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Display Name</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="display_name" value="{{$btc_payment->display_name}}">
                                                            <span class="input-group-addon"><i class="fa fa-file-word-o" aria-hidden="true"></i></span>
                                                        </div>
                                                        @if($errors->has('display_name') )
                                                            <p class="alert alert-danger">{{$errors->first('display_name')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-12 control-label">BITCOIN API KEY</label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input type="tel" class="form-control" name="btc_api"  value="{{$btc_payment->api_key}}">
                                                            <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i>
                                                                                        </span>
                                                        </div>
                                                        @if($errors->has('btc_api') )
                                                            <p class="alert alert-danger">{{$errors->first('btc_api')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-12 control-label">BITCOIN XPUB CODE</label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input type="tel" class="form-control" name="btc_xpub_code" value="{{$btc_payment->xpub_code}}">
                                                            <span class="input-group-addon"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                                        </span>
                                                        </div>
                                                        @if($errors->has('btc_xpub_code') )
                                                            <p class="alert alert-danger">{{$errors->first('btc_xpub_code')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label"> Status  </label>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <div class="col-md-9">
                                                                <input type="checkbox" name="status" class="make-switch" @if($btc_payment->status == "on") checked @endif data-size="small" data-on-color="success" data-off-color="danger">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label"> Change Picture  </label>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <div class="col-md-9">
                                                                <input type="file" name="btc_picture" id="btc_picture">
                                                                <div id="preview-box-btc-picture" style="margin-left:-15px;">
                                                                </div>
                                                                <div class="image" style="margin-left:-15px;">
                                                                    @if(file_exists("images/payment/btc-payment-1.{$btc_payment->btc_picture}"))
                                                                        <h4 class="text text-danger">Old Image</h4>
                                                                        <img src="{{url('/')}}/images/payment/btc-payment-1.{{$btc_payment->btc_picture}}" alt="Paypal Image">
                                                                    @else
                                                                        <img src="{{url('/')}}/images/noImageFound.jpg" style="width: 100px;" alt="No Image Found">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <div class="col-md-9">
                                                                <input type="submit" class="btn green custom-class-for-btn" value="Save Change">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!--Stripe Payment Method-->
                    <div class="col-md-6">
                        <div class="portlet portlet-sortable box green">
                            <div class="portlet-title ui-sortable-handle">
                                <div class="caption">
                                    <i class="fa fa-cc-stripe" aria-hidden="true"></i> STRIPE (CARD) Account Setup </div>
                                <div class="actions">
                                    <a class="btn btn-sm btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                </div>
                            </div>
                            <div class="portlet-body" style="height: auto;">
                                <form action="{{route('stripe.store')}}" method="POST" enctype="multipart/form-data" id="stripe_from">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Display Name</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="display_name" value="{{$stripe_payment->display_name}}">
                                                            <span class="input-group-addon"><i class="fa fa-file-word-o" aria-hidden="true"></i></span>
                                                        </div>
                                                        @if($errors->has('display_name') )
                                                            <p class="alert alert-danger">{{$errors->first('display_name')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-12 control-label">SECRET KEY</label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input type="tel" class="form-control" name="stripe_secret_key"  value="{{$stripe_payment->secret_key}}">
                                                            <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i>
                                                                                        </span>
                                                        </div>
                                                        @if($errors->has('stripe_secret_key') )
                                                            <p class="alert alert-danger">{{$errors->first('stripe_secret_key')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-12 control-label">PUBLISHER KEY</label>
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <input type="tel" class="form-control" name="stripe_publisher_key" value="{{$stripe_payment->publisher_key}}">
                                                            <span class="input-group-addon"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                                        </span>
                                                        </div>
                                                        @if($errors->has('stripe_publisher_key') )
                                                            <p class="alert alert-danger">{{$errors->first('stripe_publisher_key')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label"> Status  </label>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <div class="col-md-9">
                                                                <input type="checkbox" name="status" class="make-switch" @if($stripe_payment->status == "on") checked @endif data-size="small" data-on-color="success" data-off-color="danger">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label"> Change Picture  </label>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <div class="col-md-9">
                                                                <input type="file" name="stripe_picture" id="stripe_picture">
                                                                <div id="preview-box-stripe" style="margin-left:-15px;">
                                                                </div>
                                                                <div class="image" style="margin-left:-15px;">
                                                                    @if(file_exists("images/payment/stripe-payment-1.{$stripe_payment->stripe_picture}"))
                                                                        <h4 class="text text-danger">Old Image</h4>
                                                                        <img src="{{url('/')}}/images/payment/stripe-payment-1.{{$stripe_payment->stripe_picture}}" alt="Paypal Image">
                                                                    @else
                                                                        <img src="{{url('/')}}/images/noImageFound.jpg" style="width: 100px;" alt="No Image Found">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <div class="col-md-9">
                                                                <input type="submit" class="btn green custom-class-for-btn" value="Save Change">
                                                            </div>
                                                        </div>
                                                    </div>

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
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@include('backend.template-part.alert')
@include('backend.deposit.script')
@endsection