<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\District;
use App\Models\Division;

class DistrictsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

    public function index()
    {

    $districts =district::orderBy('name','asc')->get();
    return view('backend.pages.districts.index',compact('districts'));
    }

    public function create()
    {
        $divisions =division::orderBy('piority','asc')->get();

        return view('backend.pages.districts.create',compact('divisions'));
    }


    public function store(Request $request)
    {
        $this->validate($request,
           [
     'name'        => 'required',
     'division_id'     => 'required',
           ],
       [
     'name.required' => 'please provide the district name',
     'piority.division_id' => 'please provide the division id for district',

       ]);

       $district= new district();
       $district->name=$request->name;
       $district->division_id=$request->division_id;


       $district->save();


       Session()->flash('sucess','A new district has added successfully');
       return redirect()->route('admin.districts');
    }


    public function edit($id){
       

        $divisions =Division::orderBy('piority','asc')->get();
        $district= district::find($id);
        if(!is_null($district))
            {
            return view('backend/pages/districts/edit',compact('district','divisions'));

        }else{
           return redirect()->route('admin.districts') ;
        }
    }


    public function update(Request $request,$id){
         $this->validate($request,
           [
     'name'        => 'required',
     'division_id'     => 'required',
           ],
       [
     'name.required' => 'please provde the district name',
     'division_id.required' => 'please provde the division id',

       ]);

       $district=district::find($id);
       $district->name=$request->name;
       $district->division_id=$request->division_id;


       $district->save();


       Session()->flash('sucess','A new district has updated successfully');
       return redirect()->route('admin.districts');
    }

      public function delete($id)
            {
    $district=district::find($id);
     if(!is_null($district))
         {

         $district->delete();
         }

         return back();
     }


}
