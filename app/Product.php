<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function getProductDetailsByID($product_id) {
        return Product::where("id", $product_id)->get();
    }

    public static function getProductDetailsByCategory($search) {
        $data_of_cat = Product::where("category", "like", "%" . $search . "%")
                        ->orWhere("name", "like", "%" . $search . "%")
                        ->orWhere("description", "like", "%" . $search . "%")->paginate(4);
        $data_of_cat->appends(["search" => $search]);
        return $data_of_cat;
    }

    public static function getSimilarProducts($category) {
        return Product::where("category", "like", "%" . $category . "%")->paginate(5);
    }
}
