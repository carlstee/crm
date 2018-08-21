<?php

namespace App\Http\Controllers;

use App\PageManagement;
use Illuminate\Http\Request;

class PageManagementController extends Controller
{
    public function index(){
        //page management page;
        $all_pages = PageManagement::all();
        $page_title = "Page Management";
        return view('backend.page-management.index',compact('page_title','all_pages'));
    }

    public function create(){
        $page_title = "Create A New Page";
        return view('backend.page-management.create',compact('page_title'));
    }
    public function store(Request $request){
        $this->validate($request,[
           'name' => 'required | max:191'
        ]);
        $data = ['name' => $request->name];

        $page_create = PageManagement::create($data)->id;

        echo $page_create;
    }
    public function edit($id){
        $page_title = "Edit Page Items";

        $page = PageManagement::where('id',$id)->first();

        return view('backend.page-management.edit',compact('page_title','page'));
    }
    public function update(Request $request){
        $this->validate($request,[
           'name' => 'required | max:191',
        ]);
        $data = ['name' => $request->name];

        PageManagement::where('id',$request->id)->update($data);

        echo "Page Name Update Successfully";
    }

    public function destroy($id){
        $page = PageManagement::where('id',$id)->first();
        if(file_exists("assets/backend/upload/pages/page-content-{$page->id}.txt")){
            unlink("assets/backend/upload/pages/page-content-{$page->id}.txt");
        }
        PageManagement::where('id',$id)->delete();
        return redirect()->back()->withDelmsg("Page Delete Successfully");
    }

    public function manual_store(Request $request){
        $this->validate($request,[
            'name' => 'required | max:191 | unique:page_managements',
            'page_content' => 'required '
        ]);
        $data = [
            'name' => $request->name
        ];


        $page_id = PageManagement::create($data)->id;

        NewFile("assets/backend/upload/pages/page-content-{$page_id}.txt", $request->page_content);

        return redirect(route('page-management.index'))->withMsg("Page Created Successfully");
    }
    public function manual_update(Request $request,$id){


        $this->validate($request,[
            'name' => 'required | max:191 ',
            'page_content' => 'required '
        ]);
        //return $request->all();

        $data = [
            'name' => $request->name
        ];
        $page_content = $request->page_content;

        $page_item = PageManagement::where('id',$id)->first();
        if($page_item->content == 'about'){
            NewFile("assets/backend/upload/pages/about.txt", $page_content);
        }else{
            NewFile("assets/backend/upload/pages/page-content-{$id}.txt", $page_content);
        }

        PageManagement::where('id',$id)->update($data);

        $msg = ucfirst($request->name) .' Page Updated Successfully';

        return redirect(route('page-management.index'))->withMsg($msg);

    }
    public function template_store(Request $request){
        $data = ['content' => $request->temp_name];

        PageManagement::where('id',$request->id)->update($data);
            $msg = ucfirst($request->temp_name);
        echo $msg." Added Successfully";
    }

}
