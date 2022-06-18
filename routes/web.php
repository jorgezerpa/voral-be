<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){return redirect()->route('login');});

Route::get('admin', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('admin/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::get('admin/{product}', [App\Http\Controllers\ProductController::class, 'get'])->name('product');
Route::get('admin/edit/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::post('admin/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::get('admin/delete/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('delete');
Route::post('admin/update/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::post('admin/logout', [App\Http\Controllers\ProductController::class, 'logout'])->name('logout');


Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
