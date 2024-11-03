<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\order;

class ordersController extends Controller
{
 public function __construct()
  {
    $this->middleware('auth:admin');
  }

 public function index(){
    $orders =order::orderBy('id','desc')->get();
    return view('backend.pages.orders.index',compact('orders'));
    }

  public function showw($id){
    $order =order::find($id);
    $order->is_seeen_by_admin=1;
    $order->save();
    return view('backend.pages.orders.show',compact('order'));
    }

 public function completed($id){
 	$order =order::find($id);
    if($order->is_completed){
    	$order->is_completed=0;
    }else{
         $order->is_completed=1;
    }
    $order->save();
    session()->flash('success','order completed status change');
    return back();
   
    }
    public function paid($id){
 	$order =order::find($id);
    if($order->is_paid){
    	$order->is_paid=0;
    }else{
         $order->is_paid=1;
    }
    $order->save();
    session()->flash('success','order paid status change');
    return back();
   
    }
 
    
}
