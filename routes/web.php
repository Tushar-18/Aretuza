<?php

use App\Http\Controllers\gamecontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\validate;
use App\Http\Controllers\memberscontroller;
use App\Models\Game;
use App\Models\Member;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data = Member::select()->get();
    $game = Game::select()->get();
    return view('welcome')->with(compact('data','game'));
});
Route::view('welcome','welcome');
Route::view('login', 'login');
Route::post('login_action', [memberscontroller::class,'login']);
Route::get('logout_action', [memberscontroller::class,'logout']);
Route::view('register', 'register');
Route::post('register-action', [memberscontroller::class,'user_reg']);
Route::view('navbar', 'navbar');
Route::view('distribute', 'distribute');
Route::view('items','items');
Route::get('items_a/{id}',[gamecontroller::class,'game_pro']);
Route::get('items',[gamecontroller::class,'chack_user']);
Route::view('Store','store');
Route::view('footer','footer');
Route::view('buy','buy');
Route::view('Wishlist','wishlist');
Route::view('store','store');
Route::view('library','library');
Route::view('aboutus','aboutus');
Route::post('edit-profile',[memberscontroller::class,'edit_profile']);
Route::get('edit_profile/{id}',[memberscontroller::class,'edit_users']);
Route::view('change_password','change_pwd');
Route::post('change_password',[validate::class,'edit_profile']);
Route::get('account_activation/{email}', [memberscontroller::class, 'account_activation']);

// admin
Route::view('admin/admin-sidebar','admin/admin-sidebar');
Route::view('admin/user-list','admin/user-list');
Route::get('admin/user-list',[memberscontroller::class,'fatch_data']);
Route::get('/user_status/{id}',[memberscontroller::class, 'status_users']);
Route::get('/delete-user/{id}',[memberscontroller::class, 'user_delete']);
Route::get('admin/game-list',[gamecontroller::class,'fetch_games']);
Route::get('game-status/{id}',[gamecontroller::class,'status_games']);
Route::get('delete-game/{id}',[gamecontroller::class,'delete_game']);
Route::view('admin/add-games', 'admin/add-games');
Route::post('admin/add-games_a',[gamecontroller::class,'add_games']);
Route::view('admin/orders','admin/orders');
Route::get('admin/edit-game/{id}',[gamecontroller::class,'edit_game']);
Route::post('admin/edit-game_a',[gamecontroller::class, 'update_games']);
Route::view('admin/rating','admin/rating');
Route::post('admin/add-user',[memberscontroller::class, 'admin_add_user_reg']);
// Route::view('admin/edit-user','admin/edit-user');
Route::get('admin/edit-user/{id}', [memberscontroller::class, 'edit_users']);
Route::post('admin/update-user', [memberscontroller::class, 'update_users']);
Route::get('admin/add-categories', [gamecontroller::class, 'feth_cat']);
Route::post('admin/add-categories_a', [gamecontroller::class, 'add_catagories']);

Route::view('admin/admin-orders','admin/admin-orders');

Route::get('admin/allocate-category/{id}',[gamecontroller::class, 'feth_allocate_cat']);
Route::post('admin/allocate-catagorie_a',[gamecontroller::class, 'allocate_catagories']);

