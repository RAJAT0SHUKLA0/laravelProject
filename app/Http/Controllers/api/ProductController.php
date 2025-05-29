<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\feature;


class ProductController extends Controller
{
    public function getproduct()
    {
        $output = [];

        // Fetch categories
        $categories = Category::get();

        foreach ($categories as $category) {
            $categoryData = [
                'name' => $category->name,
                'description' => $category->description,
                'subcat' => [] 
            ];

            // Fetch subcategories for the current category
            $subCategories = SubCategory::where('category_id', $category->id)->get();

            foreach ($subCategories as $subCategory) {
                $subCategoryData = [
                    'name' => $subCategory->name,
                    'description' => $subCategory->description,
                    'product' => [] // Initialize the product array
                ];

                // Fetch products for the current subcategory
                $products = Product::where('subcategory_id', $subCategory->id)->get();

                // Loop through each product and add its details to the 'product' array
                foreach ($products as $product) {
                    $featureimage = feature::where('product_id',$product->id)->get();

                    $subCategoryData['product'][] = [  
                        'name' => $product->name,
                        'description' => $product->description,
                        'image' => $product->image,
                        'feature' => $featureimage
                       
                    ];
                }

                // Add the subcategory data to the category
                $categoryData['subcat'][] = $subCategoryData;
            }

            // Add the category data to the output array
            $output[] = $categoryData;
        }

        // Return the response as JSON
        return response()->json([
            "status" => true,
            "data" => $output, 
            "statuscode" => 200
        ]);
    }
}
