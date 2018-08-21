<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Employee Panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logo/icon.png')}}"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    @include('backend.template-part.style')
    @yield('head')
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

   <div class="page-header navbar navbar-fixed-top">

            <div class="page-header-inner ">

                <div class="page-logo">
                    <a href="">
                        <img src="{{asset('assets/images/logo/'.$general->image)}}" style="height: 30px" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"></div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>


                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">

                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="{{asset('assets/layouts/layout/img/avatar3_small.jpg')}}" />
                                <span class="username username-hide-on-mobile">
                                    {{\Illuminate\Support\Facades\Auth::guard('employee')->user()->name}}
                                </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{route('user.task')}}">
                                        <i class="fa fa-sticky-note-o"></i> My Tasks
                                    </a>
                                </li>

                                <li>
                                    <a href="#changePassword"  data-toggle="modal">
                                        <i class="fa fa-cog"></i>Change Password
                                    </a>
                                </li>

                                <li class="divider"> </li>

                                <li>
                                    <a href="{{ route('employee.logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                        <form id="logout-form" action="{{ route('employee.logout') }}" method="POST">
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

        <div class="page-container">

            <div class="page-sidebar-wrapper">

                <div class="page-sidebar navbar-collapse collapse">

                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

                        <li class="sidebar-toggler-wrapper hide">

                            <div class="sidebar-toggler"> </div>

                        </li>

                        <li class="sidebar-search-wrapper">
                            <br>
                            <br>

                        </li>
                        <li class="nav-item @if(request()->path() == 'home') active open @endif ">
                            <a href="{{ url('home') }}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboad</span>
                            </a>
                        </li>

                        <li class="nav-item @if(request()->path() == 'user/attendance') active open @endif ">
                            <a href="{{route('user.attendance')}}" class="nav-link nav-toggle">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                <span class="title">Attendance</span>
                            </a>
                        </li>

                        <li class="nav-item @if(request()->path() == 'user/payment') active open @endif ">
                            <a href="{{route('user.payment')}}" class="nav-link nav-toggle">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span class="title">Payment</span>
                            </a>
                        </li>

                        <li class="nav-item @if(request()->path() == 'user/notice') active open @endif ">
                            <a href="{{route('user.notice')}}" class="nav-link nav-toggle">
                                <i class="fa fa-clipboard" aria-hidden="true"></i>
                                <span class="title">Important Notice</span>
                            </a>
                        </li>

                        <li class="nav-item @if(request()->path() == 'user/holiday') active open @endif ">
                            <a href="{{route('user.holiday')}}" class="nav-link nav-toggle">
                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                <span class="title">Holidays</span>
                            </a>
                        </li>

                        <li class="nav-item @if(request()->path() == 'user/award') active open @endif ">
                            <a href="{{route('user.award')}}" class="nav-link nav-toggle">
                                <i class="fa fa-trophy" aria-hidden="true"></i>
                                <span class="title">Award</span>
                            </a>
                        </li>

                        <li class="nav-item @if(request()->path() == 'user/task') active open @endif ">
                            <a href="{{route('user.task')}}" class="nav-link nav-toggle">
                                <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                                <span class="title">Task</span>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

            <div class="page-content-wrapper">

                <div class="page-content" style="min-height:1365px">

                    @if (Session::has('message'))
                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                    @endif
                    @if(Session::has('msg'))
                        <script>
                            $(document).ready(function(){
                                swal("{{Session::get('msg')}}","", "success");
                            });
                        </script>
                    @endif

                @yield('content')

                </div>


            </div>

        </div>

   <div class="modal fade" id="changePassword" tabindex="-1" role="changePassword" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                   <h4 class="modal-title">Change Password</h4>
               </div>
               <div class="modal-body">
                   <form class="form-horizontal" method="POST" action="{{route('employee.change.password')}}">
                       {{ csrf_field() }}

                       <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::guard('employee')->user()->id}}" name="id">

                       <div class="form-group{{ $errors->has('passwordold') ? ' has-error' : '' }}">
                           <label for="password" class="col-md-4 control-label">Old Password</label>

                           <div class="col-md-6">
                               <input id="passwordold" type="password" class="form-control" name="passwordold" required>

                               @if ($errors->has('password'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('passwordold') }}</strong>
                                    </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           <label for="password" class="col-md-4 control-label">New Password</label>

                           <div class="col-md-6">
                               <input id="password" type="password" class="form-control" name="password" required>

                               @if ($errors->has('password'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                           <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                           <div class="col-md-6">
                               <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>

                               @if ($errors->has('password_confirmation'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                               @endif
                           </div>
                       </div>

                       <div class="modal-footer">
                           <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                           <button class="btn green" type="submit">Change</button>
                       </div>
                   </form>


               </div>
           </div>
           <!-- /.modal-content -->
       </div>
   </div>

@include('backend.template-part.footer')

@include('backend.template-part.script')
@yield('script')
</body>

</html>

