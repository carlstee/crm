<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Payment;
use Illuminate\Support\Facades\Auth;


class EmployeeLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function index()
    {
        $total_employee = Employee::count('id');
        $user = Auth::guard('employee')->user()->employee_id;
        $total_income = Payment::where('employee_id', $user)->sum('salary');
        $total_attend = Payment::where('employee_id', $user)->sum('attend');

        return view('users.home', compact('total_employee','total_income','total_attend'));
    }

}
