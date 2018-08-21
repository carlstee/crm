<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"> </div>
            </li>
            <li class="sidebar-search-wrapper">
            </li>
            <br>
            <br>
            <li class="nav-item start @php echo "active",(request()->path() != 'customer/home')?:"";@endphp">
                <a href="{{url('customer/home')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'customer/invoice/history')?:"";@endphp">
                <a href="{{route('customer.invoice.history')}}" class="nav-link nav-toggle">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <span class="title">Invoice History</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'customer/knowledge/based')?:"";@endphp">
                <a href="{{route('customer.knowledge')}}" class="nav-link nav-toggle">
                    <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                    <span class="title">Knowledge Based </span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'customer/profile')?:"";@endphp">
                <a href="{{route('customer.profile')}}" class="nav-link nav-toggle">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="title">Customer Profile</span>
                    <span class="selected"></span>
                </a>
            </li>
            @php $check_count = \App\Ticket::where('customer_id', Auth::guard('customer')->user()->id)->where('status', 2)->get() @endphp

            <li class="nav-item start @php echo "active",(request()->path() != 'customer/get/support')?:"";@endphp
            @php echo "active",(request()->path() != 'customer/create/ticket')?:"";@endphp">
                <a href="{{route('support.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-ticket" aria-hidden="true"></i>
                    <span class="title">Support <span class="badge badge-danger">{{count($check_count)}} </span></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != '')?:"";@endphp">
                <a href="#signout" data-toggle="modal" class="nav-link nav-toggle">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span class="title">Sign-Out</span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </div>
</div>