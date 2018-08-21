<?php

namespace App\Http\Controllers;

use App\Employee;
use App\OfficeLoan;
use Illuminate\Http\Request;

class OfficeLoanController extends Controller
{
    public function officeLoanAdd()
    {
        $employee = Employee::all();
        return view('backend.office_loan.add_loan', compact('employee'));
    }

    public function officeLoanIndex()
    {
        $office_loan = OfficeLoan::orderBy('id', 'desc')->paginate(15);
        return view('backend.office_loan.index', compact('office_loan'));
    }

    public function officeLoanEdit($id)
    {
        $office_loan = OfficeLoan::findOrFail($id);
        $employee = Employee::all();
        return view('backend.office_loan.edit_loan', compact('office_loan', 'employee'));
    }

    public function officeLoanStore(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'employee_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'detail' => 'required',
        ]);

        OfficeLoan::create($request->all());
        return redirect()->back()->withMsg('Successfully Loan Added');
    }

    public function officeLoanUpdate(Request $request, $id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'employee_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'detail' => 'required',
        ]);

        OfficeLoan::whereId($id)
        ->update([
            'employee_id' => $request->employee_id,
            'amount' => $request->amount,
            'date' => $request->date,
            'detail' => $request->detail,
        ]);
        return redirect('admin/office/loan')->withMsg('Successfully Loan Added');
    }
}
