<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
    
    $category = array(
        'data' => [
        'code' => 200,
        'message' => "success", 
        'category' => DB::table('laravelproject_new_store_category')->get()]
    );
    return $category;
    }
}
