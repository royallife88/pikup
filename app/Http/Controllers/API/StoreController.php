<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    // get all stores
    public function get_all_stores()
    {
        // fetching all stores data
        $all_stores = DB::table('laravelproject_new_store_register')
            ->join('laravelproject_new_store_availability_timing', 'laravelproject_new_store_register.store_id', 'laravelproject_new_store_availability_timing.store_id')
            ->select('laravelproject_new_store_register.*', 'laravelproject_new_store_availability_timing.*')
            ->get();
        // if stores exist
        if (count($all_stores) > 0) {
            $data = array(
                'data' => array(
                    'code' => '200',
                    'message' => 'success',
                    'stores' => $all_stores
                ),
            );
        } else {
            $data = array( // if no store found
                'data' => array(
                    'code' => '404',
                    'message' => 'No store found'
                ),
            );
        }
        return $data;
    }


    // get store data by id
    public function get_store_by_id(Request $request)
    {
        // validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }
        // validation rule
        $validator = Validator::make($request->all(), [
            'store_id'   =>  'required|numeric',
        ]);
        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }

        // fetching data store by id
        $store_id = $request->store_id;
        $all_stores = DB::table('laravelproject_new_store_register')
            ->join('laravelproject_new_store_availability_timing', 'laravelproject_new_store_register.store_id', 'laravelproject_new_store_availability_timing.store_id')
            ->select('laravelproject_new_store_register.*', 'laravelproject_new_store_availability_timing.*')
            ->where('laravelproject_new_store_register.store_id', $store_id)
            ->get();
        // if store exist
        if (count($all_stores) > 0) {
            $data = array(
                'data' => array(
                    'code' => '200',
                    'message' => 'success',
                    'store' => $all_stores
                ),
            );
        } else { // if no store found
            $data = array(
                'data' => array(
                    'code' => '404',
                    'message' => 'No product found'
                ),
            );
        }
        return $data;
    }
}
