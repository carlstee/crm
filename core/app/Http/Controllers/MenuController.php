<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageManagement;

class MenuController extends Controller
{
    public function index(){
        $page_title = "Menu Management";
        $all_pages = PageManagement::all();

        return view('backend.menu-management.index',compact('page_title','all_pages'));
    }
    public function store(Request $request){
        foreach($request->menu_order as $key => $value){

                $data = ['menu_order' => $value];

           PageManagement::where('id',$key)->update($data);
        }

        foreach($request->page_status as $key => $value){

                $data = ['status' => $value];

            PageManagement::where('id',$key)->update($data);
        }

        return redirect()->back()->withMsg("Menu Order Rearrange Successfully");
    }

}
