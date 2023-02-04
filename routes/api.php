<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APICatalogController;

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

Route::get('v1/catalog',[APICatalogController::class, 'index']);
Route::get('v1/catalog/{id}',[APICatalogController::class, 'show']);
Route::post('v1/catalog',[APICatalogController::class, 'store'])->middleware('auth.basic.once');
Route::put('v1/catalog/{id}',[APICatalogController::class, 'update'])->middleware('auth.basic.once');
Route::delete('v1/catalog/{id}',[APICatalogController::class, 'destroy'])->middleware('auth.basic.once');
Route::put('v1/catalog/{id}/rent',[APICatalogController::class, 'putRent'])->middleware('auth.basic.once');
Route::put('v1/catalog/{id}/return',[APICatalogController::class, 'putReturn'])->middleware('auth.basic.once');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
