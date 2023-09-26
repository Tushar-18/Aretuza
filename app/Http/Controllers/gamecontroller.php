<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Catagories;
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
            'cat' => 'required',
            'dec' => 'required|min:5|max:20',
            'pic' => 'required|max:300000'

        ]);
        $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
        $req->pic->move('Images/game_pic', $pic_name);

        $reg = new Game();
        $reg->game_name = $req->game;
        $reg->game_price = $req->price;
        $reg->description = $req->dec;
        $reg->catagories = $req->cat;
        $reg->age_req = $req->age;
        $reg->game_pic = $pic_name;
        $reg->save();
        if ($reg->save()) {
            session()->flash('succ', 'Data saved successfully');
        } else {
            session()->flash('err', 'error in saving data');
        }

        return view('admin/game-list');
    }
    public function feth_cat(){
        $data = Catagories::select()->get();
        return view('admin/add-categories', compact('data'));
    }
    public function feth_cat_game()
    {
        $data = Catagories::select()->get();
        return view('admin/add-games', compact('data'));
    }
    public function add_catagories(Request $req)
    {

        $req->validate([
            'description' => 'required|min:3|max:20',

        ]);
        $reg = new Catagories();
        $reg->catagories = $req->description;
        if ($reg->save()) {
            session()->flash('succ', 'Data saved successfully');
        } else {
            session()->flash('err', 'error in saving data');
        }
      
        return view('admin/add-categories');
    }
    public function fetch_games()
    {
        $data = Game::select()->get();
        return view('admin/game-list', compact('data'));
    }

    public function status_games($id)
    {
        $data = game::where('game_id', $id)->first();
        if ($data['status'] == "Active") {
            DB::table('games')
            ->where('game_id', $id)
                ->update(['status' => 'Inactive']);
            return redirect('admin/game-list');
        } else {
            DB::table('games')
            ->where('game_id', $id)
                ->update(['status' => 'Active']);
            return redirect('admin/game-list');
        }
    }
    public function delete_game($id)
    {
            DB::table('games')
            ->where('game_id', $id)
                ->update(['status' => 'Deleted']);
            return redirect('admin/game-list');
    }
}
