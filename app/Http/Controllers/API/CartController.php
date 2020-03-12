<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laravelproject_new_add_to_cart;
use Illuminate\Support\Facades\Validator;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    //product add to cart
    public function add_to_cart(Request $request)
    {   // validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }

        $validator = Validator::make($request->all(), [
            'product_id'   =>  'required|numeric',
            'qty'          =>  'required|numeric',
        ]);
        //if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }

        $data = array(
            'customer_id'  => Auth::user()->id,
            'product_id'  => $request->product_id,
            'qty'  => $request->qty,
        );
        // adding product to cart table
        Laravelproject_new_add_to_cart::insert($data);

        $response = array(
            'data' => array(
                'code' => '200',
                'message' => 'Data inserted successfully!'
            ),
        );
        return $response;
    }

    //fetching the customer cart
    public function get_customer_cart(Request $request)
    {
        $cart = Laravelproject_new_add_to_cart::where('customer_id', Auth::user()->id)->get();

        if (empty($cart)) {
            $response = array(
                'data' => array(
                    'code' => '404',
                    'message' => 'No item found'
                ),
            );
            return $response;
        } else {
            return $cart;
        }
    }

    // remove item from the customer cart
    public function remove_item_from_cart(Request $request)
    {
        //validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }

        $validator = Validator::make($request->all(), [
            'product_id'   =>  'required|numeric',
        ]);
        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }
        $data = Laravelproject_new_add_to_cart::where('customer_id', Auth::user()->id)->where('product_id', $request->product_id)->delete();

        // if deletion fails
        if (!$data) {
            $response = array(
                'data' => array(
                    'code' => '404',
                    'message' => 'No item found'
                ),
            );
        } else {
            $response = array(
                'data' => array(
                    'code' => '200',
                    'message' => 'Item remove successfully!'
                ),
            );
        }
        return $response;
    }
}
