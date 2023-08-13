<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::view('login', 'login');
Route::view('register', 'register');
Route::view('navbar', 'navbar');
Route::view('distribute', 'distribute');
Route::view('items','items');
Route::view('Store','store');
Route::view('footer','footer');

// admin
Route::view('admin/admin-sidebar','admin/admin-sidebar');
Route::view('admin/user-list','admin/user-list');
Route::view('admin/game-list','admin/game-list');
