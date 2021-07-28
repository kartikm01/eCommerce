<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductController extends Controller
{
    public function detail($id) {
        $product_detail = Product::getProductDetailsByID($id);
        return view("Products.detail", compact("product_detail")); 
    }

    public function search(Request $request) {
        $cat = $request->input("search");
        $data_of_cat = Product::getProductDetailsByCategory($cat);
        return view("Products.category", compact("data_of_cat"));
    }
    
    

    public function checkoutDetailsForm() {
        // $total = Cart::join("products", "cart.product_id", "=", "products.id")->where("cart.user_id", $current_user_id)->get();
        $order_details = Cart::join("products", "cart.product_id", "=", "products.id")->where("cart.user_id", Auth::id())
                            ->select("products.*", "cart.quantity", "cart.id", "cart.product_id")->get();
        $user_details = User::where("id", Auth::id())->select("name", "email", "phone_no", "address", "state", "country", "pincode")->get();
        return view("checkoutDetailsForm", compact("user_details", "order_details"));
    }

    
    public function checkoutOrderSummary() {
        $orderDetails = Cart::join("products", "cart.product_id", "=", "products.id")->where("cart.user_id", Auth::id())->select("products.*", "cart.quantity", "cart.id", "cart.product_id")->get();
        return view("order_summary", compact("orderDetails"));
    }

    
}
