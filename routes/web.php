<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ('AuthController@login')); 

Route::get('login', ('AuthController@login'));
Route::get('register', ('AuthController@register'));
Route::get('logout', ('AuthController@logout'));
Route::post('loginProses', ('AuthController@loginProses'));
Route::post('registerProses', ('AuthController@registerProses'));
Route::get('register_paksa', ('AuthController@registerPaksa'));

Route::middleware(['login'])->group(function () {

    Route::middleware(['admin'])->group(function () {
        Route::resource('admin/home', ('Admin\HomeController'));
        Route::resource('admin/users', ('Admin\User\UserController'));
        Route::resource('admin/role', ('Admin\User\UserRoleController'));

    });

    Route::middleware(['dokter'])->group(function () {
        Route::resource('dokter/home', ('Dokter\HomeController'));
    });
    
    Route::middleware(['apoteker'])->group(function () {
        Route::resource('apoteker/home', ('Apoteker\HomeController'));
    });
    
    Route::middleware(['kasir'])->group(function () {
        Route::resource('kasir/home', ('Kasir\HomeController'));
    });
});