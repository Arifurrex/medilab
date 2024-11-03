<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Division;
use App\Models\District;

class DivisionsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index(){
    $divisions =Division::orderBy('piority','asc')->get();
    return view('backend.pages.divisions.index',compact('divisions'));
  }

  public function create(){
    
    
    return view('backend.pages.divisions.create');
  }


  public function store(Request $request)
  {
    $this->validate($request,
     [
       'name'        => 'required',
       'piority'     => 'required',
     ],
     [
       'name.required' => 'please provide the division name',
       'piority.required' => 'please provide the division piority',

     ]);

    $division= new division();
    $division->name=$request->name;
    $division->piority=$request->piority;


    $division->save();


    Session()->flash('sucess','A new division has added successfully');
    return redirect()->route('admin.divisions');
  }


  public function edit($id){


    $division= Division::find($id);
    if(!is_null($division))
    {
      return view('backend/pages/divisions/edit',compact('division'));

    }else{
     return redirect()->route('admin.divisions') ;
   }
 }


 public function update(Request $request,$id){
   $this->validate($request,
     [
       'name'        => 'required',
       'piority'     => 'required',
     ],
     [
       'name.required' => 'please provde the division name',
       'piority.required' => 'please provde the piority',

     ]);

   $division=Division::find($id);
   $division->name=$request->name;
   $division->piority=$request->piority;


   $division->save();


   Session()->flash('sucess','A new division has updated successfully');
   return redirect()->route('admin.divisions');
 }

 public function delete($id)
 {
  $division=Division::find($id);
  if(!is_null($division))
  {
          // delete all districts
    $districts=District::where('division_id',$division->id)->get();
    foreach ($districts as $district) {
     $district->delete();
    }
    
    $division->delete();
  }

  return back();
}


}
