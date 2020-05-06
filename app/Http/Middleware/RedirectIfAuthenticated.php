<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }
        if (Auth::guard('dinas_pengguna')->check()) {
          return redirect('/relawan/index');
        } else if(Auth::guard('relawan_pengguna')->check()) {
          return redirect ('/user/pesan');
        }

        return $next($request);
    }
}
