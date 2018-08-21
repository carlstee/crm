<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{
    public function index()
    {
         $holiday = Holiday::orderBy('start_date', 'ASC')->get();

       foreach($holiday as $data) {
           $a = Date("F-Y", strtotime($data->start_date));

           $that = Date("Ym", strtotime($data->start_date));

           $currentMonth = Date("Ym");

           if ($that>=$currentMonth){
               $months[] = $a;
                }
            }
            $months = array_unique($months);

            return view('backend.holiday.holiday', compact('months'));
    }


    public function dateAjax(Request $request)
    {
        $holiday = $request->name;
        $my = explode("-",$holiday);
        $mnm = $my[0];
        $yr = $my[1];
        $date = date_parse($mnm);
        $month = $date['month'];

        $start_month = DB::table('holidays')->whereMonth('start_date', $month)->get();
        $start_year = DB::table('holidays')->whereMonth('start_date', $yr)->get();

        $output = "";

        foreach($start_month as $value){
            $output .= ' <tr >
                            <td>'.$value->start_date.''.'/'.''.$value->end_date.'</td>
                            <td> '.$value->occasion.' </td>
                            
                        </tr>';
        }
        echo $output;
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'start_date' => 'required|max:191' ,
            'end_date'   => 'max:191',
            'occasion'   => 'required|max:191',
        ));

        $holi = new Holiday;
        $holi->start_date       = $request->start_date;
        $holi->end_date         = $request->end_date;
        $holi->occasion         = $request->occasion;
        $holi->save();
        return redirect('admin/holidays')->withMsg("Created Successfully");
    }

    public function destroy(Holiday $holiday, $id)
    {
        $holiday = Holiday::find($id);
        $holiday->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function userIndex()
    {
        $holiday = Holiday::orderBy('start_date', 'ASC')->get();

        foreach($holiday as $data) {
            $a = Date("F-Y", strtotime($data->start_date));

            $that = Date("Ym", strtotime($data->start_date));

            $currentMonth = Date("Ym");

            if ($that>=$currentMonth){
                $months[] = $a;
            }
        }
        $months = array_unique($months);
        return view('users.holiday.holiday',compact('months'));
    }
}
