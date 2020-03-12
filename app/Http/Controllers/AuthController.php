<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Laravelproject_new_user;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Laravelproject_new_customer;
use Symfony\Component\Routing\Route;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $segment2 = $request->segment(2);
        $segment3 = $request->segment(3);
        $uri = $segment2 . '/' . $segment3;

        // $this->middleware('auth:api', ['except' => ['login', 'user_register']]);
        // if ($uri == 'driverauth/login') {
        //     $this->middleware('auth:driverapi', ['except' => ['login']]);
        // } else {
        //     $this->middleware('auth:api', ['except' => ['login', 'user_register']]);
        // }
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $segment2 = $request->segment(2);
        $segment3 = $request->segment(3);
        $uri = $segment2 . '/' . $segment3;

        if ($uri == 'driverauth/login') {
            $credentials = request(['email', 'password']);
            if ($token = auth('driverapi')->attempt($credentials)) {
                return $this->respondWithToken($token);
            }
        }


        $credentials = $request->only('email', 'password');

        if ($token = auth('api')->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['code' => '401', 'error' => 'Unauthorized']);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh_customer()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
    public function refresh_driver()
    {
        return $this->respondWithToken(auth('driverapi')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'code' => '200',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function user_register(Request $request)
    {
        $users = new Laravelproject_new_customer;
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:laravelproject_new_customers',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'fName' => 'required|max:50',
            'lName' => 'required|max:50',
        ]);


        if ($validator->fails()) {

            $message = $validator->errors()->first();

            $result = array(
                'code' => '400',
                'message' => $message
            );
            return $result;
        }


        $validation_code = sha1(microtime(TRUE) . mt_rand(10000, 90000));
        $fname = $request->input('fName');
        $lname = $request->input('lName');
        $users->name = $fname . ' ' . $lname;
        $username = substr($request->input('email'), 0, -10);
        $users->email = $request->input('email');
        $users->validation_code = $validation_code;


        $pass = Hash::make($request->input('password'));

        $users->password = $pass;

        $users->status = "0";

        $users->save();
        $users->sendEmailVerificationNotification();
        $result = array(
            'code' => '200',
            'message' => 'Registration successfull'
        );

        return $result;
    }



    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard($guard = null)
    {
        return Auth::guard('driverapi');
    }
}
