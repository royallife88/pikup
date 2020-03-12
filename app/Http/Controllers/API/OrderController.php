<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laravelproject_new_goods_order;
use App\Http\Resources\Laravelproject_new_goods_order as OrderResource;
use App\Http\Resources\Laravelproject_new_service_order as ServiceOrderResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Events\newOrderCreated;
use Illuminate\Support\Carbon;
use App\Jobs\SendEmailOrderCreated;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }
    // get all orders by customers
    public function order_by_customer()
    {
        $order_data = DB::table('laravelproject_new_goods_orders')
            ->where('customer_id', Auth::user()->id)
            ->get();

        // if no order found by customer
        if (count($order_data) == 0) {
            return [
                'code' => '404',
                'message' => 'No order found'
            ];
        }
        // if customer has order and sending order as resource 
        return OrderResource::collection($order_data)->additional([
            'code' => '200',
            'message' => 'success'
        ]);
    }
    // get order by id
    public function get_order_by_id(Request $request)
    {   // validating reuqest
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }
        //validation rules
        $validator = Validator::make($request->all(), [
            'id'   =>  'required|numeric',
        ]);
        // if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }


        $id = $request->id;
        // fetching order by id
        $order_data = DB::table('laravelproject_new_goods_orders')
            ->where('id', $id)
            ->get();
        // if no order found by given id
        if (count($order_data) == 0) {
            return [
                'code' => '404',
                'message' => 'No order found'
            ];
        }
        // returning order resource if exist
        return OrderResource::collection($order_data)->additional([
            'code' => '200',
            'message' => 'success'
        ]);
    }

    //creating new order
    public function create_goods_order(Request $request)
    {
        // validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }
        //validation rules for new order
        $validator = Validator::make($request->data[0], [
            'customer_id'           =>  'required|numeric',
            'dropoff_location'      =>  'required|string',
            'total_price'           =>  'required|numeric',
            'payment_method'        =>  'required|string',
            'payment_status'        =>  'required|string'
        ]);
        // validating rules for goods item which are includes in signle order
        foreach ($request->data[0]['order_items'] as $request_order_item) {
            $validator2 = Validator::make($request_order_item, [
                'product_id'            =>  'required|numeric',
                'qty'                   =>  'required|numeric',
            ]);
            // if second validation fails
            if ($validator2->fails()) {
                return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
            }
        }

        // if first validation fails
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }


        // creating new array
        $all_store_ids_of_products = array();
        // getting store ids of all order items in list
        foreach ($request->data[0]['order_items'] as $order_items) {
            $store_data = DB::table('laravelproject_new_add_products')->where('p_id',  $order_items['product_id'])->select('p_id', 'store_id')->first();
            // pushing store data related to order item in new array
            array_push($all_store_ids_of_products, $store_data);
        }
        // separeating product id form above result in new array 
        $products_ids_only = array_map(function ($ar) {
            return $ar->p_id;
        }, $all_store_ids_of_products);
        // separeating store id form above result in new array
        $stores_ids_only = array_map(function ($ar) {
            return $ar->store_id;
        }, $all_store_ids_of_products);

        // looping through all store ids using above creating array
        foreach ($stores_ids_only as &$store_id) {
            // getting data of first store
            $store_data = DB::table('laravelproject_new_store_register')->where('store_id', $store_id)->select('*')->first();

            // getting long lat of the above store
            $store_id = $store_data->store_id;
            $latitude = $store_data->latitude;
            $longitude = $store_data->longitude;

            // building query to get neartest store to the above store which are related to order items products
            $result_stores = (DB::table('laravelproject_new_store_register')
                ->join('laravelproject_new_add_products', 'laravelproject_new_store_register.store_id', 'laravelproject_new_add_products.store_id')
                ->select('laravelproject_new_add_products.p_id as product_id', DB::raw('laravelproject_new_store_register.store_id, ( 6367 * acos( cos( radians(' . $latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + sin( radians(' . $latitude . ') ) * sin( radians( latitude ) ) ) ) AS distance'))
                ->having('distance', '<', '8')
                ->whereIn('laravelproject_new_add_products.p_id', $products_ids_only) // condition to get only the order items related stores
                ->orderBy('distance')
                ->get()->pluck('store_id'));
                $result_stores = $result_stores->toArray();

            //creating  new order
            $order_detail = $request->data[0];

            $order = array(
                'customer_id' => $order_detail['customer_id'],
                'dropoff_location' => $order_detail['dropoff_location'],
                'total_price' => $order_detail['total_price'],
                'payment_method' => $order_detail['payment_method'],
                'payment_status' => $order_detail['payment_status'],
            );
            
            // print_r($order); die();
            // insert order into db and get the new inserted record id
            $insert_order_id = DB::table('laravelproject_new_goods_orders')->insertGetId($order);

            // adding product item to the order created above only for those prodcuts which are related to the nearest stores get above
            foreach ($request->data[0]['order_items'] as $order_items) {
                $s_id = DB::table('laravelproject_new_add_products')->select('store_id')->where('p_id', $order_items['product_id'])->first()->store_id;
                if (in_array($s_id, $result_stores)) { // if this product it related to above nearest store
                    $order_item = array(
                        'order_id' => $insert_order_id,
                        'product_id' => $order_items['product_id'],
                        'qty' => $order_items['qty'],
                        'store_id' => $s_id,
                    );
                    // inserting order items to table of oders_item with the relation of above created order
                    DB::table('laravelproject_new_goods_order_items')->insert($order_item);

                    $store_email = DB::table('laravelproject_new_store_register')
                    ->join('laravelproject_new_users', 'laravelproject_new_store_register.user_id', 'laravelproject_new_users.id')
                    ->where('laravelproject_new_store_register.store_id', $s_id)
                    ->select('email')
                    ->first()->email;

                     //dispactching email queue for new order created
                    // dispatch(new SendEmailOrderCreated($store_email));
                }
            }
            $new_order_created = Laravelproject_new_goods_order::join('laravelproject_new_goods_order_items', 'laravelproject_new_goods_orders.id', 'laravelproject_new_goods_order_items.order_id')
                ->where('laravelproject_new_goods_orders.id', $insert_order_id)
                ->select('laravelproject_new_goods_orders.*', 'laravelproject_new_goods_order_items.store_id','laravelproject_new_goods_order_items.product_id')
                ->get();

            //generating event to notify store owner that new order created
            foreach($new_order_created as $new_order){
                event(new newOrderCreated($new_order));
            }

           
            
            // subtracting store id from all store ids array becuase we had created order for these store product
            $stores_ids_only = array_diff($stores_ids_only, $result_stores);
        }


        return [
            'code' => '200',
            'message' => 'Order created successfully'
        ];
    }

    // get the order of service by customer
    public function service_order_by_customer()
    {   // fetchig order from database
        $order_data = DB::table('laravelproject_new_service_orders')
            ->where('customer_id', Auth::user()->id)
            ->get();
        // no service order exist by customer 
        if (count($order_data) == 0) {
            return [
                'code' => '404',
                'message' => 'No order found'
            ];
        }
        // returning serive using resource
        return ServiceOrderResource::collection($order_data)->additional([
            'code' => '200',
            'message' => 'success'
        ]);
    }

    public function get_service_order_by_id(Request $request)
    {
        // validating request
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

        // geting serive order by id
        $id = $request->id;
        $order_data = DB::table('laravelproject_new_service_orders')
            ->where('id', $id)
            ->get();
        // if no order found by id
        if (count($order_data) == 0) {
            return [
                'code' => '404',
                'message' => 'No order found'
            ];
        }
        // returning order using resource if exist
        return ServiceOrderResource::collection($order_data)->additional([
            'code' => '200',
            'message' => 'success'
        ]);
    }
    // creating new order for service
    public function create_service_order(Request $request)
    {
        // validating request
        if (empty($request->all())) {
            return response()->json(['error' => 'Parameters are missing', 'code' => '400'], 400);
        }
        // validation rules for new service order
        $validator = Validator::make($request->data[0], [
            'customer_id'           =>  'required|numeric',
            'appointment_time'      =>  'required|string',
            'appointment_location'  =>  'required|string'
        ]);
        // validation rules for service items
        $validator2 = Validator::make($request->data[0]['order_items'][0], [
            'service_id'            =>  'required|numeric',
            'store_id'              =>  'required|numeric',
        ]);

        // if first validation rules
        if ($validator->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }
        // if second validation fails
        if ($validator2->fails()) {
            return response()->json(['error' => 'Parameters are not valid', 'code' => '400'], 400);
        }
        // inserting new service order details
        $order_detail = $request->data[0];
        $order = array(
            'customer_id' => $order_detail['customer_id'],
            'appointment_time' => $order_detail['appointment_time'],
            'appointment_location' => $order_detail['appointment_location'],
            'created_at' => Carbon::now('Asia/Karachi')
        );
        // insert order into db and get the new inserted record id
        $insert_order_id = DB::table('laravelproject_new_service_orders')->insertGetId($order);

        // inserting the serive item against the above serivce order
        foreach ($request->data[0]['order_items'] as $order_items) {
            $order_item = array(
                'order_id' => $insert_order_id,
                'service_id' => $order_items['service_id'],
                'store_id' => $order_items['store_id'],
                'created_at' => Carbon::now('Asia/Karachi')
            );
            DB::table('laravelproject_new_service_order_items')->insert($order_item);
        }
        // if order inserted successfull
        if ($insert_order_id > 0) {
            return [
                'code' => '200',
                'message' => 'Order created successfully!'
            ];
        } else {
            return [
                'code' => '400',
                'message' => 'Somthing went wrong!'
            ];
        }
    }
}
