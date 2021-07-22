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
    Route::get("/checkout", "ProductController@checkoutForm");
    Route::post("/cart", "ProductController@addToCart");
    Route::post("/remove", "ProductController@removeFromCart");
    Route::get("/MyCart", "ProductController@cartItems");
    Route::get("/orders", "ProductController@getAllOrders");
});


