<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login',['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh_customer');
    Route::post('me', 'AuthController@me');
});
Route::group(['prefix' => 'driverauth'], function ($router) {
    Route::post('login',['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh_driver');
    Route::post('me', 'AuthController@me');
});

Route::post('register', ['as' => 'register', 'uses' => 'AuthController@user_register']);
Route::post('forgot_password', 'Users@forgot_password');


Route::group(['prefix' => 'goods'], function () {
    Route::post('all_product_goods', 'API\ProductsController@all_product_goods');
    Route::post('single_good', 'API\ProductsController@single_good');
    Route::post('filter_goods', 'API\ProductsController@filter_goods');
    Route::post('goods_by_store', 'API\ProductsController@goods_by_store');
});
Route::group(['prefix' => 'foods'], function () {
    Route::post('all_product_foods', 'API\RestaurantController@all_product_foods');
    Route::post('single_food', 'API\RestaurantController@single_food');
    Route::post('filter_foods', 'API\RestaurantController@filter_foods');
    Route::post('foods_by_store', 'API\RestaurantController@foods_by_store');
});


Route::group(['prefix' => 'service'], function () {
    Route::post('all_services', 'API\ServiceController@all_services');
    Route::post('single_services', 'API\ServiceController@single_services');
    Route::post('services_by_store_id', 'API\ServiceController@services_by_store_id');
});


Route::group(['prefix' => 'stores'], function () {
    Route::post('get_all_stores', 'API\StoreController@get_all_stores');
    Route::post('get_store_by_id', 'API\StoreController@get_store_by_id');
    Route::post('filter_goods', 'API\StoreController@filter_goods');
    Route::post('goods_by_store', 'API\StoreController@goods_by_store');
});



Route::group(['prefix' => 'orders'], function () {
    Route::post('order_by_customer', 'API\OrderController@order_by_customer');
    Route::post('get_order_by_id', 'API\OrderController@get_order_by_id');
    Route::post('create_goods_order', 'API\OrderController@create_goods_order');
    Route::post('service_order_by_customer', 'API\OrderController@service_order_by_customer');
    Route::post('get_service_order_by_id', 'API\OrderController@get_service_order_by_id');
    Route::post('create_service_order', 'API\OrderController@create_service_order');
});


Route::group(['prefix' => 'cart'], function () {
    Route::post('add_to_cart', 'API\CartController@add_to_cart');
    Route::post('get_customer_cart', 'API\CartController@get_customer_cart');
    Route::post('remove_item_from_cart', 'API\CartController@remove_item_from_cart');
});

Route::group(['prefix' => 'favourite'], function () {
    Route::post('set_favourite_good', 'API\FavouriteController@set_favourite_good');
});
Route::group(['prefix' => 'customer'], function () {
    Route::post('get_customer_profile', 'API\CustomerController@get_customer_profile');
    Route::post('update_customer_profile', 'API\CustomerController@update_customer_profile');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('all_category', 'API\CategoryController@index');    
});
Route::group(['prefix' => 'homeslider'], function () {
    Route::get('homeslider', 'API\HomeSliderController@get_home_slider');    
});


Route::group(['prefix' => 'maps'], function () {
    Route::get('find_nearby_store', 'API\MapsController@find_nearby_store');    
});


Route::group(['prefix' => 'driver'], function () {
    Route::post('driver_location_log', 'API\DriverController@driver_location_log');    
    Route::post('driver_current_location', 'API\DriverController@driver_current_location');    
    Route::post('order_rejected_by_driver', 'API\DriverController@order_rejected_by_driver');    
    Route::post('send_order_notifications', 'API\DriverController@send_order_notifications');    
});