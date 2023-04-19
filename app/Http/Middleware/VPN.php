<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VPN
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->ip() == '192.168.1.73' || $request->ip() == '10.10.1.11' || $request->ip() == '10.10.1.12'){
            if(auth()->user()->area == 1){
                Session::flush();
                Auth::logout();
                return redirect('/login')->with('msg','Usted no puede iniciar sesión desde esta red.');
            }
            else{
                return $next($request);
            }
        }
        else{
            if(auth()->user()->area >= 2){
                return $next($request);
            }
            else{
                Session::flush();
                Auth::logout();
                return redirect('/login')->with('msg','Usted no puede iniciar sesión desde esta red.');
            }
        }
    }
}
