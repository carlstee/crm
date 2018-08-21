

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('site-title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logo/icon.png')}}"/>
    @include('backend.template-part.style')
    @yield('style')
    <style>
        @media (max-width: 767px) {
            .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended > .dropdown-menu {
                max-width: 200px;
                width: 200px;
            }
            .page-header.navbar .top-menu .navbar-nav>li.dropdown-notification .dropdown-menu {
                margin-right: -25px;
            }
        }
    </style>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!--preloader start-->
<!--preloader end-->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">

            <a href="">
                <img class="logo" style="height: 40px; width: 150px; margin-top: 3px;" src="{{asset('assets/images/logo/'.$general->image)}}">
            </a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                            <span class="username username-hide-on-mobile">
                               {{Auth::guard('customer')->user()->full_name}}
                            </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{route('customer.profile')}}">
                                <i class="icon-settings"></i> Profile Settings
                            </a>
                        </li>
                        <li>
                            <a href="{{route('customer.logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <i class="icon-key"></i> Log Out
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"> </div>
<div class="page-container">
    @include('customer.layout.sidebar')
    @if(Session::has('msg'))
        <script>
            $(document).ready(function(){
                swal("{{Session::get('msg')}}","", "success");
            });
        </script>
    @endif

    @yield('main-content')
</div>

<div class="modal fade" id="signout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 class="modal-title bold" style="color: black">Confirm Signout</h3>
            </div>
            <div class="modal-body">

                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Not Now</button>
                        <a href="{{route('customer.logout')}}" class="btn blue"  onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST">
                                {{ csrf_field() }}
                                <i class="icon-key"></i> Sign-Out
                            </form>
                        </a>
                    </div>

            </div>
        </div>
    </div>
</div>

@include('backend.template-part.footer')
@include('backend.template-part.script')
@yield('script')
</body>
</html>

