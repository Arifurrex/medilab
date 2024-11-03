<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\brand;
use Image;

class BrandsController extends Controller
{
public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
    $brands =brand::orderBy('id','desc')->get();
    return view('backend.pages.brands.index',compact('brands'));
    }

    public function create(){

        return view('backend.pages.brands.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,
           [
     'name'        => 'required',
     'image'       => 'nullable|image',
           ],
       [
     'name.required' => 'please provde the brand name',
     'image.image' => 'please provde the image',

       ]);

       $brand= new brand();
       $brand->name=$request->name;
       $brand->description=$request->decription;


      if($request ->image){


     $image=$request->file('image');
     $img=time().'.'.$image->getClientOriginalExtension();
     $location='images/brands/'.$img;

     Image::make($image)->save($location);
     $brand->image=$img;

      }
      $brand->save();


       Session()->flash('sucess','A new brand has added successfully');
       return redirect()->route('admin.brands');
    }


    public function edit($id){


        $brand= brand::find($id);
        if(!is_null($brand))
            {
            return view('backend/pages/brands/edit',compact('brand'));

        }else{
           return redirect()->route('admin.brands') ;
        }
    }

    public function update(Request $request,$id){
         $this->validate($request,
           [
     'name'        => 'required',
     'image'       => 'nullable|image',
           ],
       [
     'name.required' => 'please provde the brand name',
     'image.image' => 'please provde the image',

       ]);

       $brand=brand::find($id);
       $brand->name=$request->name;
       $brand->description=$request->decription;



      if($request ->image){


     $image=$request->file('image');
     $img=time().'.'.$image->getClientOriginalExtension();
     $location='images/brands/'.$img;

     Image::make($image)->save($location);
     $brand->image=$img;

      }
       $brand->save();


       Session()->flash('sucess','A new brand has updated successfully');
       return redirect()->route('admin.brands');
    }

      public function delete($id)
            {
    $brand=brand::find($id);
     if(!is_null($brand))
         {

         $brand->delete();
         }

         return back();
     }



















}
