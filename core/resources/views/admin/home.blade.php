@extends('backend.master')

@section('site-title')
    DashBoard Of Admin
@endsection

@section('main-content')
    @if(Session::has('msg'))
        <script>
            $(document).ready(function(){
                swal("{{Session::get('msg')}}","", "success");
            });
        </script>
    @endif
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @if (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h4 class="page-title"> Dashboard
                <small>dashboard & statistics</small>
            </h4>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{\App\Cutomer::count('id')}}">0</span>
                            </div>
                            <div class="desc"> Total Customer </div>
                        </div>
                        <a class="more" href="{{url('admin/customer/management')}}"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{\App\SalePoint::count('id')}}">0</span></div>
                            <div class="desc"> Total Sold Time </div>
                        </div>
                        <a class="more" href="{{url('admin/stock/product/history')}}"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{\App\Warehouse::count('id')}}">0</span>
                            </div>
                            <div class="desc"> Total Warehouse </div>
                        </div>
                        <a class="more" href="{{url('admin/product/stock')}}"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-11">
                    <div id="myfirstchart" style="height: 450px; width: 100%;"></div>

                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            new Morris.Bar({
                element: 'myfirstchart',
                data: @php echo $main_chart_data @endphp,
                xkey: 'year',
                ykeys: ['value'],
                // chart.
                labels: ['Value']
            });
        });
    </script>
@endsection