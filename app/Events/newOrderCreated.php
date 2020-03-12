<?php

namespace App\Events;

use App\Laravelproject_new_goods_order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class newOrderCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $order;
    public $store_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order)
    {   
        $this->order = $order;
        $this->store_id = $order->store_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    { 
        return new Channel('OrderCreated.'.$this->store_id);
    }
}
