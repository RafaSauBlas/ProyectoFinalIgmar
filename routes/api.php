<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\QR;
use App\Http\Controllers\DiscoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('/loginApp',[AuthController::class,'authApp']);
});
Route::get('/message',[DiscoController::class,'mensaje']);

Route::post('/registrar', [AuthController::class, 'signUp']);

Route::post('/eviacodigo', [AuthController::class, 'enviacodigo']);

Route::middleware(['jwt.verify'])->prefix('auth')->group(function () {
    Route::get('/userinfo',[AuthController::class,'getAuthenticatedUser']);
});

Route::post('logeocodigo', [AuthController::class, 'ValidaCodigo'])->name('logeocodigo');

Route::post('validacodigo', [AuthController::class, 'ValidaCodigoUtilidad']);

Route::post('validaqr', [QR::class,'ValidaQR']);

Route::post('prueba2', [AuthController::class, 'RespondeSolicitud'])->name('respondersolicitud');

Route::post('calis', [QR::class, 'ValidaQR']);