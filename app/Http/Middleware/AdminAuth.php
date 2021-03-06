<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next,$guard = null)
     {

        if ( !Auth::guard($guard)->guest() ) {
          if( Auth::user()->role != 'admin' ){
            return $next($request);
          }
          return redirect('/admin/login');
        }
        return redirect('/admin/login');
     }
}
