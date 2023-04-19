 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Subir;
use Illuminate\Http\Request;
use App\Http\Controllers\DiscoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::GET('/upload-image',[Subir::class,'upload']);

// Route::POST('/upload-image', function () {
//    request()->file('file')->store('file', 'do');
//  return back();
// })->name('welcome');


Route::middleware(['logeado'])->group(function () {
    Route::get('/', function () {
        return view('Auth.login');
    });
    Route::get('login',[ViewController::class,'loginView'])->name('login');
});

//ruta de iniciar sesion


Route::get('collaborators',[ViewController::class,'collaboratorsView'])->name('collaboratorsView');

Route::get('espera', function () {
    return view('Otros.codigo');
});

Route::get('/espera', function () { return view('Otros.codigo'); })->name('espera');


Route::get('/vistas/codigo', function(Request $request){
    if (! $request->hasValidSignature()) {
        abort(401);
    }
    else{
        return view('Otros.muestracodigo')->with('codigo', $request->codigo);
    }
})->name('vcodigo');

//auth
//valid
//'validaVPN'

Route::post('session',[AuthController::class,'login'])->name('session');

Route::middleware(['valid'])->group(function () {
    Route::resource('discos', App\Http\Controllers\DiscoController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //VIEWS
    Route::get('dashboard',[ViewController::class,'dashboardView'])->name('dashboardView');
    Route::get('collaborators',[ViewController::class,'collaboratorsView'])->name('collaboratorsView');
    Route::get('profile',[ViewController::class,'profileView'])->name('profileView');
    Route::get('customers',[ViewController::class,'customerView'])->name('customers');
    Route::get('addcustomers',[ViewController::class,'addCustomerView'])->name('addCustomerView');
    Route::get('addaddress/{id}',[ViewController::class,'addAddressView'])->name('addAddressView');
    Route::get('quotes',[ViewController::class,'quotesView'])->name('quotesView');
    Route::get('newquotes',[ViewController::class,'newquotesView'])->name('newquotesView');
    Route::get('calendar',[ViewController::class,'calendarView'])->name('calendarView');
    Route::get('solicita',[ViewController::class,'solicitudesView'])->name('solicita');
  
    Route::get('prueba',[AuthController::class,'RespondeSolicitud'])->name('prueba');

    Route::post('solicitud', [AuthController::class, 'GeneraSolicitud'])->name('solicitud');

    Route::prefix('users')->group(function () {
        //registrar colaboradores
        Route::post('signup',[AuthController::class,'signUp'])->name('signUp');
        //cerrar sesion
        Route::get('singOut',[AuthController::class,'singOut'])->name('singOut');
        //Editar perfil de usuario
        Route::put('updateuser',[AuthController::class,'UpdateUser'])->name('UpdateUser');
    });



    Route::prefix('collaborators')->group(function () {
        Route::put('updateCollaborator/{id}',[AuthController::class,'UpdateCollaborator'])->name('UpdateCollaborator');
        Route::delete('deleteColl/{id}',[AuthController::class,'deleteCollaborator'])->name('deleteCollaborator');
    });

    Route::prefix('discos')->group(function () {
        Route::put('disco.edit/{id}',[DiscoController::class,'edit'])->name('edit');
        Route::get('disco.create',[DiscoController::class,'create'])->name('create');
        Route::delete('disco.delete/{id}',[DiscoController::class,'delete'])->name('delete');
        Route::post('disco.store',[DiscoController::class,'store'])->name('store');
    });



    Route::prefix('client')->group(function () {
        Route::post('storeclient',[CustomerController::class,'addCustomer'])->name('addCustomer');
        Route::put('upclient/{id}',[CustomerController::class,'updateCustomer'])->name('updateCustomer');
        Route::delete('changeStatus/{id}',[CustomerController::class,'changeStatus'])->name('changeStatus');
        Route::post('addAdress/{id}',[CustomerController::class,'addNewAddress'])->name('addNewAddress');
    });

    Route::prefix('quotation')->group(function () {
        
    });

    //VISTAS DE CODIGOS
    
    Route::get('/vistas/codigoutilidad', function(Request $request){
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        else{
            return view('Otros.muestracodigoutilidad')->withCodigo($request->codigo)->withUtilidad($request->utilidad);
        }
    })->name('vcodigoutilidad');

    Route::get('/vistas/solicitud', function(Request $request){
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        else{
            return view('Otros.solicitud')->withUsername($request->username)->withUtilidad($request->utilidad);
        }
    })->name('vsolicitud');

});

Auth::routes();