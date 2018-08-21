@extends('customer.layout.auth')
@section('site-title')
    Profile
@endsection
@section('main-content')

    <div class="page-content-wrapper">
        <div class="page-content">
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h4>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
                @if (Session::has('message'))
                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet blue box">
                        <div class="portlet-title">
                            <div class="caption">
                                <strong>Profile</strong>
                            </div>

                        </div>
                        <div class="portlet-body" style="overflow:hidden;">
                            <div class="col-md-12">
                                <div class="portlet-body" style="height: auto;">
                                    <form action="{{route('customer.profile.update',Auth::guard('customer')->user()->id )}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('put')}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-body">
                                                    <div class="form-group clearfix">
                                                        <label class="col-md-3 control-label">Full Name</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="full_name" value="{{Auth::guard('customer')->user()->full_name}}">
                                                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group clearfix">
                                                        <label class="col-md-3 control-label">Phone</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="phone" value="{{Auth::guard('customer')->user()->phone}}">
                                                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group clearfix">
                                                        <label class="col-md-3 control-label">Address</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="address" value="{{Auth::guard('customer')->user()->address}}">
                                                                <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group clearfix">
                                                        <label class="col-md-3 control-label">Email</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="email" value="{{Auth::guard('customer')->user()->email}}">
                                                                <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="clearfix form-group{{ $errors->has('passwordold') ? ' has-error' : '' }}">
                                                        <label for="password" class="col-md-3 control-label">Old Password</label>
                                                        <div class="col-md-9">
                                                            <input id="password" type="password" class="form-control" name="passwordold" required>
                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                           <strong>{{ $errors->first('passwordold') }}</strong>
                           </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearfix form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" class="col-md-3 control-label">New Password</label>
                                                        <div class="col-md-9">
                                                            <input id="password" type="password" class="form-control" name="password" required>
                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                           <strong>{{ $errors->first('password') }}</strong>
                           </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearfix form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                        <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>
                                                        <div class="col-md-9">
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                            @if ($errors->has('password_confirmation'))
                                                                <span class="help-block">
                           <strong>{{ $errors->first('password_confirmation') }}</strong>
                           </span>
                                                            @endif
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
            </div>
        </div>
    </div>

@endsection

