<?php

namespace App\Http\Controllers;

use App\Timezone;
use Illuminate\Http\Request;

class TimezoneController extends Controller
{
    public function update(Request $request,$id)
    {
        $time = Timezone::find($id);
        $this->validate($request,array(
           'country' => 'required',
        ));
        $time->country = $request->input('country');
        $time->save();
        return redirect()->back()->withMsg("Timezone Changed");
    }
}
