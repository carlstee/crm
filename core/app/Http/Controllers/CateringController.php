<?php

namespace App\Http\Controllers;

use App\Catering;
use App\FoodMill;
use App\Mail\FoodOrder;
use App\OfficeDetail;
use Carbon\Carbon;
use App\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CateringController extends Controller
{
    public function cateringIndex()
    {
        $service = Catering::orderBy('id', 'desc')->select('date')
            ->distinct()->paginate(20);
        return view('backend.catering.catering_date_wise', compact('service'));
    }

    public function cateringReport($date)
    {
        $service = Catering::where('date', $date)->get();
        return view('backend.catering.catering', compact('service'));
    }

    public function cateringCreate()
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $company = OfficeDetail::all();
        $package = FoodMill::all();
        return view('backend.catering.add_catering', compact('company', 'package'));
    }

    public function sendinvoice(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'comapany_id' => 'required',
            'package_id' => 'required',
            'quantity' => 'required',
            'invoice_id' => 'required',
        ]);
        $general = General::first();
        $cate = Catering::create([
            'comapany_id' => $request->comapany_id,
            'package_id' => $request->package_id,
            'quantity' => $request->quantity,
            'invoice_id' => $request->invoice_id,
            'payment' => $request->payment,
            'description' => $request->description,
            'due_amount' => $request->due_amount,
            'date' => Carbon::today(),
        ]);

        $if_else = '';
        if($cate->payment == 0):
            $if_else .='Due';
        else:
            $if_else .= 'Paid';
        endif;
        $foreach = '';
        foreach($cate->package->food_item as $data):
            $foreach .= '<li>'.$data->item.'</li>';
        endforeach;


        $message = 'Dear <b>'.$cate->company->owner_name.'</b> ('.$cate->company->office_name.'),<br/><br/>


        This is a billing notice that your invoice no. <b>'.$cate->invoice_id.'</b> which was generated on '.date('Y,M-d', strtotime($cate->date)).' is now overdue.<br/><br/>


        Your payment status is: '.$if_else.'<br/><br/>

        Invoice: '.$cate->invoice_id.',<br/>
        Total: '.$cate->package->package_price * $cate->quantity.' '.$general->currency.',<br/>
        Due Date: '.date('Y,M-d', strtotime($cate->updated_at)).'<br/><br/>

        You can Contact us for more information.<br/><br/>

        Regards,<br/>
        <b>'.$general->name.'</b>. ';


        send_email($cate->company->email, 'Invoice From '.$general->name, $message );

        return view('backend.invoice.invoice', compact('cate'));
    }

    public function cateringEdit($id)
    {
        $service = Catering::find($id);
        $company = OfficeDetail::all();
        $package = FoodMill::all();
        return view('backend.catering.catering_edit', compact('service', 'company', 'package'));
    }

    public function cateringUpdate(Request $request, $id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'comapany_id' => 'required',
            'package_id' => 'required',
            'quantity' => 'required',
        ]);

        Catering::whereId($id)
            ->update([
                'comapany_id' => $request->comapany_id,
                'package_id' => $request->package_id,
                'quantity' => $request->quantity,
                'payment' => $request->payment,
                'due_amount' => $request->due_amount,
                'description' => $request->description
            ]);
        return redirect('admin/catering/system')->withMsg('Updated');
    }

    public function printInvoice($id)
    {
        $cate = Catering::find($id);
        return view('backend.invoice..invoice', compact('cate'));
    }

    public function officeAcountIndex()
    {
        $cate = Catering::where('payment', 0)->orderBy('id', 'desc')
            ->paginate(15);
        return view('backend.catering_office.catering_office', compact('cate'));
    }

    public function officeAcountIndexPaid(Request $request,$id)
    {
        Catering::whereId($id)
            ->update([
                'payment' => 1,
                'due_amount' => ''
            ]);
        return redirect()->back();
    }
}
