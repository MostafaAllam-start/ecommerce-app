<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.layout.dashboard');
    }
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ];

            $customMessages = [
                'email.required' => "Email is required.",
                'email.email' => 'Valid email is required.',
                'password.required' => 'Password is required.',
            ];

            $this->validate($request, $rules, $customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with("error_message","Invalid Email or Password");
            }
        }
          return view('admin.login');  
    }
    public function update_password(){
        if($request->isMethod('post')){
            $rules = [
                'current_passwrod' => 'current_password',
                'new_password' => 'required|max:30|confirmed',
            ];
            $customMessages = [
                'current_password.required' => 'Password is required.',
                'new_password.confirmed' => 'Password and password confirm are not the same.'

            ];
            
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
