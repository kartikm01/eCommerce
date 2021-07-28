<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use App\Cart;

class OrderController extends Controller
{
    public function getAllOrders() {
        $orderHistory = Order::getOrderHistoryOfUser();
        return view("Orders.order_list", compact("orderHistory"));
    }

    public function place_order(Request $request) {
        $bill_amount = Order::getBillAmount();
        $delivery_address = $request->input("delivery_address");
        $payment_mode = ($request->input("radio") == "online") ? "Online" : "COD";
        Order::insertInOrder($bill_amount, $delivery_address, $payment_mode);
        $deletedOrNot = Cart::makeCartEmpty();
        if($deletedOrNot) {
            return view("Checkout.final_checkout");
        } else {
            return "You have nothing in your cart.";
        }
    }

    public function viewOrderDetails(Request $request) {
        $current_order_id = $request->input("current_order_id");
        $product_details = OrderProduct::getProductDetailsOfOrder($current_order_id);
        return view("Orders.view_order_details", compact("product_details"));
    }
}
