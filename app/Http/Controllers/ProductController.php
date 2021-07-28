<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function detail($id) {
        $product_detail = Product::getProductDetailsByID($id);
        return view("Products.detail", compact("product_detail")); 
    }

    public function search(Request $request) {
        $input = $request->input("search");
        $data_of_cat = Product::getProductDetailsByCategory($input);
        return view("Products.category", compact("data_of_cat"));
    }
    
    public function test() {
        return $product_data = Product::get()->toArray();
        foreach($product_data as $data) {
            echo $data->toArray();
        }
        // view("array", compact("data"));
    }

    
}
