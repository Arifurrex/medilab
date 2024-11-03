<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Models\product;

class ProductController extends Controller
{
    public function index()
            {
         $products=product::orderBy('id','desc')->paginate(20);
          return view('Frontend/pages/product/index')->with('products', $products);
    }
    public function show($slug)
            {
         $product=product::where('slug',$slug)->first();
         if(!is_null($product)){
            //  return view('frontend.pages.product.show',compact('product'));
            return view('Frontend/pages/product/show')->with('product', $product);
         }else{
             session()->flash('errors','sorry !! There is no product by this url...');
             return redirect()->route('products');
         }
    }
}
