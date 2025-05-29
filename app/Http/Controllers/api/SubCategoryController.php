<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function GetSubcategory(){
        $suboutput =[];
        $subcategories = SubCategory::get();
        foreach($subcategories as $subcategory){

    $suboutput[] = array(
        'name'=> $subcategory->name,
        'description'=>$subcategory->description,
        
    );
}
 
return response()->json([  
    "status" => true,
     "data" => $suboutput,
     "statuscode" => 200]);
    }
}