
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
            <li class="nav-item start @php echo "active",(request()->path() != 'admin/dashboard')?:"";@endphp">
                <a href="{{route('admin.dashboard')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/customer/management' || request()->path() == 'admin/customer/management' ) active open @endif
            @if( request()->path() == 'admin/customer/balance' || request()->path() == 'admin/customer/balance' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">Customer Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/customer/management' ) active open @endif
                    @if( request()->path() == '' ) active open @endif">
                        <a href="{{route('customer.index')}}" class="nav-link ">
                            <span class="title">Customer</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/customer/balance' ) active open @endif
                    @if( request()->path() == '' ) active open @endif">
                        <a href="{{route('balance.index')}}" class="nav-link ">
                            <span class="title">Balance</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/products' || request()->path() == 'admin/products' ) active open @endif
            @if( request()->path() == 'admin/category' || request()->path() == 'admin/category' ) active open @endif
            @if( request()->path() == 'admin/product/stock' || request()->path() == 'admin/product/stock' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-indent" aria-hidden="true"></i>
                    <span class="title">Inventory Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/category' ) active open @endif">
                        <a href="{{route('product.catagory.index')}}" class="nav-link ">
                            <span class="title">Product Category</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/products' ) active open @endif">
                        <a href="{{route('product.index')}}" class="nav-link ">
                            <span class="title">Product Management</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/product/stock' ) active open @endif">
                        <a href="{{route('product.stock')}}" class="nav-link ">
                            <span class="title">Product Stock / Warehouse</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/sale' || request()->path() == 'admin/sale' ) active open @endif
            @if( request()->path() == 'admin/stock/product/history' || request()->path() == 'admin/stock/product/history' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-print" aria-hidden="true"></i>
                    <span class="title">Generate Invoice</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/sale' ) active open @endif
                    @if( request()->path() == '' ) active open @endif">
                        <a href="{{route('product.sale.index')}}" class="nav-link ">
                            <span class="title">Sale Management</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/stock/product/history' ) active open @endif">
                        <a href="{{route('sold.index')}}" class="nav-link ">
                            <span class="title">Sold History</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/bank' || request()->path() == 'admin/bank' ) active open @endif
            @if( request()->path() == 'admin/transaction' || request()->path() == 'admin/transaction' ) active open @endif
            @if( request()->path() == 'admin/add/transaction' || request()->path() == 'admin/add/transaction' ) active open @endif
            @if( request()->path() == 'admin/expense/history' || request()->path() == 'admin/expense/history' ) active open @endif
            @if( request()->path() == 'admin/bank/transaction' || request()->path() == 'admin/bank/transaction' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bold" aria-hidden="true"></i>
                    <span class="title">Bank Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/bank' ) active open @endif">
                        <a href="{{route('bank.account.index')}}" class="nav-link ">
                            <span class="title">Bank Account</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/bank/transaction' ) active open @endif
                    @if( request()->path() == 'admin/bank/transaction' ) active open @endif">
                        <a href="{{route('transaction.index')}}" class="nav-link ">
                            <span class="title">Credit/Balance</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/add/transaction' ) active open @endif
                    @if( request()->path() == 'admin/transaction' ) active open @endif
                    @if( request()->path() == 'admin/expense/history' ) active open @endif">
                        <a href="{{route('expanse.transaction.index')}}" class="nav-link ">
                            <span class="title">Transaction</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/supplier' || request()->path() == 'admin/supplier' ) active open @endif
            @if( request()->path() == 'admin/supply/management' || request()->path() == 'admin/supply/management' ) active open @endif
            @if( request()->path() == 'admin/supply/reports' || request()->path() == 'admin/supply/reports' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-ticket" aria-hidden="true"></i>
                    <span class="title">Supplier Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/supplier' ) active open @endif">
                        <a href="{{route('supplier.index')}}" class="nav-link ">
                            <span class="title">Manage Suppliers</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/supply/management' ) active open @endif">
                        <a href="{{route('supply.management')}}" class="nav-link ">
                            <span class="title">Supply Management</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/supply/reports' ) active open @endif">
                        <a href="{{route('supply.reports')}}" class="nav-link ">
                            <span class="title">Reports</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/add/personal/loan' || request()->path() == 'admin/add/personal/loan' ) active open @endif
            @if( request()->path() == 'admin/personal/loan' || request()->path() == 'admin/personal/loan' ) active open @endif
            @if( request()->path() == 'admin/office/loan' || request()->path() == 'admin/office/loan' ) active open @endif
            @if( request()->path() == 'admin/add/office/loan' || request()->path() == 'admin/add/office/loan' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="title">Loan Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if( request()->path() == 'admin/add/personal/loan' || request()->path() == 'admin/add/personal/loan' ) active open @endif
                    @if( request()->path() == 'admin/personal/loan' || request()->path() == 'admin/personal/loan' ) active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Personal Loan</span>
                            <span class="arrow open"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  @if( request()->path() == 'admin/add/personal/loan' ) active open @endif
                            @if( request()->path() == '' ) active open @endif">
                                <a href="{{route('personal.loan.index')}}" class="nav-link ">
                                    <span class="title">Add Person</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/personal/loan' ) active open @endif
                            @if( request()->path() == '' ) active open @endif">
                                <a href="{{route('manage.loan')}}" class="nav-link ">
                                    <span class="title">Manage Loan</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/add/purchase' || request()->path() == 'admin/add/purchase' ) active open @endif
            @if( request()->path() == 'admin/purchase' || request()->path() == 'admin/purchase' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="title">Purchase Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/add/purchase' ) active open @endif">
                        <a href="{{route('add.purchase')}}" class="nav-link ">
                            <span class="title">Add Purchase</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/purchase' ) active open @endif">
                        <a href="{{route('purchase.reports')}}" class="nav-link ">
                            <span class="title">Purchase Reports</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/create/project' || request()->path() == 'admin/create/project' ) active open @endif
            @if( request()->path() == 'admin/projects' || request()->path() == 'admin/projects' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                    <span class="title">Project Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/create/project' ) active open @endif">
                        <a href="{{route('project.create')}}" class="nav-link ">
                            <span class="title">Start New Project</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/projects' ) active open @endif">
                        <a href="{{route('project.index')}}" class="nav-link ">
                            <span class="title">Manage Project</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/send/proposal' || request()->path() == 'admin/send/proposal' ) active open @endif
            @if( request()->path() == 'admin/proposal/history' || request()->path() == 'admin/proposal/history' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                    <span class="title">Proposal Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/send/proposal' ) active open @endif">
                        <a href="{{route('send.proposal')}}" class="nav-link ">
                            <span class="title">Send Proposal</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/proposal/history' ) active open @endif">
                        <a href="{{route('proposal.history')}}" class="nav-link ">
                            <span class="title">History</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/news' || request()->path() == 'admin/news' ) active open @endif
            @if( request()->path() == 'admin/newsletter/history' || request()->path() == 'admin/newsletter/history' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span class="title">NewsLetter</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/news' ) active open @endif">
                        <a href="{{route('send.news.email')}}" class="nav-link ">
                            <span class="title">Send</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/newsletter/history' ) active open @endif">
                        <a href="{{route('news.letter.history')}}" class="nav-link ">
                            <span class="title">History</span>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="nav-item @if( request()->path() == 'admin/note' || request()->path() == 'admin/note' ) active open @endif
            @if( request()->path() == 'admin/note/list' || request()->path() == 'admin/note/list' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                    <span class="title">Note / Draft</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/note' ) active open @endif">
                        <a href="{{route('note.add')}}" class="nav-link ">
                            <span class="title">Add</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/note/list' ) active open @endif">
                        <a href="{{route('note.index')}}" class="nav-link ">
                            <span class="title">Manage</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/add/knowledge/based' || request()->path() == 'admin/add/knowledge/based' ) active open @endif
            @if( request()->path() == 'admin/knowledge/based' || request()->path() == 'admin/knowledge/based' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-leanpub" aria-hidden="true"></i>
                    <span class="title">Knowledge Based</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/add/knowledge/based' ) active open @endif">
                        <a href="{{route('knowledge.add.admin')}}" class="nav-link ">
                            <span class="title">Add New</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/knowledge/based' ) active open @endif">
                        <a href="{{route('knowledge.index')}}" class="nav-link ">
                            <span class="title">Manage</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/contact' || request()->path() == 'admin/contact' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a href="{{route('contact.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                    <span class="title">Contact List</span>
                </a>
            </li>



            @php $check_count = \App\Ticket::where('status', 1)->get() @endphp

            <li class="nav-item @if( request()->path() == 'admin/supports' || request()->path() == 'admin/supports' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a href="{{route('support.admin.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-ticket" aria-hidden="true"></i>
                    <span class="title">Support <span class="badge badge-danger">{{count($check_count)}} </span></span>
                </a>
            </li>


            <li class="nav-item start @php echo "active",(request()->path() != 'admin/general')?:"";@endphp">
                <a href="{{route('general.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-cog"></i>
                    <span class="title">General Management</span>
                    <span class="selected"></span>
                </a>
            </li>

        </ul>

    </div>
</div>
