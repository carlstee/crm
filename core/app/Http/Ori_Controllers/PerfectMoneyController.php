<?php

namespace App\Http\Controllers;

use App\PerfectMoney;
use Illuminate\Http\Request;

class PerfectMoneyController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'display_name'=>'required | max:191',
            'perfect_usd' => 'required | max:191',
            'passphrase' => 'required | max:191',
            'status' => 'nullable'
        ]);
        //return $request->all();

        $perfect_money = PerfectMoney::where('id',1)->first();


        $picture = $request->perfect_money_picture;
        $old_ext = $perfect_money->prefect_money_picture;
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            ImageCheck($ext);
            if ($ext == "") {
                $ext = $old_ext;
            } else {
                if (file_exists("images/payment/perfect-money-1.{$perfect_money->prefect_money_picture}")) {
                    unlink("images/payment/perfect-money-1.{$perfect_money->prefect_money_picture}");
                }
                $picture->move("images/payment", "perfect-money-1.{$ext}");
            }
        }else{
            $ext = $old_ext;
        }
        $data = [
            'display_name'=> $request->display_name,
            'usd'=> $request->perfect_usd,
            'passpharase'=> $request->passphrase,
            'prefect_money_picture'=> $ext
        ];

        $on_off_switch = $request->status;
        if($on_off_switch != null){
            $switch_value = ['status'=>$request->status];

            $data =  array_merge($data, $switch_value);
        }
        PerfectMoney::where('id',1)->Update($data);

        return redirect()->back()->withMsg("Perfect Money Information Update Successfully");
    }
}
