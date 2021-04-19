<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Order_detailController;
use App\Http\Controllers\LoginController;

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

// Route::middleware('auth:api')->group(function (){
    Route::get('user', [AuthController::class,'user']);
    Route::get('logout', [AuthController::class,'logout']);
   
    Route::resource('product',ProductController::class);
    Route::post('product/{product}',[ProductController::class,'updateProduct']);
    Route::get('product/search/{name}',[ProductController::class,'search']);
    Route::resource('category',CategoryController::class);
    Route::get('category/get/{id}',[CategoryController::class,'getDetails']);
    Route::resource('customer',CustomerController::class);
    Route::resource('order',OrderController::class);
    Route::resource('order_detail',Order_detailController::class);
// });

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('login-customer', [LoginController::class, 'login']);
});

