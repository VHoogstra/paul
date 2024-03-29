<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user()->role == 3) {
            //guest
            return $next($request);
        } else if ($request->user()->role == $role) {
            //guest

            return $next($request);
        } else {
            return redirect('notUser');
        }


        //        if($role=='user'){
        //            if($request->user()->hasRole($role)||$request->user()->hasRole('admin')){
        //                return $next($request);
        //            }
        //        }
        //        if(!$request->user()->hasRole($role)){
        //            return redirect('notUser');
        //        }
        //        return $next($request);
    }
}
