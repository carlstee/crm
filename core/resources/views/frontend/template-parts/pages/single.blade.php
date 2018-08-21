@extends('frontend.master')
@section('content')
    <!--Start Blog Single Section-->
    <section class="blog-single">
        <!--Start Page Header-->
        <div class="page-header page-bg">
            <div class="page-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-content">
                            <h2 class="text-center">BLOG SINGLE</h2>
                            <h4 class="text-center"><span><a href="">Home</a></span> / <span>Blog Single</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Header-->

        <!--Start Blog Single Wrap-->
        <div class="blog-single-wrap">
            <!--Start container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <!--Start Blog Post Col-->
                    <div class="col-md-9 col-sm-8">
                        <!--Start Blog Post Article-->
                        <article class="blog-post">
                            <div class="post-meta">
                                <h2><a class="text-bold" href="blog-single.html">Lorem ipsum dolor sit amet.</a></h2>
                                <span><i class="fa fa-clock-o"></i> 30 March, 2017</span>
                                <small class="xs-hidden">&#124;</small>
                                <span><a href=""><i class="fa fa-user"></i> John Doe</a></span>
                                <small class="xs-hidden">&#124;</small>
                                <span><a href=""><i class="fa fa-comments-o"></i> Comments: 23</a></span>
                            </div>
                            <div class="post-media">
                                <a href="blog-single.html">
                                    <img class="img-responsive" src="images/blog/blog-post-single.jpg" alt="image">
                                </a>
                            </div>
                            <div class="post-content">
                                <p class="text-left">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore fugiat nulla pariatur. </p>

                                <p class="text-left">Excepteur sint occaecat cupidatat non proident, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation commodo consequat.Excepteur sint occaecat cupidatat non proident, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </article>
                        <!--End Blog Post Article-->

                        <!--Start Blog Social Share Icons-->
                        <div class="blog-post-social-share">
                            <h3>Share Post:</h3>
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <!--End Blog Social Share Icons-->

                        <!--Start Comments List-->
                        <div class="comments-list">
                            <h3>Comments (2)</h3>
                            <span class="comment-border"></span>
                            <div class="row">
                                <div class="post-comment-text">
                                    <div class="col-sm-2">
                                        <div class="comment-author-avator">
                                            <img class="img-responsive" src="images/client/man-4.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="author-comment-text">
                                            <h4 class="text-bold">John Williams <span class="float-right"><a href="" class="reply-btn">Reply</a></span></h4>
                                            <p class="color-dark">11 hours ago</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comment-text replay-text">
                                    <div class="col-sm-offset-2 col-sm-2">
                                        <div class="comment-author-avator">
                                            <img class="img-responsive" src="images/client/man-5.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="author-comment-text replay-text">
                                            <h4 class="text-bold">John Williams <span class="float-right"><a href="" class="reply-btn">Reply</a></span></h4>
                                            <p class="color-dark">19 minutes ago</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comment-text replay-text">
                                    <div class="col-sm-offset-2 col-sm-2">
                                        <div class="comment-author-avator">
                                            <img class="img-responsive" src="images/client/man-6.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="author-comment-text ">
                                            <h4 class="text-bold">John Williams <span class="float-right"><a href="" class="reply-btn">Reply</a></span></h4>
                                            <p class="color-dark">15 Feb, 2017</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comment-text">
                                    <div class="col-sm-2">
                                        <div class="comment-author-avator">
                                            <img class="img-responsive" src="images/client/man-7.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="author-comment-text border-none">
                                            <h4 class="text-bold">John Williams <span class="float-right"><a href="" class="reply-btn">Reply</a></span></h4>
                                            <p class="color-dark">11 hours ago</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Comments List-->

                        <!--Start Comment Form-->
                        <div class="comment-form">
                            <h3>Leave a Comment</h3>
                            <span class="comment-border"></span>
                            <form>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="usr" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="usr-eml" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="url" class="form-control" id="url" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="10" id="comment" placeholder="Write Your Comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="post-comment-btn">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Comment Form-->
                    </div>
                    <!--End Blog Post Col-->

                    <!--Start Sidebar Col-->
                    <div class="col-md-3 col-sm-4">
                        <!--Start Sidebar-->
                        <div class="blog-sidebar">
                            <!--Start Search Widget-->
                            <div class="widget widget-search">
                                <input type="text" name="search" placeholder="Search.." class="form-control">
                                <span class="widget-search-icon"><i class="fa fa-search"></i></span>
                            </div>
                            <!--End Search Widget-->

                            <!--Start Category Widget-->
                            <div class="widget widget-category">
                                <h4 class="text-left text-bold">CATEGORIES</h4>
                                <ul>
                                    <li><a href="">Real estate<span class="widget-arrow-icon">(26)</span></a></li>
                                    <li><a href="">Travel & Transports <span class="widget-arrow-icon">(32)</span></a></li>
                                    <li><a href="">Automotive <span class="widget-arrow-icon">(19)</span></a></li>
                                    <li><a href="">Restrurants <span class="widget-arrow-icon">(48)</span></a></li>
                                    <li><a href="">Hotel <span class="widget-arrow-icon">(23)</span></a></li>
                                    <li><a href="">Entertainment <span class="widget-arrow-icon">(36)</span></a></li>
                                </ul>
                            </div>
                            <!--End Category Widget-->

                            <!--Start Recent Post Widget-->
                            <div class="widget widget-recent-post">
                                <h4 class="text-left text-bold">RECENT POSTS</h4>
                                <div class="recent-post">
                                    <div class="left-side-post float-left">
                                        <a href=""><img class="img-responsive" src="images/restaurant/img-2.jpg" alt=""></a>
                                    </div>
                                    <div class="right-side-post float-left">
                                        <h5><a href="">Delicious Foods Are Available </a></h5>
                                        <p class="color-dark"><i class="fa fa-clock-o"></i> 20 March 2017</p>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="left-side-post float-left">
                                        <a href=""><img class="img-responsive" src="images/transport/car-p-1.jpg" alt=""></a>
                                    </div>
                                    <div class="right-side-post float-left">
                                        <h5><a href="">Brand New Model Car Foe Sale</a></h5>
                                        <p class="color-dark"><i class="fa fa-clock-o"></i> 13 April 2017</p>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="left-side-post float-left">
                                        <a href=""><img class="img-responsive" src="images/real-estate/img-6.jpg" alt=""></a>
                                    </div>
                                    <div class="right-side-post float-left">
                                        <h5><a href="">Family Flat For Rent</a></h5>
                                        <p class="color-dark"><i class="fa fa-clock-o"></i> 19 May 2017</p>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="left-side-post float-left">
                                        <a href=""><img class="img-responsive" src="images/restaurant/img-6.jpg" alt=""></a>
                                    </div>
                                    <div class="right-side-post float-left">
                                        <h5><a href="">Awesome CafeMela Restaurant</a></h5>
                                        <p class="color-dark"><i class="fa fa-clock-o"></i> 29 June 2017</p>
                                    </div>
                                </div>
                            </div>
                            <!--End Recent Post Widget-->

                            <!--Start Tagcloud Widget-->
                            <div class="widget widget-tagcloud">
                                <h4 class="text-left text-bold">TAGS</h4>
                                <ul class="tagcloud-list">
                                    <li><a href="">Ads</a></li>
                                    <li><a href="">Business</a></li>
                                    <li><a href="">Doctor</a></li>
                                    <li><a href="">Job Board</a></li>
                                    <li><a href="">Event</a></li>
                                    <li><a href="">Hotel</a></li>
                                    <li><a href="">Real Estate</a></li>
                                    <li><a href="">Restaurant</a></li>
                                    <li><a href="">Travel</a></li>
                                    <li><a href="">Transport</a></li>
                                </ul>
                            </div>
                            <!--End Tagcloud Widget-->

                            <!--Start Archive Widget-->
                            <div class="widget widget-archive">
                                <h4 class="text-left text-bold">ARCHIEVE</h4>
                                <ul>
                                    <li><a href="">Nov 2016<span class="widget-arrow-icon">(32)</span></a></li>
                                    <li><a href="">Dec 2016 <span class="widget-arrow-icon">(19)</span></a></li>
                                    <li><a href="">Jan 2017 <span class="widget-arrow-icon">(48)</span></a></li>
                                    <li><a href="">Feb 2016<span class="widget-arrow-icon">(26)</span></a></li>
                                    <li><a href="">Mar 2017<span class="widget-arrow-icon">(23)</span></a></li>
                                    <li><a href="">Apr 2017<span class="widget-arrow-icon">(36)</span></a></li>
                                </ul>
                            </div>
                            <!--End Archive Widget-->

                            <!--Start Ads Widget-->
                            <div class="widget widget-ads">
                                <!--Start Category Widget-->
                                <h4 class="text-left text-bold">ADVERTISEMENT</h4>
                                <a href=""><img src="images/blog/blog-ads-1.jpg" alt=""></a>
                                <a href=""><img src="images/blog/blog-ads-2.jpg" alt=""></a>
                            </div>
                            <!--End Ads Widget-->
                        </div>
                        <!--End Sidebar-->
                    </div>
                    <!--End Sidebar Col-->
                </div>
                <!--End Row-->
            </div>
            <!--End container-->
            <div class="building-img"></div>
        </div>
        <!--End Blog Single Wrap-->
    </section>
    <!--End Blog Single Section-->
@endsection