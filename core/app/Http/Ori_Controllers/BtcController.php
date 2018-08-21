<?php

namespace App\Http\Controllers;

use App\Btc;
use Illuminate\Http\Request;

class BtcController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'display_name'=>'required | max:191',
            'btc_api' => 'required | max:191',
            'btc_xpub_code' => 'required | max:191',
            'status' => 'nullable'
        ]);
        //return $request->all();

        $btc_payment = Btc::where('id',1)->first();


        $picture = $request->btc_picture;
        $old_ext = $btc_payment->btc_picture;
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            ImageCheck($ext);
            if ($ext == "") {
                $ext = $old_ext;
            } else {
                if (file_exists("images/payment/btc-payment-1.{$btc_payment->prefect_money_picture}")) {
                    unlink("images/payment/btc-payment-1.{$btc_payment->prefect_money_picture}");
                }
                $picture->move("images/payment", "btc-payment-1.{$ext}");
            }
        }else{
            $ext = $old_ext;
        }
        $data = [
            'display_name'=> $request->display_name,
            'api_key'=> $request->btc_api,
            'xpub_code'=> $request->btc_xpub_code,
            'btc_picture'=> $ext
        ];

        $on_off_switch = $request->status;
        if($on_off_switch != null){
            $switch_value = ['status'=>$request->status];

            $data =  array_merge($data, $switch_value);
        }
        Btc::where('id',1)->Update($data);

        return redirect()->back()->withMsg("Btc Payment Information Update Successfully");
    }
}
