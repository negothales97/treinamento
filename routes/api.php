<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=> 'category'], function(){
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{resourceId}',[CategoryController::class, 'show']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{resourceId}',[CategoryController::class, 'update']);
    Route::delete('/{resourceId}',[CategoryController::class, 'delete']);
});
Route::group(['prefix'=> 'product'], function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{resourceId}',[ProductController::class, 'show']);
    Route::post('/', [ProductController::class, 'store']);
    Route::put('/{resourceId}',[ProductController::class, 'update']);
    Route::delete('/{resourceId}',[ProductController::class, 'delete']);
});
