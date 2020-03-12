<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laravelproject_new_goods_colors_size extends Model
{
    protected $fillable = [
        'product_id', 'colors', 'sizes'
    ];
}
