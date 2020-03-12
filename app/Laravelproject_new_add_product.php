<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laravelproject_new_add_product extends Model
{

    public function Laravelproject_new_goods_rating(){
        return  $this->hasMany('App\Laravelproject_new_goods_rating', 'product_id', 'p_id');
    }

    // public function laravelproject_new_add_product(){
    //     return  $this->belongsTo('App\Laravelproject_new_add_product', 'customer_id');
    // }
}
