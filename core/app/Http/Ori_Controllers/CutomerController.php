<?php

namespace App\Http\Controllers;

use App\Cutomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CutomerController extends Controller
{
    public function cuctomerIndex()
    {
        $customer = Cutomer::all();
        return view('backend.customer.customer', compact('customer'));
    }

    public function cuctomerStore(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        Cutomer::create($request->all());
        return redirect()->back()->withmsg('Successfully Created');
    }

    public function cuctomerEdit($id)
    {
        $customer = Cutomer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }

    public function cuctomerUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        Cutomer::whereId($id)
            ->update([
               'full_name' => $request->full_name,
               'phone' => $request->phone,
               'email' => $request->email,
               'address' => $request->address,
               'password' => bcrypt($request->password),
               'include_word' => $request->include_word,
            ]);
        return redirect('admin/customer/management')->withmsg('Successfully Updated');
    }

    public function cuctomerDelete($id)
    {
        Cutomer::whereId($id)->delete();
        return redirect('admin/customer/management')->withmsg('Successfully Deleted');
    }

    public function customerProfile()
    {
        return view('customer.profile');
    }

    public function customerProfileUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' =>'required',
            'phone' =>'required',
            'email' =>'required',
            'passwordold' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);

        Cutomer::whereId($id)
            ->update([
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,

            ]);

        try {

            $c_password = Cutomer::find($id)->password;
            $c_id = Cutomer::find($id)->id;
            //return  $c_password;
            $user = Cutomer::findOrFail($c_id);
            if(Hash::check($request->passwordold, $c_password)){
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                return redirect()->back()->withMsg('Changes Successfully.');

            }else{

                session()->flash('message', 'Password Not Match');

                Session::flash('type', 'warning');

                return redirect()->back();

            }

        } catch (\PDOException $e) {

            session()->flash('message', 'Some Problem Occurs, Please Try Again!');

            Session::flash('type', 'warning');

            return redirect()->back();
        }

    }
}
