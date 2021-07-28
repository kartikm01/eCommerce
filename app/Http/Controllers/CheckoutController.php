<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkoutDetailsForm() {
        $order_details = Cart::join("products", "cart.product_id", "=", "products.id")->where("cart.user_id", Auth::id())
                            ->select("products.*", "cart.quantity", "cart.id", "cart.product_id")->get();
        $user_details = User::where("id", Auth::id())->select("name", "email", "phone_no", "address", "state", "country", "pincode")->get();
        return view("Checkout.checkoutDetailsForm", compact("user_details", "order_details"));
    }
}
