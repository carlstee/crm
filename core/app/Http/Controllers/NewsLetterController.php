<?php

namespace App\Http\Controllers;

use App\Cutomer;
use App\General;
use App\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public function newsIndex()
    {
        return view('backend.news_letter.news_letter');
    }

    public function newsHistory()
    {
        $news = NewsLetter::orderBy('id', 'desc')->paginate(15);
        return view('backend.news_letter.news_letter_history', compact('news'));
    }

    public function newsStore(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'detail' => 'required',
        ]);

        $news = NewsLetter::create([
            'title' => $request->title,
            'detail' => $request->detail,
        ]);


        $customer = Cutomer::all();

        foreach ($customer as $data)
        {
            send_email($data->email, $request->title, $request->detail );

        }

        return redirect()->back()->withMsg('Mail Sending Successful');
    }
}
