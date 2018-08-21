<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Plan Management";
        $all_plan = Plan::all();
        return view('backend.plan-management.index',compact('page_title','all_plan'));
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
            'price' => 'required|numeric',
            'days' => 'required|numeric'
        ]);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'days' => $request->days
        ];

        $on_off_switch = $request->status;

        if($on_off_switch != null){
            $switch_value = ['status'=>$request->status];

           $data =  array_merge($data, $switch_value);
        }
        Plan::create($data);

        return redirect()->back()->withMsg("Paypal Account Details Updated");
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
        $this->validate($request, [
            'name' => 'required|max:191',
            'price' => 'required|numeric',
            'days' => 'required|numeric'
        ]);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'days' => $request->days
        ];

        $on_off_switch = $request->status;

        if($on_off_switch == 0){
            $switch_value = ['status'=>"on"];

            $data =  array_merge($data, $switch_value);
        }else{
            $switch_value = ['status'=>""];

            $data =  array_merge($data, $switch_value);
        }
        Plan::find($id)->update($data);

        return redirect()->back()->withMsg("Plan Updated Successfully");

       //return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
