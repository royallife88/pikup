<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Laravelproject_new_add_product;
use App\Laravelproject_new_customer;
use App\Laravelproject_new_goods_rating;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Laravelproject_new_add_product as ProductResource;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }


    public function all_product_foods()
    {   // fethcing all goods from db
        $products = Laravelproject_new_add_product::where('if_food', 1)->get();

        if (count($products) > 0) {
            return ProductResource::collection($products)->additional([
                'code' => '200',
                'message' => 'success'
            ]);
        } else {
            return [
                'code' => '404',
                'message' => 'Something went wrong!'
            ];
        }
    }

    public function single_food(Request $request)
    {   // validating reuqest
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

        $id = $request->id;
        // return good using resource
        return new ProductResource(Laravelproject_new_add_product::where('if_food', 1)->where('p_id', $id)->first());
    }

    // all goods by a store
    public function foods_by_store(Request $request)
    {   // validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }
        // validation request
        $validator = Validator::make($request->all(), [
            'store_id'   =>  'required|numeric',
        ]);

        // validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }

        $store_id = $request->store_id;
        // fatching all goods by a store
        $prodcuts = Laravelproject_new_add_product::where('if_food', 1)->where('store_id', $store_id)->get();

        // return goods using resource
        return  ProductResource::collection($prodcuts)->additional([
            'code' => '200',
            'message' => 'success'
        ]);
    }

    public function filter_foods(Request $request)
    {   // validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }
        // validation rules
        $validator = Validator::make($request->all(), [
            'title'         =>  'string',
            'category'      =>  'string',
            'price'         =>  'numeric',
            'price_from'    =>  'numeric',
            'price_to'      =>  'numeric',
        ]);
        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }

        $title = $request->title;
        $category = $request->category;
        $price = $request->price;
        $price_from = $request->price_from;
        $price_to = $request->price_to;

        // filtering goods
        if (!empty($title)) {
            $prodcuts = Laravelproject_new_add_product::where('title', 'LIKE', '%' . $title . '%')->where('if_food', 1)->get();
        }
        if (!empty($category)) {
            $prodcuts = Laravelproject_new_add_product::where('category', 'LIKE', '%' . $category . '%')->where('if_food', 1)->get();
        }
        if (!empty($price)) {
            $prodcuts = Laravelproject_new_add_product::where('price', 'LIKE', '%' . $price . '%')->where('if_food', 1)->get();
        }
        if (!empty($title) && !empty($category)) {
            $prodcuts = Laravelproject_new_add_product::where('title', 'LIKE', '%' . $title . '%')
                ->orWhere('category', 'LIKE', '%' . $category . '%')
                ->where('if_food', 1)
                ->get();
        }
        if (!empty($title) && !empty($price)) {
            $prodcuts = Laravelproject_new_add_product::where('title', 'LIKE', '%' . $title . '%')
                ->orWhere('price', 'LIKE', '%' . $price . '%')
                ->where('if_food', 1)
                ->get();
        }
        if (!empty($category) && !empty($price)) {
            $prodcuts = Laravelproject_new_add_product::Where('category', 'LIKE', '%' . $category . '%')
                ->orWhere('price', 'LIKE', '%' . $price . '%')
                ->where('if_food', 1)
                ->get();
        }
        if (!empty($title) && !empty($category) && !empty($price)) {
            $prodcuts = Laravelproject_new_add_product::where('title', 'LIKE', '%' . $title . '%')
                ->orWhere('category', 'LIKE', '%' . $category . '%')
                ->orWhere('price', 'LIKE', '%' . $price . '%')
                ->where('if_food', 1)
                ->get();
        }
        if (!empty($price_from) && !empty($price_to)) {

            $prodcuts = Laravelproject_new_add_product::where('price', '>=', $price_from)
                ->where('price', '<=',  $price_to)
                ->where('if_food', 1)
                ->get();
        }

        // return feteched goods using resource
        return ProductResource::collection($prodcuts)->additional([
            'code' => '200',
            'message' => 'success'
        ]);
    }
}
