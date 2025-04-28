<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        if($request->path()=="login" && $request->session()->has('user'))                    // to check if user is logged in or not
        {
            return redirect('/');                                                      // redirect to home page if user is logged in
        }
        return $next($request);
    }
}
