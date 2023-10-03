<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\file;


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
        return 'hello'; 
        $req->validate([
            'name' => 'required|max:20|min:2',
            'dob' => 'required',
            'old_pwd' => 'required|min:4|max:10|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'new_pwd' => 'required|min:4|max:10|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'profile' => 'required|max:300000'
        ],[
            'name.required' => 'Name is required',
            'name.min' => 'Full name must contain minimum 3 characters',
            'name.max' => 'Full name must contain maximum of 30 characters',
            'dob.required' => 'Date of Birth is required',
            'old_pwd.required' => 'Old Password field cannot be empty',
            'old_pwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'old_pwd.min' => 'Old Password must contain minimum 3 characters',
            'old_pwd.max' => 'Old Password must contain maximum 20 characters',
            'new_pwd.required' => 'New Password field cannot be empty',
            'new_pwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'new_pwd.min' => 'New Password must contain minimum 3 characters',
            'new_pwd.max' => 'New Password must contain maximum 20 characters',
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
            $result->where('email', $req->em)->update(array('fullname' => $req->name,  'birth_date' => $req->dob, 'profile' => $pic_name));
            session()->flash('succ', 'Data Updated successfully');
        } else {
            $result->where('email', $req->em)->update(array('fullname' => $req->fn, 'birth_date' => $req->dob));
            session()->flash('succ', 'Data Updated successfully');
        }
        return redirect()->back();

        return view('edit_profile');
    }
}

