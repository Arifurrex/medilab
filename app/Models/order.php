<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $fillable =[
  'user_id',
  'payment_id',
  'ip_address',
  'phone_no',
  'shipping_address',
  'name',
  'email',
  'massage',
  'is_paid',
  'is_completed',
  'is_seeen_by_admin'

    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
  
    public function carts(){
    	return $this->hasMany(cart::class);
    }
    public function payment(){
      return $this->belongsTo(payment::class);
    }
}
