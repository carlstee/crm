<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteManagementController extends Controller
{
    public function index(){
        $page_title = "Site Management";
        return view('backend.site-management.index',compact('page_title'));
    }
}
