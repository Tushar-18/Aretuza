<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\file;
use App\Models\DeleteToken;
use Carbon\Carbon;
use Exception;

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
        } else if($result['role'] == "user" && $result['status'] == "Active"){
            $req->session()->put('email', $result['email']);
            $req->session()->put('pwd', $result['password']);
            $req->session()->put('name', $result['fullname']);
            $req->session()->put('pic', $result['pic']);
            $req->session()->put('id',$result['id']);

            return redirect('/');
        }else if($result['role'] == "admin" && $result['status'] == "Active"){
            $req->session()->put('email', $result['email']);
            $req->session()->put('pwd', $result['password']);
            $req->session()->put('name', $result['fullname']);
            $req->session()->put('pic', $result['pic']);
            $req->session()->put('id',$result['id']);
            return redirect('admin/user-list');
        }
        else{
            return "Inactive Account";
        }
    
    }
    public function logout()
    {
        session()->forget('email');
        return redirect('login');
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
    
    public function status_users($id)
    {
        $data = Member::where('email', $id)->first();
        if ($data['status'] == "Active") {
            DB::table('members')
            ->where('email', $id)
                ->update(['status' => 'Inactive']);
            return redirect('admin/user-list');
        } else {
            DB::table('members')
            ->where('email', $id)
                ->update(['status' => 'Active']);
            return redirect('admin/user-list');
        }
    }
    public function user_delete($id){
        $data = Member::where('email', $id)->first();
        if ($data['status'] == "Active") {
            DB::table('members')
            ->where('email', $id)
            ->update(['status' => 'Deleted']);
            return redirect('admin/user-list');
        } else {
            DB::table('members')
            ->where('email', $id)
            ->update(['status' => 'Deleted']);
            return redirect('admin/user-list');
        }
    }
    public function update_users(Request $req){
        $result = Member::where('email', $req->em)->first();
        if ($req->hasFile('pic')) {

            $file_name = "Images/profile_pictures/" . $result['pic'];
            if (File::exists($file_name)) {
                File::delete($file_name);
            }

            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('images/profile_pictures/', $pic_name);
            $result->where('email', $req->em)->update(array('fullname' => $req->fn,  'birth_date' => $req->dob, 'pic' => $pic_name));
            session()->flash('succ', 'Data Updated successfully');
        } else {
            $result->where('email', $req->em)->update(array('fullname' => $req->fn, 'birth_date' => $req->dob));
            session()->flash('succ', 'Data Updated successfully');
        }
        return redirect()->back();
    }


public function admin_add_user_reg(Request $req){

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
    public function edit_users($id)
    {
        $data = Member::where('id', $id)->first();
        return view('admin/edit-user', compact('data'));
    }
    public function fetch_users($id){
        $data = Member::where('id', $id)->first();
        return view('edit_profile',compact('data'));
    }
    public function edit_profile(Request $req){
        $req->validate([
            'name' => 'required|max:20|min:2',
            'dob' => 'required',
            // 'old_pwd' => 'required|min:4|max:10|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            // 'new_pwd' => 'required|min:4|max:10|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'profile' => 'required|max:300000'
        ],[
            'name.required' => 'Name is required',
            'name.min' => 'Full name must contain minimum 3 characters',
            'name.max' => 'Full name must contain maximum of 30 characters',
            'dob.required' => 'Date of Birth is required',
            'profile.required' => 'Profile pohto not selected',
            'profile.max' => 'file size is lessthan 30MB'
        ]);

        $result = Member::where('email', $req->em)->first();
        if ($req->hasFile('pic')) {

            $file_name = "Images/profile_pictures/" . $result['profile'];
            if (File::exists($file_name)) {
                File::delete($file_name);
            }

            $pic_name = uniqid() . $req->file('profile')->getClientOriginalName();
            $req->pic->move('images/profile_pictures/', $pic_name);
            $result->where('email', $req->em)->update(array('fullname' => $req->name,  'birth_date' => $req->dob, 'pic' => $pic_name));
            session()->flash('succ', 'Data Updated successfully');
        } else {
            $result->where('email', $req->em)->update(array('fullname' => $req->name, 'birth_date' => $req->dob));
            session()->flash('succ', 'Data Updated successfully');
        }
        return redirect()->back();

        return view('edit_profile');
    }
    
    public function forget_password_form_submit(Request $req)
    {
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $rules = ['em' => 'required|email'];
        $errors = [
            'em.required' => 'Email addrss is a required field',
            'em.email' => 'Enter a valid email address'
        ];
        $req->validate($rules, $errors);
        $em = $req->em;
        $data = Member::where('email', $em)->first();
        if ($data) {
            $data1 = DeleteToken::where('email', $em)->first();
            if ($data1) {
                session()->flash('warning', 'A Password reset link is already sent to your mail please check. New link will be generated after old link expires');
            } else {
                date_default_timezone_set("Asia/Kolkata");
                $s_time = date("Y-m-d G:i:s");

                $token = hash('sha512', $s_time);
                $otp = mt_rand(100000, 999999);
                $data2 = array('name' => $data->fn, 'email' => $em, 'token' => $token, 'otp' => $otp);
                try {
                    Mail::send(['text' => 'mail_forget_pwd'], ["data3" => $data2], function ($message) use ($data2) {
                        $message->to($data2['email'], $data2['name'])->subject('Forget Password');
                        $message->from('travaliya519@rku.ac.in', 'Tushar');
                    });
                } catch (Exception $ex) {
                    session()->flash('error', 'We encountered some error in sending the password reset token');
                    return redirect('forget_password_form');
                }
                $expiry_time = Carbon::now()->addMinutes(30);
                $token_ins = new DeleteToken();
                $token_ins->email = $em;
                $token_ins->otp = $otp;
                $token_ins->token = $token;
                $token_ins->expiry_time = $expiry_time;
                if ($token_ins->save()) {
                    session()->flash('success', 'Password reset tokens sent to your registered email address');
                }
            }
        } else {
            session()->flash('error', 'Sorry the email address you entered is not registered.');
        }
        return redirect('forget_password_form');
    }

    public function verify_forget_pwd_otp($email, $token)
    {
        date_default_timezone_set("Asia/Kolkata");
        session()->put('forget_pwd_email', $email);
        session()->put('forget_pwd_token', $token);
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $data1 = DeleteToken::where('email', $email)->first();
        if ($data1) {
            return view('verify_otp_forget_pwd');
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function verify_otp_forget_password_action(Request $req)
    {

        $req->validate(['otp' => 'required|size:6'], ['otp.required' => 'OTP cannot be empty', 'otp.size' => 'OTP must have 6 digits only']);
        $otp = $req->otp;
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        $data = DeleteToken::where('email', $email)->where('token', $token)->first();
        if ($data) {
            if ($data->otp == $otp) {
                return view('reset_pwd');
            } else {
                session()->flash('error', 'Incorrect OTP');
                return view('verify_otp_forget_pwd');
            }
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function reset_pwd_action(Request $req)
    {
        $rules = [
            'npwd' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/|confirmed',
            'npwd_confirmation' => 'required',
        ];
        $errors = [
            'npwd.required' => 'Password field cannot be empty',
            'npwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'npwd.confirmed' => 'Password and Confirm Password must match',
            'npwd_confirmation.required' => 'Confirm Password must not be empty'
        ];
        $req->validate($rules, $errors);
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $data = DeleteToken::where('email', $email)->where('token', $token)->first();
        if ($data) {
            $data1 = Member::where('email', $email)->update(array('password' => $req->npwd));
            if ($data1) {
                DeleteToken::where('email', $email)->delete();
                session()->flash('succ', 'Password changed successfully');
                return redirect('login');
            }
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }
}

