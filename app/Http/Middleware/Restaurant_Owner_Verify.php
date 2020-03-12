<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use DB;
class Restaurant_Owner_Verify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $permissions = DB::table('laravelproject_new_users')->select('store_owner', 'service_owner', 'restaurant_owner')->where('id', Session('user')->id)->first();
        if($permissions->restaurant_owner == '0'){
            return abort('404');
           }
          if(!empty(Session::has('store_owner_status'))){
            return back();
          } 
         
        return $next($request);
    }
}
