<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Holiday;
use App\Timezone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
date_default_timezone_set(TimeZoneManual());


class AttendanceController extends Controller
{

    public function index()
    {
        $attendance = Attendance::orderBy('id', 'DESC')->paginate(15);

        return view('backend.attendance.attendence-list', compact('attendance'));
    }

    public function countIndex()
    {
        return view('backend.attendance-count.attend_count');
    }

    public function create()
    {
        $auth_employee = Auth::guard('employee')->user();
        return view('users.attendance.attendance', compact('auth_employee'));
    }

    public function store(Request $request)
    {
        $this->validate($request,array(
            'date' => 'required',
            'user_id' => 'required',
            'status' =>'required'
        ));

        $attendance = new Attendance;
        $attendance->date = $request->date;
        $attendance->user_id = $request->user_id;
        $attendance->status = $request->status;
        $attendance->ip = $request->ip;
        $attendance->device = $request->device;
        $attendance->save();
        return redirect()->back()->withMsg("Attendance Successful");
    }

    public function individualIndex()
    {
        $employee = Employee::all();
        return view('backend.attendance-count.individual-attend', compact('employee'));

    }

    public function individualAttend(Request $request)
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

        $jdata['output'] = "";

        foreach ($attend as $data):

            if ($data->status == 1 ){
                 $upostthit = '<span class="label label-sm label-success">Attend</span>';
            }elseif ($data->status == 9 ){
                 $upostthit = '<span class="label label-sm label-info">AUTOMATED</span>';
            }else {
             $upostthit = '<span class="label label-sm label-danger">Late</span>';
            }

            $jdata['output'] .='<tr>
                        <td> '.date('M j', strtotime($data->date)).' </td>
                        <td> '.$upostthit.'</td>
                    </tr>';
        endforeach;

        return response()->json($jdata);
    }

    public function destroy($id)
    {

    }

    public function attendanceApprove($id){

        $att = Attendance::find($id);
        $att->status = 1;
        $att->save();
        return back();

    }
}
