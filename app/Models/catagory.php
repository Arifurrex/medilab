<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catagory extends Model
{
    public function parent()
    {
        return $this->belongsTo(catagory::class,'parent_id');
    }
    public function products(){
      return $this->hasMany(product::class);
    }
    public function brands(){
      return $this->hasMany(brand::class);
    }
}
