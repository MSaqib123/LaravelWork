<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //___ for login ____
        if ($request->path() === "Account/Login" && $request->session()->has('user')) {
            return redirect("/");
        }

        //___ for Register ____
        if ($request->path() === "Account/Register" && $request->session()->has('user')) {
            return redirect("/");
        }
    
        // // Add some debugging statements to check session data
        // if ($request->session()->has('user')) {
        //     // Session user data is set 
        //     dd($request->session()->get('user'));
        // }

        return $next($request);
    }
}
