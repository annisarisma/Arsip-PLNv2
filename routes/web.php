<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\BannerController;

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

//LOGIN & REGIST/
Route::group(['middleware' => 'guest'], function () {
    Route::controller(LoginRegisterController::class)->group(function () {
        Route::get('/register', 'register_index');
        Route::post('/register/register-create', 'register_create');
        Route::get('/login', 'login_index')->name('login');
        Route::get('/', 'login_index');
        Route::post('/login/login-create', 'login_create');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::controller(HomeController::class)->group((function () {
        Route::get('/home', 'index');
    }));
    Route::controller(LoginRegisterController::class)->group(function () {
        Route::post('/logout', 'logout');
    });
});

//AUTH -> ADMIN & SUPERADMIN//
Route::group(['middleware' => ['auth','unverified']],function () {

    //Arsip//
    Route::controller(ArchiveController::class)->group(function () {
        Route::get('/archive/semua', 'list_semua');
        Route::get('/archive/adm-keuangan', 'list_adm_keuangan');
        Route::get('/archive/perizinan-pertanahan', 'list_perizinan_pertanahan');
        Route::get('/archive/k3l', 'list_k3l');
        Route::get('/archive/teknik', 'list_teknik');
        Route::get('/archive/archive-create/{id}', 'create');
        Route::post('/archive/archive-create', 'store');
        Route::post('/archive/upload', 'store_temp')->name('upload');
        Route::delete('archive/remove', 'destroy_temp')->name('remove');
        Route::delete('/archive/archive-edit/{id}', 'destroy_file')->name('remove_file');
        Route::get('/archive/archive-edit/{id}/{unit_id}', 'edit');
        Route::post('/archive/archive-edit/{id}/{unit_id}', 'edit_file');
        Route::post('/archive/archive-edit/{id}', 'update');
        Route::post('/archive/archive-delete/{id}', 'destroy');
        Route::post('/archive/archive-request-delete/', 'request_delete');
        Route::get('/archive/archive-download/{id}', 'download_zip');
        Route::get('/archive/archive-download-file/{id}', 'download_file');
        //Filter//
        Route::get('/filter-all', 'list_semua');
        Route::get('/archive/adm-keuangan/filter-unit', 'list_adm_keuangan');
        Route::get('/archive/perizinan-pertanahan/filter-unit', 'list_perizinan_pertanahan');
        Route::get('/archive/k3l/filter-unit', 'list_k3l');
        Route::get('/archive/teknik/filter-unit', 'list_teknik');

        
    });

    //User//
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index');
        Route::get('/user/user-edit', 'edit');
    });
});

//AUTH -> ONLY SUPERADMIN//
Route::group(['middleware' => 'superadmin'], function () {
    
    //Kategori//
    Route::controller(CategoryController::class)->group(function () {
        // CRUD
        Route::get('/category', 'index');
        Route::get('/category/category-create', 'create');
        Route::post('/category/category-create', 'store');
        Route::get('/category/category-edit/{id}', 'edit');
        Route::post('/category/category-edit/{id}', 'update');
        Route::post('/category/category-delete/{id}', 'destroy');
        // Filter
        Route::get('/category/adm-keuangan', 'show_admkeu');
        Route::get('/category/perizinan-pertanahan', 'show_pp');
        Route::get('/category/k3l', 'show_k3l');
        Route::get('/category/teknik', 'show_teknik');
    });
    
    //Manage User//
    Route::controller(ManageUserController::class)->group(function () {
        Route::get('/manage-user', 'index');
        Route::post('/accept-user/{user}', 'manage_user_accept');
        Route::post('/dennied-user/{user}', 'manage_user_dennied');
        Route::delete('/delete-user/{user}', 'manage_user_destroy');
        Route::delete('/delete-request/{delete_request}', 'manage_request_destroy');
        Route::delete('/accept-request/{accept_request}', 'manage_request_accept');
    });

    //Banner//
    Route::controller(BannerController::class)->group(function () {
        Route::get('/user/manage-banner', 'index');
        Route::get('/user/manage-banner-create', 'create');
        Route::post('/user/manage-banner-create', 'store');
        Route::get('/user/manage-banner-edit/{id}', 'edit');
        Route::post('/user/manage-banner-edit/{id}', 'update');
        Route::post('/user/manage-banner-delete/{id}', 'destroy');
        Route::post('/user/manage-banner/edit-status/{id)', 'update_status');
    });
});