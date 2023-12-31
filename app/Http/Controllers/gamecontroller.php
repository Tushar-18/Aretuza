<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Catagories;
use App\Models\Member;
use App\Models\Orders;
use App\Models\Rating;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\file;
use Barryvdh\DomPDF\Facade\Pdf;
class gamecontroller extends Controller
{
    public function add_games(Request $req)
    {

        $req->validate([
            'game' => 'required',
            'price' => 'required',
            'age' => 'required',
            // 'cat' => 'required',
            'dec' => 'required|min:5',
            'pic' => 'required|max:300000'

        ]);
        $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
        $req->pic->move('Images/game_pic', $pic_name);

        $reg = new Game();
        $reg->game_name = $req->game;
        $reg->game_price = $req->price;
        $reg->new_price = $req->price;
        $reg->description = $req->dec;
        $reg->catagories = json_encode($req->cat);
        $reg->age_req = $req->age;
        $reg->game_pic = $pic_name;
        // return $req->cat;
        $reg->save();
        if ($reg->save()) {
            session()->flash('succ', 'Data saved successfully');
        } else {
            session()->flash('err', 'error in saving data');
        }
        return $this->fetch_games();
    }
    public function feth_cat()
    {
        $data = Catagories::select()->get();
        return view('admin/add-categories', compact('data'));
    }
    public function add_catagories(Request $req)
    {

        $req->validate([
            'description' => 'required',

        ]);
        $reg = new Catagories();
        $reg->catagories = $req->description;
        if ($reg->save()) {
            session()->flash('succ', 'Data saved successfully');
        } else {
            session()->flash('err', 'error in saving data');
        }
        $data = Catagories::select()->get();
        return view('admin/add-categories', compact('data'));
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
    public function chack_user()
    {
        if (session()->has('email')) {
            return view("items");
        } else {
            return view("login");
        }
    }
    public function game_pro($id)
    {
        $data = Game::where('game_id', $id)->first();
        $rat = Rating::where('game_id', $id)->get();
        $orders = Orders::where('user_id', session()->get('id'))->where('game_id', $id)->first();
        // $member=Member::where('email',session()->get('email'))->first();

        return view('items', compact('data', 'rat', 'orders'));
    }
    public function edit_game($id)
    {
        $data = game::where('game_id', $id)->first();
        return view('admin/edit-game', compact('data'));
    }
    public function update_games(Request $req)
    {
        $req->validate([
            'game' => 'required|min:3|max:20',
            'price' => 'required',
            'age_req' => 'required',
            'dec' => 'required',
            'offers' => 'required',

            'age_req' => 'required'


        ]);
        $result = game::where('game_id', $req->id)->first();
        // return $result;
        if ($req->hasFile('pic')) {

            $file_name = "Images/game_pic/" . $result['pic'];
            if (File::exists($file_name)) {
                File::delete($file_name);
            }

            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('images/game_pic/', $pic_name);
            $off =  $req->offers;
            $total = $req->price;
            $offer = ($off / $total) * 100;
            $result->where('game_id', $req->id)->update(array('game_name' => $req->game, 'game_price' => $req->price, 'description' => $req->dec, 'offers' => $req->offers, 'new_price' => $offer,  'age_req' => $req->age_req, 'game_pic' => $pic_name));
            session()->flash('succ', 'Data Updated successfully');
        } else {
            $off =  $req->offers;
            $total = $req->price;
            $offer = $total - (($off / 100) * $total);
            $result->where('game_id', $req->id)->update(array('game_name' => $req->game, 'game_price' => $req->price, 'description' => $req->dec, 'offers' => $req->offers, 'new_price' => $offer, 'age_req' => $req->age_req));
            session()->flash('succ', 'Data Updated successfully');
        }
        return $this->edit_game($req->id);
    }
    public function feth_allocate_cat($id)
    {
        $data = Catagories::select()->get();
        $data1 = game::where('game_id', $id)->first();
        return view('admin/allocate_category', compact('data', 'data1'));
    }
    public function allocate_catagories(Request $req)
    {
        $result = game::where('game_id', $req->id)->first();
        // return $result;
        // $result->catagories = json_encode($req->cat);
        // $result->save();
        $result->where('game_id', $req->id)->update(array('catagories' => json_encode($req->cat)));
        return redirect()->back();
    }
    public function store()
    {
        $id = Game::select()->latest()->get();
        $popular = Orders::select(DB::raw('COUNT(game_id) as count'))
            ->groupBy('game_id')
            ->orderBy('count', 'desc')
            // ->take(10)
            ->get();
        $pop = Game::select('game_id', DB::raw('COUNT(game_id) as count'))->groupBy('game_id')->orderBy('count', 'desc')->get();
        // return dd($pop);
        return view('store', compact('id', 'popular', 'pop'));
    }
    public function pdfdownload($id){
        // $data = Game::select()->get()->toArray();
        $data = Orders::where('user_id', session()->get('id'))->where('game_id', $id)->first()->toArray();
        $pdf = Pdf::loadView('inpdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('dow.pdf');
    }

    public function library_data(){
        $data = Orders::select()->get();
        
        return view('library', compact('data'));
    }
    public function search_item(Request $request)
    {
        $game = DB::table('Games')->where('game_name', 'LIKE', '%' . $request->search . "%")->get();
        return view('search', compact('game'));
    }


    public function wishlist($id)
    {
        if (session()->has('email')) {
            $data = Wishlist::where('user_id', session('id'))->where('game_id', $id)->first();
            // return $data;    
            if (empty($data)) {
                $result = Game::where('game_id', $id)->first();
                $cart = new Wishlist();
                $cart->user_id = session('id');
                $cart->game_id = $result['game_id'];
                $cart->game_pic = $result['game_pic'];
                $cart->game_name = $result['game_name'];
                $cart->email = session('email');
                $cart->fullname = session('name');
                $cart->game_price = $result['new_price'];
                $cart->save();
                return redirect()->back();
            } else {
                $data = Wishlist::where('user_id', session('id'))->where('game_id', $id)->delete();
                return redirect()->back();
            }
        } else {
            return view('login');
        }
    }
    public function mywishlist()
    {
        $data = Wishlist::where('user_id', session('id'))->get();
        return view('wishlist', compact('data'));
    }
}
