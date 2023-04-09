<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Faker\Factory as Faker;
use Carbon\Carbon;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodigoLogin;
use App\Mail\CodigoUsar;
use App\Models\CodigosLogin;
use App\Models\CodigoUtilidad;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->only('email','password');
        $user = User::where('email','=',$request->email)->first();

        if($user->status_password == false)
        {
            if(Auth::attempt($credentials)){
                if($user->area >= 2){
                    return self::Redireccion($user);
                }
                else{
                    if($user->status == false)
                {
                    return redirect('/login')->with('msg','STATUSFALSE');
                }
                else
                {
                    return redirect('/dashboard')->with('msg','STATUS');
                }
                }
            }
            else
            {
                return redirect('/login')->with('msg','BADREQUEST');
            }
        }
        else
        {
            if(Auth::attempt($credentials)){
                if($user->status == false)
                {
                    return redirect('/login')->with('msg','STATUSFALSE');
                }
                else
                {
                    return redirect('/dashboard')->with('msg','STATUS');
                }
            }
            else
            {
                return redirect('/login')->with('msg','BADREQUEST');
            }
        }

    }

    public function signUp(Request $request)
    {
        // $request->validate([
        //     'name'=>'required',
        //     'lastname'=>'required',
        //     'branchoffice'=>'required',
        //     'email'=>'required|email',
        //     'password'=>'required',
        //     'area'=>'required'
        // ]);
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->branchoffice = $request->branchoffice;
        $user->email = $request->email;
        $password = bcrypt($request->password);
        $user->password = $password;
        $user->area = $request->area;
        $user->save();

        if($user->save()){
            return redirect('/collaborators')->with('msg','OK');;
        }
        return redirect('/collaborators')->with('msg','BADREQUEST');

    }

    public function singOut() {
        Session::flush();
        Auth::logout();

        return redirect('/login')->with('msg','singOut');
    }

    public function UpdateUser(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $user->password = $password;
        $user->status = true;
        $user->save();
        if($user->save())
        {
            return redirect('/profile')->with('msg','UPDATE');
        }
        else
        {
            return redirect('/profile')->with('msg','BADREQUEST');
        }
    }

    public function UpdateCollaborator(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'branchoffice'=>'required',
            'email'=>'required|email',
            'area'=>'required'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->branchoffice = $request->input('branchoffice');
        $user->email = $request->input('email');
        $user->area = $request->input('area');
        $user->status = true;
        $user->save();
        if($user->save()){
            return redirect('/collaborators')->with('msg','UPDATE');
        }
        return redirect('/collaborators')->with('msg','BADREQUEST');
    }

    public function deleteCollaborator($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return redirect('/collaborators')->with('msg','DELETE');

    }


    public function authApp(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email','=',$request->email)->first();
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(['data'=>$user,'Token'=>compact('token')]);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return response()->json(['token_expired'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    return response()->json(['token_invalid'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                    return response()->json(['token_absent'], $e->getStatusCode());
            }
            return response()->json(compact('user'));
    }

    //----------------------------------------- Creación y envio de codigos -----------------------------------------

    Public function GeneraCodigo($id)
    {
        $codigo = rand(100000, 999999);
        $codigomail = CodigosLogin::create([
            'codigomail' => Hash::make($codigo),
            'codigomail_created_at'  => Carbon::now(),
            'codigomail_verified_at' => NULL,
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

    Public function GeneraCodigoUtilidad($id, $utilidad)
    {
        $codigo = rand(100000, 999999);
        $codigomail = CodigoUtilidad::create([
            'codigo' => Hash::make($codigo),
            'codigo_created_at' => Carbon::now(),
            'codigo_verified_at'  => NULL,
            'funcion' => $utilidad,
            'user_id' => $id,
            'user_crea_id' => auth()->user()->name,
        ]);
        
        if($codigomail)
        {
            return $codigo;
        }
        else{
            return false;
        }
    }

    public function enviacodigo($mail, $codigo){
        if(Mail::to($mail)->send(new CodigoLogin($codigo))){
            return true;
        }
        else{
            return false;
        }
    }

    public function enviacodigoutiulidad($mail, $utilidad, $codigo){
        if(Mail::to($mail)->send(new CodigoLogin($utilidad, $codigo))){
            return true;
        }
        else{
            return false;
        }
    }

    Public function ValidaCodigo(Request $request){
        $request->validate([
            'codigo' => 'required|numeric',
        ]);
        $cod = $request->codigo;
        $codigos = DB::table('codigos_logins')->select('codigomail', 'codigomail_created_at', 'user_id')->get();
        
        foreach($codigos as $code){
            if(Hash::check($cod, $code->codigomail)){
                $date = Carbon::now();
                if($date->subminutes(5) <= $code->codigomail_created_at){
                    if(DB::table('codigos_logins')->where('user_id', $code->user_id)->update(['codigomail_verified_at' => Carbon::now()])){
                        return redirect('/dashboard')->with('msg','STATUS');
                    }
                    else{
                        return redirect('/espera')->with('msg','BADREQUEST');
                    }
                }
                else{
                    return redirect('/espera')->with('msg','BADREQUEST');
                }
            }
        }
    }

    public function Redireccion($usuario)
    {
        $codigo = self::GeneraCodigo($usuario->id);
        if(! $codigo){

        }
        else
        {
            $URL = URL::temporarySignedRoute('vcodigo', now()->addMinutes(5), ['codigo' => $codigo]);
            $continue = self::enviacodigo($usuario->email, $URL);
            if($continue == true){
                // return redirect()->intended(RouteServiceProvider::CODIGO);
                return redirect('/espera');
            }
        }
    }
}
