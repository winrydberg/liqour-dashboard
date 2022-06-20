<?php

use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\SearchController;
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

Route::post('/create-order', [OrderController::class, 'createNewOrder']);
Route::post('/my-orders', [OrderController::class, 'myOrders']);
Route::get('/search', [SearchController::class, 'searchProduct']);
Route::post('/get-products', [ProductsController::class, 'getProducts']);