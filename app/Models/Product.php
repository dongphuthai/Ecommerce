<?php

namespace App\Models;
use willvincent\Rateable\Rateable;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use Rateable;
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
            $count_child=$category->products()->count();
            $count+=$count_child;
        }
          return $count;
    }
    public static function allParent($slug){
        $products=array();
        $parent_id=Category::where('slug',$slug)->first()->id;
        $categories=Category::where('parent_id',$parent_id)->get();
        foreach($categories as $category){
            $pdts=Product::orderBy('price','asc')->where('category_id',$category->id)->get();

            foreach($pdts as $pdt){
                $pdt=array($pdt);
                $products=array_merge_recursive($pdt,$products);
            }        
        } 
        return $products;
    }

}
