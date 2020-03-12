<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laravelproject_new_goods_rating extends Model
{
    // public function laravelproject_new_customer(){
    //     return  $this->belongsTo('App\Laravelproject_new_customer');
    // }

    public function laravelproject_new_add_product(){
        return  $this->belongsTo('App\Laravelproject_new_add_product');
    }
}
