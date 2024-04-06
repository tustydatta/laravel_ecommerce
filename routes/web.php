<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ItemController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\WelcomeController;

Route::controller(WelcomeController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/test/{product_id}', 'test')->name('test');
    Route::get('/all_category', 'allCategory')->name('all_category');
    Route::get('/category/{category_id}', 'Category')->name('category');
    Route::get('/product/{product_id}', 'Product')->name('product');
});

Route::controller(DashboardController::class)->group(function(){
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
});

Route::controller(ItemController::class)->group(function(){
    Route::get('/items/index', 'index')->name('items.index');
    Route::get('/items/create', 'create')->name('items.create');
    Route::post('/items', 'store')->name('items.store');
    Route::get('/items/{item}/edit', 'edit')->name('items.edit');
    Route::put('/items/{item}', 'update')->name('items.update');
    Route::delete('/items/{item}', 'destroy')->name('items.destroy');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/category/index', 'index')->name('category.index');
    Route::get('/category/create', 'create')->name('category.create');
    Route::post('/category', 'store')->name('category.store');
    Route::get('/category/{item}/edit', 'edit')->name('category.edit');
    Route::put('/category/{item}', 'update')->name('category.update');
    Route::delete('/category/{item}', 'destroy')->name('category.destroy');
});

Route::controller(LoginRegisterController::class)->group(function(){
    Route::get('/backend', 'adminLogin')->name('admin_login');
    Route::post('/adminAuthenticate', 'adminAuthenticate')->name('admin_authenticate');
    Route::post('/adminLogout', 'adminLogout')->name('adminLogout');

    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});