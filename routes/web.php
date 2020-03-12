<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('index/facebook', function () {
    return view('elite/facebook');
});
Auth::routes(['verify' => true]);

Route::post('partial_restuarants_register', 'Store_Owner_Controller@partial_restuarants_register')->name('partial_restuarants_register');
Route::post('partial_service_register', 'Store_Owner_Controller@partial_service_register')->name('partial_service_register');

Route::get('/', 'Ecommerce_Home@index');
Route::match(array('GET', 'POST'), '/service_register', 'Ecommerce_Home@service_register');
Route::match(array('GET', 'POST'), '/restaurant_register', 'Ecommerce_Home@restaurant_register');
Route::get('/logout', 'Users@logout');
Route::match(array('GET', 'POST'), '/signup/restaurant', 'Users@restaurant_register');

// Route::match(array('GET','POST'),'/signup/service', 'Users@service_register');
Route::match(array('GET', 'POST'), '/signup/store', 'StoreAuthController@store_register');
Route::match(array('GET', 'POST'), '/service_owner', ['as' => 'service_owner.service_owner', 'uses' => 'Store_Owner_Controller@index']);
Route::match(array('GET', 'POST'), '/store_owner', ['as' => 'store_owner.store_owner', 'uses' => 'Store_Owner_Controller@index']);
Route::match(array('GET', 'POST'), '/restaurant_owner', ['as' => 'restaurant_owner.restaurant_owner', 'uses' => 'Store_Owner_Controller@index']);


Route::group(['prefix' => 'store_owner', 'middleware' => []], function () {
    Route::match(array('GET', 'POST'), 'login', ['as' => 'store_owner.login', 'uses' => 'StoreAuthController@login']);
    Route::get('store_categories', ['as' => 'store_owner.store_categories', 'uses' => 'Store_Owner_Controller@store_all_categories']);
    Route::match(array('GET', 'POST'), 'add_store_categorie', ['as' => 'store_owner.add_store_categorie', 'uses' => 'Store_Owner_Controller@store_categories']);
    Route::match(array('GET', 'POST'), 'store_category_edit/{id}', ['as' => 'store_owner.store_category_edit', 'uses' => 'Store_Owner_Controller@store_category_edit']);
    Route::match(array('GET', 'POST'), 'store_category_edited', ['as' => 'store_owner.store_category_edited', 'uses' => 'Store_Owner_Controller@store_category_edited']);
    Route::match(array('GET', 'POST'), 'store_category_delete/{id}', ['as' => 'store_owner.store_category_delete', 'uses' => 'Store_Owner_Controller@store_category_delete']);
    Route::match(array('GET', 'POST'), 'store_create', ['as' => 'store_owner.store_create', 'uses' => 'Store_Owner_Controller@store_create']);
    Route::match(array('GET', 'POST'), 'all_stores', ['as' => 'store_owner.all_stores', 'uses' => 'Store_Owner_Controller@store']);
    Route::match(array('GET', 'POST'), 'all_stores', ['as' => 'store_owner.all_stores', 'uses' => 'Store_Owner_Controller@all_stores']);
    Route::match(array('GET', 'POST'), 'store/{id}', ['as' => 'store_owner.store', 'uses' => 'Store_Owner_Controller@single_store']);
    Route::match(array('GET', 'POST'), 'products', ['as' => 'store_owner.products', 'uses' => 'Store_Owner_Controller@products']);
    Route::match(array('GET', 'POST'), 'add_product', ['as' => 'store_owner.add_product', 'uses' => 'Store_Owner_Controller@add_product']);
    Route::match(array('GET', 'POST'), 'categorie_page', ['as' => 'store_owner.categorie_page', 'uses' => 'Store_Owner_Controller@categorie_page']);
    Route::match(array('GET', 'POST'), 'edit/{id}', ['as' => 'store_owner.edit', 'uses' => 'Store_Owner_Controller@product_edit']);
    Route::match(array('GET', 'POST'), 'delete/{id}', ['as' => 'store_owner.delete', 'uses' => 'Store_Owner_Controller@delete_product']);
    Route::match(array('GET', 'POST'), 'delete_store/{id}', ['as' => 'store_owner.delete_store', 'uses' => 'Store_Owner_Controller@delete_store']);
    Route::match(array('GET', 'POST'), 'all_store_orders', ['as' => 'store_owner.all_store_orders', 'uses' => 'OrderController@all_store_orders']);
    Route::match(array('GET', 'POST'), 'accept_order/{order_id}/{product_id}', ['as' => 'store_owner.accept_order', 'uses' => 'OrderController@accept_order']);
    Route::match(array('GET', 'POST'), 'reject_order/{order_id}/{product_id}', ['as' => 'store_owner.reject_order', 'uses' => 'OrderController@reject_order']);
});

Route::post('signup', 'Users@signup');
Route::get('index', 'Ecommerce_Home@index');


Route::group(['prefix' => 'service_owner', 'middleware' => ["Service_Owner_Verify"]], function () {
    Route::get('service_categories', ['as' => 'service_owner.service_categories', 'uses' => 'Store_Owner_Controller@service_all_categories']);
    Route::match(array('GET', 'POST'), 'add_service_categorie', ['as' => 'service_owner.add_service_categorie', 'uses' => 'Store_Owner_Controller@service_categories']);
    Route::match(array('GET', 'POST'), 'service_category_edit/{id}', ['as' => 'service_owner.service_category_edit', 'uses' => 'Store_Owner_Controller@service_category_edit']);
    Route::match(array('GET', 'POST'), 'service_category_edited', ['as' => 'service_owner.service_category_edited', 'uses' => 'Store_Owner_Controller@service_category_edited']);
    Route::match(array('GET', 'POST'), 'service_category_delete/{id}', ['as' => 'service_owner.service_category_delete', 'uses' => 'Store_Owner_Controller@service_category_delete']);
    Route::match(array('GET', 'POST'), 'service', ['as' => 'service_owner.service', 'uses' => 'Store_Owner_Controller@services']);
    Route::match(array('GET', 'POST'), 'add_service', ['as' => 'service_owner.add_service', 'uses' => 'Store_Owner_Controller@add_service']);
    Route::match(array('GET', 'POST'), 'service_edit/{id}', ['as' => 'store_owner.service_edit', 'uses' => 'Store_Owner_Controller@service_edit']);
    Route::match(array('GET', 'POST'), 'delete/{id}', ['as' => 'store_owner.delete', 'uses' => 'Store_Owner_Controller@delete_service']);
    Route::match(array('GET', 'POST'), 'delete_store/{id}', ['as' => 'store_owner.delete_store', 'uses' => 'Store_Owner_Controller@delete_store']);
    Route::get('/logout', ['as' => 'service_owner.logout', 'uses' => 'Store_Owner_Controller@logout']);
});


// Route::group(['prefix' => 'restaurant_owner', 'middleware' => ["Restaurant_Owner_Verify"] ], function () {
//     Route::get('restaurant_categories', ['as' => 'restaurant_owner.restaurant_categories', 'uses' => 'Store_Owner_Controller@restaurant_all_categories']);
//     Route::match(array('GET','POST'),'add_restaurant_categorie', ['as' => 'restaurant_owner.add_restaurant_categorie', 'uses' => 'Store_Owner_Controller@restaurant_categories']);  
//     Route::match(array('GET','POST'),'add_food', ['as' => 'restaurant_owner.add_food', 'uses' => 'Store_Owner_Controller@restaurant_add_food']);
//     Route::match(array('GET','POST'),'all_foods', ['as' => 'restaurant_owner.all_foods', 'uses' => 'Store_Owner_Controller@restaurant_all_foods']);
//     Route::match(array('GET','POST'),'food_edit/{id}', ['as' => 'restaurant_owner.food_edit', 'uses' => 'Store_Owner_Controller@food_edit']);
//     Route::match(array('GET','POST'),'delete_food/{id}', ['as' => 'restaurant_owner.delete_food', 'uses' => 'Store_Owner_Controller@delete_food']);

//     Route::match(array('GET','POST'),'add_restaurant', ['as' => 'restaurant_owner.add_restaurant', 'uses' => 'Store_Owner_Controller@add_restaurant']);
//     Route::get('/logout', ['as' => 'restaurant_owner.logout', 'uses' => 'Store_Owner_Controller@logout']);
// });

Route::group(['prefix' => 'admin'], function () {
    Route::match(array('GET', 'POST'), '/', 'Admin_Controller@index');
    Route::match(array('GET', 'POST'), 'owner_detail/{id}', ['as' => 'admin.owner_detail', 'uses' => 'Admin_Controller@owner_detail']);
    Route::match(array('GET', 'POST'), '/login', ['as' => 'admin.login', 'uses' => 'AdminAuthController@login']);
    Route::get('all_categories/{status}', ['as' => 'admin.all_categories.status', 'uses' => 'Admin_Controller@all_categories']);
    Route::post('store_status_update', ['as' => 'admin.store_status_update', 'uses' => 'Admin_Controller@store_status_update']);
    Route::post('categorie_status_update', ['as' => 'admin.categorie_status_update', 'uses' => 'Admin_Controller@categorie_status_update']);
    Route::match(array('GET', 'POST'), 'categories', ['as' => 'admin.categories', 'uses' => 'Admin_Controller@categories']);
    Route::match(array('GET', 'POST'), 'categorie_page', ['as' => 'admin.categorie_page', 'uses' => 'Admin_Controller@categorie_page']);
    Route::match(array('GET', 'POST'), 'service_categorie_page', ['as' => 'admin.service_categorie_page', 'uses' => 'Admin_Controller@service_categorie_page']);
    Route::match(array('GET', 'POST'), 'restaurant_categorie_page', ['as' => 'admin.restaurant_categorie_page', 'uses' => 'Admin_Controller@restaurant_categorie_page']);
    Route::match(array('GET', 'POST'), 'all_stores', ['as' => 'admin.all_stores', 'uses' => 'Admin_Controller@all_stores']);
    Route::match(array('GET', 'POST'), 'store/{id}', ['as' => 'admin.store', 'uses' => 'Admin_Controller@single_store']);
    Route::match(array('GET', 'POST'), 'products/{categorie}', ['as' => 'admin.products', 'uses' => 'Admin_Controller@products']);
    Route::match(array('GET', 'POST'), 'services/{categorie}', ['as' => 'admin.services', 'uses' => 'Admin_Controller@services']);
    Route::match(array('GET', 'POST'), 'foods/{categorie}', ['as' => 'admin.foods', 'uses' => 'Admin_Controller@foods']);
    Route::match(array('GET', 'POST'), 'edit/{id}', ['as' => 'admin.edit', 'uses' => 'Admin_Controller@product_edit']);
    Route::match(array('GET', 'POST'), 'service_edit/{id}', ['as' => 'admin.service_edit', 'uses' => 'Admin_Controller@service_edit']);
    Route::match(array('GET', 'POST'), 'restaurant_edit/{id}', ['as' => 'admin.restaurant_edit', 'uses' => 'Admin_Controller@restaurant_edit']);
    Route::match(array('GET', 'POST'), 'delete_store/{id}', ['as' => 'admin.delete_store', 'uses' => 'Admin_Controller@delete_store']);
    Route::match(array('GET', 'POST'), 'all_user', ['as' => 'admin.all_user', 'uses' => 'Admin_Controller@all_users']);
    Route::match(array('GET', 'POST'), 'all_user/{status}', ['as' => 'admin.all_user.status', 'uses' => 'Admin_Controller@all_users']);
    Route::match(array('GET', 'POST'), 'edit_user/{id}', ['as' => 'admin.edit_user', 'uses' => 'Admin_Controller@edit_user']);
    Route::match(array('GET', 'POST'), 'all_customers', ['as' => 'admin.all_customers', 'uses' => 'Admin_Controller@all_customers']);
    Route::match(array('GET', 'POST'), 'edit_customer/{id}', ['as' => 'admin.edit_customer', 'uses' => 'Admin_Controller@edit_customer']);
    Route::match(array('GET', 'POST'), 'delete_customer/{id}', ['as' => 'admin.delete_customer', 'uses' => 'Admin_Controller@delete_customer']);
    Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'AdminAuthController@logout']);

    Route::match(array('GET', 'POST'), 'add_admin', ['as' => 'admin.add_admin', 'uses' => 'Admin_Controller@add_admin']);
    Route::match(array('GET', 'POST'), 'create_admin', ['as' => 'admin.create_admin', 'uses' => 'Admin_Controller@create_admin']);
    Route::match(array('GET', 'POST'), 'edit_admin/{id}', ['as' => 'admin.edit_admin', 'uses' => 'Admin_Controller@edit_admin']);
    Route::match(array('GET', 'POST'), 'delete_admin/{id}', ['as' => 'admin.delete_admin', 'uses' => 'Admin_Controller@delete_admin']);
    Route::match(array('GET', 'POST'), 'update_admin', ['as' => 'admin.update_admin', 'uses' => 'Admin_Controller@update_admin']);
    Route::match(array('GET', 'POST'), 'all_admin', ['as' => 'admin.all_admin', 'uses' => 'Admin_Controller@all_admin']);

    Route::match(array('GET', 'POST'), 'add_driver', ['as' => 'admin.add_driver', 'uses' => 'Admin_Controller@add_driver']);
    Route::match(array('GET', 'POST'), 'create_driver', ['as' => 'admin.create_driver', 'uses' => 'Admin_Controller@create_driver']);
    Route::match(array('GET', 'POST'), 'edit_driver/{id}', ['as' => 'admin.edit_driver', 'uses' => 'Admin_Controller@edit_driver']);
    Route::match(array('GET', 'POST'), 'delete_driver/{id}', ['as' => 'admin.delete_driver', 'uses' => 'Admin_Controller@delete_driver']);
    Route::match(array('GET', 'POST'), 'update_driver', ['as' => 'admin.update_driver', 'uses' => 'Admin_Controller@update_driver']);
    Route::match(array('GET', 'POST'), 'all_driver', ['as' => 'admin.all_driver', 'uses' => 'Admin_Controller@all_driver']);


    Route::match(array('GET', 'POST'), 'all_orders_page', ['as' => 'admin.all_orders_page', 'uses' => 'AdminController@all_orders_page']);

    Route::match(array('GET', 'POST'), 'role_change_permission_page', ['as' => 'admin.role_change_permission_page', 'uses' => 'Admin_Controller@role_change_permission_page']);
    Route::match(array('GET', 'POST'), 'change_permissions_by_role', ['as' => 'admin.change_permissions_by_role', 'uses' => 'Admin_Controller@change_permissions_by_role']);
    Route::match(array('GET', 'POST'), 'role_change_permissions_update', ['as' => 'admin.role_change_permissions_update', 'uses' => 'Admin_Controller@role_change_permissions_update']);
});



Route::match(['get', 'post'], 'update_password', 'Users@update_password')->name('update_password');
Route::match(['get', 'post'], 'forgot_password_validate', 'Users@forgot_password_validate')->name('forgot_password_validate');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
