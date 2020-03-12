<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laravelproject_new_customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }
    // fetching customer profile
    public function get_customer_profile(Request $request)
    {   // fetching the user profile
        $profile = Laravelproject_new_customer::find(Auth::user()->id);

        if ($profile) {
            $data = array(
                'data' => array(
                    'code' => '200',
                    'message' => 'success',
                    'profile' => $profile
                ),
            );
        } else {
            $data = array(
                'data' => array(
                    'code' => '404',
                    'message' => 'Something went wrong!'
                ),
            );
        }
        return $data;
    }
    // updating customer profile
    public function update_customer_profile(Request $request)
    {   //validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }

        $validator = Validator::make($request->all(), [
            'email'   =>  'required|email',
            'password'   =>  'required|string',
        ]);
        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }

        $data = array(
            'email' => $request->email,
            'password' => Hash::make($request->password),
        );
        //updating user profile
        $update = Laravelproject_new_customer::where('id', Auth::user()->id)->update($data);
        // if update successfull
        if ($update) {
            $data = array(
                'data' => array(
                    'code' => '200',
                    'message' => 'success',
                ),
            );
        } else { // if update fails
            $data = array(
                'data' => array(
                    'code' => '404',
                    'message' => 'No user found'
                ),
            );
        }
        return $data;
    }
}
