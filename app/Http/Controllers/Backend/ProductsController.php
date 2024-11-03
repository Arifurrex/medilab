<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\productImage;
use App\Models\product;
use Image;

class ProductsController extends Controller
{
    public function index()
    {
      $products=product::orderBy('id','desc')->get();
      return view('backend.pages.product.index')->with('products',$products);
    }

    public function create()
    {
      return view('backend.pages.product.create');
    }

    public function edit($id)
    {
      $product=product::find($id);
      return view('backend.pages.product.edit')->with('product',$product);
    }

    public function store(Request $request)
    {
      $request->validate([
     'title'           => 'required|max:150',
     'description'     => 'required',
      'price'           => 'required|numeric',
     'quantity'        => 'required|numeric',
     'catagory_id'     => 'required|numeric',
     'brand_id'        => 'required|numeric',

     ]);

      $product = new Product;

      $product->title = $request->title;
      $product->description = $request->description;
      $product->origin = $request->origin;
      $product->model = $request->model;
      $product->how_to_order = $request->how_to_order;
      $product->ask_for_price = $request->ask_for_price;
      $product->conditions= $request->conditions;
      $product->offer_price = $request->offer_price;
      $product->price = $request->price;
      $product->price_wth_comma = $request->price_wth_comma;
      $product->quantity = $request->quantity;

      $product->slug = str_slug($request->title);
      $product->catagory_id = $request->catagory_id;
      $product->brand_id = $request->brand_id ;
      $product->admin_id = 1;
      $product->save();


       if(count($request ->product_image)>0){
        $i=0;
           foreach ($request->product_image as $image){

//      $image=$request->file('product_image');
      $img=time().$i.'.'.$image->getClientOriginalExtension();
      $location='images/products/'.$img;

      Image::make($image)->save($location);

      $product_image=new productImage;
      $product_image->product_id=$product->id;
      $product_image->image=$img;
      $product_image->save();
      $i++;

           }
       }
     Session()->flash('success','A new product has added successfully');
      return redirect()->route('admin.product.create');
    }


    public function update(Request $request,$id)
    {
      $request->validate([
     'title'           => 'required|max:150',
     'description'     => 'required',
      'price'           => 'required|numeric',
     'quantity'        => 'required|numeric',
     'catagory_id'     => 'required|numeric',
     'brand_id'        => 'required|numeric',

     ]);

      $product = Product::find($id);

     $product->title = $request->title;
      $product->description = $request->description;
      $product->origin = $request->origin;
      $product->model = $request->model;
      $product->how_to_order = $request->how_to_order;
      $product->ask_for_price = $request->ask_for_price;
      $product->conditions= $request->conditions;
      $product->offer_price = $request->offer_price;
      $product->price = $request->price;
      $product->price_wth_comma = $request->price_wth_comma;
      $product->quantity = $request->quantity;

      $product->slug = str_slug($request->title);
      $product->catagory_id = $request->catagory_id;
      $product->brand_id = $request->brand_id ;
      $product->admin_id = 1;
      $product->save();

      return redirect()->route('admin.products');
    }

    public function delete($id)
            {
    $product=product::find($id);
     if(!is_null($product))
         {
         $product->delete();
         }
         // Delete all image
        foreach ($product->images as $img) {
          // Delete form public_path
          $file_name=$img->image;
          if(file_exists("images/products/".$file_name)){
            unlink("images/products/".$file_name);
          }
          $img->delete();
        }
        session()->flash('success','Product has successfully deleted!!');

         return back();
     }


}
