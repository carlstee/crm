<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Holiday;
use Carbon\Carbon;

class CronController extends Controller
{
    public function autoAttendance()
    {
        $chutirDin = Holiday::select('start_date','end_date')->first();

        $start_date = Carbon::parse($chutirDin->start_date) ;

        $end_date = Carbon::parse($chutirDin->end_date);

        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addDay() ) {
            $dates[] = $date->format('Y-m-d');
        }

        foreach ($dates as $dd){

                $today = Carbon::today();
                $to_day = date('Y-m-d' , strtotime($today)) ;

                if ($dd==$to_day) {

                    $count = Attendance::where('date', $dd)->count();

                    if ($count == 0) {

                        $employee = Employee::all();

                        foreach ($employee as $user) {

                            $attendance = new Attendance;
                            $attendance->date = $dd;
                            $attendance->user_id = $user->id;
                            $attendance->status = '9';
                            $attendance->ip = 'Auto';
                            $attendance->device = 'Auto';
                            $attendance->save();

                        }
                    }

                }

            }

        }
    }
