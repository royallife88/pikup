<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    // get all services
    public function all_services(Request $request)
    {   //fetching service
        $services = DB::table('laravelproject_new_service_register')->select('*')->get();

        if (count($services) > 0) {
            $data = array(
                'data' => array(
                    'code' => '200',
                    'message' => 'success',
                    'service' => $services
                ),
            );
        } else {
            $data = array(
                'data' => array(
                    'code' => '404',
                    'message' => 'No service found'
                ),
            );
        }
        return $data;
    }
    // get single service by id
    public function single_services(Request $request)
    {   // validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }
        // validation rules
        $validator = Validator::make($request->all(), [
            'id'   =>  'required|numeric',
        ]);
        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }
        // fetching serive by id
        $services = DB::table('laravelproject_new_service_register')->select('*')->where('service_id', $request->id)->get();

        if (count($services) > 0) {
            $data = array(
                'data' => array(
                    'code' => '200',
                    'message' => 'success',
                    'service' => $services
                ),
            );
        } else {
            $data = array(
                'data' => array(
                    'code' => '404',
                    'message' => 'No service found'
                ),
            );
        }
        return $data;
    }

    // get all services by store id
    public function services_by_store_id(Request $request)
    {   // validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }
        // validation rules
        $validator = Validator::make($request->all(), [
            'store_id'   =>  'required|numeric',
        ]);
        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }
        // fetching all service by store id
        $services = DB::table('laravelproject_new_service_register')->where('store_id', $request->store_id)->select('*')->get();
        // if service data exist
        if (count($services) > 0) {
            $data = array(
                'data' => array(
                    'code' => '200',
                    'message' => 'success',
                    'service' => $services
                ),
            );
        } else { // if no service found
            $data = array(
                'data' => array(
                    'code' => '404',
                    'message' => 'No service found'
                ),
            );
        }
        return $data;
    }
}
