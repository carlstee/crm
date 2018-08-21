<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function addNote()
    {
        return view('backend.note.add_note');
    }

    public function noteIndex()
    {
        $note = Note::orderBy('id', 'desc')->paginate(10);
        return view('backend.note.note', compact('note'));
    }

    public function noteDelete($id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $note = Note::whereId($id)->delete();
        return redirect()->back()->withMsg('Deleted');
    }

    public function noteEdit($id)
    {
        $note = Note::find($id);
        return view('backend.note.edit_note', compact('note'));
    }

    public function storeNote(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request, [
            'note_name' => 'required',
            'note_detail' => 'required'
        ]);
        Note::create($request->all());
        return redirect()->back()->withMsg('Note Added');
    }

    public function noteUpdate(Request $request, $id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request, [
            'note_name' => 'required',
            'note_detail' => 'required'
        ]);
        Note::whereId($id)->update([
            'note_name' => $request->note_name,
            'note_detail' => $request->note_detail,
        ]);
        return redirect('admin/note/list')->withMsg('Note Added');
    }


}
