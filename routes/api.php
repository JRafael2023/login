<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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


//  ->/auth/login
//  ->/auth/logout
//  ->/auth/register
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::post('register',  [AuthController::class, 'register']);
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me',[AuthController::class, 'me']);
});

Route::post('prueba', function () {
    return response()->json(['mensaje' => 'Funciona correctamente']);
});
