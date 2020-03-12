<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Laravelproject_new_admin;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
     //login page
     public function login(Request $request)
     {
         if (!empty(Session::get('user'))) {
             if (Session::get('user')->admin == 1) {
                 return redirect('admin');
             } elseif (Session::get('user')->store_owner == 1) {
                 return Redirect('/store_owner');
             } elseif (Session::get('user')->service_owner == 1) {
                 return Redirect('/service_owner');
             } elseif (Session::get('user')->restaurant_owner == 1) {
                 return Redirect('/restaurant_owner');
             }
         }
 
         $user = Laravelproject_new_admin::where('email', $request->input('Email'))->first();
         if (!empty($user) && !empty($request->input('password'))) {
             if ($user->status == '0') {
                 return view('elite.admin.login')->with('warning', 'Your account is not verified! Please verify it first.');
             } elseif ($user->blocked == '1') {
                 return view('elite.admin.login')->with('error', 'Your account is blocked from admin. contact to customer support thanks!');
             }
             $password = $request->input('password');
             $cpassword = hash('sha512', $password . $user->salt); //hasing the password
 
             $credentials = array(
                 'email' => $user->email,
                 'password' => $request->password
             );
 
             if (Auth::guard('admin')->attempt($credentials)) {
 
                 $request->session()->put('user', $user);
                 return redirect('admin');
             } elseif (empty($user->pass)) {
 
                 return view('elite.admin.login')->with('socialaccount', 'Please login with social account!');
             } else {
                 return  view('elite.admin.login')->with('error', 'Invalid Credentials!');
             }
         } else {
             return view('elite.admin.login')->with('error', 'Invalid Credentials!');
         }
     }

     
    public function logout()
    {
        Session::flush();
        return redirect('admin')->with('logout', 'Your Are Successfully logout!');
    }
}
