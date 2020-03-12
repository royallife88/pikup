<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class Laravelproject_new_service_order extends JsonResource
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
            "appointment_time"      =>   $this->appointment_time,
            "appointment_location"  =>   $this->appointment_location,
            "order_items"           =>   DB::table('laravelproject_new_service_order_items')->where('order_id', $this->id)->select('*')->get(),
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
