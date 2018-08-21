<?php

namespace App\Http\Controllers;

use App\Paypal;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'display_name'=>'required | max:191',
            'paypal_email' => 'required | email | max:191 | unique:paypals',
            'status' => 'nullable'
        ]);

        $paypal = Paypal::where('id',1)->first();


        $picture = $request->paypal_picture;
        $old_ext = $paypal->payment_picture;
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            ImageCheck($ext);
            if ($ext == "") {
                $ext = $old_ext;
            } else {
                if (file_exists("images/payment/paypal-1.{$paypal->payment_picture}")) {
                    unlink("images/payment/paypal-1.{$paypal->payment_picture}");
                }
                $picture->move("images/payment", "paypal-1.{$ext}");
            }
        }else{
            $ext = $old_ext;
        }
        $data = [
            'display_name'=> $request->display_name,
            'paypal_email'=> $request->paypal_email,
            'payment_picture'=> $ext
        ];

        $on_off_switch = $request->status;
        if($on_off_switch != null){
            $switch_value = ['status'=>$request->status];

            $data =  array_merge($data, $switch_value);
        }

        Paypal::where('id',1)->Update($data);

        return redirect()->back()->withMsg("Paypal Information Update Successfully");
    }
}
