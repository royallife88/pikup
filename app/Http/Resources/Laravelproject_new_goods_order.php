<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class Laravelproject_new_goods_order extends JsonResource
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
                'message' => 'No order found'
            ];
        }

        return [
                "id"                    =>   $this->id,
                "customer_id"           =>   $this->customer_id,
                "dropoff_location"      =>   $this->dropoff_location,
                "date_time"             =>   $this->date_time,
                "total_price"           =>   $this->total_price,
                "payment_method"        =>   $this->payment_method,
                "payment_status"        =>   $this->payment_status,
                "created_at"            =>   $this->created_at,
                "updated_at"            =>   $this->updated_at,
                "order_items"           =>   DB::table('laravelproject_new_goods_order_items')->where('order_id', $this->id)->select('*')->get(),
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
