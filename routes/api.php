<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('v1/products/image', [App\Http\Controllers\Api\V1\ProductController::class, 'image']);
Route::apiResource('v1/products', App\Http\Controllers\Api\V1\ProductController::class)
    ->only('index','show', 'store', 'destroy', 'update');
