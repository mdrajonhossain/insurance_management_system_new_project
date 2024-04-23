<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isBranch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next){
        if(Auth::check() && auth()->user()->usertype == 0){
             
            if(Auth::check() && auth()->user()->is_active == '0'){
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is disabled. Please contact support.');
            }
            return $next($request);
        }
        return redirect()->back()->with('error', 'Yoy do not access of admin');
    }


}