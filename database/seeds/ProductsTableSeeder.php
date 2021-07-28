<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $entries = [
        //     ["name" => "OnePlus Nord 2", "price" => 30000, "category" => "Mobile", "description" => "High Referesh Rate|Super AMOLED Display", "image" => "https://www.xda-developers.com/files/2021/07/OnePlus-Nord-2_6.jpg"],
        //     ["name" =>" LG Air Conditioner", "price" => 12000, "category" => "Air Conditioner", "description" => "Energy Saving|Split AC", "image" => "https://5.imimg.com/data5/FG/PD/QY/SELLER-10464833/ks-q18enxa-split-ac-500x500.JPG"],
        //     ["name" => "OnePlus Smart TV", "price" => 50000, "category" => "Television", "description" => "Smart TV", "image" => "https://m.media-amazon.com/images/S/aplus-media/vc/23272c42-c68d-47bb-95d7-d4b0175c7849.__CR0,0,970,600_PT0_SX970_V1___.jpg"]
        // ];

        $all_products = Product::all();
        
        for($i=1; $i<=3031; $i++) {
            foreach($all_products as $entry) {
                DB::table("products")->insert([
                    "name" => $entry->name,
                    "price" => $entry->price,
                    "category" => $entry->category,
                    "description" => $entry->description,
                    "image" => $entry->image
                ]);
            }
        }
    }
}
