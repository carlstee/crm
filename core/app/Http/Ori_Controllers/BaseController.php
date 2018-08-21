<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageManagement;

class BaseController extends Controller
{
    public function index(){
        $page_title = "Homepage";
        return view('frontend.main-page',compact('page_title'));
    }

    public function about_page(){
        return view('frontend.template-parts.pages.about');
    }

    public function contact_page(){
        return view('frontend.template-parts.pages.contact');
    }

    public function faq_page(){
        return view('frontend.template-parts.pages.faq');
    }

    public function page_show_frontend($id){

        if(!filter_var($id,FILTER_VALIDATE_INT)){
            return redirect(route('home.page'));
        }
        $page = PageManagement::where('id',$id)->first();
        return view('frontend.template-parts.pages.pages',compact('page'));
    }
}
