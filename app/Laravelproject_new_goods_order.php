<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laravelproject_new_goods_order extends Model
{
    public function laravelproject_new_goods_order_items(){
        return  $this->hasMany('App\Laravelproject_new_goods_order_item', 'order_id');
    }


    public function laravelproject_new_customers(){
        return  $this->belongsTo('App\Laravelproject_new_customer', 'customer_id');
    }


}
