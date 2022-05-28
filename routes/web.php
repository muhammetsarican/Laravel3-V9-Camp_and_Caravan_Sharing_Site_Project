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

Route::get('/admin/show/editor', function () {
    return view('admin.show_editors');
})->name('show_editors');

Route::get('/admin/add/editor', function () {
    return view('admin.add_editor');
})->name('add_editor');


Route::middleware('auth')->prefix('admin')->group(function () {
    // Route::middleware('admin')->group(function () {

        Route::get('/', [\App\Http\Controllers\admin\HomeController::class, 'index'])->name('admin_home');
        //Category
        Route::prefix('category')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin_category');
            Route::get('add', [\App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('admin_add_category');
            Route::post('create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin_create_category');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin_edit_category');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin_update_category');
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin_delete_category');
            Route::get('show', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin_category_show');
        });
        //Product
        Route::prefix('product')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin_product');
            Route::get('create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin_product_add');
            Route::post('store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin_product_store');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin_product_edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin_product_update');
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin_product_delete');
            Route::get('show', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin_product_show');
        });
        //Editor
        Route::prefix('editor')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\EditorController::class, 'index'])->name('admin_editor');
            Route::get('add', [\App\Http\Controllers\Admin\EditorController::class, 'add'])->name('admin_add_editor');
            Route::post('create', [\App\Http\Controllers\Admin\EditorController::class, 'create'])->name('admin_create_editor');
            Route::post('store/{id}', [\App\Http\Controllers\Admin\EditorController::class, 'store'])->name('admin_editor_store');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\EditorController::class, 'edit'])->name('admin_edit_editor');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\EditorController::class, 'update'])->name('admin_update_editor');
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\EditorController::class, 'destroy'])->name('admin_delete_editor');
            Route::get('show', [\App\Http\Controllers\Admin\EditorController::class, 'show'])->name('admin_editor_show');
        });
        //User
        Route::prefix('user')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin_user');
            Route::get('create/{id}', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin_user_add');
            Route::post('store/{id}', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin_user_store');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin_user_edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin_user_update');
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin_user_delete');
            Route::get('show/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin_user_show');

            Route::get('role/{id}', [\App\Http\Controllers\Admin\UserController::class, 'userrole'])->name('user_role');
            Route::post('role/store/{id}', [\App\Http\Controllers\Admin\UserController::class, 'userrolesstore'])->name('user_role_add');
            Route::get('role/delete/{userid}/{roleid}', [\App\Http\Controllers\Admin\UserController::class, 'userrolesdelete'])->name('user_role_delete');
        });
        //Image
        Route::prefix('image')->group(function () {
            Route::get('create/{product_id}', [\App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin_image_add');
            Route::post('store/{product_id}', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_image_store');
            Route::get('delete/{id},{product_id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_image_delete');
            Route::get('show', [\App\Http\Controllers\Admin\ImageController::class, 'show'])->name('admin_image_show');
        });
        //Message
        Route::prefix('messages')->group(function () {
            Route::get('/{status}', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin_message');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('admin_message_edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'update'])->name('admin_message_update');
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('admin_message_delete');
        });
    // });
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->back();
    })->name('dashboard');
});
