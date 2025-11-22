<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;

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

Route::prefix('v1')->group(function () {

    // Categories
    Route::get('/categories', [CategoryController::class, 'index']);

    // Products
    Route::get('/products', [ProductController::class, 'index']);           // list (with filters)
    Route::get('/products/trending', [ProductController::class, 'trending']); // trending
    Route::get('/products/{id}', [ProductController::class, 'show']);       // single product
    Route::get('/app/settings', [SettingController::class, 'appLinks']);
});
