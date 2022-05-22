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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('user_home');
Route::get('/user/login', [\App\Http\Controllers\HomeController::class, 'userLogin'])->name('user_login');
Route::get('/user/register', [\App\Http\Controllers\HomeController::class, 'userRegister'])->name('user_register');
Route::get('/logout', [\App\Http\Controllers\HomeController::class, 'userlogout'])->name('user_logout');

Route::get('/adminhome', function () {
    return view('admin.index');
})->name('admin_home')->middleware([\App\Http\Middleware\Authenticate::class]);

Route::get('/admin/login', [\App\Http\Controllers\HomeController::class, 'adminlogin'])->name('admin_login');
Route::post('/admin/logincheck', [\App\Http\Controllers\HomeController::class, 'logincheck'])->name('admin_logincheck');
Route::get('/admin/logout', [\App\Http\Controllers\HomeController::class, 'adminlogout'])->name('admin_logout');


Route::get('/editörlerimiz', [\App\Http\Controllers\HomeController::class, 'editor'])->name('editors');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->back();
    })->name('dashboard');
});
