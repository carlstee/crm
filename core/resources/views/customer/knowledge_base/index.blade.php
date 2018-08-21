@extends('customer.layout.auth')
@section('site-title')
    Knowledge Base List
@endsection

@section('style')
   <style>
       @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700);

       .blog-card {
           transition: height 0.3s ease;
           -webkit-transition: height 0.3s ease;
           background: #fff;
           border-radius: 3px;
           box-shadow: 0 3px 7px -3px rgba(0, 0, 0, 0.3);
           margin: 0 auto 1.6%;
           overflow: hidden;
           position: relative;
           font-size: 14px;
           line-height: 1.45em;
           -webkit-font-smoothing: antialiased;
           -moz-osx-font-smoothing: grayscale;
       }
       .blog-card:hover .details {
           left: 0;
       }
       .blog-card:hover.alt .details {
           right: 0;
       }
       .blog-card.alt .details {
           right: -100%;
           left: inherit;
       }
       .blog-card .photo {
           height: 200px;
           position: relative;
       }
       .blog-card .photo.photo1 {
           background: url("http://i62.tinypic.com/34oq4o0.jpg") center no-repeat;
           background-size: cover;
       }
       .blog-card .photo.photo2 {
           background: url("http://i60.tinypic.com/xeiv79.jpg") center no-repeat;
           background-size: cover;
       }
       .blog-card .details {
           transition: all 0.3s ease;
           -webkit-transition: all 0.3s ease;
           background: rgba(0, 0, 0, 0.6);
           box-sizing: border-box;
           color: #fff;
           font-family: "Open Sans";
           list-style: none;
           margin: 0;
           padding: 10px 15px;
           height: 200px;
           /*POSITION*/
           position: absolute;
           top: 0;
           left: -100%;
       }
       .blog-card .details > li {
           padding: 3px 0;
       }
       .blog-card .details li:before, .blog-card .details .tags ul:before {
           font-family: FontAwesome;
           margin-right: 10px;
           vertical-align: middle;
       }
       .blog-card .details .author:before {
           content: "\f007";
       }
       .blog-card .details .date:before {
           content: "\f133";
       }
       .blog-card .details .tags ul {
           list-style: none;
           margin: 0;
           padding: 0;
       }
       .blog-card .details .tags ul:before {
           content: "\f02b";
       }
       .blog-card .details .tags li {
           display: inline-block;
           margin-right: 3px;
       }
       .blog-card .details a {
           color: inherit;
           border-bottom: 1px dotted;
       }
       .blog-card .details a:hover {
           color: #75d13b;
       }
       .blog-card .description {
           padding: 10px;
           box-sizing: border-box;
           position: relative;
       }
       .blog-card .description h1 {
           font-family: "Roboto";
           line-height: 1em;
           margin: 0 0 10px 0;
       }
       .blog-card .description h2 {
           color: #9b9b9b;
           font-family: "Open Sans";
           line-height: 1.2em;
           text-transform: uppercase;
           font-size: 1em;
           font-weight: 400;
           margin: 1.2% 0;
       }
       .blog-card .description p {
           position: relative;
           margin: 0;
           padding-top: 20px;
       }

       .blog-card .description a {
           color: #75d13b;
           margin-bottom: 10px;
           float: right;
       }
       .blog-card .description a:after {
           transition: all 0.3s ease;
           -webkit-transition: all 0.3s ease;
           content: "\f061";
           font-family: FontAwesome;
           margin-left: -10px;
           opacity: 0;
           vertical-align: middle;
       }
       .blog-card .description a:hover:after {
           margin-left: 5px;
           opacity: 1;
       }
       @media screen and (min-width: 600px) {
           .blog-card.alt .details {
               padding-left: 30px;
           }
           .blog-card.alt .description {
               float: right;
           }
           .blog-card.alt .description:before {
               transform: skewX(5deg);
               right: -15px;
               left: inherit;
           }

           .blog-card .details {
               width: 40%;
           }
           .blog-card .description {

               z-index: 0;
           }
           .blog-card .description:before {
               transform: skewX(-5deg);
               content: "";
               background: #fff;
               width: 100%;
               z-index: -1;
               /*POSITION*/
               position: absolute;
               left: -15px;
               top: 0;
               bottom: 0;
           }
       }

   </style>
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-trophy"></i>Knowledge Base List
                </div>
            </div>

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">

                            @foreach( $knoledge as $key=>$data)
                            <div class="blog-card">
                                <div class="description">
                                    <h1>{{$data->title}}</h1>
                                    <h2>Category:  {{$data->know_category->name}}</h2>
                                    <p class="summary">{{Short_Text($data->detail,50)}}</p>
                                    <a href="#detailModal{{$data->id}}" data-toggle="modal" >Read More</a>
                                </div>
                            </div>
                                <div id="detailModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title bold">{{$data->title}}</h2>
                                            </div>
                                            <div class="modal-body">
                                                <p>{!! $data->detail !!}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{--@foreach( $knoledge as $key=>$data) --}}
                                {{--<div class="col-md-12" style="margin-bottom: 5px; border: 1px solid #b0c1d2 ;border-radius: 10px; padding: 5px;">--}}
                                    {{--<div class="blog-post-lg po bordered blog-container">--}}

                                        {{--<div class="blog-post-content">--}}
                                            {{--<h2 class="blog-title blog-post-title">--}}
                                                {{--<a href="#detailModal{{$data->id}}" data-toggle="modal"><b></b></a>--}}
                                            {{--</h2><small></small>--}}
                                            {{--<div class="blog-post-foot">--}}
                                                {{--<div class="blog-post-meta">--}}
                                                    {{--<i class="icon-calendar font-blue"></i>--}}
                                                    {{--<p style="color: black">{{date('l jS \of F Y h:i:s A', strtotime($data->created_at))}}</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}



                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {{$knoledge->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

@endsection