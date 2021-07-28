<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $current_product_id = $request->input("current_product_id");
        $exists = Cart::checkIfProductExistsInCart($current_product_id);
        if($exists) {
            return redirect("/home");
        } else {
            Cart::putInCart($current_product_id);
            return redirect("/MyCart");
        }
    }

    public function cartItems() {
        $cartItems = Cart::getCartProductsDetails();
        return view("Products.MyCart", compact("cartItems"));
    }

    public function removeFromCart(Request $request) {
        $current_cart_id = $request->input("current_cart_id");
        $deletedOrNot = Cart::removeIfPresent($current_cart_id);
        if($deletedOrNot) {
            return redirect("/MyCart");
        } else {
            return "This product doesn't exist in your cart.";
        }
    }
}
