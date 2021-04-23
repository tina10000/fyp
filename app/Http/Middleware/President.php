<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class President
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
        //        return $next($request);
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->user_type == 1) {
            return redirect()->route('admin');
        }

        if (Auth::user()->user_type == 2) {
            return redirect()->route('president');
        }

        if (Auth::user()->user_type == 3) {
            return redirect()->route('secretary');
        }

        if (Auth::user()->user_type == 4) {
            return redirect()->route('treasurer');
        }


        if (Auth::user()->user_type == 5) {
            return redirect()->route('staff');
        }
    }

}
