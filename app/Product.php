<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function getProductDetailsByID($product_id) {
        return Product::where("id", $product_id)->get();
    }

    public static function getProductDetailsByCategory($category) {
        return Product::where("category", $category)->get();
    }
}
