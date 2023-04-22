<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $date = Carbon::now();

        $codigos = DB::table('codigos_logins')->where('codigomail_created_at', '>=', $date->subminutes(1))->select('codigomail', 'codigomail_created_at', 'codigomail_verified_at')->get();
        foreach($codigos as $code){
            if($code->codigomail_verified_at == NULL){
                $valido = false;
                break;        
            }
        }

        $valido2 = true;

        $codigosqr = DB::table('q_r_s')->where('codigoqr_created_at', '>=', $date->subminutes(1))->select('codigoqr', 'codigoqr_created_at', 'codigoqr_verified_at')->get();
        
        foreach($codigosqr as $codes){
            if($codes->codigoqr_verified_at == NULL){
                $valido2 = false;
                break;        
            }
        }

        if(auth()->check()){
            if($valido != false || auth()->user()->area == 1){
                if(auth()->user()->area == 3){
                    if($valido2 != false){
                        return $next($request);    
                    }
                    else{
                        return redirect('/qr');
                    }
                }
                else{
                    return $next($request);
                }

            }
            elseif(auth()->check()){
                if(auth()->user()->area == 2){
                    return redirect()->intended(RouteServiceProvider::CODIGO);
                }
                else{
                    return redirect('/');
                }
            }
            else{
                //return $next($request);
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

    }
}
