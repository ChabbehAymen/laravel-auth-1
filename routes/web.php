<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ProfileController;

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

Route::group([], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login',[LoginController::class, 'preLogin']);
});

Route::group([], function (){
    Route::get('/sign-up', [SignUpController::class,'index'])->name('signUp');
    Route::post('/signing-up', [SignUpController::class, 'preSignUp']);
});

Route::get('/profile',[ProfileController::class,'index'])->name('profile');
