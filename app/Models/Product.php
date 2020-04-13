<?php

namespace App\Models;
use willvincent\Rateable\Rateable;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use Rateable;
    // public function ratings(){
    //     return $this->hasMany(Rateable::class);
    // }
    public function images(){
    	return $this->hasMany(ProductImage::class);
    }
    public function category(){
    	return $this->belongsTo(Category::class);
    }
     public function brand(){
    	return $this->belongsTo(Brand::class);
    }
    public function para(){
        return $this->hasOne(Parameter::class);
    }

}
