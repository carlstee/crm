@extends('frontend.master')
@section('title')
    {{$page->name}}
@endsection
@section('content')
    <!--Start Login Page-->
    <section class="faq-page">
        <!--Start Page Header-->
        <div class="page-header page-bg">
            <div class="page-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-content">
                            <h2 class="text-center">{{$page->name}}</h2>
                            <h4 class="text-center"><span><a href="{{route('home.page')}}">Home</a></span> / <span>{{$page->name}}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Header-->
        <!--Start container-->
        <div class="container">
            <!--Start Row-->
            <div class="row">
                <div class="col-md-12">
                    <!--Start Login Form Contents-->
                    <div class="faq-content">
                        @if($page->content == "about")
                            @if(file_exists("assets/backend/upload/pages/about.txt"))
                                {!! ViewFile("assets/backend/upload/pages/about.txt") !!}
                            @endif
                        @elseif($page->content == "contact")
                            @if(file_exists("assets/backend/upload/pages/contact.txt"))
                                {!! ViewFile("assets/backend/upload/pages/contact.txt") !!}
                            @endif
                        @elseif($page->content == "faq")
                            @if(file_exists("assets/backend/upload/pages/faq.txt"))
                                {!! ViewFile("assets/backend/upload/pages/faq.txt") !!}
                            @endif
                        @elseif($page->content == "pricing")
                            @if(file_exists("assets/backend/upload/pages/pricing.txt"))
                                {!! ViewFile("assets/backend/upload/pages/pricing.txt") !!}
                            @endif
                        @elseif($page->content == "team")
                            @if(file_exists("assets/backend/upload/pages/team.txt"))
                                {!! ViewFile("assets/backend/upload/pages/team.txt") !!}
                            @endif
                        @else
                            @if(file_exists("assets/backend/upload/pages/page-content-{$page->id}.txt"))
                                {!! ViewFile("assets/backend/upload/pages/page-content-{$page->id}.txt") !!}
                            @endif
                        @endif
                    </div>
                    <!--End Login Form Contents-->
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End container-->
    </section>
    <!--End Login Page-->
@endsection