<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laravelproject_new_goods_favourite extends Model
{
    public function laravelproject_new_customer(){
        return  $this->belongsTo('App\Laravelproject_new_customer', 'customer_id');
    }
}
