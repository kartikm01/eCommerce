<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductController extends Controller
{
    public function detail($id) {
        $product_data = Product::where("id", $id)->get();
        // print_r($product_data);
        return view("detail", compact("product_data")); 
    }

    public function search(Request $request) {
        // print_r($request->input());
        $search_input = $request->input();
        $cat = $search_input["search"];
        $data_of_cat = Product::where("category", $cat)->get();
        return view("category", compact("data_of_cat"));
    }
    
    public function addToCart(Request $request) {
        if(Auth::guest()) {
            return redirect("/login");
        } else { 
            $current_product_id = $request->input("current_product_id");
            $query = Cart::where("product_id", $current_product_id)->where("user_id", Auth::id())->increment("quantity");
            if($query) {
                return redirect("/home");
            } 
            $cartObj = new Cart;
            $cartObj->user_id = Auth::id();
            $cartObj->product_id = $current_product_id;
            $cartObj->quantity = 1;
            $cartObj->save();
            return redirect("/home");
        }
    }

    public function cartItems() {
        $current_user_id = Auth::id();
        $cartItems = DB::table("cart")->join("products", "cart.product_id", "=", "products.id")->where("cart.user_id", $current_user_id)->select("products.*", "cart.quantity", "cart.id", "cart.product_id")->get();
        return view("MyCart", compact("cartItems"));
    }

    public function removeFromCart(Request $request) {
        $current_cart_id = $request->input("current_cart_id");
        $remove_row = Cart::find($current_cart_id)->delete();
        // $remove_row->delete();
        return redirect('/MyCart');
    }

    public function checkoutForm() {
        // $current_user_id = Auth::id();
        // $total = DB::table("cart")->join("products", "cart.product_id", "=", "products.id")->where("cart.user_id", $current_user_id)->get();
        return redirect("/home");
    }
}
