<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Sub Category Management";
        $all_category = Category::all();
        $all_sub_category = DB::table('sub_categories as subcat')
            ->select('subcat.id as sid','subcat.name as sname','subcat.icon','subcat.categories_id','cat.id as cid','cat.name as cname')
            ->join('categories as cat','subcat.categories_id','=','cat.id')
            ->get();
        return view('backend.sub-category.index',compact('page_title','all_category','all_sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
          'name' => 'required|max:191',
          'icon'=> 'required | max:191',
          'category' => 'required | not_in:0'
       ]);
        $data = [
            'name'=> $request->name,
            'icon'=> $request->icon,
            'categories_id'=> $request->category
        ];
        SubCategory::create($data);

        return redirect()->back()->withMsg("Sub Category Inserted Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!filter_var($id,FILTER_VALIDATE_INT)){return;}

        $this->validate($request,[
            'name' => 'required|max:191',
            'category' => 'required | not_in:0',
            'icon' => 'required | max:191'
        ]);

        $data = [
            'name'=> $request->name,
            'icon'=> $request->icon,
            'categories_id'=> $request->category
        ];
        SubCategory::where('id',$id)->update($data);

        return redirect()->back()->withMsg("Category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        return redirect()->back()->withDelmsg('Sub Category Deleted Successfully');
    }
}
