<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function addPurchase()
    {
        return view('backend.purchase.add_purchase');
    }

    public function indexPurchase()
    {
        $purchase = Purchase::orderBy('id', 'desc')->paginate(15);
        return view('backend.purchase.index', compact('purchase'));
    }

    public function editPurchase($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('backend.purchase.edit_purchase', compact('purchase'));
    }

    public function updatePurchase(Request $request,$id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'amount' => 'required',
            'date' => 'required',
            'detail' => 'required',
        ]);

        Purchase::whereId($id)
            ->update([
                'amount' => $request->amount,
                'date' => $request->date,
                'detail' => $request->detail,
            ]);
        return redirect('admin/purchase')->withMsg('Successfully Updated');
    }

    public function storePurchase(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'amount' => 'required',
            'date' => 'required',
            'detail' => 'required',
        ]);

        Purchase::create($request->all());
        return redirect()->back()->withMsg('Successfully Loan Added');
    }
}
