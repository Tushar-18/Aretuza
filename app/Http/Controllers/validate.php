<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class validate extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'em' => 'required|email',
             'pwd' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
        ]);
       return view('welcome');
    }
    public function register(Request $req)
    {
        $req->validate([
            'fn' => 'required|min:3|max:20',
            'em' => 'required|email',
             'pwd' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'pwd' => 'required',
             'pwd_confirmation' => 'required',
            'age' => 'required',
            'discount' => 'required',
            'pic' => 'required|max:30000|mimes:jpg,png,gif,bmp'

        ], [
            'fn.required' => ' Name is required',
            'fn.min' => 'Full name must contain minimum 3 characters',
            'fn.max' => 'Full name must contain maximum of 30 characters',
            'em.required' => 'Email address canniot be empty',
            'em.email' => 'invalid email address',
            'pwd.required' => 'Password field cannot be empty',
            'pwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'pwd.confirmed' => 'Password and Confirm Password must match',
            'pwd_confirmation.required' => 'plz enter password',
            'age.required' => 'age is requried',
            'discount.required' => 'discount is requried'
        ]);
       return view('login');
    }
    public function add_games(Request $req)
    {
        $req->validate([
            'game' => 'required|min:3|max:20',
            'price' => 'required',
            'age' => 'required',
            'dec' => 'required|max:20',
            
            'pic' => 'required|max:30000|mimes:jpg,png,gif,bmp'
    
        ]);
       return view('admin/game-list');
    }
    public function edit_games(Request $req)
    {
        $req->validate([
            'game' => 'required|min:3|max:20',
            'price' => 'required',
            'age' => 'required',
            'dec' => 'required|max:20',
            
            'pic' => 'required|max:30000|mimes:jpg,png,gif,bmp'
    
        ]);
       return view('admin/game-list');
}
    public function add_cat(Request $req)
    {
        $req->validate([
            'cat' => 'required|min:3',

        ], [
            'cat.required' => ' Catagory is required',
        ]);
        return view('admin/add-categories');
    }
}
