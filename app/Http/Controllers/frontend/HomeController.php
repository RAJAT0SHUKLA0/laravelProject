<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;


class HomeController extends Controller
{
    public function home(){
        $Category=Category::where("is_delete","!=",'1')->get();
        $slider=Slider::where("is_delete","!=",'1')->get();
        return view('frontend.index',compact('Category','slider'));


    }

   
       
      
        
    


   
}
