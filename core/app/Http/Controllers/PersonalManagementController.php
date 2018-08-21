<?php

namespace App\Http\Controllers;

use App\PersonalManagement;
use Illuminate\Http\Request;

class PersonalManagementController extends Controller
{
    public function personalIndex()
    {
        return view('backend.personal_loan.personal_loan');
    }

    public function personalLoanManage()
    {
        $personal_loan = PersonalManagement::orderBy('id', 'desc')->paginate(15);
        return view('backend.personal_loan.index', compact('personal_loan'));
    }

    public function personalEdit($id)
    {
        $personal_loan = PersonalManagement::findOrFail($id);
        return view('backend.personal_loan.edit_loan', compact('personal_loan'));
    }

    public function personalLoanStore(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'detail' => 'required',
        ]);

        PersonalManagement::create($request->all());
        return redirect()->back()->withMsg('Successfully Loan Added');
    }

    public function personalUpdate(Request $request, $id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'detail' => 'required',
        ]);

        PersonalManagement::whereId($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'amount' => $request->amount,
            'date' => $request->date,
            'detail' => $request->detail,
        ]);
        return redirect('admin/personal/loan')->withMsg('Successfully Loan Updated');
    }
}
