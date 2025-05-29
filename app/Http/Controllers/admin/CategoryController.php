<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function categoryList(){

        $Category=Category::where("is_delete","!=",0)->get();
        return view('admin.category.categoryList',['categories'=> $Category]);
    }
    
    public function categoryAdd(){

        $Category=Category::all();
        return view('admin.category.categoryAdd');
    }

    public function categoryEdit($id){
        $Category=Category::where('id',$id)->first();
        return view('admin.category.categoryAdd',compact('Category'));
    }
    public function categoryaddSave(Request $Request){
       
       
         $imagePath=Null;

        if($Request->hasfile('images')){
            $image = $Request->file('images');
            $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads');  
            $image->move($destinationPath, $filename);
            $imagePath = 'uploads/' . $filename;

        }
        $category=new Category;
        $category->metaTitle=$Request->metaTitle;
        $category->metakeyword=$Request->metakeyword;
        $category->metadescription=$Request->metadescription;
        $category->name=$Request->name;
        $category->image=$imagePath;
        $category->description=$Request->description;
        $category->slug=$this->setnameslug($Request->name);
         $category->save();
         return redirect('categoryList')->with('success', 'category add successfully');
        
    }
    public function setnameslug($value){

      return  Str::slug($value);

    }

    public function categoryUpdate(Request $Request, $id)
    {
        
        $catupdate = Category::find($id);
        $catupdate->metaTitle = $Request->input('metaTitle');
        $catupdate->metakeyword = $Request->input('metakeyword');
        $catupdate->metadescription = $Request->input('metadescription');
        $catupdate->name = $Request->input('name');
    
        
        if ($Request->hasFile('images')) {
          
            $image = $Request->file('images');
            $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads');
            $image->move($destinationPath, $filename);
            $imagePath = 'uploads/' . $filename;  
        } else {
           
            $imagePath = $catupdate->image;
        }
    
     
        $catupdate->image = $imagePath;  
    
       
        $catupdate->description = $Request->input('description');
    
      
        $catupdate->save();
    
        
        return redirect('categoryList')->with('success', 'Category updated successfully');
    }
    
    public function categorydelete( $id)
    {
        $Category = Category::where("id",$id)->update(['is_delete'=>1 ]);
        return redirect()->back()->with('success', ' category deleted successfully');
   

    }
    
}
