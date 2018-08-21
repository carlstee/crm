<?php

namespace App\Http\Controllers;

use App\OfficeDetail;
use Illuminate\Http\Request;

class OfficeDetailController extends Controller
{
    public function indexOffice()
    {
        $office = OfficeDetail::orderBy('id', 'desc')->paginate(15);
        return view('backend.office.office', compact('office'));
    }

    public function storeOffice(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request, array(
            'office_name' => 'required',
            'owner_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
        ));

        OfficeDetail::create($request->all());
        return redirect()->back()->withmsg('Successfully Added');
    }

    public function editOffice($id)
    {
        $office = OfficeDetail::find($id);
        return view('backend.office.office_edit', compact('office'));
    }

    public function updateOffice(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'office_name' => 'required',
            'owner_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
        ]);
        OfficeDetail::whereId($request->id)
            ->update([
                'office_name' => $request->office_name,
                'owner_name' => $request->owner_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'location' => $request->location,
            ]);
        return redirect('admin/office')->withMsg('Updated');
    }

    public function destroyOffice(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        OfficeDetail::whereId($request->id)->delete();
        return redirect()->back()->withmsg('Deleted');
    }
}
