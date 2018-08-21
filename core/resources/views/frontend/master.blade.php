<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>@yield('title')</title>
@include('frontend.template-parts.style')
</head>

<body>

<div class="style-switcher-panel">
>
    <div class="switcher-panel-box">
        <div class="switcher-panel-spinner">
            <a class="switcher-panel-icon" href=""><i class="fa fa-cog fa-spin"></i></a>
        </div>
        <h3 class="text-center">Color Switcher</h3>
        <p class="text-center">Choose Your Color</p>
        <div class="switcher-colors">
            <span class="color-base"></span>
            <span class="color-one"></span>
            <span class="color-two"></span>
            <span class="color-three"></span>
            <span class="color-four"></span>
            <span class="color-five"></span>
            <span class="color-six"></span>
            <span class="color-seven"></span>
            <span class="color-eight"></span>
            <span class="color-nine"></span>
            <span class="color-ten"></span>
            <span class="color-eleven"></span>
        </div>
    </div>

</div>


<div class="site-preloader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>



<div id="body-wrap">

    <header class="header">

        <div class="header-top">

            <div class="container">

                <div class="row">
                    <div class="col-sm-2 col-xs-12">
                        <select class="form-control bs-select select-lang">
                            <option value="English" selected>English</option>
                            <option value="Dutch">Dutch</option>
                            <option value="France">France</option>
                            <option value="Italian">Italian</option>
                        </select>
                    </div>
                    <div class="col-sm-5 col-xs-12">
                        <div class="topbar-contact-info">
                            <ul>
                                <li><i class="fa fa-phone"></i> +880 12345 6789 <small>&#124;</small></li>
                                <li><i class="fa fa-clock-o"></i> 9.00 am - 5.00 pm</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="header-social-icon">
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <ul class="text-right header-login-sign">
                            <li><a href="login-1.html"><i class="fa fa-user"></i> Login</a></li>
                            <li><a href="registration-1.html"><i class="fa fa-plus"></i> Sign Up</a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>


        <div class="clearfix"></div>

        <div class="mainmenu" data-spy="affix" data-offset-top="197">

            <nav class="navbar navbar-default">

                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index-one.html">
                            <img style="height: 50px" class="img-responsive" src="{{asset('assets/images/logo/'.$general->image)}}" alt="">
                        </a>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">

                        <ul class="nav navbar-nav">
                            <li class="dropdown has-submenu active">
                                <a href="index-one-layout-1.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <b class="caret"></b></a>


                            </li>
                            <li class="dropdown has-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listing <b class="caret"></b></a>
                                <ul class="drop-down-menu">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listing 1</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-one-map.html">Map Layout</a></li>
                                            <li><a href="listing-one-full-width.html">Full Width</a></li>
                                            <li><a href="listing-one-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-one-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listing 2</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-two-map.html">Map Layout</a></li>
                                            <li><a href="listing-two-full-width.html">Full Width</a></li>
                                            <li><a href="listing-two-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-two-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listing 3</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-three-map.html">Map Layout</a></li>
                                            <li><a href="listing-three-full-width.html">Full Width</a></li>
                                            <li><a href="listing-three-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-three-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listing 4</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-four-map.html">Map Layout</a></li>
                                            <li><a href="listing-four-full-width.html">Full Width</a></li>
                                            <li><a href="listing-four-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-four-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listing Single</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-single-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-single-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="listing-single-without-sidebar.html">Without Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown has-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <b class="caret"></b></a>
                                <ul class="drop-down-menu">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Business</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-business-map.html">Map Layout</a></li>
                                            <li><a href="listing-business-full-width.html">Full Width</a></li>
                                            <li><a href="listing-business-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-business-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Classified Ads</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-ads-map.html">Map Layout</a></li>
                                            <li><a href="listing-ads-full-width.html">Full Width</a></li>
                                            <li><a href="listing-ads-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-ads-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Doctor</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-doctor-map.html">Map Layout</a></li>
                                            <li><a href="listing-doctor-full-width.html">Full Width</a></li>
                                            <li><a href="listing-doctor-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-doctor-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Event</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-event-map.html">Map Layout</a></li>
                                            <li><a href="listing-event-full-width.html">Full Width</a></li>
                                            <li><a href="listing-event-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-event-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Job Board</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-job-board-map.html">Map Layout</a></li>
                                            <li><a href="listing-job-board-full-width.html">Full Width</a></li>
                                            <li><a href="listing-job-board-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-job-board-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Real Estate</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-realestate-map.html">Map Layout</a></li>
                                            <li><a href="listing-realestate-full-width.html">Full Width</a></li>
                                            <li><a href="listing-realestate-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-realestate-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Restaurant</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-restaurant-map.html">Map Layout</a></li>
                                            <li><a href="listing-restaurant-full-width.html">Full Width</a></li>
                                            <li><a href="listing-restaurant-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-restaurant-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transport & Vehicles</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-transport-map.html">Map Layout</a></li>
                                            <li><a href="listing-transport-full-width.html">Full Width</a></li>
                                            <li><a href="listing-transport-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-transport-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Travel & Hotel</a>
                                        <ul class="sub-menu">
                                            <li><a href="listing-travel-hotel-map.html">Map Layout</a></li>
                                            <li><a href="listing-travel-hotel-full-width.html">Full Width</a></li>
                                            <li><a href="listing-travel-hotel-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="listing-travel-hotel-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown has-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <b class="caret"></b></a>
                                <ul class="drop-down-menu">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Layout 1</a>
                                        <ul class="sub-menu">
                                            <li><a href="admin-dashboard-1.html">Dashboard</a></li>
                                            <li><a href="admin-general-setting-1.html">General Setting</a></li>
                                            <li><a href="admin-listings-1.html">Listings</a></li>
                                            <li><a href="admin-add-listing-1.html">Add Listing</a></li>
                                            <li><a href="admin-sales-1.html">Sales</a></li>
                                            <li><a href="admin-invoice-1.html">Invoice</a></li>
                                            <li><a href="admin-transaction-1.html">Transaction</a></li>
                                            <li><a href="admin-payment-1.html">Payment</a></li>
                                            <li><a href="admin-analytics-1.html">Analytics</a></li>
                                            <li><a href="admin-message-1.html">Message</a></li>
                                            <li><a href="admin-profile-1.html">Profile</a></li>
                                            <li><a href="admin-security-setting-1.html">Security Setting</a></li>
                                            <li><a href="admin-privacy-setting-1.html">Privacy Setting</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Layout 2</a>
                                        <ul class="sub-menu">
                                            <li><a href="admin-dashboard-2.html">Dashboard</a></li>
                                            <li><a href="admin-general-setting-2.html">General Setting</a></li>
                                            <li><a href="admin-listings-2.html">Listings</a></li>
                                            <li><a href="admin-add-listing-2.html">Add Listing</a></li>
                                            <li><a href="admin-sales-2.html">Sales</a></li>
                                            <li><a href="admin-invoice-2.html">Invoice</a></li>
                                            <li><a href="admin-transaction-2.html">Transaction</a></li>
                                            <li><a href="admin-payment-2.html">Payment</a></li>
                                            <li><a href="admin-analytics-2.html">Analytics</a></li>
                                            <li><a href="admin-message-2.html">Message</a></li>
                                            <li><a href="admin-profile-2.html">Profile</a></li>
                                            <li><a href="admin-security-setting-2.html">Security Setting</a></li>
                                            <li><a href="admin-privacy-setting-2.html">Privacy Setting</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Layout 3</a>
                                        <ul class="sub-menu">
                                            <li><a href="admin-dashboard-3.html">Dashboard</a></li>
                                            <li><a href="admin-general-setting-3.html">General Setting</a></li>
                                            <li><a href="admin-listings-3.html">Listings</a></li>
                                            <li><a href="admin-add-listing-3.html">Add Listing</a></li>
                                            <li><a href="admin-sales-3.html">Sales</a></li>
                                            <li><a href="admin-invoice-3.html">Invoice</a></li>
                                            <li><a href="admin-transaction-3.html">Transaction</a></li>
                                            <li><a href="admin-payment-3.html">Payment</a></li>
                                            <li><a href="admin-analytics-3.html">Analytics</a></li>
                                            <li><a href="admin-message-3.html">Message</a></li>
                                            <li><a href="admin-profile-3.html">Profile</a></li>
                                            <li><a href="admin-security-setting-3.html">Security Setting</a></li>
                                            <li><a href="admin-privacy-setting-3.html">Privacy Setting</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
                                        <ul class="sub-menu">
                                            <li><a href="login-1.html">Layout 1</a></li>
                                            <li><a href="login-2.html">Layout 2</a></li>
                                            <li><a href="login-3.html">Layout 3</a></li>
                                            <li><a href="login-4.html">Layout 4</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registration <b class="caret"></b></a>
                                        <ul class="sub-menu">
                                            <li><a href="registration-1.html">Layout 1</a></li>
                                            <li><a href="registration-2.html">Layout 2</a></li>
                                            <li><a href="registration-3.html">Layout 3</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reset Password</a>
                                        <ul class="sub-menu">
                                            <li><a href="reset-password-1.html">Layout 1</a></li>
                                            <li><a href="reset-password-2.html">Layout 2</a></li>
                                            <li><a href="reset-password-3.html">Layout 3</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pricing</a>
                                        <ul class="sub-menu">
                                            <li><a href="pricing-1.html">Layout 1</a></li>
                                            <li><a href="pricing-2.html">Layout 2</a></li>
                                            <li><a href="pricing-3.html">Layout 3</a></li>
                                            <li><a href="pricing-4.html">Layout 4</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Team</a>
                                        <ul class="sub-menu">
                                            <li><a href="team-1.html">Layout 1</a></li>
                                            <li><a href="team-2.html">Layout 2</a></li>
                                            <li><a href="team-3.html">Layout 3</a></li>
                                            <li><a href="team-4.html">Layout 4</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us</a>
                                        <ul class="sub-menu">
                                            <li><a href="about-us-1.html">Layout 1</a></li>
                                            <li><a href="about-us-2.html">Layout 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Coming Soon</a>
                                        <ul class="sub-menu">
                                            <li><a href="coming-soon-1.html">Coming Soon 1</a></li>
                                            <li><a href="coming-soon-2.html">Coming Soon 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Others</a>
                                        <ul class="sub-menu">
                                            <li><a href="doctor-appoinment.html">Appoinment</a></li>
                                            <li><a href="booking-page.html">Booking</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown has-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <b class="caret"></b></a>
                                <ul class="drop-down-menu">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grid Layout 1</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-grid-col-2.html">Column Two</a></li>
                                            <li><a href="blog-grid-col-3.html">Column Three</a></li>
                                            <li><a href="blog-grid-col-4.html">Column Four</a></li>
                                            <li><a href="blog-grid-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="blog-grid-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grid Layout 2</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-grid-two-col-2.html">Column Two</a></li>
                                            <li><a href="blog-grid-two-col-3.html">Column Three</a></li>
                                            <li><a href="blog-grid-two-col-4.html">Column Four</a></li>
                                            <li><a href="blog-grid-two-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="blog-grid-two-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">List Layout</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-list.html">List One</a></li>
                                            <li><a href="blog-list-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="blog-list-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Masonry Layout</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-masonry-col-2.html">Column Two</a></li>
                                            <li><a href="blog-masonry-col-3.html">Column Three</a></li>
                                            <li><a href="blog-masonry-col-4.html">Column Four</a></li>
                                            <li><a href="blog-masonry-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="blog-masonry-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog Single</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-single-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="blog-single-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="blog-single-without-sidebar.html">Without Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown has-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact <b class="caret"></b></a>
                                <ul class="drop-down-menu">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact 1</a>
                                        <ul class="sub-menu">
                                            <li><a href="contact-one-layout-1.html">Layout 1</a></li>
                                            <li><a href="contact-one-layout-2.html">Layout 2</a></li>
                                            <li><a href="contact-one-layout-3.html">Layout 3</a></li>
                                            <li><a href="contact-one-layout-4.html">Layout 4</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact 2</a>
                                        <ul class="sub-menu">
                                            <li><a href="contact-two-layout-1.html">Layout 1</a></li>
                                            <li><a href="contact-two-layout-2.html">Layout 2</a></li>
                                            <li><a href="contact-two-layout-3.html">Layout 3</a></li>
                                            <li><a href="contact-two-layout-4.html">Layout 4</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact 3</a>
                                        <ul class="sub-menu">
                                            <li><a href="contact-three-layout-1.html">Layout 1</a></li>
                                            <li><a href="contact-three-layout-2.html">Layout 2</a></li>
                                            <li><a href="contact-three-layout-3.html">Layout 3</a></li>
                                            <li><a href="contact-three-layout-4.html">Layout 4</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="listing-grid-layout-2.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact 4</a>
                                        <ul class="sub-menu">
                                            <li><a href="contact-four-layout-1.html">Layout 1</a></li>
                                            <li><a href="contact-four-layout-2.html">Layout 2</a></li>
                                            <li><a href="contact-four-layout-3.html">Layout 3</a></li>
                                            <li><a href="contact-four-layout-4.html">Layout 4</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <div class="navbar-right">
                            <div class="header-search-icon">
                                <form action="index.html">
                                    <input placeholder="Search ..." type="search">
                                </form>
                            </div>
                            <div class="add-listing-btn float-right"><a href="admin-add-listing-2.html">Post Job</a></div>
                        </div>

                    </div>
                </div>

            </nav>

        </div>

    </header>


@yield('content')


    <footer class="footer">

        <div class="footer-top">

            <div class="container">

                <div class="row">

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-cont-details">
                            <h5 class="text-left text-upper">About us</h5>
                            <div class="border-line"></div>
                            <img class="img-responsive" src="{{url('/')}}/assets/frontend/images/logo/logo-footer.png" alt="">
                            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="footer-address">
                                <p class="text-left"><i class="fa fa-map-marker"></i> Dhaka, Bangladesh</p>
                                <p class="text-left"><i class="fa fa-phone"></i> (880) 12345 6789</p>
                                <p class="text-left"><i class="fa fa-envelope"></i> example@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-categories">
                            <h5 class="text-left text-upper">Popular Categories</h5>
                            <div class="border-line"></div>
                            <div class="footer-categories-links">
                                <ul>
                                    <li><a href=""><i class="fa fa-truck"></i> Real Estate</a></li>
                                    <li><a href=""><i class="fa fa-plane"></i> Travel & Transport </a></li>
                                    <li><a href=""><i class="fa fa-truck"></i> Automotive</a></li>
                                    <li><a href=""><i class="fa fa-bank"></i> Business Services</a></li>
                                    <li><a href=""><i class="fa fa-phone"></i> Entertainment</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-flickr">
                            <h5 class="text-left text-upper">Flickr Stream</h5>
                            <div class="border-line"></div>
                            <div class="flicker-img">
                                <ul>
                                    <li>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-1.jpg" alt=""></a>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-2.jpg" alt=""></a>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-3.jpg" alt=""></a>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-4.jpg" alt=""></a>
                                    </li>
                                    <li>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-5.jpg" alt=""></a>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-6.jpg" alt=""></a>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-7.jpg" alt=""></a>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-8.jpg" alt=""></a>
                                    </li>
                                    <li>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-9.jpg" alt=""></a>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-10.jpg" alt=""></a>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-11.jpg" alt=""></a>
                                        <a href=""><img src="{{url('/')}}/assets/frontend/images/flickr/flickr-1.jpg" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-left"><a href="">View Stream On Flickr</a></p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-contact-form">
                            <h5 class="text-left text-upper">Feeadback</h5>
                            <div class="border-line"></div>
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                    <input type="text" class="form-control" placeholder="Email">
                                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary cont-frm-btn">Send Message</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="footer-bottom">

            <div class="container">

                <div class="row">

                    <div class="col-sm-6 col-xs-12">
                        <div class="copy-right-text">
                            <p class="text-left">&copy; 2017 Dlisting. All rights reserved.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="footer-menu">
                            <nav>
                                <ul>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Categories</a></li>
                                    <li><a href="">Pages</a></li>
                                    <li><a href="">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="totop">

            <a href="#top"><i class="fa fa-angle-up"></i></a>
        </div>

    </footer>

</div>



@include('frontend.template-parts.script')

</body>

</html>
