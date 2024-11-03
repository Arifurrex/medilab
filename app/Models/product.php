<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function images(){
//        return $this->hasMany(productImage);
//         return $this->hasMany('App\productImage');
        return $this->hasMany('App\Models\productImage');
    }
    public function catagory(){
      return $this->belongsTo(catagory::class);
    }
    public function brand(){
      return $this->belongsTo(brand::class);
    }
}
