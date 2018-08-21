<?php

namespace App\Http\Controllers;

use App\CustomerBalance;
use App\Cutomer;
use Illuminate\Http\Request;

class CustomerBalanceController extends Controller
{
    public function customerBalanceIndex()
    {
        $customer = Cutomer::all();
        $balance = CustomerBalance::orderBy('id', 'desc')->paginate(15);
        return view('backend.customer_balance.customer_balance', compact('customer', 'balance'));
    }

    public function customerBalanceStore(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request, [
            'customer_id' => 'required',
            'amount' => 'required',
        ]);
        $customer = CustomerBalance::where('customer_id', $request->customer_id)->first();

        if ($customer == null)
        {
            CustomerBalance::create($request->all());

        }else{
            CustomerBalance::where('customer_id', $request->customer_id)
                ->update([
                    'amount' => $customer->amount + $request->amount,
                ]);
        }
        return redirect()->back()->withmsg('Successfully Added');
    }
}
