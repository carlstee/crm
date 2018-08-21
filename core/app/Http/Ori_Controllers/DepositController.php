<?php

namespace App\Http\Controllers;

use App\Btc;
use App\PerfectMoney;
use App\Stripe;
use Illuminate\Http\Request;
use App\Paypal;

class DepositController extends Controller
{
    public function index(){
        $page_title = "Deposit Management";
        $paypal_details = Paypal::find(1);

        if(empty($paypal_details)){
            $data = [
                'display_name'=> "Enter Display Name",
                'paypal_email'=> "Enter Paypal Email",
                'payment_picture'=> 'jpg'
            ];
            Paypal::create($data);
            $paypal_details = Paypal::find(1);
        }

        $perfect_details = PerfectMoney::where('id',1)->first();
        //return $perfect_money_details;

        if(empty($perfect_details)){
            $data = [
                'display_name'=> "Perfect Money",
                'passpharase'=> "U5220203",
                'usd'=> "reg4e54h1grt1j",
                'prefect_money_picture'=> 'jpg'
            ];
            PerfectMoney::create($data);
            $perfect_details = PerfectMoney::where('id',1)->first();
        }
        $btc = Btc::where('id',1)->first();
        //return $perfect_money_details;

        if(empty($btc)){
            $data = [
                'display_name'=> "BITCOIN",
                'api_key'=> "api_key",
                'xpub_code'=> "xpub_code",
                'btc_picture'=> 'jpg'
            ];
            Btc::create($data);
            $btc = Btc::where('id',1)->first();
        }
        $stripe = Stripe::where('id',1)->first();
        //return $perfect_money_details;

        if(empty($stripe)){
            $data = [
                'display_name'=> "Card",
                'secret_key'=> "sk_test_aat3tzBCCXXBkS4sxY3M8A1B",
                'publisher_key'=> "pk_test_AU3G7doZ1sbdpJLj0NaozPBu",
                'stripe_picture'=> 'jpg'
            ];
            Stripe::create($data);
            $stripe = Stripe::where('id',1)->first();
        }
        return view('backend.deposit.index')
            ->with(
                [
                'page_title' => $page_title,
                'paypal_details'=> $paypal_details,
                'perfect_money_details'=> $perfect_details,
                'btc_payment' => $btc,
                'stripe_payment' => $stripe
                ]);
    }
}
