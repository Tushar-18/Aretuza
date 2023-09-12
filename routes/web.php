<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\validate;
use App\Http\Controllers\memberscontroller;
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
    return view('welcome')->with(compact('data'));
});
Route::view('welcome','welcome');
Route::view('login', 'login');
Route::post('login_action', [memberscontroller::class,'login']);
Route::view('register', 'register');
Route::post('register-action', [memberscontroller::class,'user_reg']);
Route::view('navbar', 'navbar');
Route::view('distribute', 'distribute');
Route::view('items','items');
Route::view('Store','store');
Route::view('footer','footer');
Route::view('buy','buy');
Route::view('Wishlist','wishlist');
Route::view('store','store');
Route::view('library','library');
Route::view('aboutus','aboutus');
Route::view('edit_profile','edit_profile');
Route::post('edit-profile',[validate::class,'edit_profile']);
Route::view('change_password','change_pwd');
Route::post('change_password',[validate::class,'edit_profile']);
Route::get('account_activation/{email}', [memberscontroller::class, 'account_activation']);

// admin
Route::view('admin/admin-sidebar','admin/admin-sidebar');
Route::view('admin/user-list','admin/user-list');
Route::get('admin/user-list',[memberscontroller::class,'fatch_data']);
Route::view('admin/game-list','admin/game-list');
Route::view('admin/add-games','admin/add-games');
Route::post('admin/add-games_a',[validate::class,'add_games']);
Route::view('admin/orders','admin/orders');
Route::view('admin/edit-game','admin/edit-game');
Route::post('admin/edit-game_a',[validate::class,'edit_games']);
Route::view('admin/rating','admin/rating');
Route::view('admin/add-user','admin/add-user');
Route::view('admin/edit-user','admin/edit-user');
Route::view('admin/add-categories','admin/add-categories');
Route::post('admin/add-categories_a', [validate::class, 'add_cat']);

Route::view('admin/admin-orders','admin/admin-orders');

Route::view('admin/allocate-category','admin/allocate-category');

