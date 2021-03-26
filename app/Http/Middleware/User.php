<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //checking either user has authentication or not
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //checking either user are being disabled by admin or not
        if (Auth::user()->status == 0) {
            Auth::logout();
            return redirect()->route('login');
        }

        //checking user role is correct or not
        if (Auth::user()->role == 2) {
            return $next($request);
        }else{
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
