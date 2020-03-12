<?php

namespace App\Http\Controllers;

use App\Add_product;
use App\Laravelproject_new_user;
use DB;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Laravelproject_new_admin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Laravelproject_new_driver;

class Admin_Controller extends Controller
{
    public function __construct()
    {

        if (empty(Session::get('user'))) {
            Redirect::to('admin/login')->send();
        } else {
            if (Session::get('user')->admin == 0) {
                return redirect()->route('admin.login');
            }
            return view('elite/admin/index');
        }
    }

    public function index()
    {

        $users = DB::table('laravelproject_new_users')->get();
        $users = $users->count();
        $allcategories = DB::table('laravelproject_new_store_category')->get();
        $allcategories = $allcategories->count();
        $fb_count = DB::table('laravelproject_new_users')->where('social_account_login', 'facebook')->count();
        $fb_count = ($fb_count / 1000 * 100);
        $twtr_count = DB::table('laravelproject_new_users')->where('social_account_login', 'twitter')->count();
        $twtr_count = ($twtr_count / 1000 * 100);
        $lnkd_count = DB::table('laravelproject_new_users')->where('social_account_login', 'linkedin')->count();
        $lnkd_count = ($lnkd_count / 1000 * 100);
        $gogle_count = DB::table('laravelproject_new_users')->where('social_account_login', 'google')->count();
        $gogle_count = ($gogle_count / 1000 * 100);
        if (empty(Session::get('user'))) {
            return redirect()->route('admin.login');
        } else {
            return view('elite/admin/index', compact('users', 'fb_count', 'twtr_count', 'lnkd_count', 'gogle_count', 'allcategories'));
        }
    }

    //categories page
    public function categorie_page()
    {
        $data = DB::table('laravelproject_new_store_category')->get();
        return view('elite.admin.categorie')->with('data', $data);
    }
    public function service_categorie_page()
    {
        $data = DB::table('laravelproject_new_service_category')->get();
        return view('elite.admin.service_category')->with('data', $data);
    }
    public function restaurant_categorie_page()
    {
        $data = DB::table('laravelproject_new_restaurant_category')->get();
        return view('elite.admin.restaurant_category')->with('data', $data);
    }
    public function products($categorie)
    {
        $data = DB::table('laravelproject_new_add_products')->where('category', $categorie)->get();
        return view('elite.admin.product')->with('data', $data);
    }

    public function services($categorie)
    {
        $data = DB::table('laravelproject_new_service_register')->where('service_category', $categorie)->get();
        return view('elite.admin.service')->with('data', $data);
    }
    public function foods($categorie)
    {

        $data = DB::table('laravelproject_new_add_food')->where('category_name', $categorie)->get();
        return view('elite.admin.foods')->with('data', $data);
    }

    public function product_edit(Request $request, $id)
    {
        $data = DB::table('laravelproject_new_add_products')->where('p_id', $id)->get();
        if (!empty($request->all())) {
            DB::table('laravelproject_new_add_products')->where('p_id', $id)->update(['status' => $request->status]);
            return back()->with('updated', 'Status Upadated Successfully!');
        }
        return view('elite.admin.edit')->with('data', $data);
    }

    public function service_edit(Request $request, $id)
    {
        $data = DB::table('laravelproject_new_service_register')->where('service_id', $id)->get();
        if (!empty($request->all())) {
            DB::table('laravelproject_new_service_register')->where('service_id', $id)->update(['service_approve_status' => $request->service_approve_status]);
            return back()->with('updated', 'Status Upadated Successfully!');
        }
        return view('elite.admin.service_edit')->with('data', $data);
    }

    public function restaurant_edit(Request $request, $id)
    {
        $data = DB::table('laravelproject_new_restaurant_register')->select('business_name')->where('user_id', Session::get('user')->id)->get();
        if (!empty($request->all())) {
            DB::table('laravelproject_new_restaurant_register')->where('restaurant_id', $id)->update(['admin_approve' => $request->admin_approve]);
            return back()->with('updated', 'Status Upadated Successfully!');
        }
        return view('elite.admin.restaurant_edit')->with('data', $data);
    }

    public function add_product(Request $request)
    {
        if (!empty($request->all())) { //validating request
            $product = new Add_product;
            if ($request->hasfile('image')) {  //upload image if image choosed
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/products', $filename);
                $product->image = 'uploads/products/' . $filename;
            } else {
                $product->image = 'uploads/products/nophoto.jpg';
            }
            $product->title = $request->input('title');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->category = $request->input('categorie');
            $product->type = $request->input('type');
            $product->save();
            return back()->with('add_product_success', 'Product Added Successfully!');
        } else {
            return view('elite/admin/add_product')->with('error', 'Enter Data!');
        }
        return view('elite/admin/add_product');
    }

    public function delete_product($id)
    {
        DB::table('laravelproject_new_add_products')->where('p_id', $id)->delete();
        return back()->with('product_deleted', 'Product is deleted successfully!');
    }
    public function delete_store($id)
    {
        DB::table('laravelproject_new_store_create')->where('store_id', $id)->delete();
        return back()->with('product_deleted', 'Store is deleted successfully!');
    }
    public function all_users($status = null)
    {
        if ($status == 'store_owner') {
            $data = DB::table('laravelproject_new_users')->where('store_owner', '1')->get();
            return view('elite.admin.all_users')->with('all_users', $data);
        } elseif ($status == 'service_owner') {
            $data = DB::table('laravelproject_new_users')->where('service_owner', '1')->get();
            return view('elite.admin.all_users')->with('all_users', $data);
        } elseif ($status == 'restaurant_owner') {
            $data = DB::table('laravelproject_new_users')->where('restaurant_owner', '1')->get();
            return view('elite.admin.all_users')->with('all_users', $data);
        } elseif ($status == 'blocked') {
            $data = DB::table('laravelproject_new_users')->where('blocked', '1')->get();
            return view('elite.admin.all_users')->with('all_users', $data);
        } else {
            if ($status == "check" && !empty($order_id)) {
                DB::table('laravelproject_new_order_creates')->where('order_id', $order_id)->update(['delivery_status' => '1']);
                return back()->with('d_status', "Delivery Status Updated Successfully!");
            } elseif ($status == "cancelled" && !empty($order_id)) {
                DB::table('laravelproject_new_order_creates')->where('order_id', $order_id)->update(['delivery_status' => '2']);
                return back()->with('d_status', "Delivery Status Updated Successfully!");
            } elseif ($status == "delete_order" && !empty($order_id)) {
                DB::table('laravelproject_new_order_creates')->where('order_id', $order_id)->delete();
                return back()->with('delete_order', "Order Deleted Successfully!");
            } elseif ($status == "markall") {
                DB::table('laravelproject_new_order_creates')->where('read_as', '0')->update(['read_as' => '1']);
                return redirect('admin/all_orders');
            } elseif (gettype($status) == "string") {

                DB::table('laravelproject_new_order_creates')->where('order_id', $status)->update(['read_as' => '1']);
                return redirect('admin/all_orders');
            }
        }
        $all_users = DB::table('laravelproject_new_users')->get();
        return view('elite.admin.all_users')->with('all_users', $all_users);
    }

    public function delete_user($id)
    {
        DB::table('laravelproject_new_users')->where('id', $id)->delete();
        return back()->with('user_deleted', 'User is deleted successfully!');
    }

    public function all_customers()
    {
        $data = DB::table('laravelproject_new_customers')->get();
        return view('elite.admin.all_customers')->with('all_users', $data);
    }

    public function delete_customer($id)
    {
        DB::table('laravelproject_new_customers')->where('id', $id)->delete();
        return back()->with('user_deleted', 'User is deleted successfully!');
    }

    public function edit_customer(Request $request, $id)
    {
        $data = DB::table('laravelproject_new_customers')->where('id', $id)->get();
        if (!empty($request->all())) {
            $array = array(
                'blocked' => $request->blocked,
            );
            DB::table('laravelproject_new_customers')->where('id', $id)->update($array);
            return back()->with('updated', 'Data Upadated Successfully!');
        }
        return view('elite/admin/edit_customer')->with('data', $data);
    }

    public function edit_user(Request $request, $id)
    {
        $data = DB::table('laravelproject_new_users')->where('id', $id)->get();
        if (!empty($request->all())) {

            $array = array(
                'admin' => $request->admin,
                'store_owner' => $request->store_owner_status,
                'blocked' => $request->blocked,
                'service_owner' => $request->service_owner_status,
                'restaurant_owner' => $request->restaurant_owner_status,
                'admin_store_owner_approve' => $request->admin_approvel_status,
            );
            DB::table('laravelproject_new_users')->where('id', $id)->update($array);
            return back()->with('updated', 'Data Upadated Successfully!');
        }
        return view('elite/admin/edit_user')->with('data', $data);
    }

    public function add_new_user(Request $request)
    {
        if (!empty($request->all())) {
            $users = new Laravelproject_new_user;
            //validation rules for form
            $this->validate($request, [
                'email' => 'email',
                'password' => 'required|min:6',
                'cpassword' => 'required|min:6|same:password',
            ]);
            //upload image if user choosed
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/userimages', $filename);
                $users->image = 'uploads/userimages/' . $filename;
            } else {
                $users->image = 'https://openclipart.org/image/2400px/svg_to_png/211821/matt-icons_preferences-desktop-personal.png';
            }
            //hashing the password
            $pass = app(\App\Http\Controllers\Laravelproject_new_user::class)->generate_rand_pass($request->input('password'));
            foreach ($pass as $value) {
                $users->pass = $value['pass'];
                $users->salt = $value['salt'];
            }
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->status = $request->input('status');
            $users->admin = $request->input('admin');
            $users->save();
            return back()->with('add_user_success', 'User Added Successfully!');
        } else {
            return view('elite/admin/add_new_user')->with('error', 'Enter Data!');
        }
        return view('elite/admin/add_new_user');
    }

    public function all_orders($status = null)
    {
        $d_status = request()->segment(3);
        $order_id = request()->segment(4);
        //getting order if it filtered by order status
        if ($d_status == 'processing') {
            $data = DB::table('laravelproject_new_order_creates')->where('delivery_status', '0')->get();
            return view('elite/admin/all_orders')->with('all_orders', $data);
        } elseif ($d_status == 'delivered') {
            $data = DB::table('laravelproject_new_order_creates')->where('delivery_status', '1')->get();
            return view('elite/admin/all_orders')->with('all_orders', $data);
        } elseif ($d_status == 'cancel') {
            $data = DB::table('laravelproject_new_order_creates')->where('delivery_status', '2')->get();
            return view('elite/admin/all_orders')->with('all_orders', $data);
        } else {
            if ($d_status == "check" && !empty($order_id)) {
                DB::table('laravelproject_new_order_creates')->where('order_id', $order_id)->update(['delivery_status' => '1']);
                return back()->with('d_status', "Delivery Status Updated Successfully!");
            } elseif ($d_status == "cancelled" && !empty($order_id)) {
                DB::table('laravelproject_new_order_creates')->where('order_id', $order_id)->update(['delivery_status' => '2']);
                return back()->with('d_status', "Delivery Status Updated Successfully!");
            } elseif ($d_status == "delete_order" && !empty($order_id)) {
                DB::table('laravelproject_new_order_creates')->where('order_id', $order_id)->delete();
                return back()->with('delete_order', "Order Deleted Successfully!");
            } elseif ($d_status == "markall") {
                DB::table('laravelproject_new_order_creates')->where('read_as', '0')->update(['read_as' => '1']);
                return redirect('admin/all_orders');
            } elseif (gettype($d_status) == "string") {

                DB::table('laravelproject_new_order_creates')->where('order_id', $d_status)->update(['read_as' => '1']);
                return redirect('admin/all_orders');
            }
        }
        $data = DB::table('laravelproject_new_order_creates')->get();
        return view('elite/admin/all_orders')->with('all_orders', $data);
    }
    public function categories(Request $request)
    {
        if (!empty($request->all())) {
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/categories', $filename);
                $image = 'uploads/categories/' . $filename;
            } else {
                $image = 'uploads/categories/nophoto.jpg';
            }
            $arrayName = array(
                'category_name' =>  $request->category_name,
                'image' => $image,
                'store_owner_id' => session::get('user')->id,
                'admin_approve' => "1"
            );

            DB::table('laravelproject_new_category')->insert($arrayName);
            return view('elite.admin.add_categorie')->with('add_categorie_success', "Categorie Added Successfully");
        }
        return view('elite.admin.add_categorie');
    }

    public function all_categories($status = null)
    {
        if ($status == 'store_categorie') {
            $data = DB::table('laravelproject_new_store_category')->get();
            return view('elite.admin.all_categorie')->with('all_data', $data);
        } elseif ($status == 'service_categorie') {
            $data = DB::table('laravelproject_new_service_category')->get();
            return view('elite.admin.all_categorie')->with('all_data', $data);
        } elseif ($status == 'restaurant_categorie') {
            $data = DB::table('laravelproject_new_restaurant_category')->get();
            return view('elite.admin.all_categorie')->with('all_data', $data);
        }

        $all_data = DB::table('laravelproject_new_store_category')->select('*')->get();
        return view('elite.admin.all_categorie', compact('all_data'));
    }

    public function all_stores(Request $request)
    {
        $all_store = DB::table('laravelproject_new_store_create')->select('*')->get();
        return view('elite/admin/all_store', compact('all_store'));
    }

    public function single_store(Request $request, $id)
    {
        $store_data = DB::table('laravelproject_new_store_create')->select('*')->where('store_id', $id)->first();
        return view('elite.admin.single_store', compact('store_data'));
    }

    public function store_status_update(Request $request)
    {
        $id = (int) $request->input('store_id');
        DB::table('laravelproject_new_store_create')->where('store_id', $id)->update(['status' => $request->input('status')]);
        return back()->with("message", "Record Updated successfully");
    }

    public function categorie_status_update(Request $request)
    {

        $categorie_id = (int) $request->input('category_id');
        $store_owner_id = (int) $request->input('store_owner_id');
        $service_owner_id = (int) $request->input('store_id');
        $restaurant_owner_id = (int) $request->input('restaurant_owner_id');
        if (!empty($store_owner_id)) {
            DB::table('laravelproject_new_store_category')->where('category_id', $categorie_id)->update(['admin_approve' => $request->input('admin_approve')]);
            return back()->with("message", "Record Updated successfully");
        } elseif (!empty($service_owner_id)) {
            DB::table('laravelproject_new_service_category')->where('category_id', $categorie_id)->update(['admin_approve' => $request->input('admin_approve')]);
            return back()->with("message", "Record Updated successfully");
        } elseif (!empty($restaurant_owner_id)) {
            DB::table('laravelproject_new_restaurant_category')->where('category_id', $categorie_id)->update(['admin_approve' => $request->input('admin_approve')]);
            return back()->with("message", "Record Updated successfully");
        }
        return back()->with("error", "There is an error please try later!");
    }
    public function owner_detail(Request $request, $id = null)
    {

        return view('elite.admin.owners_details');
    }


    //For system admin/staff 

    public function add_admin()
    {
        $roles = Role::all();
        return view('elite.admin.add_admin', compact('roles'));
    }

    public function create_admin(Request $request)
    {  //form validation rules
        $validator = Validator::make($request->all(), [
            'first_name'                   => 'required|max:20|string',
            'last_name'                    => 'required|max:20|string',
            'email'                        => 'required|email|unique:laravelproject_new_admins',
            'password'                     => 'required|digits_between:6,30|string',
            'role'                         => 'required|string',
            'social_security_number'       => 'required|digits_between:2,20|numeric',
            'dob'                          => 'required|max:20',
            'age'                          => 'required|max:100|digits_between:1,2|numeric',
            'address'                      => 'required|max:255|string',
            'phone_number'                 => 'required|digits_between:2,20|numeric',
            'date_started_working'         => 'required|max:20|string',
            'job_description'              => 'required|max:255|string',
            'bank_routing_number'          => 'required|digits_between:2,20|numeric',
            'bank_account_number'          => 'required|digits_between:2,20|numeric',
            'image'                        => 'required|mimes:jpeg,bmp,png',
        ]);

        //if validate fails return back
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/userimages', $filename);
            $image = 'uploads/userimages/' . $filename;
        }

        $data = array(
            'first_name'                    => $request->first_name,
            'last_name'                     => $request->last_name,
            'email'                         => $request->email,
            'password'                      => Hash::make($request->password),
            'role'                          => $request->role,
            'social_security_number'        => $request->social_security_number,
            'dob'                           => $request->dob,
            'age'                           => $request->age,
            'address'                       => $request->address,
            'phone_number'                  => $request->phone_number,
            'date_started_working'          => $request->date_started_working,
            'job_description'               => $request->job_description,
            'bank_routing_number'           => $request->bank_routing_number,
            'bank_account_number'           => $request->bank_account_number,
            'profile_image'                 => $image
        );
        //update  the admin
        $admin = Laravelproject_new_admin::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        if ($admin) {
            $admin->assignRole($request->role);
            return back()->with("message", "Admin created successfully!");
        }
    }

    public function update_admin(Request $request)
    { //form validation rules
        $validator = Validator::make($request->all(), [
            'first_name'                   => 'required|max:20|string',
            'last_name'                    => 'required|max:20|string',
            'role'                         => 'required|string',
            'social_security_number'       => 'required|digits_between:2,20|numeric',
            'dob'                          => 'required|max:20',
            'age'                          => 'required|max:100|digits_between:1,2|numeric',
            'address'                      => 'required|max:255|string',
            'phone_number'                 => 'required|digits_between:2,20|numeric',
            'date_started_working'         => 'required|max:20|string',
            'job_description'              => 'required|max:255|string',
            'bank_routing_number'          => 'required|digits_between:2,20|numeric',
            'bank_account_number'          => 'required|digits_between:2,20|numeric',
            'image'                        => 'mimes:jpg,jpeg,bmp,png',
        ]);

        //if validate fails return back
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = array(
            'first_name'                    => $request->first_name,
            'last_name'                     => $request->last_name,
            'email'                         => $request->email,
            'role'                          => $request->role,
            'social_security_number'        => $request->social_security_number,
            'dob'                           => $request->dob,
            'age'                           => $request->age,
            'address'                       => $request->address,
            'phone_number'                  => $request->phone_number,
            'date_started_working'          => $request->date_started_working,
            'job_description'               => $request->job_description,
            'bank_routing_number'           => $request->bank_routing_number,
            'bank_account_number'           => $request->bank_account_number,
        );

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/userimages', $filename);
            $image = 'uploads/userimages/' . $filename;

            $data = array(
                'first_name'                    => $request->first_name,
                'last_name'                     => $request->last_name,
                'email'                         => $request->email,
                'role'                          => $request->role,
                'social_security_number'        => $request->social_security_number,
                'dob'                           => $request->dob,
                'age'                           => $request->age,
                'address'                       => $request->address,
                'phone_number'                  => $request->phone_number,
                'date_started_working'          => $request->date_started_working,
                'job_description'               => $request->job_description,
                'bank_routing_number'           => $request->bank_routing_number,
                'bank_account_number'           => $request->bank_account_number,
                'profile_image'                 => $image
            );
        }

        $admin = Laravelproject_new_admin::where('id', $request->id)->update(
            $data
        );

        if ($admin) {
            $admin = Laravelproject_new_admin::findOrFail($request->id);
            $roles = Role::all();
            foreach ($roles as $role) {
                $admin->removeRole($role->name);
            }

            $admin->assignRole($request->role);
            return back()->with("message", "Admin updated successfully!");
        }
    }

    public function edit_admin($id)
    {
        $admin = Laravelproject_new_admin::findOrFail($id);
        $roles = Role::all();
        return view('elite.admin.edit_admin', compact('admin', 'roles'));
    }

    public function delete_admin($id)
    {
        $admin = Laravelproject_new_admin::findOrFail($id)->delete();
        return back()->with("message", "Admin deleted successfully!");
    }

    public function all_admin()
    {
        $admins = Laravelproject_new_admin::all();

        return view('elite.admin.all_admin', compact('admins'));
    }


    //For system drivers

    public function add_driver()
    {
        return view('elite.admin.add_driver');
    }

    public function create_driver(Request $request)
    { //form validation rules
        $validator = Validator::make($request->all(), [
            'first_name'                   => 'required|max:20|string',
            'last_name'                    => 'required|max:20|string',
            'email'                        => 'required|email|unique:laravelproject_new_drivers',
            'password'                     => 'required|digits_between:6,30|string',
            'social_security_number'       => 'required|digits_between:2,20|numeric',
            'dob'                          => 'required|max:20',
            'age'                          => 'required|max:100|digits_between:1,2|numeric',
            'address'                      => 'required|max:255|string',
            'phone_number'                 => 'required|digits_between:2,20|numeric',
            'date_started_working'         => 'required|max:20|string',
            'license_number'               => 'required|string',
            'licence_expiry_date'          => 'required|max:20',
            'home_region'                  => 'required|max:40|string',
            'driver_level'                 => 'required|integer',
            'bank_routing_number'          => 'required|digits_between:2,20|numeric',
            'bank_account_number'          => 'required|digits_between:2,20|numeric',
            'image'                        => 'required|mimes:jpeg,bmp,png',
        ]);

        //if validate fails return back
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/userimages', $filename);
            $image = 'uploads/userimages/' . $filename;
        }

        $data = array(
            'first_name'                    => $request->first_name,
            'last_name'                     => $request->last_name,
            'email'                         => $request->email,
            'password'                      => Hash::make($request->password),
            'social_security_number'        => $request->social_security_number,
            'dob'                           => $request->dob,
            'age'                           => $request->age,
            'address'                       => $request->address,
            'phone_number'                  => $request->phone_number,
            'date_started_working'          => $request->date_started_working,
            'license_number'                => $request->license_number,
            'licence_expiry_date'           => $request->licence_expiry_date,
            'home_region'                   => $request->home_region,
            'driver_level'                  => $request->driver_level,
            'license_number'                => $request->license_number,
            'bank_routing_number'           => $request->bank_routing_number,
            'bank_account_number'           => $request->bank_account_number,
            'license_image'                 => $image
        );

        $driver = Laravelproject_new_driver::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        if ($driver) {
            return back()->with("message", "Driver created successfully!");
        }
    }
    public function update_driver(Request $request)
    { //form validation rules
        $validator = Validator::make($request->all(), [
            'first_name'                   => 'required|max:20|string',
            'last_name'                    => 'required|max:20|string',
            'social_security_number'       => 'required|digits_between:2,20|numeric',
            'dob'                          => 'required|max:20',
            'age'                          => 'required|max:100|digits_between:1,2|numeric',
            'address'                      => 'required|max:255|string',
            'phone_number'                 => 'required|digits_between:2,20|numeric',
            'date_started_working'         => 'required|max:20|string',
            'license_number'               => 'required|string',
            'licence_expiry_date'          => 'required|max:20',
            'home_region'                  => 'required|max:40|string',
            'driver_level'                 => 'required|integer',
            'bank_routing_number'          => 'required|digits_between:2,20|numeric',
            'bank_account_number'          => 'required|digits_between:2,20|numeric',
        ]);

        //if validate fails return back
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = array(
            'first_name'                    => $request->first_name,
            'last_name'                     => $request->last_name,
            'email'                         => $request->email,
            'social_security_number'        => $request->social_security_number,
            'dob'                           => $request->dob,
            'age'                           => $request->age,
            'address'                       => $request->address,
            'phone_number'                  => $request->phone_number,
            'date_started_working'          => $request->date_started_working,
            'license_number'                => $request->license_number,
            'licence_expiry_date'           => $request->licence_expiry_date,
            'home_region'                   => $request->home_region,
            'driver_level'                  => $request->driver_level,
            'license_number'                => $request->license_number,
            'bank_routing_number'           => $request->bank_routing_number,
            'bank_account_number'           => $request->bank_account_number
        );

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/userimages', $filename);
            $image = 'uploads/userimages/' . $filename;

            $data = array(
                'first_name'                    => $request->first_name,
                'last_name'                     => $request->last_name,
                'email'                         => $request->email,
                'social_security_number'        => $request->social_security_number,
                'dob'                           => $request->dob,
                'age'                           => $request->age,
                'address'                       => $request->address,
                'phone_number'                  => $request->phone_number,
                'date_started_working'          => $request->date_started_working,
                'license_number'                => $request->license_number,
                'licence_expiry_date'           => $request->licence_expiry_date,
                'home_region'                   => $request->home_region,
                'driver_level'                  => $request->driver_level,
                'license_number'                => $request->license_number,
                'bank_routing_number'           => $request->bank_routing_number,
                'bank_account_number'           => $request->bank_account_number,
                'license_image'                 => $image
            );
        }

        $driver = Laravelproject_new_driver::find($request->id)->update(
            $data
        );


        return back()->with("message", "Driver info updated successfully!");
    }

    public function edit_driver($id)
    {
        $driver = Laravelproject_new_driver::findOrFail($id);
        return view('elite.admin.edit_driver', compact('driver'));
    }

    public function delete_driver($id)
    {
        $driver = Laravelproject_new_driver::findOrFail($id)->delete();
        return back()->with("message", "Driver deleted successfully!");
    }

    public function all_driver()
    {
        $drivers = Laravelproject_new_driver::all();

        return view('elite.admin.all_driver', compact('drivers'));
    }


    //role permission methods
    public function role_change_permission_page()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('elite.admin.change_role_permissions', compact('roles', 'permissions'));
    }

    public function change_permissions_by_role()
    {
        $role_id =  $_GET['role_id'];
        $roles = Role::all();  //getting all the roles
        $permissions = Permission::all();
        return view('elite.admin.change_role_permissions', compact('roles', 'permissions', 'role_id'));
    }

    public function role_change_permissions_update(Request $request)
    {
        $role = Role::find($request->role); //get riole by id
        $all_permissions = Permission::all(); //get all permissions

        foreach ($all_permissions as $perm) {
            $role->revokePermissionTo($perm);  //remove all permission for the role
        }
        foreach ($request->permissions as $perm) {
            $permission = Permission::find($perm); //get permission by id
            $role->givePermissionTo($permission); //asign perission to the role
        }

        return redirect()->back()->with('message', 'Permissions updated successfully!');
    }

    //showing all order to admin panel
    public function all_orders_page()
    {
        $all_orders = Laravelproject_new_goods_order::join('laravelproject_new_goods_order_items', 'laravelproject_new_goods_orders.id', 'laravelproject_new_goods_order_items.order_id')
            ->select('laravelproject_new_goods_orders.*', 'laravelproject_new_goods_order_items.order_id', 'laravelproject_new_goods_order_items.product_id', 'laravelproject_new_goods_order_items.qty', 'laravelproject_new_goods_order_items.store_id')
            ->get();
        return view('elite.admin.all_orders', compact('all_orders'));
    }
}
