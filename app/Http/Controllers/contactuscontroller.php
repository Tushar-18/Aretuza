<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;

class contactuscontroller extends Controller
{
    public function contactus(Request $req)
    {

        $req->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $reg = new contactus();
        $reg->email = $req->email;
        $reg->subject = $req->subject;
        $reg->message = $req->message;      
        $reg->save();
        if ($reg->save()) {
            session()->flash('succ', 'Data saved successfully');
        } else {
            session()->flash('err', 'error in saving data');
        }
        return redirect()->back();
    }
    public function fetch_data()
    {
        $data = Contactus::select()->get();
        return view('admin/contactus', compact('data'));
    }
}
