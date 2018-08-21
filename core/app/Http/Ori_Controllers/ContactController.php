<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactNumber;
use App\Note;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactIndex()
    {
        $contact = Contact::all();
        return view('backend.contact.contact', compact('contact'));
    }

    public function contactDelete($id)
    {
        $contact = Contact::whereId($id)->delete();
         ContactNumber::where('contact_id',$id)->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function contactEdit($id)
    {
        $contact = Contact::find($id);
        return view('backend.contact.contact_edit', compact('contact'));
    }

    public function contactStore(Request $request)
    {
        $this->validate($request,array(
            'name' => 'required|max:191',
            'number' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|max:191',
        ));

        $note = Contact::create([
           'name' => $request->name,
           'last_name' => $request->last_name,
           'email' => $request->email,
        ]);

        foreach ($request->number as $data) {
            ContactNumber::create([
                'contact_id' => $note->id,
                'number' => $data,
            ]);
        }
        return redirect()->back()->withMsg('Successfully Created');
    }

    public function contactUpdate(Request $request, $id)
    {
        $this->validate($request,array(
            'name' => 'required|max:191',
            'number' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|max:191',
        ));

        $note = Contact::whereId($id)->update([
           'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        for ($i = 0; $i < count($request->number); $i++) {
            ContactNumber::updateOrCreate(['id' => $request->item_id[$i],], [
                'number' => $request->number[$i],
                'contact_id' => $id
            ]);
        }
        return redirect('admin/contact')->withMsg('Successfully Updated');
    }
}
