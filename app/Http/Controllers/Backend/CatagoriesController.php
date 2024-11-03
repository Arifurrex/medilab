<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\catagory;
use Image;

class CatagoriesController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
    public function index(){
    $catagories =catagory::orderBy('id','desc')->get();
    return view('backend.pages.catagories.index',compact('catagories'));
    }
    
    public function create(){
        $main_catagories = catagory::orderBy('name','desc')->where('parent_id',NULL)->get();
        return view('backend.pages.catagories.create',compact('main_catagories'));
    }
    
    
    public function store(Request $request)
    {  
        $this->validate($request,
           [
     'name'        => 'required',
     'image'       => 'nullable|image',
           ],
       [
     'name.required' => 'please provde the catagory name',
     'image.image' => 'please provde the image',
           
       ]);
         
       $catagory= new catagory(); 
       $catagory->name=$request->name; 
       $catagory->description=$request->decription; 
       $catagory->parent_id=$request->parent_id; 
       
//       if(count($request ->image)>0){
//       
//             
//      $image=$request->file('image');
//      $img=time().'.'.$image->getClientOriginalExtension();
//      $location= public_path('images/catagories/'.$img);
//      
//      Image::make($image)->save($location);
//      $catagory->image=$img;  
//      
//       }
       $catagory->save();
       
       
       Session()->flash('success','A new catagory has added successfully');
       return redirect()->route('admin.catagories');
    }
    
    
    public function edit($id){
        
        $main_catagories = catagory::orderBy('name','desc')->where('parent_id',NULL)->get();
        $catagory= catagory::find($id);
        if(!is_null($catagory))
            {
            return view('backend/pages/catagories/edit',compact('catagory','main_catagories'));
            
        }else{
           return redirect()->route('admin.catagories') ;
        }
    }
    
    public function update(Request $request,$id){
         $this->validate($request,
           [
     'name'        => 'required',
     'image'       => 'nullable|image',
           ],
       [
     'name.required' => 'please provde the catagory name',
     'image.image' => 'please provde the image',
           
       ]);
         
       $catagory=catagory::find($id); 
       $catagory->name=$request->name; 
       $catagory->description=$request->decription; 
       $catagory->parent_id=$request->parent_id; 
       
       
//       if(count($request ->image)>0){
//       
//             
//      $image=$request->file('image');
//      $img=time().'.'.$image->getClientOriginalExtension();
//      $location= public_path('images/catagories/'.$img);
//      
//      Image::make($image)->save($location);
//      $catagory->image=$img;  
//      
//       }
       $catagory->save();
       
       
       Session()->flash('success','A new catagory has updated successfully');
       return redirect()->route('admin.catagories');
    }
    
      public function delete($id)
            {
    $catagory=catagory::find($id);
     if(!is_null($catagory))
         {
         if( $catagory -> parent_id == NULL)
             {
            
    $sub_catagories = catagory::orderBy('name','desc')->where('parent_id',$catagory->id)->get();
     foreach ($sub_catagories as $sub){
         $sub->delete();
         }
        
         }
         
         
         $catagory->delete();
         }
         
         return back();
     }
 
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
  

