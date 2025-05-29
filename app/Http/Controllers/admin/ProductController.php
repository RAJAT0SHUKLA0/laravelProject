<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\feature;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function productadd(){
        $Category=Category::get();
    return view ('admin.product.productAdd',compact('Category'));  
    }

    public function getSubCategories($id)
    {
            $subcategories = SubCategory::where("category_id",$id)->select("name","id")->get();
            return json_encode($subcategories);
    }
    
public function productaddSave(Request $Request){

    $imagePath=Null;

    if($Request->hasfile('image')){
       $image = $Request->file('image');
       $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
       $destinationPath = public_path('uploads');  
       $image->move($destinationPath, $filename);
       $imagePath = 'uploads/' . $filename;

   }
     
    $product=new Product;   
   $product->meta_title=$Request->meta_title;
   $product->meta_keyword=$Request->meta_keyword;
   $product->meta_description=$Request->meta_description;
   $product->name=$Request->name;
   $product->category_id=$Request->category_id;
   $product->subcategory_id=$Request->subcategory_id;
   $product->image=$imagePath;
   $product->description=$Request->description;
   $product->slug=$this->setnameslug($Request->name);

    if($product->save()){
       $lastID =$product->id; 
       if($files=$Request->file('feature_image')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('uploads/',$name);
            $feature=new feature;
            $feature->image= $name;
            $feature->product_id= $lastID;
            $feature->save();
        }
    }

    }
    return redirect('productList')->with('success', 'product add successfully');
   
}

public function setnameslug($value){

    return  Str::slug($value);

  }

  public function productList(){
    $product = Product::leftjoin('tbl_category','tbl_product.category_id','=','tbl_category.id')
    ->leftjoin('tbl_subcategory','tbl_product.subcategory_id','=','tbl_subcategory.id')
    ->select('tbl_product.*','tbl_category.name as categoryName','tbl_subcategory.name as subcategoryName')->where('tbl_product.is_delete','!=',1)->get();
    return view('admin.product.productList', ['product'=>  $product]);
  }

  public function productEdit($id){
   
    $product=Product::find($id);
    $Category=Category::get();
    $SubCategory = SubCategory::where('category_id',$product->category_id)->select("name","id")->get();  
      return view('admin.product.productAdd',compact('product','Category','SubCategory'));
    }

    public function productfeatureimage ($id){
        $featureimg = feature::where('product_id',$id)->select("name","id","product_id")->get(); 
        if(count($featureimg)>0){
            return response()->json($featureimg);
        }else{
            return response()->json([]);
        }
         
    }

    public function productfeatureaddimage(Request $Request){
        
            $lastID =$Request->id; 
            $pid =$Request->pid;
            
            $files=$Request->file('images');
            if (is_array($files) && sizeof($files)) {
             foreach($files as $file){
                 $name=$file->getClientOriginalName();
                 $file->move('uploads/',$name);
                 $feature=new feature;
                 $feature->name= $name;
                 $feature->product_id= $lastID;
                 $feature->save();
             }
         }else{
                $filename = $files->getClientOriginalName();
                $destinationPath = public_path('uploads');  
                $files->move($destinationPath, $filename);
                $imagePath = 'uploads/' . $filename;
                $feature= feature::where('id',$pid);
                $feature->update(["name"=>$filename,]);
         
            }
         
     
    }


    public function productUpdate(Request $Request,$id){
        $productUpdate = Product::find($id);
        $productUpdate->meta_title = $Request->input('meta_title');
        $productUpdate->meta_keyword = $Request->input('meta_keyword');
        $productUpdate->meta_description = $Request->input('meta_description');
        $productUpdate->category_id = $Request->input('category_id');
        $productUpdate->subcategory_id = $Request->input('subcategory_id');
        $productUpdate->name = $Request->input('name');
    
        
        if ($Request->hasFile('image')) {
          
            $image = $Request->file('image');
            $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads');
            $image->move($destinationPath, $filename);
            $imagePath = 'uploads/' . $filename;  
        } else {
           
            $imagePath = $productUpdate->image;
        }
    
     
        $productUpdate->image = $imagePath;  
    
       
        $productUpdate->description = $Request->input('description');
    
      
        $productUpdate->save();
    
        
        return redirect('productList')->with('success', 'product updated successfully');


    }
    public function productdelete($id){
        $product=Product::where('id',$id)->update(['is_delete'=>1]);
        return redirect()->back()->with('success', ' product deleted successfully');


    }

}
