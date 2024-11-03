<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\payment;
use App\Models\order;
use App\Models\cart;
use Auth;

class checkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $payments=payment::orderBy('priority','asc')->get();
        return view('Frontend.pages.checkout',compact('payments'));


    } 

    public function store(Request $request)
    {   
        
$this -> validate($request, [
'name'=>'required',
'phone_no'=>'required',
'shipping_address'=>'required',
'payment_method_id'=>'required',

]);

 $order = new order();
// 
// check transaction id has given or nothing
if($request->payment_method_id != 'cash_in'){
    if($request->transaction_id== NULL || empty($request->transaction_id)){
        session()->flash('error','Please give transaction id for your payment');
    
    return back();
}

}

$order->name =$request->name;
$order ->email =$request->email;
$order->phone_no =$request->phone_no;
$order->shipping_address =$request->shipping_address;
$order->massage =$request->massage;
$order->ip_address =request()->ip();
$order->transaction_id =$request->transaction_id;
if(Auth::check()){
$order->user_id =Auth::id();
}
$order->payment_id=payment::where ('short_name',$request->payment_method_id)->first()->id;
$order->save();

foreach (cart::totalCarts() as $cart) {
    $cart->order_id=$order->id;
    $cart->save();
}
session()->flash('success','Your order has taken successfully!!Please wait admin will soon confirm it...');
return redirect()->route('index');
    }
} 