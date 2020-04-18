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
    public function paralaptop(){
        return $this->hasOne(Paralaptop::class);
    }
    public static function count_product($parent_id){
        $count=0;
        $categories=Category::where('parent_id',$parent_id)->get();
        foreach($categories as $category){
            $products=Product::where('category_id',$category->id)->get();
            $count+=count($products);
        }
          return $count;
    }

}
