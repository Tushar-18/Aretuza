<?php

namespace App\Http\Controllers;
use App\Models\game;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class gamecontroller extends Controller
{
    public function add_games(Request $req)
    {

        $req->validate([
            'game' => 'required|min:3|max:20',
            'price' => 'required',
            'age' => 'required',
            'dec' => 'required|max:20',

            'pic' => 'required|max:30000|mimes:jpg,png,gif,bmp'

        ]);
       


        $reg = new Game();
        $reg->fullname = $req->fn;
        $reg->email = $req->em;
        $reg->birth_date = $req->age;
        $reg->password = $req->pwd;
        $reg->save();
        if ($reg->save()) {
            session()->flash('succ', 'Data saved successfully');
        } else {
            session()->flash('err', 'error in saving data');
        }

        return view('admin/game-list');
    }
}
