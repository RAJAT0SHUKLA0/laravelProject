<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{
public function subcategoryList(){

    $subcategory = SubCategory::leftjoin('tbl_category','tbl_subcategory.category_id','=','tbl_category.id')->select('tbl_subcategory.*','tbl_category.name as categoryName')->where('tbl_subcategory.is_delete','!=',1)->get();
    return view('admin.subcategory.subcategoryList', ['subcategory'=>  $subcategory]);
     
}
public function subcategoryadd(){
    $Category=Category::get();
    return view('admin.subcategory.subcategoryadd',compact('Category'));
}

public function subcategoryaddSave(Request $Request){
       
       
    $imagePath=Null;

   if($Request->hasfile('image')){
       $image = $Request->file('image');
       $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
       $destinationPath = public_path('uploads');  
       $image->move($destinationPath, $filename);
       $imagePath = 'uploads/' . $filename;

   }
   $category=new SubCategory;
   $category->meta_title=$Request->meta_title;
   $category->meta_keyword=$Request->meta_keyword;
   $category->meta_description=$Request->meta_description;
   $category->name=$Request->name;
   $category->category_id=$Request->category_id;
   $category->image=$imagePath;
   $category->description=$Request->description;
   $category->slug=$this->setnameslug($Request->name);
    $category->save();
    return redirect('subcategoryList')->with('success', 'subcategory add successfully');
   
}
public function setnameslug($value){

    return  Str::slug($value);

  }
  public function subcategoryEdit($id){

    $subcategory=SubCategory::find($id);
    $Category=Category::get();
    return view('admin.subcategory.subcategoryadd',compact('subcategory','Category'));
    }

    public function subcategoryUpdate(Request $Request, $id)
    {
        
        $subcatupdate = SubCategory::find($id);
        $subcatupdate->meta_title = $Request->input('meta_title');
        $subcatupdate->meta_keyword = $Request->input('meta_keyword');
        $subcatupdate->meta_description = $Request->input('meta_description');
        $subcatupdate->name = $Request->input('name');
        $subcatupdate->category_id = $Request->input('category_id');
    
        
        if ($Request->hasFile('image')) {
          
            $image = $Request->file('image');
            $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads');
            $image->move($destinationPath, $filename);
            $imagePath = 'uploads/' . $filename;  
        } else {
           
            $imagePath = $subcatupdate->image;
        }
    
     
        $subcatupdate->image = $imagePath;  
    
       
        $subcatupdate->description = $Request->input('description');
    
      
        $subcatupdate->save();
    
        
        return redirect('subcategoryList')->with('success', 'subcategory updated successfully');
    }

    public function subcategorydelete($id){
        $subcategory=SubCategory::where('id',$id)->update(['is_delete'=>1]);
        return redirect()->back()->with('success', ' subcategory deleted successfully');


    }
}
