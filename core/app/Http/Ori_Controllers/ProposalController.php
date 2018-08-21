<?php

namespace App\Http\Controllers;

use App\Cutomer;
use App\General;
use App\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProposalController extends Controller
{
    public function sendPropsal()
    {
        $customer = Cutomer::all();
        return view('backend.proposal.proposal', compact('customer'));
    }

    public function sendProposalCustomer(Request $request)
    {
        $this->validate($request,[
            'customer_id' => 'required',
            'document' => 'required|mimes:pdf,docx,doc,zip',
            'detail' => 'required'
        ]);

        $pro = Proposal::create([
           'customer_id' => $request->customer_id,
           'detail' => $request->detail,
        ]);

        $file = $request->file('document');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/proposal/', $filename);
        $pro->document = $filename;
        $pro->save();

        $general = General::find(1);
        $customer = Cutomer::where('id', $pro->customer_id)->first();

        $file_to_attach = asset('assets/proposal/'.$filename);
        $headers = "From: $general->name <$general->email>\r\n";

       mail($customer->email,'Proposal From '.$general->name, $request->detail.'Here Is Your link' .$file_to_attach, $headers);
//        send_email($customer->email, 'Proposal From '.$general->name,  $request->detail. $file_to_attach );

        return redirect()->back()->withMsg('Successfully Send');

    }

    public function proposalHistory()
    {
        $proposal = Proposal::orderBy('id', 'desc')->paginate(15);
        return view('backend.proposal.proposal_history', compact('proposal'));
    }

}
