<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Peticiones;
use App\Models\QRS;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QR extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $codigo = self::GeneraCodigo($usuario->id);
        if(! $codigo){

        }
        else
        {
           return view('Otros.qr')->with("codigo", $codigo);
        }
    }

    Public function GeneraCodigo($id)
    {
        $codigo = rand(100000, 999999);
        $codigomail = QRS::create([
            'codigoqr' => Hash::make($codigo),
            'codigoqr_created_at'  => Carbon::now(),
            'codigoqr_verified_at' => NULL,
            'user_id' => $id,
        ]);
        
        if($codigomail)
        {
            return $codigo;
        }
        else{
            return false;
        }
    }


    Public function ValidaQR(Request $request){
        $request->validate([
            'codigo' => 'required|numeric',
        ]);
        $cod = $request->codigo;
        $codigos = DB::table('q_r_s')->select('codigoqr', 'codigoqr_created_at', 'user_id')->get();
        foreach($codigos as $code){
            if(Hash::check($cod, $code->codigoqr)){
                 $date = Carbon::now();
                 if($date->subminutes(5) <= $code->codigoqr_created_at){
                     if(DB::table('q_r_s')->where('codigoqr', $code->codigoqr)->update(['codigoqr_verified_at' => Carbon::now()])){
                        return redirect('/home')->with('msg','STATUS');
                     }
                     else{
                        return redirect('/qr');
                     }
                 }
                 else{
                     return redirect('/qr');
                 }
            }
        }
    }
}
