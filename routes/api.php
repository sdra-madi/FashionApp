<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('home')->group(function () {
    Route::get('/get_classes', [HomeController::class, 'get_classes']);
    Route::get('/get_discounts', [HomeController::class, 'get_discounts']);
});
Route::prefix('class')->group(function () {
    Route::post('/get_types', [HomeController::class, 'get_types']);
});
Route::prefix('product')->group(function () {
    Route::post('/get_products', [ProductController::class, 'get_products']);
    Route::post('/get_detail_product', [ProductController::class, 'get_detail_product']);
    Route::post('/get_products_fav', [ProductController::class, 'get_products_fav']);
    Route::post('/add_product_to_fav', [ProductController::class, 'add_product_to_fav']);
    Route::post('/delete_product_from_fav', [ProductController::class, 'delete_product_from_fav']);
    Route::post('/search_product', [ProductController::class, 'search_product']);
    Route::post('/add_comment', [ProductController::class, 'add_comment']);
    Route::post('/get_comments', [ProductController::class, 'get_comments']);
});
Route::prefix('user')->group(function () {
    Route::post('/sing_up', [UserController::class,'sing_up']);
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/get_info', [UserController::class, 'get_info']);
    Route::post('/get_previous_orders', [UserController::class, 'get_previous_orders']);
    Route::post('/convert_points', [UserController::class, 'convert_points']);
    Route::post('/update_info', [UserController::class, 'update_info']);
    Route::post('/apply_comment',[UserController::class,'apply_comment']);
});
Route::prefix('order')->group(function () {
    Route::post('/get_order', [OrderController::class, 'order']);
    Route::get('/get_charges', [OrderController::class, 'get_charges']);
});
