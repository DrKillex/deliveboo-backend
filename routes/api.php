<?php

// use App\Http\Controllers\Api\ProductController;

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RestaurantController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('restaurants', [RestaurantController::class, 'index']);
Route::get('restaurants/{slug}', [RestaurantController::class, 'show']);
// Route::post('restaurants', [RestaurantController::class, 'store']);

// Route::post('products', [ProductController::class, 'index']);
// Route::get('products/{id}', [ProductController::class, 'show']);
Route::get('products/{slug}', [ProductController::class, 'getMenu']);
Route::post('payment', [OrderController::class, 'payment']);
