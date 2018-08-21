<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Employee;
use App\SalePoint;
use App\StockProduct;
use App\TransExpense;
use App\TransIncome;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function index(){
        $page_title = "Dashboard";

        $total_employee = Employee::count('id');

        $total_income = TransIncome::sum('amount');

        $total_expense = TransExpense::sum('amount');

        $total_result = $total_income - $total_expense;

        $result1 = $total_result * 100;

        $result = number_format($result1/$total_income);

        $to_date = date('Y-m-d', strtotime(Carbon::now()));
        $from_date = date('Y-m-d', strtotime('2017-01-01'));

        $main_chart_data = "[";
          $main_chart_data .= "{ year: '2011' , value:  25  }".",";
          $main_chart_data .= "{ year: '2012', value:  55  }".",";
          $main_chart_data .= "{ year: '2013' , value: 40  }".",";
          $main_chart_data .= "{ year: '2014', value:  65  }".",";
          $main_chart_data .= "{ year: '2015', value:  60  }".",";
          $main_chart_data .= "{ year: '2016', value:  72  }".",";
          $main_chart_data .= "{ year: '2017', value: ".$result." }".",";
          $main_chart_data .= "{ year: '2018', value: 10  }";

        $main_chart_data .= "]";

        return view('backend.dashboard',compact('page_title',
            'total_employee',
            'total_income',
            'total_expense',
            'main_chart_data'));
    }

    public function saveResetPassword(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');

        $this->validate($request, [

            'passwordold' =>'required',

            'password' => 'required|min:5|confirmed'

        ]);

        try {

            $c_password = Admin::find($request->id)->password;

            $c_id = Admin::find($request->id)->id;

            //return  $c_password;

            $user = Admin::findOrFail($c_id);

            if(Hash::check($request->passwordold, $c_password)){

                $password = Hash::make($request->password);

                $user->password = $password;

                $user->save();

                return redirect()->back()->withMsg('Password Changes Successfully.');

            }else{

                session()->flash('message', 'Password Not Match');

                Session::flash('type', 'warning');

                return redirect()->back();

            }

        } catch (\PDOException $e) {

            session()->flash('message', 'Some Problem Occurs, Please Try Again!');

            Session::flash('type', 'warning');

            return redirect()->back();

        }

    }
}
