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


Route::middleware('auth')->group(function() { 
    Route::get("/checkout/order_summary", "ProductController@checkoutOrderSummary");
    Route::get("/place_order", "OrderController@place_order");
    Route::get("/checkout", "ProductController@checkoutDetailsForm");
    Route::post("/cart", "CartController@addToCart");
    Route::post("/remove", "CartController@removeFromCart");
    Route::get("/MyCart", "CartController@cartItems");
    Route::get("/orders", "OrderController@getAllOrders");
    Route::get("/checkoutForm", "ProductController@checkoutForm");
    Route::get("/view_order_details", "OrderController@viewOrderDetails");
});


