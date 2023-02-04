<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\APICatalogController;

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


Route::get('/', [HomeController::class, 'getHome']);

// Route::get('login', function () {
//     return view('auth.login');
// });

// Route::get('logout', function () {
//     return 'Logout usuario';
// });

Route::resource('api', APICatalogController::class);

Route::get('catalog', [CatalogController::class, 'getIndex'])->middleware('auth');

Route::get('catalog/show/{id}', [CatalogController::class, 'getShow'])->middleware('auth');

Route::get('catalog/create', [CatalogController::class, 'getCreate'])->middleware('auth');
Route::post('catalog/create', [CatalogController::class, 'postCreate'])->middleware('auth');

Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit'])->middleware('auth');
Route::put('catalog/edit/{id}', [CatalogController::class, 'putEdit'])->middleware('auth');

Route::put('catalog/rent/{id}', [CatalogController::class, 'putRent'])->middleware('auth');
Route::put('catalog/return/{id}', [CatalogController::class, 'putReturn'])->middleware('auth');
Route::delete('catalog/delete/{id}', [CatalogController::class, 'deleteMovie'])->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'getHome'])->name('home')->middleware('auth');
