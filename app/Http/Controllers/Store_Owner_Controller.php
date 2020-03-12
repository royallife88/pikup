<?php

namespace App\Http\Controllers;

use App\Laravelproject_new_user;
use DB;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Laravelproject_new_goods_colors_size;

class Store_Owner_Controller extends Controller
{



    public function __construct()
    {
        if (empty(Session::get('user'))) {
            Redirect::to('store_owner/login')->send();
        }
        $admin_store_owner_approve = DB::table('laravelproject_new_users')->select('admin_store_owner_approve')->where('id', session::get('user')->id)->first();
        if ($admin_store_owner_approve->admin_store_owner_approve == '0') {
            Session::flash('store_owner_status', 'Your account is in under review! When admin approve you can use functionality.');
        }
    }

    public function index()
    {
        if (empty(Auth::user())) {
            return view('elite.store_owner.login');
        }
        $store_name = DB::table('laravelproject_new_store_register')->where('user_id', Auth::user()->id)->select('store_name')->first();
        if (!empty($store_name)) {
            $products = DB::table('laravelproject_new_add_products')->where('store_name', $store_name->store_name)->get();
            $products = $products->count();
            $allstore = DB::table('laravelproject_new_store_register')->where('store_name', $store_name->store_name)->get();
            $allstore = $allstore->count();
        }

        $user = Laravelproject_new_user::findOrFail(Auth::user()->id);
        $store_id = DB::table('laravelproject_new_store_register')->select('store_id')->where('user_id', Auth::user()->id)->first()->store_id;
        $user_store = DB::table('laravelproject_new_store_register')->where('store_id', $store_id)->get();
        $user_resturant = DB::table('laravelproject_new_restaurant_register')->where('store_id', $store_id)->get();
        $user_service = DB::table('laravelproject_new_service_register')->where('store_id', $store_id)->get();

        if (count($user_resturant) == 0 && $user->restaurant_owner == 1) {
            $show_resturant_form = 1;
        } else {
            $show_resturant_form = 0;
        }
        if (count($user_service) == 0 && $user->service_owner == 1) {
            $show_service_form = 1;
        } else {
            $show_service_form = 0;
        }
        if (count($user_store) == 0 && $user->store_owner == 1) {
            $show_store_form = 1;
        } else {
            $show_store_form = 0;
        }

        $fb_count = DB::table('laravelproject_new_users')->where('social_account_login', 'facebook')->count();
        $fb_count = ($fb_count / 1000 * 100);
        $twtr_count = DB::table('laravelproject_new_users')->where('social_account_login', 'twitter')->count();
        $twtr_count = ($twtr_count / 1000 * 100);
        $lnkd_count = DB::table('laravelproject_new_users')->where('social_account_login', 'linkedin')->count();
        $lnkd_count = ($lnkd_count / 1000 * 100);
        $gogle_count = DB::table('laravelproject_new_users')->where('social_account_login', 'google')->count();
        $gogle_count = ($gogle_count / 1000 * 100);
        if ($user->store_owner == "1") {
            return view('elite.store_owner.index', compact('products', 'fb_count', 'twtr_count', 'lnkd_count', 'gogle_count', 'show_service_form', 'show_resturant_form', 'show_store_form', 'allstore'));
        }
    }


    public function store_categories(Request $request)
    {

        if (!empty($request->all())) {
            $validator  = Validator::make($request->all(), [
                'category_name' => 'required|string',
                'image'         => 'required|mimes:jpg,jpeg,bmp,png'
            ]);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $valid_user =  DB::table('laravelproject_new_store_category')->select('category_name')->where('category_name', $request->input('categorie_name'))
                ->where('store_owner_id', Session::get('store_id'))
                ->first();
            if (!empty($valid_user)) {
                return back()->with('error', 'Category "' . $request->input('categorie_name') . '" Already Exist in your store account, Kindly Change Your Category Name!');
            }
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
                'store_owner_id' => Session::get('store_id'),
                'category_name' =>  $request->category_name,
                'image' => $image,
            );
            DB::table('laravelproject_new_store_category')->insert($arrayName);
            return back()->with('add_categorie_success', "Categorie Added Successfully");
        }
        return view('elite.store_owner.add_categorie');
    }
    public function service_categories(Request $request)
    {

        if (!empty($request->all())) {
            $validator  = Validator::make($request->all(), [
                'category_name'    => 'required|string|max:20',
                'image'      => 'required|mimes:jpg,jpeg,bmp,png'
            ]);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $valid_user =  DB::table('laravelproject_new_service_category')->select('category_name')->where('category_name', $request->input('category_name'))
                ->where('store_id', Session::get('store_id'))
                ->first();

            if (!empty($valid_user)) {
                return back()->with('error', 'Category "' . $request->input('category_name') . '" Already Exist in your service account, Kindly Change Your Category Name!');
            }
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
                'store_id' => session::get('store_id'),
                'category_name' =>  $request->category_name,
                'image' => $image,
            );
            DB::table('laravelproject_new_service_category')->insert($arrayName);
            return back()->with('add_categorie_success', "Category Added Successfully");
        }
        return view('elite.store_owner.add_categorie');
    }

    public function service_category_edit($id)
    {
        $service_category = DB::table('laravelproject_new_service_category')->where('category_id', $id)->first();
        return view('elite.store_owner.edit_service_category', compact('service_category'));
    }
    public function service_category_delete($id)
    {
        $service_category = DB::table('laravelproject_new_service_category')->where('category_id', $id)->delete();
        return back()->with('deleted_categorie_success', "Category deleted Successfully");
    }
    public function service_category_edited(Request $request)
    {

        if (!empty($request->all())) {
            $validator  = Validator::make($request->all(), [
                'category_name'    => 'required|string|max:20',
                'image'      => 'required|mimes:jpg,jpeg,bmp,png'
            ]);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $valid_user =  DB::table('laravelproject_new_service_category')->select('category_name')->where('category_name', $request->input('category_name'))
                ->where('store_id', Session::get('store_id'))
                ->first();

            if (!empty($valid_user)) {
                return back()->with('error', 'Category "' . $request->input('category_name') . '" Already Exist in your service account, Kindly Change Your Category Name!');
            }
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/categories', $filename);
                $image = 'uploads/categories/' . $filename;
            } else {
                $image = DB::table('laravelproject_new_service_category')->where('category_id', $request->category_id)->first()->image;
            }
            $arrayName = array(
                'store_id' => session::get('store_id'),
                'category_name' =>  $request->category_name,
                'image' => $image,
            );
            DB::table('laravelproject_new_service_category')->where('category_id', $request->category_id)->update($arrayName);
            return back()->with('add_categorie_success', "Category updated Successfully");
        }
        $service_category = DB::table('laravelproject_new_service_category')->where('category_id', $request->category_id)->first();
        return view('elite.store_owner.edit_service_category', compact('service_category'));
    }

    public function store_category_edit($id)
    {
        $service_category = DB::table('laravelproject_new_store_category')->where('category_id', $id)->first();
        return view('elite.store_owner.edit_store_category', compact('service_category'));
    }
    public function store_category_delete($id)
    {
        $service_category = DB::table('laravelproject_new_store_category')->where('category_id', $id)->delete();
        return back()->with('deleted_categorie_success', "Category deleted Successfully");
    }
    public function store_category_edited(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'category_name' => 'required|string',
            'image'         => 'required|mimes:jpg,jpeg,bmp,png'
        ]);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

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
                'store_owner_id' => session::get('store_id'),
                'category_name' =>  $request->category_name,
                'image' => $image,
            );
            DB::table('laravelproject_new_store_category')->where('category_id', $request->category_id)->update($arrayName);
            return back()->with('add_categorie_success', "Category updated Successfully");
        }
        $service_category = DB::table('laravelproject_new_store_category')->where('category_id', $request->category_id)->first();
        return view('elite.store_owner.edit_service_category', compact('service_category'));
    }

    public function store_all_categories()
    {
        $all_data = DB::table('laravelproject_new_store_category')->select('*')->where('store_owner_id', Session::get('store_id'))->get();
        return view('elite.store_owner.all_store_categories', compact('all_data'));
    }
    public function service_all_categories()
    {
        $all_data = DB::table('laravelproject_new_service_category')->select('*')->where('store_id', Session::get('store_id'))->get();

        return view('elite.store_owner.all_service_categories', compact('all_data'));
    }


    // public function restaurant_categories(Request $request)
    // {

    //     if (!empty($request->all())) {
    //         $valid_user =  DB::table('laravelproject_new_restaurant_category')->select('category_name')->where('category_name', $request->input('categorie_name'))
    //             ->where('restaurant_owner_id', session::get('user')->id)
    //             ->first();

    //         if (!empty($valid_user)) {
    //             return back()->with('error', 'Category "' . $request->input('categorie_name') . '" Already Exist in your restaurant account, Kindly Change Your Category Name!');
    //         }
    //         if ($request->hasfile('image')) {
    //             $file = $request->file('image');
    //             $extension = $file->getClientOriginalExtension();
    //             $filename = time() . '.' . $extension;
    //             $file->move('uploads/categories', $filename);
    //             $image = 'uploads/categories/' . $filename;
    //         } else {
    //             $image = 'uploads/categories/nophoto.jpg';
    //         }
    //         $users = DB::table('laravelproject_new_users')
    //             ->join('laravelproject_new_restaurant_register', 'laravelproject_new_users.id', '=', 'laravelproject_new_restaurant_register.user_id')
    //             ->where('laravelproject_new_restaurant_register.user_id', '=', session::get('user')->id)
    //             ->select('laravelproject_new_restaurant_register.restaurant_id')
    //             ->first();

    //         $arrayName = array(
    //             'restaurant_owner_id' => session::get('user')->id,
    //             'category_name' =>  $request->categorie_name,
    //             'image' => $image,
    //         );
    //         DB::table('laravelproject_new_restaurant_category')->insert($arrayName);
    //         return back()->with('add_categorie_success', "Category Added Successfully");
    //     }
    //     return view('elite.restaurant_owner.add_categorie');
    // }

    // public function restaurant_all_categories()
    // {


    //     $all_data =  DB::table('laravelproject_new_users')
    //         ->join('laravelproject_new_restaurant_register', 'laravelproject_new_users.id', '=', 'laravelproject_new_restaurant_register.user_id')
    //         ->join('laravelproject_new_restaurant_category', 'laravelproject_new_users.id', '=', 'laravelproject_new_restaurant_category.restaurant_owner_id')
    //         ->where('laravelproject_new_restaurant_category.restaurant_owner_id', '=', Session::get('store_id'))
    //         ->select('laravelproject_new_restaurant_category.*')
    //         ->get();
    //     return view('elite.restaurant_owner.all_categorie', compact('all_data'));
    // }



    // public function store_create(Request $request)
    // {

    //     if($request->input('title')==null){
    //         return view('elite/store_owner/add_new_store')->with('error', 'Enter Data!');
    //     }
    //    $store_name = DB::table('laravelproject_new_store_create')->select('store_name')->where('store_name',$request->input('title'))->first();
    //     if(!empty($store_name)){
    //         return redirect()->route('store_owner.store_create')->with('warning', 'Store name already taken!');
    //     }
    // if($request->hasfile('image')){
    //     $file = $request->file('image');            
    //     $extension = $file->getClientOriginalExtension();            
    //     $filename =time().'.'.$extension;            
    //     $file->move('uploads/store_images', $filename);            
    //     $image = 'uploads/store_images/'.$filename;        
    //     }else{
    //     $image = 'uploads/store_images/nophoto.jpg';
    //     }
    //     if($request->hasfile('banner')){
    //         $file = $request->file('banner');            
    //         $extension = $file->getClientOriginalExtension();            
    //         $filename =time().'.'.$extension;            
    //         $file->move('uploads/store_images', $filename);            
    //         $banner = 'uploads/store_images/'.$filename;        
    //         }else{
    //         $banner = 'uploads/store_images/nophoto.jpg';
    //         }
    //         $store = array(
    //             'store_name' => $request->input('title'), 
    //             'store_desc' => $request->input('desc'), 
    //             'store_address' => $request->input('store_address'), 
    //             'store_opening' => $request->input('store_opening'), 
    //             'store_closing' => $request->input('store_closing'), 
    //             'store_category' => $request->input('store_category'), 
    //             'store_profile_image' => $image, 
    //             'store_banner' => $banner, 
    //             'store_owner_id' => session::get('user')->id, 

    //     );
    //     DB::table('laravelproject_new_store_create')->insert($store);
    //     return redirect()->route('store_owner.store_create')->with('message', 'Product Added Successfully!');


    // }
    
    // public function all_stores(Request $request)
    // {
    //    $all_store = DB::table('laravelproject_new_store_create')->select('*')->where('store_owner_id', session::get('user')->id)->get();
    //     return view('elite/store_owner/all_store',compact('all_store'));
    // }
    // public function single_store(Request $request, $id)
    // {
    //     if(!empty($request->all())){
    //         if($request->hasfile('image')){
    //             $file = $request->file('image');            
    //             $extension = $file->getClientOriginalExtension();            
    //             $filename =time().'.'.$extension;            
    //             $file->move('uploads/store_images', $filename);            
    //             $image = 'uploads/store_images/'.$filename;        
    //             }else{
    //             $image = 'uploads/store_images/nophoto.jpg';
    //             }
    //             if($request->hasfile('banner')){
    //                 $file = $request->file('banner');            
    //                 $extension = $file->getClientOriginalExtension();            
    //                 $filename =time().'.'.$extension;            
    //                 $file->move('uploads/store_images', $filename);            
    //                 $banner = 'uploads/store_images/'.$filename;        
    //                 }else{
    //                 $banner = 'uploads/store_images/nophoto.jpg';
    //                 }
    //                 $store = array(
    //                     'store_name' => $request->input('title'), 
    //                     'store_desc' => $request->input('desc'), 
    //                     'store_address' => $request->input('store_address'), 
    //                     'store_opening' => $request->input('store_opening'), 
    //                     'store_closing' => $request->input('store_closing'), 
    //                     'store_category' => $request->input('store_category'), 
    //                     'store_profile_image' => $image, 
    //                     'store_banner' => $banner, 
    //                     'store_owner_id' => session::get('user')->id, 

    //             );

    //             DB::table('laravelproject_new_store_create')->where('store_id', $id)->update($store);
    //             $alldata = DB::table("store_create")->select('*')->where('store_id', $id)->where('store_owner_id', session::get('user')->id)->first();
    //             return view('elite.store_owner.single_store',compact('alldata'));
    //         }
    //         $alldata = DB::table("laravelproject_new_store_create")->select('*')->where('store_id', $id)->where('store_owner_id', session::get('user')->id)->first();
    //         return view('elite.store_owner.single_store',compact('alldata'));
    // }

    public function products()
    {
        $data = DB::table('laravelproject_new_add_products')->get();
        return view('elite.store_owner.product', compact('data'));
    }

    public function add_product(Request $request)
    {

        if (!empty($request->all())) {
            $validator  = Validator::make($request->all(), [
                'store_name'    => 'required|string',
                'category_name' => 'required|string',
                'is_food'       => 'required|boolean',
                'colors'        => 'string',
                'sizes'         => 'string',
                'is_food'       => 'required|boolean',
                'title'         => 'required|string|max:20',
                'price'         => 'required|numeric',
                'discount_price' => 'numeric',
                'description' => 'required|string',
                'featured_image'      => 'required|mimes:jpg,jpeg,bmp,png'
            ]);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasfile('featured_image')) {
                $file = $request->file('featured_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/products', $filename);
                $featured_image = 'uploads/products/' . $filename;
            } else {
                $featured_image = 'uploads/products/nophoto.jpg';
            }

            //     $multi_image = array();
            // if($files=$request->file('multi_image')){
            //     foreach($files as $file){                
            //         $name = $file->getClientOriginalName();
            //         $file->move('uploads/products/',$name);
            //         $multi_image[] = 'uploads/products/'.$name;
            //     }
            // }else{
            //     $multi_image[] = 'uploads/products/nophoto.jpg';
            //     }



            $product = array(
                'store_id' => Session::get('store_id'),
                'store_name' => $request->input('store_name'),
                'category' => $request->input('category_name'),
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'discount_price' => $request->input('discount_price'),
                'if_food' => $request->input('is_food'),
                'description' => $request->input('description'),
                'featured_image' =>  $featured_image,
            );
            // 'multi_image'=>  implode("|",$multi_image),
            $product_id = DB::table('laravelproject_new_add_products')->insertGetId($product);

            $product_colors_sizes = array(
                'product_id' => $product_id,
                'colors' => $request->input('colors'),
                'sizes' => $request->input('sizes'),
            );
            if (!empty($request->input('colors')) && !empty($request->input('sizes'))) {
                DB::table('laravelproject_new_goods_colors_sizes')->insertGetId($product_colors_sizes);
            }

            return back()->with('add_product_success', 'Product Added Successfully!');
        } else {
            return view('elite.store_owner.add_product')->with('error', 'Enter Data!');
        }
        return view('elite.store_owner.add_product');
    }

    public function product_edit(Request $request, $id)
    {
        // fetching product from database
        $data = DB::table('laravelproject_new_add_products')->where('p_id', $id)->get();
        $colors_sizes = DB::table('laravelproject_new_goods_colors_sizes')->select('colors', 'sizes')->where('product_id', $id)->first();
        // validating request
        if (!empty($request->all())) {
            $validator  = Validator::make($request->all(), [
                'store_name'    => 'required|string',
                'category_name' => 'required|string',
                'is_food'       => 'required|boolean',
                'colors'        => 'string',
                'sizes'         => 'string',
                'title'         => 'required|string|max:20',
                'price'         => 'required|numeric',
                'discount_price' => 'numeric',
                'description'   => 'required|string',
            ]);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            //uploading image if exist 
            if ($request->hasfile('featured_image')) {
                $file = $request->file('featured_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/products', $filename);
                $featured_image = 'uploads/products/' . $filename;
            } else {
                $featured_image =  DB::table('laravelproject_new_add_products')->where('p_id', $id)->first()->featured_image;
            }
            //     $multi_image = array();
            // if($files=$request->file('multi_image')){
            //     foreach($files as $file){                
            //         $name = $file->getClientOriginalName();
            //         $file->move('uploads/products/',$name);
            //         $multi_image[] = 'uploads/products/'.$name;
            //     }
            // }else{
            //     $multi_image[] = 'uploads/products/nophoto.jpg';
            //     }
            //preparing array of data
            $product = array(
                'store_name' => $request->input('store_name'),
                'category' => $request->input('category_name'),
                'if_food' => $request->input('is_food'),
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'discount_price' => $request->input('discount_price'),
                'description' => $request->input('description'),
                'featured_image' =>  $featured_image,

            );
            // 'multi_image'=>  implode("|",$multi_image),
            // updating product
            DB::table('laravelproject_new_add_products')->where('p_id', $id)->update($product);

            $product_colors_sizes = array(
                'colors' => !empty($request->input('colors')) ? $request->input('colors') : '',
                'sizes' => !empty($request->input('sizes')) ? $request->input('sizes') : '',
            );
            // updating colors and sizes
            Laravelproject_new_goods_colors_size::updateOrInsert(['product_id' => $id], $product_colors_sizes);

            return back()->with('updated', 'Data Upadated Successfully!');
        } elseif ($request->input('singlebutton') == "singlebutton" && (empty($request->hasfile('featured_image')))) {
            return back()->with('error', 'Enter Featured Image or Multi Images!')->with('data', $data);
        }
        return view('elite.store_owner.edit', compact('data', 'colors_sizes'));
    }

    // deleting product
    public function delete_product($id)
    {
        DB::table('laravelproject_new_add_products')->where('p_id', $id)->delete();
        return back()->with('product_deleted', 'Product is deleted successfully!');
    }

    // deleting store
    public function delete_store($id)
    {
        DB::table('store_create')->where('store_id', $id)->delete();
        return back()->with('product_deleted', 'Store is deleted successfully!');
    }

    // adding new service
    public function add_service(Request $request)
    {
        // validating request
        if (!empty($request->all())) {
            $validator  = Validator::make($request->all(), [
                'service_name'    => 'required|string|max:20',
                'service_category' => 'required|string',
                'description'       => 'required|string',
                'charges'         => 'required|numeric',
                'image'      => 'required|mimes:jpg,jpeg,bmp,png'
            ]);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }
            // uploading image if exist
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/services', $filename);
                $image = 'uploads/services/' . $filename;
            } else {
                $image = 'uploads/services/nophoto.jpg';
            }
            // store owner is logged in
            if (session::get('user')->store_owner == 1) {
                $service_user = DB::table('laravelproject_new_store_register')->select('*')->where('store_id',  Session::get('store_id'))->first();

                // preparing data
                $service = array(
                    'store_id' =>  Session::get('store_id'),
                    'service_name' => $request->input('service_name'),
                    'company_name' => $service_user->company_name,
                    'company_phone' => $service_user->store_phone_no,
                    'company_address' => $service_user->address,
                    'country' => $service_user->country,
                    'city' => $service_user->city,
                    'state' => $service_user->state,
                    'service_category' => $request->input('service_category'),
                    'service_charges' => $request->input('charges'),
                    'service_desc' => $request->input('description'),
                    'featured_image' => $image,
                );
            } else {
                $service_user = DB::table('laravelproject_new_service_register')->select('*')->where('store_id', Session::get('store_id'))->first();

                $service = array(
                    'store_id' => Session::get('store_id'),
                    'service_name' => $request->input('service_name'),
                    'company_name' => $service_user->company_name,
                    'company_phone' => $service_user->company_phone,
                    'company_address' => $service_user->company_address,
                    'country' => $service_user->country,
                    'city' => $service_user->city,
                    'state' => $service_user->state,
                    'service_category' => $request->input('service_category'),
                    'service_charges' => $request->input('charges'),
                    'service_desc' => $request->input('description'),
                    'featured_image' => $image,
                );
            }
            DB::table('laravelproject_new_service_register')->insert($service);

            return back()->with('add_service_success', 'Service Added Successfully!');
        } else {
            $service_categories = DB::table('laravelproject_new_service_category')->where('store_id', Session::get('store_id'))->get();

            return view('elite.store_owner.add_service', compact('service_categories'));
        }
    }

    // fetching services for specific store
    public function services()
    {
        $data = DB::table('laravelproject_new_service_register')->where('store_id', Session::get('store_id'))->get();
        return view('elite.store_owner.services', compact('data'));
    }

    // edit service
    public function service_edit(Request $request, $id)
    {
        // fetching service from database
        $data = DB::table('laravelproject_new_service_register')->where('service_id', $id)->get();
        if (!empty($request->all()) || $request->hasfile('image')) {
            $validator  = Validator::make($request->all(), [
                'service_name'    => 'required|string|max:20',
                'service_category' => 'required|string',
                'description'       => 'required|string',
                'charges'         => 'required|numeric',
                'image'      => 'required|mimes:jpg,jpeg,bmp,png'
            ]);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }
            // uploading image if exsit
            if (!empty($request->hasfile('image'))) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/services', $filename);
                $image = 'uploads/services/' . $filename;
            } else {
                // fetching old image if new image not exist
                $image = DB::table('laravelproject_new_service_register')->where('service_id', $id)->first()->featured_image;
            }
            // preparing data array
            $service = array(
                'store_id' => session::get('store_id'),
                'service_name' => $request->input('service_name'),
                'service_category' => $request->input('service_category'),
                'service_charges' => $request->input('charges'),
                'service_desc' => $request->input('description'),
                'city' => $request->input('service_city'),
                'featured_image' => $image,
            );
            DB::table('laravelproject_new_service_register')->where('service_id', $id)->update($service);
            return back()->with('updated', 'Data Upadated Successfully!');
        }
        return view('elite.store_owner.service_edit')->with('data', $data);
    }
    // deleting service
    public function delete_service($id)
    {
        DB::table('laravelproject_new_service_register')->where('service_id', $id)->delete();
        return back()->with('service_deleted', 'Service is deleted successfully!');
    }

    public function add_restaurant(Request $request)
    {
        if (!empty($request->all())) {

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/services', $filename);
                $image = 'uploads/services/' . $filename;
            } else {
                $image = 'uploads/services/nophoto.jpg';
            }
            $service = array(
                'store_owner_id' => session::get('user')->id,
                'service_name' => $request->input('service_name'),
                'service_category' => $request->input('service_category'),
                'service_charges' => $request->input('charges'),
                'service_desc' => $request->input('description'),
                'service_city' => $request->input('service_city'),
                'service_opening' => $request->input('service_opening'),
                'service_closing' => $request->input('service_closing'),
                'image' => $image,
            );
            DB::table('laravelproject_new_services')->insert($service);
            return back()->with('add_service_success', 'Service Added Successfully!');
        } else {
            return view('elite.store_owner.add_service')->with('error', 'Service Not Added! Please try again');
        }
        return view('elite.store_owner.add_service');
    }

    public function restaurant_all_foods()
    {
        $dat = DB::table('laravelproject_new_restaurant_register')->select('business_name')->where('user_id', session::get('user')->id)->first();
        $data = DB::table('laravelproject_new_add_food')->where('business_name', $dat->business_name)->get();

        return view('elite.restaurant_owner.all_foods', compact('data'));
    }
    public function restaurant_add_food(Request $request)
    {
        if (!empty($request->all())) {

            if ($request->hasfile('featured_image')) {
                $file = $request->file('featured_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/products', $filename);
                $featured_image = 'uploads/products/' . $filename;
            } else {
                $featured_image = 'uploads/products/nophoto.jpg';
            }

            //     $multi_image = array();
            // if($files=$request->file('multi_image')){
            //     foreach($files as $file){                
            //         $name = $file->getClientOriginalName();
            //         $file->move('uploads/products/',$name);
            //         $multi_image[] = 'uploads/products/'.$name;
            //     }
            // }else{
            //     $multi_image[] = 'uploads/products/nophoto.jpg';
            //     }

            $food = array(
                'business_name' => $request->input('business_name'),
                'category_name' => $request->input('category_name'),
                'food_name' => $request->input('food_name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'featured_image' =>  $featured_image,
            );
            // 'multi_image'=>  implode("|",$multi_image),
            DB::table('laravelproject_new_add_food')->insert($food);
            return back()->with('add_product_success', 'Food Added Successfully!');
        } else {
            return view('elite.restaurant_owner.add_food')->with('error', 'Enter Data!');
        }
        return view('elite.restaurant_owner.add_food');
    }


    public function food_edit(Request $request, $id)
    {

        $data = DB::table('laravelproject_new_add_food')->where('id', $id)->get();
        // $imge = DB::table('laravelproject_new_add_products')->select('multi_image')->where('p_id', $id)->get();
        // $images = explode('|', $imge[0]->multi_image);
        if (!empty($request->all()) && $request->hasfile('featured_image')) {
            if ($request->hasfile('featured_image')) {
                $file = $request->file('featured_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/products', $filename);
                $featured_image = 'uploads/products/' . $filename;
            } else {
                $featured_image =  DB::table('laravelproject_new_add_food')->where('id', $id)->first()->featured_image;
            }
            //     $multi_image = array();
            // if($files=$request->file('multi_image')){
            //     foreach($files as $file){                
            //         $name = $file->getClientOriginalName();
            //         $file->move('uploads/products/',$name);
            //         $multi_image[] = 'uploads/products/'.$name;
            //     }
            // }else{
            //     $multi_image[] = 'uploads/products/nophoto.jpg';
            //     }
            $food = array(
                'business_name' => $request->input('business_name'),
                'category_name' => $request->input('category_name'),
                'food_name' => $request->input('food_name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'featured_image' =>  $featured_image,
            );
            // 'multi_image'=>  implode("|",$multi_image),
            DB::table('laravelproject_new_add_food')->where('id', $id)->update($food);
            return back()->with('updated', 'Data Upadated Successfully!');
        } elseif ($request->input('singlebutton') == "singlebutton" && (empty($request->hasfile('featured_image')))) {
            return back()->with('error', 'Enter Featured Image or Multi Images!')->with('data', $data);
        }
        return view('elite.restaurant_owner.edit_food', compact('data'));
    }

    public function delete_food($id)
    {
        DB::table('laravelproject_new_add_food')->where('id', $id)->delete();
        return back()->with('product_deleted', 'Food is deleted successfully!');
    }

    // register store for restuarant module
    public function partial_restuarants_register(Request $request)
    {
        $multi_image = array();
        if ($files = $request->file('menu_img')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('uploads/products/', $name);
                $multi_image[] = 'uploads/products/' . $name;
            }
        } else {
            $multi_image[] = 'uploads/products/nophoto.jpg';
        }

        $store_id = Session::get('store_id');
        $user_id = Laravelproject_new_user::findOrFail(Auth::user()->id);
        $restaurant_info = array(
            "store_id" => $store_id,
            "merchant_type" => $request->input('merchent_type'),
            "no_of_locations" => $request->input('no_of_location'),
            "phone_no" => $request->input('phone_no'),
            "address" => $request->input('address'),
            "link_to_menu" => $request->input('link_to_menu'),
            "menus_images" => implode("|", $multi_image),
            "tablet_require" => 'yes',
            "free_ordering_type" => $request->input('same'),
            "business_name" => $request->input('business_name'),
            "id_number" => $request->input('id_number'),
            "owner_name" => $request->input('owner_name'),
            "owner_dob" => $request->input('owner_dob'),
            "routing_number" => $request->input('routing_number'),
            "account_number" => $request->input('account_number'),
        );
        DB::table('laravelproject_new_restaurant_register')->insert($restaurant_info);
        $restaurant_id = DB::table('laravelproject_new_restaurant_register')->select('restaurant_id')->orderBy('restaurant_id', 'DESC')->first();
        $sat = array(
            'saturday_opening_time' => $request->input('saturday_opening_time'),
            'saturday_closing_time' => $request->input('saturday_closing_time'),
        );
        $sun = array(
            'sunday_opening_time' => $request->input('sunday_opening_time'),
            'sunday_closing_time' => $request->input('sunday_closing_time'),
        );
        $mon = array(
            'monday_opening_time' => $request->input('monday_opening_time'),
            'monday_closing_time' => $request->input('monday_closing_time'),
        );
        $tue = array(
            'tuesday_opening_time' => $request->input('tuesday_opening_time'),
            'tuesday_closing_time' => $request->input('tuesday_closing_time'),
        );
        $wed = array(
            'wednesday_opening_time' => $request->input('wednesday_opening_time'),
            'wednesday_closing_time' => $request->input('wednesday_closing_time'),
        );
        $thur = array(
            'thursday_opening_time' => $request->input('thursday_opening_time'),
            'thursday_closing_time' => $request->input('thursday_closing_time'),
        );
        $fri = array(
            'friday_opening_time' => $request->input('friday_opening_time'),
            'friday_closing_time' => $request->input('friday_closing_time'),
        );
        $restaurant_availability_timing = array(
            "user_id" => $user_id->id,
            "restaurant_id" => $restaurant_id->restaurant_id,
            "saturday" => json_encode($sat),
            "sunday" => json_encode($sun),
            "monday" => json_encode($mon),
            "tuesday" => json_encode($tue),
            "wednesday" => json_encode($wed),
            "thursday" => json_encode($thur),
            "friday" => json_encode($fri),
        );
        DB::table('laravelproject_new_restaurant_availability_timing')->insert($restaurant_availability_timing);

        return redirect()->back()->with('message', 'Registered successfully!');
    }

    // register store for service module
    public function partial_service_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "company_name" => 'required|string',
            "company_phone_no" => 'required|numeric',
            "service_charges" => 'required|numeric',
            "address" => 'required|string',
            "service_category" => 'required|string',
            "service_name" => 'required|string',
            "country" => 'required|string',
            "city" => 'required|string',
            "state" => 'required|string',
            "service_desc" => 'required|string',
        ]);


        if ($validator->fails()) {
            return redirect()->back();
        }

        if (!empty($request->all())) {

            $service_info = array(
                "store_id" => Session::get('store_id'),
                "company_name" => $request->input('company_name'),
                "company_phone" => $request->input('company_phone_no'),
                "service_charges" => $request->input('service_charges'),
                "company_address" => $request->input('address'),
                "service_category" => $request->input('service_category'),
                "service_name" => $request->input('service_name'),
                "country" => $request->input('country'),
                "city" => $request->input('city'),
                "state" => $request->input('state'),
                "service_desc" => $request->input('service_desc'),
                "featured_image" => "",
            );
            DB::table('laravelproject_new_service_register')->insert($service_info);

            // $encrypt_email = sha1($users->email);
            // $data = array('emailto'=>$request->input('Email'),'name'=>$users->name );
            // Mail::send('elite.test',['validation_code'=> 'https://localhost/myproject/public/email_validate?c='.$validation_code.'&e='.$encrypt_email], function($message) use($data){
            //     $message->to($data['emailto'],$data['name'])->subject('Confirm Email!');
            // });

            return redirect()->back()->with('message', 'You can login now as service owner! Thanks for registration');
        }
    }
}
