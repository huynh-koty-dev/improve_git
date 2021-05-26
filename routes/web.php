<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SetLangController;

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
Route::middleware(['locale'])->group(function () {
    Route::middleware(['checklogin'])->group(function () {
        //
        Route::view('/home', 'home')->name('home');
    });
    Route::middleware(['checklogout'])->group(function () {  
        //  
        Route::view('/login', 'login')->name('loginpage');
    });
    //====================get==========================
    Route::get('change-language/{language}', [SetLangController::class,'setLang'])->name('user.change-language');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    //====================post=========================
    Route::post('login', [UserController::class, 'login'])->name('login');
});
