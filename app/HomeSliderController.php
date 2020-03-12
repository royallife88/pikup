<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeSliderController extends Controller
{
    public function get_home_slider()
    {
        $slider_id = $_GET['slider_id'];        
        $HomeSlider = array(
            'data' => [
            'code' => 200,
            'message' => "success", 
            'HomeSlider' => DB::table('laravelproject_new_home_slider')->where(['slider_id'=> $slider_id,'activate' => 'yes'])->get()]
        );
        return $HomeSlider;
        
    }
}
