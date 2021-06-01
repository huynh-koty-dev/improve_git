<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SetLangController;
use App\Http\Controllers\TodoController;

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
    Route::get('/login',[UserController::class,'getLoginView'])->name('loginpage');
    Route::get('/register',[UserController::class,'getRegisterView'])->name('register_page');
    Route::middleware(['checklogin'])->group(function () {
        Route::resource('todos', TodoController::class);
    });
    //====================get==========================
    Route::get('change-language/{language}', [SetLangController::class,'setLang'])->name('user.change_language');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    //====================post=========================
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('register', [UserController::class, 'register'])->name('register');
});
