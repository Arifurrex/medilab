<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class cart extends Model
{
    public $fillable=[
    	'user_id',
        'ip_address',
        'product_id',
        'product_quantity',
        'order_id',



    ];
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function order(){
    	return $this->belongsTo(order::class);
    }

    public function product(){
    	return $this->belongsTo(product::class);
    }

    // total cart
    public static function totalCarts()
    {
        if (Auth::check()) {
           $carts=cart::where('user_id',Auth::id())
           ->where('order_id', NULL)
           ->get();
       }else{
          $carts = cart::where('ip_address',request()->ip())
          ->where('order_id', NULL)
          ->get();
      }


      return $carts;
  } 

// total item
  public static function totalItems()
  {
    if (Auth::check()) {
       $carts=cart::where('user_id',Auth::id())
       ->where('order_id', NULL)
       ->get();
   }else{
      $carts=cart::where('ip_address',request()->ip())
      ->where('order_id',NULL)
      ->get();
  }

  $total_item=0;

  foreach ($carts as $cart) {
      $total_item += $cart->product_quantity;
  }
  return $total_item;
}

}
