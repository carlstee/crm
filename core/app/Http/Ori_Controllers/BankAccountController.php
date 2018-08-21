<?php

namespace App\Http\Controllers;

use App\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function bankIndex()
    {
        $bank = BankAccount::all();
        return view('backend.bank.bank', compact('bank'));
    }

    public function bankStore(Request $request)
    {
        BankAccount::create($request->all());
        return redirect()->back()->withMsg('Successfully Create');
    }

    public function bankEdit($id)
    {
        $bank = BankAccount::findOrFail($id);
        return view('backend.bank.bank_edit', compact('bank'));
    }

    public function bankDelete($id)
    {
        $bank = BankAccount::whereId($id)->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function bankUpdate(Request $request,$id)
    {
        BankAccount::whereId($id)
            ->update([
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'branch_name' => $request->branch_name,
                'swift_code' => $request->swift_code,
            ]);
        return redirect('admin/bank')->withMsg('Successfully Updated');
    }
}
