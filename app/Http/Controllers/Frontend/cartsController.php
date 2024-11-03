<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\order;

use Auth;

class cartsController extends Controller
{
    public function index()
    {
       
        // return view('frontend.pages.carts');
         return view('Frontend/pages/carts');
     
    }


    
    public function store(Request $request)
    {

        $this->validate($request,[
         'product_id'=>'required'],
     ['product_id.required'=>'please give a product']);

        if (Auth::check()){
            $cart=cart::where('user_id',Auth::id())      
        ->where('product_id',$request->product_id)
        ->first();

        }else{
            $cart=cart::where('ip_address',request()->ip())      
        ->where('product_id',$request->product_id)
        ->first();

        }


        
        if(!is_null ($cart)){
            $cart->increment('product_quantity');

        }else{


            $cart = new cart();
            if (Auth::check()){

             $cart->user_id=Auth::id();
         }
         $cart->ip_address=request()->ip();
         $cart->product_id=$request->product_id;
         $cart->save();


     }       



     session()->flash('success','success!! product has successfully added in cart!!');
     return back();



 }

 public function update(Request $request,$id)
 {
    $cart=cart::find($id);
    if(!is_null($cart)){
        $cart->product_quantity=$request->product_quantity;
        $cart->save();
    }else{
        return redirect()->route('carts');
    }

   
    session()->flash('success','success!! cart has successfully updated!!');
    return back();
}
public function destroy($id)
{
    $cart=cart::find($id);
    if(!is_null($cart)){
     $cart->delete();  

 }else{
    return redirect()->route('carts');
}
session()->flash('success','success!! cart has successfully deleted!!');
return back();
}

}
