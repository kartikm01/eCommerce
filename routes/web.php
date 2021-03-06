<?php

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

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/detail/{id}", "ProductController@detail");

Route::get("/search", "ProductController@search");

Route::get("/test", "ProductController@test");


Route::middleware('auth')->group(function() { 
    Route::get("/checkout", "CheckoutController@checkoutDetailsForm");
    Route::post("/cart", "CartController@addToCart");
    Route::post("/remove", "CartController@removeFromCart");
    Route::get("/MyCart", "CartController@cartItems");
    Route::get("/orders", "OrderController@getAllOrders");
    Route::get("/view_order_details", "OrderController@viewOrderDetails");
    Route::get("/place_order", "OrderController@place_order");
});


