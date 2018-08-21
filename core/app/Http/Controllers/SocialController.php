<?php

namespace App\Http\Controllers;

use App\SocialManagement;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
           'name' => 'required | max:191',
           'url' => 'required | max:191'
        ]);
        $data =[
            'name' => $request->name,
            'url'  => $request->url
        ];
        SocialManagement::create($data);
        echo "Social Media Link Created Successfully";
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
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
           'name' => 'required | max:191',
            'url' => 'required | max:191'
        ]);
        $data =[
            'name' => $request->name,
            'url'  => $request->url
        ];
        SocialManagement::where('id',$id)->update($data);
        echo "Social Media Items Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_method(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        SocialManagement::where('id',$request->id)->delete();
       echo "Social Media Items Deleted Successfully";
    }
}
