<?php

use Illuminate\Http\Request;
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

Route::group([
    'middleware' => 'api'
], function ($router) {

    //AKCIJE
    Route::get('akcije', [\App\Http\Controllers\akcijeController::class, 'index']);
    Route::get('akcije/{id}', [\App\Http\Controllers\akcijeController::class, 'show']);
    Route::post('akcije', [\App\Http\Controllers\akcijeController::class, 'store']);
    Route::put('akcije/{id}', [\App\Http\Controllers\akcijeController::class, 'update']);
    Route::delete('akcije/{id}', [\App\Http\Controllers\akcijeController::class, 'destroy']);

    //KORISNICI
    Route::get('korisnici', [\App\Http\Controllers\korisniciController::class, 'index']);
    Route::get('korisnici/{id}', [\App\Http\Controllers\korisniciController::class, 'show']);
    Route::post('korisnici', [\App\Http\Controllers\korisniciController::class, 'store']);
    Route::put('korisnici/{id}', [\App\Http\Controllers\korisniciController::class, 'update']);
    Route::delete('korisnici/{id}', [\App\Http\Controllers\korisniciController::class, 'destroy']);

});
