<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\BankTransaction;
use App\ExpanceTransaction;
use Illuminate\Http\Request;

class BankTransactionController extends Controller
{
    public function transactionIndex()
    {
        $bank = BankAccount::all();
        $deposit = BankTransaction::orderBy('id', 'desc')->distinct()->get(['bank_id']);
        return view('backend.bank_transaction.transaction', compact('bank', 'deposit'));
    }

    public function storeBalance(Request $request)
    {

            BankTransaction::create([
                'bank_id' => $request->bank_id,
                'amount' => $request->amount,
            ]);
            return redirect()->back()->withmsg('Successfully Added');

    }

    public function indexTransaction()
    {
        $trans = BankTransaction::orderBy('id', 'desc')->distinct()->get(['bank_id']);
        return view('backend.expense_transaction.bank_wise_transaction', compact('trans'));
    }

    public function transactionReport($id)
    {
        $trans = BankTransaction::orderBy('id', 'desc')
            ->where('bank_id', $id)
            ->paginate(15);
        return view('backend.expense_transaction.transaction', compact('trans'));
    }

    public function expenseHistory()
    {
        $trans = ExpanceTransaction::orderBy('id', 'desc')->paginate(15);
        return view('backend.expense_transaction.expense_history', compact('trans'));
    }

    public function createTransaction()
    {
        $bank = BankAccount::all();
        return view('backend.expense_transaction.add_expense', compact('bank'));
    }

    public function storeTransaction(Request $request)
    {
        $this->validate($request, [
           'bank_id' => 'required',
           'amount' => 'required',
           'note' => 'required',
        ]);

        $bank = BankTransaction::where('bank_id', $request->bank_id)->first();

        if($request->amount < $bank->amount)
        {
            ExpanceTransaction::create($request->all());

            BankTransaction::create([
                'amount' => '-'.$request->amount,
                'bank_id' => $request->bank_id,
                'status' => 0,
            ]);

            return redirect('admin/transaction')->withMsg('Transaction Successful');
        }else
        {
            return redirect()->back()->withdelmsg('Insufficient Balance');
        }


    }
}
