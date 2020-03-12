<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Laravelproject_new_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreAuthController extends Controller
{
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

        $user = Laravelproject_new_user::where('email', $request->input('Email'))->first();
        if (!empty($user) && !empty($request->input('password'))) {
            if ($user->status == '0') {
                return view('elite.admin.login')->with('warning', 'Your account is not verified! Please verify it first.');
            } elseif ($user->blocked == '1') {
                return view('elite.admin.login')->with('error', 'Your account is blocked from admin. contact to customer support thanks!');
            }
            $password = $request->input('password');
            $cpassword = hash('sha512', $password . $user->salt);
            // $credentials = $request->only('Email', 'password');

            $credentials = array(
                'email' => $user->email,
                'password' => $request->password
            );

            if (Auth::attempt($credentials)) {
                $request->session()->put('user', $user);
                if ($user->admin == '1') {
                    return redirect('admin');
                } else if ($user->store_owner == '1') {
                    $store_id = DB::table('laravelproject_new_store_register')->select('store_id')->where('user_id', Auth::user()->id)->first()->store_id;
                    Session::put('store_id', $store_id);
                    return Redirect('/store_owner');
                } else {
                    return view('elite.store_owner.login');
                }
            } elseif (empty($user->pass)) {

                return view('elite.store_owner.login')->with('socialaccount', 'Please login with social account!');
            } else {
                return  view('elite.store_owner.login')->with('error', 'Invalid Credentials!');
            }
        } else {
            return view('elite.store_owner.login')->with('error', 'Invalid Credentials!');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect('store_owner.login')->with('logout', 'Your Are Successfully logout!');
    }

    
    public function store_register(Request $request)
    {


        if (!empty($request->all())) {
            $users = new Laravelproject_new_user;
            $valid_user = Laravelproject_new_user::where('email', $request->input('Email'))->first();
            $store_name_exist = DB::table('laravelproject_new_store_register')->select('store_name')->where('store_name', $request->input('store_name'))->first();
            if (!empty($store_name_exist)) {
                return Redirect('signup/store')->with('error', $store_name_exist->store_name . ' Store Already Exist, Kindly Change Your Store Name!')->withInput(Input::except('store_name'));
            }
            if (!empty($valid_user)) {
                return Redirect('signup/store')->with('error', 'Email Already Exist, Kindly Change Your Email!')->withInput();
            }
            $this->validate($request, [
                'Email' => 'email',
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password',
                // 'g-recaptcha-response' => 'required|recaptcha',
                'file' => 'max:10000',
            ]);
            $validation_code = sha1(microtime(TRUE) . mt_rand(10000, 90000));
            $fname = $request->input('fName');
            $lname = $request->input('lName');
            $users->name = $fname . ' ' . $lname;
            $username = substr($request->input('Email'), 0, -10);
            $users->username     = $username;
            $users->email = $request->input('Email');
            $users->validation_code = $validation_code;


            $pass = self::generate_rand_pass($request->input('password'));

            $users->password = $pass;
         

            if($request->input('register_as_store') == 1){
                $users->store_owner = "1";
            }else{
                $users->store_owner = "0";

            }
            if($request->input('register_as_service') == 1){
                $users->service_owner = "1";
            }else{
                $users->service_owner = "0";

            }
            if($request->input('register_as_restaurant') == 1){
                $users->restaurant_owner = "1";
            }else{
                $users->restaurant_owner = "0";

            }


            $users->pickup_owner = "0";
            $users->status = "1";

            $users->save();
            $user_id = DB::table('laravelproject_new_users')->select('id')->orderBy('id', 'DESC')->first();
            if (empty($request->input('commission_price')) && empty($request->input('commission_percentage'))) {
                $commission_price = null;
                $commission_percentage = "10%";
            } else {
                if (!empty($request->input('commission_price'))) {
                    $commission_price = $request->input('commission_price');
                    $commission_price .= '$';
                } else {
                    $commission_price = $request->input('commission_price');
                }
                if (!empty($request->input('commission_percentage'))) {
                    $commission_percentage = $request->input('commission_percentage');
                } else {
                    $commission_percentage = $request->input('commission_percentage');
                }
            }
            $store_info = array(
                "user_id" => $user_id->id,
                "store_name" => $request->input('store_name'),
                "company_name" => $request->input('company_name'),
                "store_type" => $request->input('store_type'),
                "country" => $request->input('country'),
                "store_phone_no" => $request->input('store_phone_no'),
                "city" => $request->input('city'),
                "address" => $request->input('address'),
                "state" => $request->input('state'),
                "zip_code" => $request->input('zip_code'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                "commission_type" => $request->input('commission_type'),
                "commission_percentage" => $commission_percentage,
                "commission_price" => $commission_price,
                "store_desc" => $request->input('store_desc'),

            );
            $store_category_info = array(
                "store_owner_id" => $user_id->id,
                "category_name" => $request->input('store_category'),
                'image' => 'https://www.insertcart.com/wp-content/uploads/2016/09/category.png',
                'admin_approve' => '1',
            );
            DB::table('laravelproject_new_store_category')->insert($store_category_info);
            DB::table('laravelproject_new_store_register')->insert($store_info);
            $store_id = DB::table('laravelproject_new_store_register')->select('store_id')->orderBy('store_id', 'DESC')->first();
            $sat = array(
                'saturday_opening_time' => $request->input('saturday_opening_time'),
                'saturday_closing_time' => $request->input('saturday_closing_time'),
            );
            $sun = array(
                'sunday_opening_time' => $request->input('sunday_opening_time'),
                'sunday_closing_time' => $request->input('sunday_closing_time'),
            );
            $mon = array(
                'monday_opening_time' => $request->input('monday_opening_time'),
                'monday_closing_time' => $request->input('monday_closing_time'),
            );
            $tue = array(
                'tuesday_opening_time' => $request->input('tuesday_opening_time'),
                'tuesday_closing_time' => $request->input('tuesday_closing_time'),
            );
            $wed = array(
                'wednesday_opening_time' => $request->input('wednesday_opening_time'),
                'wednesday_closing_time' => $request->input('wednesday_closing_time'),
            );
            $thur = array(
                'thursday_opening_time' => $request->input('thursday_opening_time'),
                'thursday_closing_time' => $request->input('thursday_closing_time'),
            );
            $fri = array(
                'friday_opening_time' => $request->input('friday_opening_time'),
                'friday_closing_time' => $request->input('friday_closing_time'),
            );
            $store_availability_timing = array(
                "user_id" => $user_id->id,
                "store_id" => $store_id->store_id,
                "saturday" => json_encode($sat),
                "sunday" => json_encode($sun),
                "monday" => json_encode($mon),
                "tuesday" => json_encode($tue),
                "wednesday" => json_encode($wed),
                "thursday" => json_encode($thur),
                "friday" => json_encode($fri),
            );
            DB::table('laravelproject_new_store_availability_timing')->insert($store_availability_timing);

            // $encrypt_email = sha1($users->email);
            // $data = array('emailto'=>$request->input('Email'),'name'=>$users->name );
            // Mail::send('elite.test',['validation_code'=> 'https://localhost/myproject/public/email_validate?c='.$validation_code.'&e='.$encrypt_email], function($message) use($data){
            //     $message->to($data['emailto'],$data['name'])->subject('Confirm Email!');
            // });

            return Redirect('signup/store')->with('message', 'You can login now as Store owner! Thanks for registration');

            // return Session('users')->name;
        } else {
            return view('elite.store_register');
        }
    }
}
