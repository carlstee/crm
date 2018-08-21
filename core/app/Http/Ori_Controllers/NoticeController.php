<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice = Notice::all();
        return view('backend.notice.notice',compact('notice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.notice.add-notice');
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
           'title' => 'required|max:191',
           'description' => 'required'
        ));
        $notice = new Notice;
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->save();
        return redirect('notice')->withMsg('Notice Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice, $id)
    {
        $notice = Notice::find($id);
        return view('backend.notice.edit-notice', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notice = Notice::find($id);
        $this->validate($request, array(
            'title' => 'required|max:191',
            'description' => 'required'
        ));
        $notice->title = $request->input('title');
        $notice->description = $request->input('description');
        $notice->save();
        return redirect('admin/notice')->withMsg('Notice Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice, $id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function userIndex()
    {
        $notice = Notice::orderBy('id', 'DESC')->paginate(5);
        return view('users.notice.notice', compact('notice'));
    }
}
