<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $output = [];

        $categories = Category::get();

        foreach ($categories as $category) {
           
            $categoryData = [
                'name' => $category->name,
                'description' => $category->description,
                'subcat' => [] 
            ];

            // Fetch subcategories for the current category
            $subCategories = Subcategory::where('category_id', $category->id)->get();

            // Loop through each subcategory and add it to the 'subcat' array
            foreach ($subCategories as $subCategory) {
                $categoryData['subcat'][] = [
                    'name' => $subCategory->name,
                    'description' => $subCategory->description
                ];
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
