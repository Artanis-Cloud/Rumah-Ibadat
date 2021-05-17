<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Yb
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
        // return $next($request);
        //checking either user has authentication or not
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //checking either user are being disabled by admin or not
        if (Auth::user()->status == 0) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Akaun anda telah dinyahaktif. Sila hubungi Sistem Admin.');
        }

        //checking user role is correct or not
        if (Auth::user()->role == 2) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
