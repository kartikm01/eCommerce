<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    public $table = "cart";

    public static function checkIfProductExistsInCart($product_id) {
        $query = Cart::where("product_id", $product_id)->where("user_id", Auth::id())->increment("quantity");
        if($query) {
            return true;
        } else{
            return false;
        }
    }

    public static function putInCart($product_id) {
        $cartObj = new Cart;
        $cartObj->user_id = Auth::id();
        $cartObj->product_id = $product_id;
        $cartObj->quantity = 1;
        $cartObj->save();
    }

    public static function getCartProductsDetails() {
        return Cart::join("products", "cart.product_id", "=", "products.id")->where("cart.user_id", Auth::id())
                            ->select("products.*", "cart.quantity", "cart.id", "cart.product_id")->get();
    }

    public static function removeIfPresent($cart_id) {
        $exists = Cart::find($cart_id);
        if($exists) {
            $exists->delete();
            return true;
        } else {
            return false;
        }
    }

    public static function makeCartEmpty() {
        $query = Cart::where("user_id", Auth::id())->delete();
        if(!$query) {
            return false;
        } 
        return true;
    }
}
