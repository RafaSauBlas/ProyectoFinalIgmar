<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;

class Validado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $valido = true;
        $codigos = DB::table('codigos_logins')->select('codigomail', 'codigomail_verified_at')->get();
        foreach($codigos as $code){
            if($code->codigomail_verified_at == NULL){
                $valido = false;
                break;        
            }
        }

        if (auth()->check() && $valido != false || auth()->user()->area == 1){
            return $next($request);
        }
        elseif(auth()->check()){
            return redirect()->intended(RouteServiceProvider::CODIGO);
        }
        else{
            //return $next($request);
            return redirect('login');
        }

    }
}
