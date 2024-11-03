<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use App\slider;


class pagescontroller extends Controller
{
  public function index()
  {
    $slider=slider::where('status',1)->get(); 
    
    $products=product::orderBy('id','desc')
    ->get();
    $productone=product::orderBy('id','desc')
    ->where('catagory_id', '81')
    ->orWhere('catagory_id', '82')
    ->orWhere('catagory_id', '83')
    ->orWhere('catagory_id', '84')
    ->orWhere('catagory_id', '85')
    ->orwhere('catagory_id', '86')
    ->orwhere('catagory_id', '87')
    ->orWhere('catagory_id', '88')
    ->orWhere('catagory_id', '89')
    ->orWhere('catagory_id', '90')
    ->get();
     $producttwo=product::orderBy('id','desc')
    ->where('catagory_id', '92')
    ->orWhere('catagory_id', '93')
    ->orWhere('catagory_id', '94')
    ->orWhere('catagory_id', '95')
    ->get();
    
    $product_three=product::orderBy('id','desc')
    ->where('catagory_id', '74')
    ->orWhere('catagory_id', '96')
    ->orWhere('catagory_id', '97')
    ->orWhere('catagory_id', '98')
    ->orWhere('catagory_id', '99')
    ->orWhere('catagory_id', '100')
    ->orWhere('catagory_id', '101')
    ->orWhere('catagory_id', '102')
    ->get();
    
    $product_four=product::orderBy('id','desc')
    ->where('catagory_id', '103')
    ->orWhere('catagory_id', '104')
    ->orWhere('catagory_id', '105')
    ->orWhere('catagory_id', '106')
    ->get();
    
    $product_covid=product::orderBy('id','desc')
    ->where('catagory_id', '127')
    ->orWhere('catagory_id', '128')
    ->orWhere('catagory_id', '129')
    ->orWhere('catagory_id', '130')
    ->orWhere('catagory_id', '131')
    ->orWhere('catagory_id', '132')
    ->orWhere('catagory_id', '133')
    ->orWhere('catagory_id', '134')
    ->get();
    
    $product_Hospital_Furniture=product::orderBy('id','desc')
    ->where('catagory_id', '79')
    ->orWhere('catagory_id', '136')
    
    ->get();

    

    return view('Frontend/pages/index')
    ->with('slider',$slider)
    ->with('products', $products)
    ->with('productone', $productone)
    ->with('producttwo', $producttwo)
    ->with('product_three', $product_three)
    ->with('product_four', $product_four)
    ->with('product_covid', $product_covid)
    ->with('product_Hospital_Furniture',  $product_Hospital_Furniture);
    
    
  }
  public function contact()
  {
    return view('Frontend/pages/contact');
  }
  public function search(Request $request)
  {
    $search = $request->search;
    
    $products = product::orWhere('title', 'like', '%'.$search.'%')
    -> orWhere('description','like','%'.$search.'%')
    -> orWhere('slug','like','%'.$search.'%')
    -> orWhere('price','like','%'.$search.'%')
    -> orWhere('quantity','like','%'.$search.'%')
    -> orderBy('id','desc')
    ->paginate(9);
    return view('Frontend/pages/product/search',compact('search', 'products'));
  }
  
}
