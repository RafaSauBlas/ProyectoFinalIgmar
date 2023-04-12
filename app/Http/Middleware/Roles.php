<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Roles
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
       
   if(auth()->check() && auth()->user()->status_code && auth()->user()->status_qr && auth()->user()->id == 1)
   {
       return $next($request);
   }
   if(auth()->check() && auth()->user()->status_code && auth()->user()->id == 2)
   {
       return $next($request);
   }
   if(auth()->check() && auth()->user()->id == 3)
   {
       return $next($request);
   }

    }
}
