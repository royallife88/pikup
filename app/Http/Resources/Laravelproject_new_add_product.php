<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Laravelproject_new_goods_rating;
use DB;
use Auth;

class Laravelproject_new_add_product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->resource == null) {
            return [
                'code' => '404',
                'message' => 'Product not found'
            ];
        }
        $product_colors_sizes = DB::table('laravelproject_new_goods_colors_sizes')->where('product_id', $this->p_id)->select('colors', 'sizes')->first();

        if(isset($product_colors_sizes) ){
            $colors = explode(',',$product_colors_sizes->colors);
            $sizes = explode(',', $product_colors_sizes->sizes);
        }else{
            $colors = [];
            $sizes = [];
        }

        $fav =  DB::table('laravelproject_new_goods_favourites')->select('id')->where('customer_id', Auth::user()->id)->where('product_id', $this->p_id)->first();
        if(isset($fav) ){
            if($fav->id > 0){
                $fav = 1;
            }else{
                $fav = 0;
            }
        }else{
            $fav = 0;
        }

        return [
                "id"                =>   $this->p_id,
                "store_id"          =>   $this->store_id,
                "store_name"        =>   $this->store_name,
                "if_food"           =>   $this->if_food,
                "title"             =>   $this->title,
                "price"             =>   $this->price,
                "discount_price"    =>   $this->discount_price,
                "description"       =>   $this->description,
                "featured_image"    =>   $this->featured_image,
                "category"          =>   $this->category,
                "category_name"     =>   DB::table('laravelproject_new_store_category')->select('category_name')->where('category_id', $this->category)->first()->category_name,
                'colors'            =>   $colors,
                'sizes'             =>   $sizes,
                "status"            =>   $this->status,
                "created_at"        =>   $this->created_at,
                "updated_at"        =>   $this->updated_at,
                'favourite'         =>   $fav,
                'total_ratings'     =>   DB::table('laravelproject_new_goods_ratings')->select('*')->where('product_id', $this->p_id)->count(),
                'rating'            =>   DB::table('laravelproject_new_goods_ratings')->select('*')->where('product_id', $this->p_id)->avg('rating'),
                'orders'            =>   DB::table('laravelproject_new_goods_order_items')->distinct("id")->where('product_id', $this->p_id)->count('id'),
                "reviews"           =>   Laravelproject_new_goods_rating::select('rating', 'comments')->where('product_id', $this->p_id)->get()
            
        ];
    }

    public function with($request)
    {
        return [
            'code' => '200',
            'message' => 'success'
        ];
    }
}
