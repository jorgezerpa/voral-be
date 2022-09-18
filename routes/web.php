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

// Route::get('admin/categories', [App\Http\Controllers\categorieController::class, 'index'])->name('categories');
Route::get('admin/categories/list', [App\Http\Controllers\CategorieController::class, 'index'])->name('list-categories');
Route::get('admin/categories/edit/{categorie}', [App\Http\Controllers\CategorieController::class, 'edit'])->name('edit-categories');
Route::post('admin/categories/update/{categorie}', [App\Http\Controllers\CategorieController::class, 'update'])->name('update-categories');
Route::get('admin/categories/delete/{categorie}', [App\Http\Controllers\CategorieController::class, 'destroy'])->name('delete-categories');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
