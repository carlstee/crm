<?php

namespace App\Http\Controllers;

use App\Account;
use App\Expense;
use App\Income;
use App\Transaction;
use App\TransExpense;
use App\TransIncome;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {

        $income = TransIncome::orderBy('id', 'DESC')->paginate(20);
        $expense = TransExpense::orderBy('id', 'DESC')->paginate(20);
        $in = Income::all();
        $out = Expense::all();
        return view('backend.ac-management.account', compact('income', 'expense', 'in', 'out'));
    }

    public function incomeExpense()
    {
        return view('backend.ac-management.in-out');
    }

    public function incomeStore(Request $request){
        $this->validate($request, array(
            'income' => 'required|max:191'
        ));
        $acc = new Income;
        $acc->income = $request->income;
        $acc->save();

        return back()->withMsg("Item Added Successfully");
    }

    public function expenseStore(Request $request){
        $this->validate($request, array(
            'expense' => 'required|max:191'
        ));
        $acc = new Expense;
        $acc->expense = $request->expense;
        $acc->save();
        return back()->withMsg("Item Added Successfully");
    }
    public function allAccount(){

        $cashIn= Transaction::where('account_id',1)->get();
        $cashOut = Transaction::where('account_id',1)->where('tr_type','Out')->get();
        $a = $cashIn->sum('amount');
        $b = $cashOut->sum('amount');
        $balance = $a-$b;
        return $cashIn;

        $acc = Account::All()->first();
        return $acc;

        foreach ($acc as $b){
            return $b->transactions;
        }
        $accca = $acc->transactions;
        $tran = Transaction::all();
        foreach ( $tran as $a ){

            return $a->account;

        }

        return $b;
    }
}
