<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Customer Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/backend/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/backend/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('assets/backend/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/backend/pages/css/login-4.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logo/icon.png')}}"/>
    <style>
        .help-block strong {
            color: #ff0000;
        }
    </style>

</head>
<body class="login" style="background-image: url({{asset('assets/backend/img/customer.jpg')}}); background-size: cover;">
<br>
<br>
<br>
<br>
<br>
<br>

<div class="content" style="background-color:darkslateblue">
    <!-- BEGIN LOGIN FORM -->
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <h3 class="form-title">Customer Login Panel</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter Your Username and password. </span>
            </div>
            <label for="email" class="col-md-2 control-label">Email</label>
            <div class="col-md-12">

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-2 control-label">Password</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-actions">
            <label class="control-label">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>  Remember me </label>
            <button type="submit" class="btn white pull-right"> Login </button>
        </div>

        <div class="form-group">
            <div class="col-md-2 col-md-offset-4">

            </div>
        </div>
    </form>


</div>

<div class="copyright" style="color: black">{{date('Y')}} &copy; All Rights Reserved.</div>

</body>

</html>
