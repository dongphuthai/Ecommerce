<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Parameter;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Cmtrate;
use Validator;
use Auth;
use \willvincent\Rateable\Rating;

class ShowpriceController extends Controller
{
/*LẤY SẢN PHẨM THỂ LOẠI CON THEO GIÁ*/
  	public function priceChild2($slug1,$slug2){
		$id=Category::where('slug',$slug2)->first()->id;  
		$products=Product::where('category_id',$id)->where('price','<','2000000')->get();
		$id_child=$id;
		$id=Category::where('slug',$slug1)->first()->id; 
		$price=1; 
		if(!is_null($products)){
			return view('frontend.pages.categories.price.all_products_price_child',compact('slug1','slug2','products','id','id_child','price'));
	  	}
	}
	public function priceChild24($slug1,$slug2){
	  	$id=Category::where('slug',$slug2)->first()->id;  
	  	$products=Product::where('category_id',$id)->where('price','>=','2000000')->where('price','<','4000000')->get();
	  	$id_child=$id;
	  	$id=Category::where('slug',$slug1)->first()->id; 
	  	$price=2; 
	  	if(!is_null($products)){
	    	return view('frontend.pages.categories.price.all_products_price_child',compact('slug1','slug2','products','id','id_child','price'));
	  	}
	}
	public function priceChild47($slug1,$slug2){
	  	$id=Category::where('slug',$slug2)->first()->id;  
	  	$products=Product::where('category_id',$id)->where('price','>=','4000000')->where('price','<','7000000')->get();
	  	$id_child=$id;
	  	$id=Category::where('slug',$slug1)->first()->id; 
	  	$price=3; 
	  	if(!is_null($products)){
	    	return view('frontend.pages.categories.price.all_products_price_child',compact('slug1','slug2','products','id','id_child','price'));
	  	}
	}
	public function priceChild713($slug1,$slug2){
	  	$id=Category::where('slug',$slug2)->first()->id;  
	  	$products=Product::where('category_id',$id)->where('price','>=','7000000')->where('price','<','13000000')->get();
	  	$id_child=$id;
	  	$id=Category::where('slug',$slug1)->first()->id; 
	  	$price=4; 
	  	if(!is_null($products)){
	    	return view('frontend.pages.categories.price.all_products_price_child',compact('slug1','slug2','products','id','id_child','price'));
	  	}
	}
	public function priceChild13($slug1,$slug2){
	  	$id=Category::where('slug',$slug2)->first()->id;  
	  	$products=Product::where('category_id',$id)->where('price','>','13000000')->get();
	  	$id_child=$id;
	  	$id=Category::where('slug',$slug1)->first()->id; 
	  	$price=5; 
	  	if(!is_null($products)){
	    	return view('frontend.pages.categories.price.all_products_price_child',compact('slug1','slug2','products','id','id_child','price'));
	  	}
	}
/*LẤY SẢN PHẨM THỂ LOẠI CHA THEO GIÁ*/
	public function priceParent2($slug1){
	  	$id=Category::where('slug',$slug1)->first()->id;
	  	$price=1;
	  	$categories=Category::where('parent_id',$id)->get();     
	  	if(!is_null($categories)){
	    	return view('frontend.pages.categories.price.all_products_price_parent',compact('slug1','categories','id','price'));
	  	}
	}
	public function priceParent24($slug1){
	  	$id=Category::where('slug',$slug1)->first()->id;
	  	$price=2;
	  	$categories=Category::where('parent_id',$id)->get();     
	  	if(!is_null($categories)){
	    	return view('frontend.pages.categories.price.all_products_price_parent',compact('slug1','categories','id','price'));
	  	}
	}
	public function priceParent47($slug1){
	  	$id=Category::where('slug',$slug1)->first()->id;
	  	$price=3;
	  	$categories=Category::where('parent_id',$id)->get();     
	  	if(!is_null($categories)){
	    	return view('frontend.pages.categories.price.all_products_price_parent',compact('slug1','categories','id','price'));
	  	}
	}
	public function priceParent713($slug1){
	  	$id=Category::where('slug',$slug1)->first()->id;
	  	$price=4;
	  	$categories=Category::where('parent_id',$id)->get();     
	  	if(!is_null($categories)){
	    	return view('frontend.pages.categories.price.all_products_price_parent',compact('slug1','categories','id','price'));
	  	}
	}
	public function priceParent13($slug1){
	  	$id=Category::where('slug',$slug1)->first()->id;
	  	$price=5;
	  	$categories=Category::where('parent_id',$id)->get();     
	  	if(!is_null($categories)){
	    	return view('frontend.pages.categories.price.all_products_price_parent',compact('slug1','categories','id','price'));
	  	}
	}
/*SẮP XẾP THEO GIÁ THỂ LOẠI CHA THEO GIÁ*/
	public function priceParentthap($slug){
	  	$id=Category::where('slug',$slug)->first()->id;
	  	$categories=Category::where('parent_id',$id)->get();    
	  	$products=array();
	  	foreach($categories as $key => $category){
	    	$pdts=Product::orderBy('price','asc')->where('category_id',$category->id)->get();
	    	foreach($pdts as $pdt){
	      		$pdt=array($pdt);
	      		$products=array_merge_recursive($pdt,$products);
	    	}        
	  	} 
	  	usort($products, function($a, $b){
	    	return $a->price>$b->price;
	  	});
	  	$thap=1;
	  	return view('frontend.pages.categories.price.all_products_usort',compact('products','id','thap'));    
	}
	public function priceParentcao($slug){
	  	$id=Category::where('slug',$slug)->first()->id;
	  	$categories=Category::where('parent_id',$id)->get();    
	  	$products=array();
	  	foreach($categories as $key => $category){
	    	$pdts=Product::orderBy('price','asc')->where('category_id',$category->id)->get();
	    	foreach($pdts as $pdt){
	      		$pdt=array($pdt);
	      		$products=array_merge_recursive($pdt,$products);
	    	}        
	  	} 
	  	usort($products, function($a, $b){
	    	return $a->price<$b->price;
	  	});
	  	$cao=1;
	  	return view('frontend.pages.categories.price.all_products_usort',compact('products','id','cao'));    
	}
/*SẮP XẾP SẢN PHẨM THỂ LOẠI CON THEO GIÁ*/
	public function priceChildthap($slug){
	  	$category=Category::where('slug',$slug)->first();
	  	$products=Product::orderBy('price','asc')->where('category_id',$category->id)->get();
	  	$id_child=$category->id;
	  	$id=$category->parent->id;
	  	$thap=1;  
	  	return view('frontend.pages.categories.price.all_products_child',compact('products','id','id_child','thap'))->render();
	}
	public function priceChildcao($slug){
	  	$category=Category::where('slug',$slug)->first();
	  	$products=Product::orderBy('price','desc')->where('category_id',$category->id)->get();
	  	$id_child=$category->id;
	  	$id=$category->parent->id;  
	  	$cao=1;
	  	return view('frontend.pages.categories.price.all_products_child',compact('products','id','id_child','cao'))->render();
	}
/*LINK GIÁ SẢN PHẨM*/
	public function linkParent($slug1){
	  	return view('frontend.pages.categories.price.link_price_parent_ajax',compact('slug1'));
	}
	public function linkChild($slug){
	  	$slug1=Category::where('slug',$slug)->first()->parent->slug;
	  	$slug2=$slug;
	  	$link_child=1;
	  	return view('frontend.pages.categories.price.link_price_child_ajax',compact('slug1','slug2','link_child'));
	}
/*SẮP XẾP THEO GIÁ CỦA GIÁ THỂ LOẠI CON*/
	public function thapChild13($slug1,$slug2){
		$id=Category::where('slug',$slug2)->first()->id;  
	  	$products=Product::orderBy('price','asc')->where('category_id',$id)->where('price','>','13000000')->get();
	  	$id_child=$id;
	  	$id=Category::where('slug',$slug1)->first()->id; 
	  	$price=5; 
	  	$thap=1;
	  	if(!is_null($products)){
	    	return view('frontend.pages.categories.price.all_products_price_child',compact('slug1','slug2','products','id','id_child','price','thap'));
	  	}
	}
	public function caoChild13($slug1,$slug2){
		$id=Category::where('slug',$slug2)->first()->id;  
	  	$products=Product::orderBy('price','desc')->where('category_id',$id)->where('price','>','13000000')->get();
	  	$id_child=$id;
	  	$id=Category::where('slug',$slug1)->first()->id; 
	  	$price=5; 
	  	$cao=1;
	  	if(!is_null($products)){
	    	return view('frontend.pages.categories.price.all_products_price_child',compact('slug1','slug2','products','id','id_child','price','cao'));
	  	}
	}
}
