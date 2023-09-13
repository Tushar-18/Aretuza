<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class memberscontroller extends Controller
{
    public function user_reg(Request $req){

        $req->validate([
            'fn' => 'required|min:3|max:20',
            'em' => 'required|email',
            'pwd' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'pwd' => 'required',
            'pwd_confirmation' => 'required',
            'age' => 'required',

        ], [
            'fn.required' => ' Name is required',
            'fn.min' => 'Full name must contain minimum 3 characters',
            'fn.max' => 'Full name must contain maximum of 30 characters',
            'em.required' => 'Email address canniot be empty',
            'em.email' => 'invalid email address',
            'pwd.required' => 'Password field cannot be empty',
            'pwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'pwd.confirmed' => 'Password and Confirm Password must match',
            'pwd_confirmation.required' => 'please enter password',
            'age.required' => 'age is requried',

        ]);
      
           
        $reg = new Member();
        $reg->fullname = $req->fn;
        $reg->email = $req->em;
        $reg->birth_date = $req->age;
        $reg->password = $req->pwd;
        $reg->save();
        if ($reg->save()) {
            session()->flash('succ', 'Data saved successfully');
            $email = $req->em;
            $fn = $req->fn;
            $data = ['em' => $email, 'fn' => $fn];
            Mail::send('register_template', ["data1" => $data], function ($message) use ($data) {

                $message->to($data['em'], $data['fn']);
                $message->from("travaliya519@rku.ac.in", "Tushar");
            });
        } else {
            session()->flash('err', 'error in saving data');
        }

        return view('login');
    }
   
    public function login(Request $req)
    {
        $result = Member::where('email', $req->em)->where('password', $req->pwd)->first();
        if ($result == null) {
            return "invalid username and password";
        } else {
            $req->session()->put('email', $result['email']);
            $req->session()->put('pwd', $result['password']);
            $req->session()->put('name', $result['fullname']);
            $req->session()->put('pic', $result['pic']);

            return redirect('/');
        }
    
    }

    public function fatch_data(){
        $data = Member::select()->get();
        return view('admin/user-list',compact('data'));
    }
   
    public function account_activation($email)
    {
        $result = member::whereEmail($email)->first();
        if (empty($result)) {
            session()->flash('error', 'Your account is not registered. kindly register here.');
            return redirect('register');
        } else {
            if ($result->status == 'Active') {
                session()->flash('success', 'Your account is already activated kindly login');
            } else {
                $update = member::where('email', $email)->update(array('status' => 'Active'));
                if ($update) {
                    session()->flash('success', 'Your account is activated successfully. kindly login');
                } else {
                    session()->flash('error', 'Account activation failed please try after sometime.');
                }
            }
            return redirect('login');
        }

    }
}