<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Add_product;
class Ecommerce_Home extends Controller
{
    public function index()
    {
     if(isset($cart)){
         return $cart;
     } 
    // $status = DB::table('laravelproject_new_users')->where('status','0')->get();
    // $products['mens'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('gender','mens')->get();  
    // $products['womens'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('gender','womens')->get();
    // $products['bags'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('categorie','bags')->get();    
    // $products['footwear'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('categorie','footwear')->get();    
    
    // $create = app(\App\Http\Controllers\Users::class)->handleFacebookCallback(); 
    return view('elite/index');   
    }
    public function service_register()
    {
     if(isset($cart)){
         return $cart;
     } 
    $status = DB::table('laravelproject_new_users')->where('status','0')->get();
    $products['mens'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('gender','mens')->get();  
    $products['womens'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('gender','womens')->get();
    $products['bags'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('categorie','bags')->get();    
    $products['footwear'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('categorie','footwear')->get();    
    
    $create = app(\App\Http\Controllers\Users::class)->handleFacebookCallback(); 
    return view('elite/service')->with('products', $products)->with('create',$create)->with('status',$status);   
    }
    
    public function restaurant_register()
    {
     if(isset($cart)){
         return $cart;
     } 
    $status = DB::table('laravelproject_new_users')->where('status','0')->get();
    $products['mens'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('gender','mens')->get();  
    $products['womens'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('gender','womens')->get();
    $products['bags'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('categorie','bags')->get();    
    $products['footwear'] = DB::table('laravelproject_new_add_products')->select('*')->orderBy('p_id','DESC')->where('categorie','footwear')->get();    
    
    $create = app(\App\Http\Controllers\Users::class)->handleFacebookCallback(); 
    return view('elite/restaurant')->with('products', $products)->with('create',$create)->with('status',$status);   
    }
}
