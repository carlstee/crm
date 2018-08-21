<?php

namespace App\Http\Controllers;

use App\Stripe;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            'display_name' => 'required | max:191',
            'stripe_secret_key' => 'required | max:191',
            'stripe_publisher_key' => 'required | max:191',
            'status' => 'nullable'
        ]);
        //return $request->all();

        $stripe = Stripe::where('id', 1)->first();
        //return $stripe;


        $picture = $request->stripe_picture;
        $old_ext = $stripe->stripe_picture;
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            ImageCheck($ext);
            if ($ext == "") {
                $ext = $old_ext;
            } else {
                if (file_exists("images/payment/stripe-payment-1.{$stripe->stripe_picture}")) {
                    unlink("images/payment/stripe-payment-1.{$stripe->stripe_picture}");
                }
                $picture->move("images/payment", "stripe-payment-1.{$ext}");
            }
        } else {
            $ext = $old_ext;
        }
        $data = [
            'display_name' => $request->display_name,
            'secret_key' => $request->stripe_secret_key,
            'publisher_key' => $request->stripe_publisher_key,
            'stripe_picture' => $ext
        ];

        $on_off_switch = $request->status;
        if ($on_off_switch != null) {
            $switch_value = ['status' => $request->status];

            $data = array_merge($data, $switch_value);
        }
        Stripe::where('id', 1)->Update($data);

        return redirect()->back()->withMsg("Stripe Information Update Successfully");
    }
}
