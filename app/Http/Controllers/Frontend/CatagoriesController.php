<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\catagory;

class CatagoriesController extends Controller
{

    public function index()
    {

    }
    public function show($id)
    {
      $catagory=catagory::find($id);

      if (! is_null($catagory)){
        return view('Frontend.pages.catagories.show',compact('catagory'));
      }else{
        session()->flash('error','sorry!!There is no catagory by this id');
        return redirect('/');
      }

    }



}
