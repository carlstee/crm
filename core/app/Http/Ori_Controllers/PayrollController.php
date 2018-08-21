<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return view('backend.payroll.payroll', compact('employee'));
    }

    public function count(Request $request)
    {
        $form_date = $request->from_date;
        $to_date = $request->to_date;
        $employee_select = $request->employee_select;
        $start = Carbon::parse($form_date);
        $end = Carbon::parse($to_date);
        $jdata['length'] = $start->diffInDays($end);
        $attend = Attendance::whereBetween('date', [$form_date, $to_date])
            ->where('user_id', $employee_select)
            ->get();
        $jdata['count'] = Attendance::where('user_id', $employee_select)->where('status', 1)->count();
        $jdata['holiday'] = Attendance::where('user_id', $employee_select)->where('status', 9)->count();
        $jdata['late'] = Attendance::where('user_id', $employee_select)->where('status', 0)->count();
        $salary= Employee::where('id', $employee_select)->first();
        $jdata['salary'] = $salary->salary;
        $jdata['sum-attend'] = $jdata['count'] + $jdata['holiday'] + $jdata['late'];
        $jdata['perday_salary'] = $jdata['salary'] / $jdata['length'];
        $jdata['total_salary'] = $jdata['perday_salary'] * $jdata['sum-attend'] ;
        $jdata['output'] = "";

        $jdata['output'] .='<tr>
                                <td> '.$jdata['sum-attend'].' '."Days(With Holiday)".'</td>
                                <td> '.$jdata['late'].' '."Days".' </td>
                                <td> '.number_format($jdata['total_salary'],2).'</td>
                               
                            </tr>';
        if($jdata['count']== 0){

            $jdata['output'] ='Salary Not Found';
            return response()->json($jdata);
        }else{

            return response()->json($jdata);
        }


    }

    public function salarySheet(Request $request)
    {
        $from_date = $request->from_date;
        $to_date  = $request->to_date;
        $start = Carbon::parse($from_date);
        $end = Carbon::parse($to_date);
        $employee = Employee::all();
        $jdata = [];
        foreach ($employee as $member){
            $jdata['name'] = $member->name;
            $jdata['employee_id'] = $member->employee_id;
            $jdata['mobile'] = $member->phone;
            $jdata['from'] = date('jS M Y', strtotime($start));
            $jdata['to'] = date('jS M Y', strtotime($end));
            $jdata['length'] = $start->diffInDays($end);
            $attend = Attendance::whereBetween('date', [$from_date, $to_date])->where('user_id', $member->id)->get();
            $jdata['count'] = Attendance::where('user_id', $member->id)->where('status', 1)->count();
            $jdata['holiday'] = Attendance::where('user_id', $member->id)->where('status', 9)->count();
            $jdata['late'] = Attendance::where('user_id', $member->id)->where('status', 0)->count();
            $salary = Employee::where('id', $member->id)->first();
            $jdata['salary'] = $salary->salary;
            $jdata['sum_attend'] = $jdata['count'] + $jdata['holiday'] + $jdata['late'];
            $jdata['perday_salary'] = $jdata['salary'] / $jdata['length'];
            $jdata['total_salary'] = $jdata['perday_salary'] * $jdata['sum_attend'] ;
            $abir[] = $jdata;
        }
        return view('backend.payroll.after-search', compact('abir'));
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'employee_id' => 'required',
            'attend' => 'required',
            'salary' => 'required',
            'from_date' => 'required',
            'to_date' => 'required'
        ));

        for($i =0; $i < Employee::count('id'); $i++)
        {
            $pay = new Payment;
            $pay->employee_id = $request->employee_id[$i];
            $pay->attend      = $request->attend[$i];
            $pay->salary      = $request->salary[$i];
            $pay->from_date    = date('Y-m-d', strtotime($request->from_date[$i]));
            $pay->to_date = date('Y-m-d',strtotime($request->to_date[$i]));
            $pay->save();
        }
        return redirect('admin/payroll/chart')->withMsg("Salary Sheet Saved");
    }

    public function show()
    {
        $employe = Employee::all();
        $payment = Payment::orderBy('id', 'desc')->paginate(20);

        return view('backend.payroll.payroll-chart',compact('payment', 'employe'));
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->back()->withMsg("Deleted");
    }

    public function individualSalary(Request $request)
    {
        $form_date = $request->from_date;
        $to_date = $request->to_date;
        $employee_select = $request->employee_select;
        $start = Carbon::parse($form_date);
        $end = Carbon::parse($to_date);
        $lenght = $start->diffInDays($end);

        $attend = Payment::where('from_date', $form_date)
            ->where('to_date', $to_date)
            ->get();
        $total_attendense = DB::table("payments")->where('employee_id', $employee_select)
             ->whereBetween('from_date', [$form_date, $to_date])->sum('attend');

        $total_salary = DB::table("payments")->where('employee_id', $employee_select)
            ->whereBetween('from_date', [$form_date, $to_date])->sum('salary');

        $status_paid = DB::table("payments")->where('employee_id', $employee_select)
            ->where('status', 1 )->first();

        $status_pending = DB::table("payments")->where('employee_id', $employee_select)
            ->where('status', 0 )->first();

        return view('backend.payroll.individual-salary', compact('lenght', 'total_attendense',
            'total_salary','employee_select', 'form_date', 'to_date','status_paid','status_pending'));

    }

    public function userIndex()
    {
        $user = Auth::guard('employee')->user()->employee_id;
        $payment = Payment::where('employee_Id', $user)->orderBy('id', 'DESC')->paginate(5);
        return view('users.payment.payment', compact('payment'));
    }

    public function employeePaid($id)
    {
        $payment = Payment::find($id);
        $payment->status = 1;
        $payment->save();
        return back()->withMsg("Payment Successful");
    }


}
