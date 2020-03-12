<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laravelproject_new_goods_favourite;
use Illuminate\Support\Facades\Validator;

class FavouriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }
    // add the favourite good to the database
    public function set_favourite_good(Request $request)
    {   // validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }
        // validation rules
        $validator = Validator::make($request->all(), [
            'customer_id'   =>  'required|numeric',
            'product_id'   =>  'required|numeric',
        ]);
        //if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }

        $data = array(
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,

        );
        // inserting the good
        $insert = Laravelproject_new_goods_favourite::insert($data);

        if ($insert) {
            $data = array(
                'data' => array(
                    'code' => '200',
                    'message' => 'success'
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
}
