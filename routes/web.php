<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPointController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminTruckController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.login');
});

Route::post('login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class,'logout'])->name('logout');
Route::get('/index', [AdminController::class, 'index'])->name('index');
Route::get('/analytic',[AdminController::class,'analytic'])->name('analytic');
Route::post('score_points', [AdminController::class, 'score_points'])->name('score_points');
Route::post('score_truck_details', [AdminController::class, 'score_truck_details'])->name('score_truck_details');

Route::get('/order', [AdminOrderController::class,'get_orders'])->name('order');
Route::get('/detail_order/{id}',[AdminOrderController::class,'get_details_orders'])->name('detail_order');
Route::get('/delivery_order/{id}',[AdminOrderController::class,'delivery_order'])->name('delivery_order');
Route::get('/truck',[AdminOrderController::class,'get_orders_delivery'])->name('truck');

Route::get('/addproduct', function () {
    return view('pages.addproduct');
})->name('addproduct');

Route::get('/man',[AdminProductController::class,'get_men_products'])
->name('man');
Route::get('/women',[AdminProductController::class,'get_women_products'])
->name('women');
Route::get('/kids', [AdminProductController::class,'get_kids_products'])
->name('kids');
Route::get('/type_products/{type_id}', [AdminProductController::class,'get_type_products'])
->name('type_products');
Route::get('/discounts', [AdminProductController::class,'get_discounts_products'])
->name('discounts');
Route::get('/detail_product/{id}',[AdminProductController::class,'get_detail_product'])
->name('detail_product');
Route::post('register_product', [AdminProductController::class, 'register_product'])
->name('register_product');
Route::get('/hide_product/{id}',[AdminProductController::class,'hide_product'])
->name('hide_product');
Route::get('/edit_product/{id}', [AdminProductController::class,'edit_product'])->name('edit_product');
Route::post('/store_product/{id}', [AdminProductController::class,'store_product'])->name('store_product');
Route::get('/add_discount/{id}',[AdminProductController::class,'add_discount'])
->name('add_discount');
Route::post('store_discount/{id}', [AdminProductController::class, 'store_discount'])
->name('store_discount');

Route::get('/points', [AdminPointController::class,'get_points'])->name('points');
Route::get('/edit_point', [AdminPointController::class,'edit_point'])->name('edit_point');
Route::post('/store_points', [AdminPointController::class,'store_points'])->name('store_points');
Route::get('/add_point', function(){
    return view('pages.add_point');
})->name('add_point');
Route::post('/score_points', [AdminPointController::class,'score_points'])->name('score_points');

Route::get('/charges', [AdminTruckController::class,'get_charges'])->name('truck_details');
Route::get('/edit_charge/{id}', [AdminTruckController::class,'edit_charge'])->name('edit_charge');
Route::post('/store_charge/{id}', [AdminTruckController::class,'store_charge'])->name('store_charge');
Route::get('/add_charge', function(){
    return view('pages.add_charge');
})->name('add_charge');
Route::post('/score_charge', [AdminTruckController::class,'score_charge'])->name('score_charge');


Route::get('/guide', function () {
    return view('pages.guide');
})->name('guide');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';
