<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecords = [
            ['id'=>1,'section_id'=>9,'category_id'=>4,'brand_id'=>1,'vendor_id'=>1,'admin_id'=>1,'admin_type'=>'vendor','product_name'=>'Redmi Note 11','product_code'=>'RM22','product_color'=>'Blue','product_price'=>15000,'product_discount'=>10,'product_weight'=>500,'product_image'=>'','product_video'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1],
            ['id'=>2,'section_id'=>5,'category_id'=>5,'brand_id'=>2,'vendor_id'=>1,'admin_id'=>2,'admin_type'=>'superadmin','product_name'=>'Redmi Note 11','product_code'=>'RM22','product_color'=>'Blue','product_price'=>15000,'product_discount'=>10,'product_weight'=>500,'product_image'=>'','product_video'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1],
            ['id'=>3,'section_id'=>6,'category_id'=>3,'brand_id'=>3,'vendor_id'=>1,'admin_id'=>1,'admin_type'=>'admin','product_name'=>'Redmi Note 11','product_code'=>'RM22','product_color'=>'Blue','product_price'=>15000,'product_discount'=>10,'product_weight'=>500,'product_image'=>'','product_video'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1]
        ];
        Product::insert($productRecords);
    }
}
