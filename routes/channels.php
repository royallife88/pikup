<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

use App\Http\Resources\Laravelproject_new_goods_order;
use Illuminate\Support\Facades\Session;

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('OrderCreated.{store_id}', function ($user, $store_id) {
 
    // return (int) $user->id === (int) $id;

    if(Session::get('store_id') == $store_id){
        return true;
    }
});
