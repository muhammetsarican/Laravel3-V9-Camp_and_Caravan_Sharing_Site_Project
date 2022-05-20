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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/login', [\App\Http\Controllers\HomeController::class, 'userLogin'])->name('user_login');
Route::get('/user/register', [\App\Http\Controllers\HomeController::class, 'userRegister'])->name('user_register');
Route::get('/logout', [\App\Http\Controllers\HomeController::class, 'userlogout'])->name('user_logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});