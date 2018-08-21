<?php

namespace App\Http\Controllers;

use App\Account;
use App\Expense;
use App\Income;
use App\Transaction;
use App\TransExpense;
use App\TransIncome;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $income = Income::all();
        $expense = Expense::all();
        return view('backend.ac-management.transaction', compact('income', 'expense'));
    }

    public function incomeStore(Request $request){
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request, array(

            'date'       => 'required|max:191',
            'income_id' => 'required',
            'amount'     => 'required|max:191',
            'note'       => 'max:191'
        ));

        $in = new TransIncome;
        $in->date = $request->date;
        $in->income_id = $request->income_id;
        $in->amount = $request->amount;
        $in->note = $request->note;
        $in->save();
        return back()->withMsg("Transaction Complete Successfully");

    }

    public function expenseStore(Request $request){
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request, array(

            'date'       => 'required|max:191',
            'expense_id' => 'required',
            'amount'     => 'required|max:191',
            'note'       => 'max:191'
        ));

        $out = new TransExpense;
        $out->date = $request->date;
        $out->expense_id = $request->expense_id;
        $out->amount = $request->amount;
        $out->note = $request->note;
        $out->save();
        return back()->withMsg("Transaction Complete Successfully");
    }

    public function incomeUpdate(Request $request, $id)
    {return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $update_income = TransIncome::find($id);
        $this->validate($request, array(

            'date'       => 'required|max:191',
            'income_id' => 'required',
            'amount'     => 'required|max:191',
            'note'       => 'max:191'
        ));
        $update_income->date = $request->date;
        $update_income->income_id = $request->income_id;
        $update_income->amount = $request->amount;
        $update_income->note = $request->note;
        $update_income->save();
        return back()->withMsg("Updateed Successfully");
    }

    public function expenseUpdate(Request $request,$id)
    {return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $update_expense = TransExpense::find($id);
        $this->validate($request, array(

            'date'       => 'required|max:191',
            'expense_id' => 'required',
            'amount'     => 'required|max:191',
            'note'       => 'max:191'
        ));
        $update_expense->date = $request->date;
        $update_expense->expense_id = $request->expense_id;
        $update_expense->amount = $request->amount;
        $update_expense->note = $request->note;
        $update_expense->save();
        return back()->withMsg("Updateed Successfully");
    }

    public function incomeDestroy($id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $income = TransIncome::find($id);
        $income->delete();
        return back()->withMsg("Deleted Successfully");

    }

    public function expenseDestroy($id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $enpense = TransExpense::find($id);
        $enpense->delete();
        return back()->withMsg("Deleted Successfully");

    }

    public function totalIncome(Request $request)
    {
        $from_date = $request->from_date;
        $to_date  = $request->to_date;

        $start = Carbon::parse($from_date);
        $end = Carbon::parse($to_date);

        $lenght = $start->diffInDays($end);

        $income = TransIncome::whereBetween('date', [$from_date, $to_date])->get();
        $total_amount = DB::table("trans_incomes")->whereBetween('date', [$from_date, $to_date])->sum('amount');

        return view('backend.ac-management.total_income', compact('lenght', 'income','total_amount'));

    }

    public function totalExpense(Request $request)
    {
        $from_date = $request->from_date;
        $to_date  = $request->to_date;

        $start = Carbon::parse($from_date);
        $end = Carbon::parse($to_date);

        $lenght = $start->diffInDays($end);

        $expense = TransExpense::whereBetween('date', [$from_date, $to_date])->get();
        $total_amount = DB::table("trans_expenses")->whereBetween('date', [$from_date, $to_date])->sum('amount');

        return view('backend.ac-management.total_expense', compact('lenght', 'expense','total_amount'));

    }
}
