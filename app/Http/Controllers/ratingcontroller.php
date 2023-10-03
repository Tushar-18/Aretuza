<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

class ratingcontroller extends Controller
{
    public function add_review(Request $req)
    {
        if (session()->has('email')) {
            // $data = DB::table('carts')
            // ->where('user_id', session('user_id'))
            // ->where('product_id', $product_id)->get();
            
                $result = Game::where('game_id', $req->id)->first();
                $cart = new Rating();
                $cart->email = session('email');
                $cart->fullname = session('name');
                $cart->game_id = $req->id;
                $cart->game_pic = $req->pic;
                $cart->pic = session('pic');
                $cart->review = $req->review;
                $cart->rating = $req->rating;
                $cart->save();
                return redirect()->back();
            
        } else {
            return view('login');
        }
    }
    public function fetch_review()
    {
        $data = Rating::select()->get();
        // $data = Products::where('product_id',1)->get();
        return view('admin/rating', compact('data'));
    }
}
