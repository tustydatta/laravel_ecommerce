<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginRegisterController;

Route::get('/items/index', ItemController::class . '@index')->name('items.index');
Route::get('/items/create', ItemController::class . '@create')->name('items.create');
Route::post('/items', ItemController::class . '@store')->name('items.store');
Route::get('/items/{item}/edit', ItemController::class . '@edit')->name('items.edit');
Route::put('/items/{item}', ItemController::class . '@update')->name('items.update');
Route::delete('/items/{item}', ItemController::class . '@destroy')->name('items.destroy');

Route::controller(LoginRegisterController::class)->group(function(){
    Route::get('/', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});