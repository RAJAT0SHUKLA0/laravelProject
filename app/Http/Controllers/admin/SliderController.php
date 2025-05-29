<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function slideradd(){

        $slider=Slider::all();
        return view('admin.slider.sliderAdd');
    }

    public function sliderlist(){
        $slider=Slider::where("is_delete","!=",1)->get();
        return view('admin.slider.sliderList',['sliders'=>$slider]);



    }
    public function slideraddSave(Request $Request){
       
        $imagePath=Null;

       if($Request->hasfile('image')){
           $image = $Request->file('image');
           $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
           $destinationPath = public_path('uploads');  
           $image->move($destinationPath, $filename);
           $imagePath = 'uploads/' . $filename;

       }
       $slider=new Slider;
      
       $slider->OfferTitle=$Request->OfferTitle;
       $slider->image=$imagePath;
       $slider->title=$Request->title;
       $slider->description=$Request->description;
       $slider->slug=$this->setnameslug($Request->title);
        $slider->save();
        return redirect('sliderlist')->with('success', 'slider add successfully');
       
   }
   public function setnameslug($value){

     return  Str::slug($value);

   }
}
