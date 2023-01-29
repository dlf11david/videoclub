<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    return view('catalog.index');
});

Route::get('logout', function () {
    return view('catalog.index');
});

Route::get('catalog', function () {
    return view('catalog.index');
});

Route::get('catalog/show/{id}', function ($id) {
    return 'Vista detalle película  ' . $id;
});

Route::get('catalog/create', function () {
    return view('catalog.index');
});

Route::get('catalog/edit/{id}', function ($id) {
    return 'Modificar película  ' . $id;
});
