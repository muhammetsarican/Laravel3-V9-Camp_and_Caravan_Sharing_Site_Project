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
Route::get('/blog', [\App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::post('/filter', [\App\Http\Controllers\HomeController::class, 'filter'])->name('filter');

Route::post('/getcamp', [\App\Http\Controllers\HomeController::class, 'getcamp'])->name('getcamp');
Route::get('/camplist/{search}', [\App\Http\Controllers\HomeController::class, 'camplist'])->name('camplist');


Route::get('/admin/show/editor', function () {
    return view('admin.show_editors');
})->name('show_editors');

Route::get('/admin/add/editor', function () {
    return view('admin.add_editor');
})->name('add_editor');

Route::get('/camp/detail/{id}', [\App\Http\Controllers\HomeController::class, 'campdetail'])->name('camp_detail');

Route::middleware('auth')->prefix('camper')->namespace('camper')->group(function () {
    //Route::get('/profile', [\App\Http\Controllers\admin\HomeController::class, 'index'])->name('admin_home');

    //Camp
    Route::prefix('camp')->group(function () {
        Route::get('/', [\App\Http\Controllers\Camper\CampController::class, 'index'])->name('user_camp');
        Route::get('create', [\App\Http\Controllers\Camper\CampController::class, 'create'])->name('user_add_camp');
        Route::post('store', [\App\Http\Controllers\Camper\CampController::class, 'store'])->name('user_store_camp');
        Route::get('edit/{id}', [\App\Http\Controllers\Camper\CampController::class, 'edit'])->name('user_edit_camp');
        Route::post('update/{id}', [\App\Http\Controllers\Camper\CampController::class, 'update'])->name('user_update_camp');
        Route::get('delete/{id}', [\App\Http\Controllers\Camper\CampController::class, 'destroy'])->name('user_delete_camp');
        Route::get('show', [\App\Http\Controllers\Camper\CampController::class, 'show'])->name('user_show_camp');

        Route::get('category/{id}', [\App\Http\Controllers\Camper\CampController::class, 'campcategory'])->name('user_camp_category');
        Route::post('category/store/{id}', [\App\Http\Controllers\Camper\CampController::class, 'campcategorystore'])->name('user_camp_category_add');
        Route::get('category/delete/{id}', [\App\Http\Controllers\Camper\CampController::class, 'campcategorydelete'])->name('user_camp_category_delete');
    });
    //Image
    Route::prefix('image')->group(function () {
        Route::get('create/{camp_id}', [\App\Http\Controllers\Camper\ImageController::class, 'create'])->name('user_image_add');
        Route::post('store/{camp_id}', [\App\Http\Controllers\Camper\ImageController::class, 'store'])->name('user_image_store');
        Route::get('delete/{id},{camp_id}', [\App\Http\Controllers\Camper\ImageController::class, 'destroy'])->name('user_image_delete');
        Route::get('show', [\App\Http\Controllers\Camper\ImageController::class, 'show'])->name('user_image_show');
    });
    //Blog
    Route::prefix('blog')->group(function () {
        Route::get('/', [\App\Http\Controllers\BlogController::class, 'index'])->name('user_blog');
        Route::get('create', [\App\Http\Controllers\BlogController::class, 'create'])->name('user_add_blog');
        Route::post('store', [\App\Http\Controllers\BlogController::class, 'store'])->name('user_store_blog');
        Route::get('edit/{id}', [\App\Http\Controllers\BlogController::class, 'edit'])->name('user_edit_blog');
        Route::post('update/{id}', [\App\Http\Controllers\BlogController::class, 'update'])->name('user_update_blog');
        Route::get('delete/{id}', [\App\Http\Controllers\BlogController::class, 'destroy'])->name('user_delete_blog');
        Route::get('show/{id}', [\App\Http\Controllers\BlogController::class, 'show'])->name('user_show_blog');
    });
});

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
    //Camp
    Route::prefix('camp')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\CampController::class, 'index'])->name('admin_camp');
        Route::get('add', [\App\Http\Controllers\Admin\CampController::class, 'add'])->name('admin_add_camp');
        Route::post('create', [\App\Http\Controllers\Admin\CampController::class, 'create'])->name('admin_create_camp');
        Route::post('store', [\App\Http\Controllers\Admin\CampController::class, 'store'])->name('admin_camp_store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\CampController::class, 'edit'])->name('admin_edit_camp');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\CampController::class, 'update'])->name('admin_update_camp');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\CampController::class, 'destroy'])->name('admin_delete_camp');
        Route::get('show', [\App\Http\Controllers\Admin\CampController::class, 'show'])->name('admin_camp_show');


        Route::get('category/{id}', [\App\Http\Controllers\Admin\CampController::class, 'campcategory'])->name('camp_category');
        Route::post('category/store/{id}', [\App\Http\Controllers\Admin\CampController::class, 'campcategorystore'])->name('camp_category_add');
        Route::get('category/delete/{id}', [\App\Http\Controllers\Admin\CampController::class, 'campcategorydelete'])->name('camp_category_delete');
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
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin_edit_user');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin_update_user');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin_delete_user');
        Route::get('show/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin_user_show');

        Route::get('role/{id}', [\App\Http\Controllers\Admin\UserController::class, 'userrole'])->name('user_role');
        Route::post('role/store/{id}', [\App\Http\Controllers\Admin\UserController::class, 'userrolesstore'])->name('user_role_add');
        Route::get('role/delete/{userid}/{roleid}', [\App\Http\Controllers\Admin\UserController::class, 'userrolesdelete'])->name('user_role_delete');
    });
    //Image
    Route::prefix('image')->group(function () {
        Route::get('create/{camp_id}', [\App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin_image_add');
        Route::post('store/{camp_id}', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_image_store');
        Route::get('delete/{id},{camp_id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_image_delete');
        Route::get('show', [\App\Http\Controllers\Admin\ImageController::class, 'show'])->name('admin_image_show');
    });
    //Blog
    Route::prefix('blog')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin_blog');
        Route::get('create', [\App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin_add_blog');
        Route::post('store', [\App\Http\Controllers\Admin\BlogController::class, 'store'])->name('admin_store_blog');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('admin_edit_blog');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'update'])->name('admin_update_blog');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('admin_delete_blog');
        Route::get('show/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'show'])->name('admin_show_blog');
    });
    //Review
    Route::prefix('review')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin_review');
        Route::get('create', [\App\Http\Controllers\Admin\ReviewController::class, 'create'])->name('admin_add_review');
        Route::post('store', [\App\Http\Controllers\Admin\ReviewController::class, 'store'])->name('admin_store_review');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'edit'])->name('admin_edit_review');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'update'])->name('admin_update_review');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('admin_delete_review');
        Route::get('show', [\App\Http\Controllers\Admin\ReviewController::class, 'show'])->name('admin_show_review');
    });
    // });
});






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('user_home');
    })->name('dashboard');
});
