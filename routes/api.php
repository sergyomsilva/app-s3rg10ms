<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductTransactionController;
use App\Http\Controllers\Api\ReportController;
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

    //Reports
    Route::get('/products/transactions', [ReportController::class, 'index']);

    // Product transactions
    Route::get('/products/{product}/transactions', [ProductTransactionController::class, 'index']);
    Route::post('/products/{product}/transactions', [ProductTransactionController::class, 'store']);
    Route::post('/products/{product}/transactions', [ProductTransactionController::class, 'store']);

    Route::apiResource('products', ProductController::class);







});
