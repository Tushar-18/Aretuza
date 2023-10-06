<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\Aboutus;
use Illuminate\Support\Facades\file;
class aboutuscontroller extends Controller
{
    public function about_us(Request $req)
    {
        $result = Aboutus::where('id', $req->id)->first();
        if ($req->hasFile('pic')) {

            $file_name = "Images/aboutus/" . $result['image'];
            if (File::exists($file_name)) {
                File::delete($file_name);
            }

            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('images/aboutus/', $pic_name);
            $result->where('id', $req->id)->update(array('description' => $req->dec, 'image' => $pic_name));
            session()->flash('succ', 'Data Updated successfully');
        } else {
            $result->where('id', $req->id)->update(array('description' => $req->dec));
            session()->flash('succ', 'Data Updated successfully');
        }
        return redirect()->back();
    }
    public function fetch_about(){
        $data = Aboutus::where('id', '1')->first();
        return view('aboutus', compact('data'));
    }
}
