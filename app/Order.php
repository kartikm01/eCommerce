<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\OrderProduct;

class Order extends Model
{
    public static function getBillAmount() {
        $orderDetails = Cart::join("products", "cart.product_id", "=", "products.id")->where("cart.user_id", Auth::id())
                                   ->sum(DB::raw('products.price * cart.quantity'));
        return 1.05 * $orderDetails + 100;
    }

    public static function insertInOrder($amount, $address, $mode) {
        $order = new Order;
        $order->user_id = Auth::id();
        $order->bill_amount = $amount;
        $order->order_status = "SUCCESS";
        $order->payment_mode = $mode;
        $order->delivery_address = $address;
        $order->save();
        OrderProduct::insertInOrderProducts($order->id);
    }

    public static function getOrderHistoryOfUser() {
        // return $allOrders = Order::join("orders_products", "orders.id", "=", "orders_products.order_id")->where("orders.user_id", Auth::id())->select("*")->get();
        return $allOrders = Order::where("user_id", Auth::id())
                            ->select("*")->orderBy("created_at", "desc")->get();
    }
}


