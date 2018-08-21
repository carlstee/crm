<?php

namespace App\Http\Controllers;

use App\Award;
use App\Employee;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $award = Award::orderBy('id','DESC')->paginate(20) ;
        return view('backend.award.award', compact('award'));
    }

    public function userIndex()
    {
        $award = Award::orderBy('id', 'DESC')->paginate(5);
        return view('users.award.award', compact('award'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        return view('backend.award.addawared',compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'award_name'=> 'required|max:191' ,
            'gift'=> 'required|max:191',
            'price'=> 'required|max:191',
            'employee_name'=> 'required|max:191',
            'month'=> 'required',
            'year'=> 'required'
        ));
        $award = new Award;
        $award->award_name       = $request->award_name;
        $award->gift            = $request->gift;
        $award->price           = $request->price;
        $award->employee_name   = $request->employee_name;
        $award->month           = $request->month;
        $award->year             = $request->year;
        $award->save();
        return redirect('admin/award')->withMsg("Created Complete Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award, $id)
    {
        $award = Award::find($id);
        return view('backend.award.editaward', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award, $id)
    {
        $award = Award::find($id);
        $this->validate($request, array(
            'award_name'=> 'required|max:191' ,
            'gift'=> 'required|max:191',
            'price'=> 'required|max:191',
            'employee_name'=> 'required|max:191',
            'month'=> 'required',
            'year'=> 'required'
        ));
        $award->award_name = $request->input('award_name');
        $award->gift = $request->input('gift');
        $award->price = $request->input('price');
        $award->employee_name = $request->input('employee_name');
        $award->month = $request->input('month');
        $award->year = $request->input('year');
        $award->save();
        return redirect('admin/award')->withMsg("Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $award, $id)
    {
        $award = Award::find($id);
        $award->delete();
        return redirect('admin/award')->withMsg("Deleted Successfully");
    }
}
