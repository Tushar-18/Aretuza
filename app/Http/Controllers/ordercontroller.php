<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Game;
use App\Models\Member;
use PDF;
class ordercontroller extends Controller
{
    public function order($id)
    {
        if (session()->has('email')) {
            // $data = DB::table('carts')
            // ->where('user_id', session('user_id'))
            // ->where('product_id', $product_id)->get();

            $result = Game::where('game_id', $id)->first();
            $cart = new Orders();
            $cart->email = session('email');
            $cart->fullname = session('name');
            $cart->user_id = session('id');
            $cart->game_id = $result['game_id'];
            $cart->game_pic = $result['game_pic'];
            $cart->game_name = $result['game_name'];
            $cart->game_price = $result['new_price'];
            $cart->save();
            return redirect()->back();
        } else {
            return view('login');
        }
    }
    public function fetch_orders()
    {
        $data = Orders::select()->get();
        $member = Member::select()->get();
        return view('admin/orders', compact('data','member'));
    }
    
}
