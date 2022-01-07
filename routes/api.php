<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductTransactionController;
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

Route::name('api.')->group(function () {

    Route::apiResource('products', ProductController::class);

    // Product transactions
    Route::get('/products/{product}/transactions', [ProductTransactionController::class, 'index']);
    Route::post('/products/{product}/transactions', [ProductTransactionController::class, 'store']);
    Route::post('/products/{product}/transactions', [ProductTransactionController::class, 'store']);

});
