<?php

namespace App\Http\Controllers;

use App\laravelproject_new_goods_order;
use App\laravelproject_new_goods_order_item;
use App\Laravelproject_new_service_order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class OrderController extends Controller
{
    //showing all store related orders to store panel
    public function all_store_orders()
    {   
        $all_orders = DB::table('laravelproject_new_goods_orders')
            ->join('laravelproject_new_goods_order_items', 'laravelproject_new_goods_orders.id', 'laravelproject_new_goods_order_items.order_id')
            ->where('laravelproject_new_goods_order_items.store_id', Session::get('store_id'))
            ->select('laravelproject_new_goods_orders.*', 'laravelproject_new_goods_order_items.order_id', 'laravelproject_new_goods_order_items.accept_or_reject', 'laravelproject_new_goods_order_items.product_id', 'laravelproject_new_goods_order_items.qty', 'laravelproject_new_goods_order_items.store_id' )
            ->orderBy('laravelproject_new_goods_orders.id', 'desc')
            ->paginate(20);

        return view('elite.store_owner.all_orders', compact('all_orders'));
    }

    //if order is accepted by related store
    public function accept_order($order_id, $product_id){

        DB::table('laravelproject_new_goods_order_items')->where('order_id', $order_id)->where('product_id', $product_id)->update(['accept_or_reject' => '1']);

        // $pending_orders = DB::table('laravelproject_new_goods_order_items')->where('order_id', $order_id)->where('accept_or_reject', null)->get();

        // if(count($pending_orders) == 0){
        //     app('App\Http\Controllers\DriverController')->send_order_notifications($order_id);
        // }
        return redirect()->back();
    }

    //if order is rejected by realted store
    public function reject_order($order_id, $product_id){
        DB::table('laravelproject_new_goods_order_items')->where('order_id', $order_id)->where('product_id', $product_id)->update(['accept_or_reject' => '0']);
        // $pending_orders = DB::table('laravelproject_new_goods_order_items')->where('order_id', $order_id)->where('accept_or_reject', null)->get();

        // if(count($pending_orders) == 0){
        //     app('App\Http\Controllers\DriverController')->send_order_notifications($order_id);
        // }
        return redirect()->back();
    }
}
