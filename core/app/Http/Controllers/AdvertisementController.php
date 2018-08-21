<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index(){
        $add_field_one = Advertisement::where('id',1)->first();
        if(empty($add_field_one)){
            $data = [
                'add_code' => 'enter adsense code here'
            ];
            Advertisement::create($data);
            $add_field_one = Advertisement::where('id',1)->first();
        }
        $add_field_two = Advertisement::where('id',2)->first();
        if(empty($add_field_two)){
            $data = [
                'add_code' => 'enter adsense code here'
            ];
            Advertisement::create($data);
            $add_field_two = Advertisement::where('id',2)->first();
        }
        $page_title = "Advertisement Management";

        return view('backend.advertisement.index')
            ->with([
                'page_title' => $page_title,
                'add_field_one' => $add_field_one,
                'add_field_two' => $add_field_two
                ]);
    }
    public function store_one(Request $request){

        $this->validate($request,[
           'google_ad_728' => 'required'
        ]);
        $data = ['add_code' => $request->google_ad_728];

        Advertisement::where('id',1)->update($data);

        return redirect()->back()->withmsg('728px Add Field Update Successfully');
    }
    public function store_two(Request $request){

        $this->validate($request,[
            'google_ad_300' => 'required'
        ]);
        $data = ['add_code' => $request->google_ad_300];

        Advertisement::where('id',2)->update($data);

        return redirect()->back()->withmsg('300px Add Field Update Successfully');
    }
}
