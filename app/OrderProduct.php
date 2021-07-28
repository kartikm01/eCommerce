<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class OrderProduct extends Model
{
    public $table = "orders_products";

    public static function insertInOrderProducts($order_id) {
        $orderDetails = Cart::join("products", "cart.product_id", "=", "products.id")->where("cart.user_id", Auth::id())
                               ->select("cart.product_id", "cart.quantity", "products.price")->get();
        foreach($orderDetails as $item) {
            $order = new OrderProduct;
            $order->order_id = $order_id;
            $order->user_id = Auth::id();
            $order->product_id = $item->product_id;
            $order->product_price = $item->price;
            $order->quantity_ordered = $item->quantity;
            $order->save();
        }
    }

    public static function getProductDetailsOfOrder($order_id) {
        return OrderProduct::join("products", "orders_products.product_id", "=", "products.id")->where("order_id", $order_id)
                      ->select("order_id", "price", "quantity_ordered", "name", "description", "image", "products.id")->get();
    }
}
