<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


                // LOGIN
Route::post('login', [App\Http\Controllers\Api\LoginController::class,
    'login'
]);

                // PRODUCTS
Route::apiResource('v1/products', App\Http\Controllers\Api\V1\ProductController::class)
    ->only('store', 'destroy', 'update')
    ->middleware('auth:sanctum');

Route::apiResource('v1/products', App\Http\Controllers\Api\V1\ProductController::class)
    ->only('index','show');


                // CATEGORIES
Route::apiResource('v1/categories', App\Http\Controllers\Api\V1\CategorieController::class)
    ->only('store', 'destroy', 'update')
    ->middleware('auth:sanctum');

Route::apiResource('v1/categories', App\Http\Controllers\Api\V1\CategorieController::class)
    ->only('index', 'show');
