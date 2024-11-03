<?php

namespace App\Http\Controllers;

use App\slider;
use Illuminate\Http\Request;
use Image;

class SilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSlider()
    {
      
        return view('backend.pages.slider.addSlider-form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadSlide(Request $request)
    {
          $this->validate($request,[
            'slide_image'=>'required',
            'slide_title'=>'required',
            'slide_description'=>'required',
            'status'=>'required',
            
        ]);
           $data=new slider();
        $data->slide_image=$this->createSlide($request);
        $data->slide_title=$request->slide_title;
        $data->slide_description=$request->slide_description;
        $data->status=$request->status;
        $data->save();

        return back()->with('massage','slider add successfully!!');
    }
       protected function createSlide($request){  

      
        $image=$request->file('slide_image');
        $img=time().'.'.$image->getClientOriginalExtension();
        $location='images/slider/'.$img;
        Image::make($image)->save($location);
  
       return $img;
        }
        
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manageSlide()
    {
        $slider=slider::all();
        return view('backend.pages.slider.manage-slide',compact('slider'));
    }
    
    
     public function slideEdit($id){
 
 $slide=slider::find($id);
     return view('backend.pages.slider.slider-edit-form',compact('slide'));

    }
    
    
    public function updateSlide(Request $request,$id){

        $slide=slider::find($id);
      
        $slide->slide_title=$request->slide_title;
        $slide->slide_description=$request->slide_description;
        $slide->status=$request->status;

        if ( $request->file('slide_image')) {
         unlink('images/slider/'.$slide->slide_image);
         $slide->slide_image=$this->createSlide($request);
        }
        $slide->save();

        return redirect('/manage-slide')->with('massage','slider edit successfully!!');



    }  
    
     public function slideDelete($id){

       $slide=slider::find($id);
       unlink('images/slider/'.$slide->slide_image);
       $slide->delete();

       return redirect('/manage-slide')->with('massage','slider delete successfully!!');

    }
    
    
    

    
    public function slideUnpublished($id){

 $slider=slider::find($id);
 $slider->status=2;
 $slider->save();
 return back();
}

public function slidePublished($id){

 $slider=slider::find($id);
 $slider->status=1;
 $slider->save();
 return back();
}

    

   
}
