<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {
        $data = Product::all();
        return view("products_home", compact("data"));
        // print_r($data);
    }
}
