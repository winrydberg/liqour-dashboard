<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticateAdmin'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('index');
    Route::get('/orders', [OrderController::class, 'getOrders'])->name('orders');  
    Route::get('/new-product', [ProductController::class, 'newProduct'])->name('new-product');
    Route::post('/new-product', [ProductController::class, 'saveProduct'])->name('save-product');
    Route::get('/products', [ProductController::class, 'getProducts'])->name('products');
    Route::get('process-order', [OrderController::class, 'orderProcessor'])->name('approve-order');  
});