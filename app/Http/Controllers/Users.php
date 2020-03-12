<?php

namespace App\Http\Controllers;

use Cart;
use View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use App\Laravelproject_new_user;
use App\Contact;
use App\Order_create;
use App\Customer_info;
use Session;
use Socialite;
use Illuminate\Support\Facades\Crypt;
use App\Subscribe;
use Exception;
use Hash;
use App\AddtoCart;
use App\Laravelproject_new_customer;
use Illuminate\Support\Facades\Input;
use App\Mail\SendForgetPasswordMail;
use Validator;

class Users extends Controller
{

    public function handleFacebookCallback()
    { }


    public function redirectSocial($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callbackSocial($provider)
    {

        $getInfo = Socialite::driver($provider)->user();

        $user = self::createUserSocial($getInfo, $provider);
        if ($user[0] != 'error') {
            return Redirect('profile');
        } else {
            return redirect('index')->with('social_email_error', 'We found a account using the same Email. ' . $user[1] . ' 
                      Please sign in with password if you forgot than reset.');
        }
    }

    function createUserSocial($getInfo, $provider)
    {
        $users = new Laravelproject_new_user;
        $users->name     = $getInfo->name;
        $username = substr($getInfo->email, 0, -10);
        $users->username     = $username;
        $users->email    = $getInfo->email;
        $users->status = '1';
        $users->image = $getInfo->avatar;
        $users->social_account_login = $provider;
        $email = Laravelproject_new_user::where('email', $users->email)->first();
        if (empty($email)) {
            $users->save();
            $users->avatar = $getInfo->avatar;
            session::put('user', $users);
        } else {
            return ["error", $getInfo->email];
        }
    }


    public function generate_rand_pass($inp_pass)
    {

        // $password['salt'] = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), TRUE));
        return Hash::make($inp_pass); 
      
    }
    public function signup(Request $request)
    {
        if (!empty($request->all())) {
            $users = new Laravelproject_new_user;
            $valid_user = Laravelproject_new_user::where('email', $request->input('Email'))->first();

            if (!empty($valid_user)) {
                return Redirect('index')->with('error', 'Email Already Exist, Kindly Change Your Email!');
            }
            $this->validate($request, [
                'Email' => 'email',
                'password' => 'required|min:6',
                'cpassword' => 'required|min:6|same:password',
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
            foreach ($pass as $value) {
                $users->pass = $value['pass'];
                $users->salt = $value['salt'];
            }

            if ($request->input('register_type') == "store") {
                $users->store_owner = "1";
                $users->service_owner = "0";
                $users->pickup_owner = "0";
            } elseif ($check == "service_owner") {
                $users->store_owner = "0";
                $users->service_owner = "1";
                $users->pickup_owner = "0";
            } elseif ($check == "pickup") {
                $users->store_owner = "0";
                $users->service_owner = "0";
                $users->pickup_owner = "1";
            }

            $users->save();
            // $encrypt_email = sha1($users->email);
            // $data = array('emailto'=>$request->input('Email'),'name'=>$users->name );
            // Mail::send('elite.test',['validation_code'=> 'https://localhost/myproject/public/email_validate?c='.$validation_code.'&e='.$encrypt_email], function($message) use($data){
            //     $message->to($data['emailto'],$data['name'])->subject('Confirm Email!');
            // });
            return Redirect('index')->with('message', 'Confirmation mail has been sent to your email! After Confirmation you can login with your credentials.');

            // return Session('users')->name;
        } else {
            return view('elite.index');
        }
    }

    public function login(Request $request)
    {

        $user = Laravelproject_new_user::where('email', $request->input('Email'))->first();
        if (!empty($user) && !empty($request->input('password'))) {
            if ($user->status == '0') {
                return Redirect('index')->with('warning', 'Your account is not verified! Please verify it first.');
            } elseif ($user->blocked == '1') {
                return Redirect('index')->with('error', 'Your account is blocked from admin. contact to customer support thanks!');
            }
            $password = $request->input('password');
            $cpassword = hash('sha512', $password . $user->salt);
            if ($user->pass == $cpassword) {
                $request->session()->put('user', $user);
                if ($user->admin == '1') {
                    return Redirect('/admin');
                } else if ($user->store_owner == '1') {
                    return Redirect('/store_owner');
                } else if ($user->service_owner == '1') {
                    return Redirect('/service_owner');
                } else if ($user->restaurant_owner == '1') {
                    return Redirect('/restaurant_owner');
                } else {
                    return Redirect('index');
                }
            } elseif (empty($user->pass)) {
                return Redirect('index')->with('socialaccount', 'Please login with social account!');
            } else {
                return Redirect('index')->with('error', 'Invalid Credentials!');
            }
        } else {
            return Redirect('index')->with('error', 'Invalid Credentials!');
        }
    }
    public function logout()
    {
        Session::flush();
        return Redirect('store_owner/login')->with('logout', 'Your Are Successfully logout!');
    }

    public function profile(Request $request)
    {
        if (empty(session::get('user'))) {
            return redirect('/')->with('login', 'You have to login first to access your profile!');
        }
        if ($request->SaveChanges) {
            $id = session::get('user')->id;

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/userimages', $filename);
                $image = 'uploads/userimages/' . $filename;

                if (session::has('user,image')) {
                    session::forget('user,image');
                }
                Session::push('user,image', $image);
            }
            $this->validate($request, [
                'Email' => 'email',
                'password' => 'required|min:6',
                'cpassword' => 'required|min:6|same:password',
            ]);
            $pass = self::generate_rand_pass($request->input('password'));
            foreach ($pass as $value) {
                $password = $value['pass'];
                $salt = $value['salt'];
            }
            if (empty($image)) {
                if (!empty(session::get('user')->avatar)) {
                    $image = session::get('user')->avatar;
                } else {
                    $image = session::get('user')->image;
                }
            }
            $updateDetails = array(
                'name'  => $request->fname . ' ' . $request->lname,
                'username'  => substr($request->email, 0, -10),
                'email' => $request->email,
                'pass'  => $password,
                'salt'  => $salt,
                'image' => $image
            );
            $updatDetails = array(
                'name'  => $request->fname . ' ' . $request->lname,
                'username'  => substr($request->email, 0, -10),
                'pass'  => $password,
                'salt'  => $salt,
                'image' => $image
            );
            $email = Laravelproject_new_user::where('email', $request->email)->first();
            if (!empty($email)) {
                $update = DB::table('laravelproject_new_users')
                    ->where('id', $id)
                    ->where('email', $request->email)
                    ->update($updatDetails);
                if (!$update) {
                    return redirect('profile')->with('email_error', 'Email Already in use, Please change your email!');
                }
            } else {
                DB::table('laravelproject_new_users')
                    ->where('id', $id)
                    ->update($updateDetails);
            }

            return redirect('logout')->with('changesSave', 'Your changes saved successfully!');
        }
        if (session::get('user')->admin == 0) {
            return view('elite/profile')->with('Setpass', 'Set your password right now please!');
        } else {
            return view('elite/admin/profile')->with('Setpass', 'Set your password right now please!');
        }
    }

    public function email_validate()
    {
        $e = Request()->query('e');
        $c = Request()->query('c');
        $user = Laravelproject_new_user::select('status')->where('validation_code', $c)->first();
        DB::table('laravelproject_new_users')
            ->where('validation_code', $c)
            ->update(['status' => '1']);
        return redirect('index')->with('login', 'Your account has been varified successfully!')->with('resend_email', "Resend email");
    }
    public function Resend_Email(Request $request)
    {
        $validation_code = sha1(microtime(TRUE) . mt_rand(10000, 90000));
        DB::table('laravelproject_new_users')->where('email', $request->email)->update(['validation_code' => $validation_code]);
        $data = array('emailto' => $request->input('Email'));
        $encrypt_email = sha1($request->input('Email'));
        Mail::send('elite.test', ['validation_code' => 'https://localhost/myproject/public/email_validate?c=' . $validation_code . '&e=' . $encrypt_email], function ($message) use ($data) {
            $message->to($data['emailto'])->subject('Confirm Email!');
        });
        return Redirect('index')->with('message', 'Confirmation mail has been sent to your email! After Confirmation you can login with your credentials.');
    }
    public function contact(Request $request)
    {
        if (!empty($request->send)) {
            $user = new Contact;
            $user->name = $request->Name;
            $user->email = $request->Email;
            $user->subject = $request->Subject;
            $user->message = $request->Message;
            $user->save();
            return back()->with('message_sent', 'Your message has been sent successfully!');
        }
        return view('elite/contact');
    }
    public function subscriber(Request $request)
    {
        if (!empty($request->subs)) {
            $subs = DB::table('laravelproject_new_subscribes')->where('email', $request->email)->first();
            if (empty($subs)) {
                $sub = new Subscribe;
                $sub->email = $request->email;
                $sub->save();
                return back()->with('subscribe_ok', 'You have successfully subscribed our newsletter!');
            } else {
                return back()->with('subscribe_already', 'You already subscribed our newsletter!');
            }
        }
        return back()->with('subscribe_not', 'There is an error please try again later!');
    }
    public function Order()
    {
        if (empty(session::get('user'))) {
            return redirect('/')->with('login', 'You have to login first to access your profile!');
        }
        $data['content'] = DB::table('laravelproject_new_order_creates')->where('user_email', session::get('user')->email)->get();
        $data1 = array();
        foreach ($data['content'] as $content) {
            $data1[] = DB::table('laravelproject_new_add_products')->where('p_id', $content->product_id)->first();
        }
        foreach ($data1 as $valu) {
            $val[]['title'] = $valu->title;
        }
        return view('elite/order')->with('data', $data)->with('data1', $val);
    }

    public function ResetPassEmail(Request $request)
    {
        $mail = DB::table('laravelproject_new_users')->where('email', $request->email)->first();
        if ($mail) {
            $validation_code = sha1(microtime(TRUE) . mt_rand(10000, 90000));
            DB::table('laravelproject_new_users')->where('email', $request->email)->update(['validation_code' => $validation_code]);
            $data = array('emailto' => $request->email);
            $encrypt_email = Crypt::encryptString($request->email);
            Mail::send('elite.test', ['validation_code' => 'https://localhost/myproject/public/ResetPassword?c=' . $validation_code . '&e=' . $encrypt_email], function ($message) use ($data) {
                $message->to($data['emailto'])->subject('Reset Password!');
            });
            return Redirect('index')->with('message', 'Confirmation mail has been sent to your email! After Confirmation you can reset your password.');
        } else {
            return Redirect('index')->with('warning', 'Sorry we cannot find your email in our record kindly register first!');
        }
    }
    public function ResetPassword(Request $request)
    {
        $e = Request()->query('e');
        $c = Request()->query('c');

        $user = Laravelproject_new_user::select('validation_code')->where('validation_code', $c)->first();
        if ($user) {
            if ($request->submit) {
                $this->validate($request, [
                    'password' => 'required|min:6',
                    'cpassword' => 'required|min:6|same:password',
                ]);
                $pass = self::generate_rand_pass($request->input('password'));
                foreach ($pass as $value) {
                    $password = $value['pass'];
                    $salt = $value['salt'];
                }
                $update = array(
                    'pass'  => $password,
                    'salt'  => $salt,
                );

                $decrypted = Crypt::decryptString($request->email_validate);
                $data = DB::table('laravelproject_new_users')
                    ->where('email', $decrypted)
                    ->update($update);
                return redirect('index')->with('login', 'Your password reset successfully!');
            }
            return view('elite/reset-password')->with('login', 'Now you can reset your password!');
        }
        return redirect('index')->with('login', 'Your account connot varified try again!')->with('resend_email', "Resend email");
    }

    public function shipping_address_users()
    {

        $data  = DB::table('laravelproject_new_customer_infos')->where('user_id', session::get('user')->id)->get();
        return view('elite/shipping_address_user', compact('data'));
    }
    public function delete_address($id = null)
    {
        DB::table('laravelproject_new_customer_infos')->where('id', $id)->delete();
        return back()->with('message', 'Record Successfully Deleted!');
    }

    public function card_info_users()
    {
        $data  = DB::table('laravelproject_new_card_infos')->where('user_id', session::get('user')->id)->get();
        return view('elite/card_info_user', compact('data'));
    }
    public function delete_card($id = null)
    {
        DB::table('laravelproject_new_card_infos')->where('id', $id)->delete();
        return back()->with('message', 'Record Successfully Deleted!');
    }
    public function edit_address(Request $request, $id = null)
    {

        if ($request->singlebutton) {
            $updateDetails = array(
                'fname'  => $request->fname,
                'lname'  => $request->lname,
                'email' => $request->email,
                'address'  => $request->address,
                'apt'  => $request->apt,
                'city'  => $request->city,
                'country'  => $request->country,
                'postal_code'  => $request->postal_code,
                'phone'  => $request->phone,

            );
            $update = DB::table('laravelproject_new_customer_infos')
                ->where('id', $id)
                ->update($updateDetails);
            return redirect('shipping_address')->with('message', 'Record Successfully Updated!');
        }
        $data  = DB::table('laravelproject_new_customer_infos')->where('id', $id)->get();
        return view('elite/edit_address', compact('data'));
    }
    public function restaurant_register(Request $request)
    {

        if (!empty($request->all())) {

            $users = new Laravelproject_new_user;
            $valid_user = Laravelproject_new_user::where('email', $request->input('Email'))->first();
            $business_name_exist = DB::table('laravelproject_new_restaurant_register')->select('business_name')->where('business_name', $request->input('business_name'))->first();
            if (!empty($business_name_exist)) {
                return Redirect('signup/restaurant')->with('error', $business_name_exist->business_name . ' Already Exist, Kindly Change Your Business Name!')->withInput(Input::except('business_name'));
            }
            if (!empty($valid_user)) {
                return Redirect('signup/restaurant')->with('error', 'Email Already Exist, Kindly Change Your Email!')->withInput();
            }
            $this->validate($request, [
                'Email' => 'email',
                'password' => 'required|min:6',
                'cpassword' => 'required|min:6|same:password',
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
            foreach ($pass as $value) {
                $users->pass = $value['pass'];
                $users->salt = $value['salt'];
            }

            $users->store_owner = "0";
            $users->service_owner = "0";
            $users->restaurant_owner = "1";
            $users->pickup_owner = "0";
            $users->status = "1";
            $users->save();
            $user_id = DB::table('laravelproject_new_users')->select('id')->orderBy('id', 'DESC')->first();
            $multi_image = array();
            if ($files = $request->file('menu_img')) {
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move('uploads/products/', $name);
                    $multi_image[] = 'uploads/products/' . $name;
                }
            } else {
                $multi_image[] = 'uploads/products/nophoto.jpg';
            }
            $restaurant_info = array(
                "user_id" => $user_id->id,
                "merchant_type" => $request->input('merchent_type'),
                "no_of_locations" => $request->input('no_of_location'),
                "phone_no" => $request->input('phone_no'),
                "address" => $request->input('address'),
                "link_to_menu" => $request->input('link_to_menu'),
                "menus_images" => implode("|", $multi_image),
                "tablet_require" => 'yes',
                "free_ordering_type" => $request->input('same'),
                "business_name" => $request->input('business_name'),
                "id_number" => $request->input('id_number'),
                "owner_name" => $request->input('owner_name'),
                "owner_dob" => $request->input('owner_dob'),
                "routing_number" => $request->input('routing_number'),
                "account_number" => $request->input('account_number'),
            );
            DB::table('laravelproject_new_restaurant_register')->insert($restaurant_info);
            $restaurant_id = DB::table('laravelproject_new_restaurant_register')->select('restaurant_id')->orderBy('restaurant_id', 'DESC')->first();
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
            $restaurant_availability_timing = array(
                "user_id" => $user_id->id,
                "restaurant_id" => $restaurant_id->restaurant_id,
                "saturday" => json_encode($sat),
                "sunday" => json_encode($sun),
                "monday" => json_encode($mon),
                "tuesday" => json_encode($tue),
                "wednesday" => json_encode($wed),
                "thursday" => json_encode($thur),
                "friday" => json_encode($fri),
            );
            DB::table('laravelproject_new_restaurant_availability_timing')->insert($restaurant_availability_timing);
            // $encrypt_email = sha1($users->email);
            // $data = array('emailto'=>$request->input('Email'),'name'=>$users->name );
            // Mail::send('elite.test',['validation_code'=> 'https://localhost/myproject/public/email_validate?c='.$validation_code.'&e='.$encrypt_email], function($message) use($data){
            //     $message->to($data['emailto'],$data['name'])->subject('Confirm Email!');
            // });
            // Confirmation mail has been sent to your email! After Confirmation you can login with your credentials.
            return Redirect('signup/restaurant')->with('message', 'You can login now as restaurant owner! Thanks for registration');

            // return Session('users')->name;
        } else {
            return view('elite.restaurant_register');
        }
    }

    public function service_register(Request $request)
    {
        if (!empty($request->all())) {

            $users = new Laravelproject_new_user;
            $valid_user = Laravelproject_new_user::where('email', $request->input('Email'))->first();
            //$email = $request->input('emails');

            if (!empty($valid_user)) {
                return Redirect('signup/service')->with('error', 'Email Already Exist, Kindly Change Your Email!')->withInput();
            }
            $this->validate($request, [
                'Email' => 'email',
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password',
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
            foreach ($pass as $value) {
                $users->pass = $value['pass'];
                $users->salt = $value['salt'];
            }

            $users->store_owner = "0";
            $users->service_owner = "1";
            $users->restaurant_owner = "0";
            $users->pickup_owner = "0";
            $users->status = "1";

            $users->save();
            $user_id = DB::table('laravelproject_new_users')->select('id')->orderBy('id', 'DESC')->first();
            $service_info = array(
                "user_id" => $user_id->id,
                "company_name" => $request->input('company_name'),
                "company_phone" => $request->input('company_phone_no'),
                "service_charges" => $request->input('service_charges'),
                "company_address" => $request->input('address'),
                "service_category" => $request->input('service_category'),
                "service_name" => $request->input('service_name'),
                "country" => $request->input('country'),
                "city" => $request->input('city'),
                "state" => $request->input('state'),
                "service_desc" => $request->input('service_desc'),
                "featured_image" => "https://cdn.pixabay.com/photo/2015/11/03/08/56/service-1019821__340.jpg",
            );
            DB::table('laravelproject_new_service_register')->insert($service_info);

            // $encrypt_email = sha1($users->email);
            // $data = array('emailto'=>$request->input('Email'),'name'=>$users->name );
            // Mail::send('elite.test',['validation_code'=> 'https://localhost/myproject/public/email_validate?c='.$validation_code.'&e='.$encrypt_email], function($message) use($data){
            //     $message->to($data['emailto'],$data['name'])->subject('Confirm Email!');
            // });

            return Redirect('signup/service')->with('message', 'You can login now as service owner! Thanks for registration');

            // return Session('users')->name;
        } else {
            return view('elite.service_register');
        }
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

    public function forgot_password(Request $request)
    {

        $token = sha1(microtime(TRUE) . mt_rand(10000, 90000));
        $email = $request->email;
        $user = Laravelproject_new_customer::where('email', $email)->first();
        if(!$user){
            return response()->json(['code'=> '401', 'error' => 'Email Does not exist']);
        }

        $all_data = $this->insert_forget_password($email, $token);
        
        Mail::to($email)->send(new SendForgetPasswordMail($token));
        return response()->json(['code'=> '200', 'Success' => 'Email Send successfully']);

    }
    public function insert_forget_password($email, $token)
    {        
        $user_data = array(
            'email' => $email,
            'token' => $token,  
        );
  
        $inserted = DB::table('forgot_password')->insert($user_data);
        
        return true;
    }
    public function forgot_password_validate()
    {
        $c = Request()->query('c');
        $all_data = $this->forgot_password_validator($c);

        if ($all_data == 'Invalid Token') {
            return abort('404');
        } else {
            return view('elite.auth.passwords.reset')->with(['email' => $all_data]);
        }
    }

    public function forgot_password_get_data($email, $token)
    {        
        $user_data = array(
            'email' => $email,
            'token' => $token,  
        );
  
        $inserted = DB::table('forgot_password')->insert($user_data);
        
        return true;
    }
    public function forgot_password_validator($c)
    {
        
        $user = DB::table('forgot_password')->select('*')->where('token',$c)->first();
        if(!empty($user)){
            $match = $user->email;
            return $match;
        }else{
            return  'Invalid Token' ;
        }
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ));
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $password = Hash::make($request->password);
        $user = Laravelproject_new_customer::where('email', $request->email)->update(['password' => $password]);
        if($user){
            DB::table('forgot_password')->where('email' , $request->email)->delete();
            return   view('elite.auth.passwords.success');
        }else{
            return back()->with('error', 'User does not exist');

        }
    }
}
