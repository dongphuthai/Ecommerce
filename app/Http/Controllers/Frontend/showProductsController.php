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
use DateTime;
use Carbon\Carbon;
use \willvincent\Rateable\Rating;

class showProductsController extends Controller
{
/*PRODUCT AJAX*/
    public function allProduct(){
	  	$products = Product::orderBy('price', 'desc')->paginate(15);
	  	return view('frontend.pages.products.partials.all',compact('products'))->render();
	}
/*PARENT-CHILD PRRODUCT AJAX*/
	public function parentProduct($id){
	  	$products=Product::orderBy('id','desc')->where('category_id',$id)->get();
	  	$id_child=$id;
	  	$id=Category::find($id)->parent_id;  
	  	return view('frontend.pages.categories.price.all_products_child',compact('products','id','id_child'))->render();
	}
	public function parentslugProduct($slug){
  		$id=Category::where('slug',$slug)->first()->id;
	  	$categories=Category::where('parent_id',$id)->get();
	  	$slug1=$slug;
	  	if(!is_null($categories)){
	    	return view('frontend.pages.categories.price.all_products_parent',compact('categories','id','slug1'));
	  	}
	}
	public function childProduct($slug){
	  	$category=Category::where('slug',$slug)->first();
	  	$products=Product::orderBy('id','desc')->where('category_id',$category->id)->get();
	  	$id_child=$category->id;
	  	$id=$category->parent->id;  
	  	return view('frontend.pages.categories.price.all_products_child',compact('products','id','id_child'))->render();
	}
	public function sidabarChild($id){
  		return view('frontend.partials.product-sidebar-child-ajax',compact('id'));
	}
/*SHOW NEW PRODUCTS*/
	public function newChild($slug1,$slug2){
		$id_child=Category::where('slug',$slug2)->first()->id;
		$id=Category::where('slug',$slug1)->first()->id;
		$date=Carbon::now()->getTimestamp();
		$products=Product::orderBy('id','desc')->where('category_id',$id_child)->get();
		return view('frontend.pages.categories.price.all_products_child',compact('products','id','id_child','date'));		
	}
	public function newParent($slug){
		$id=Category::where('slug',$slug)->first()->id;
	  	$categories=Category::where('parent_id',$id)->get();
	  	$slug1=$slug;
	  	$date=Carbon::now()->getTimestamp();
	  	if(!is_null($categories)){
	    	return view('frontend.pages.categories.price.all_products_parent',compact('categories','id','slug1','date'));
	  	}
	}

/*SHOW DISCOUNT PRODUCTS*/
	public function giamgiaChild($slug1,$slug2){
		$id_child=Category::where('slug',$slug2)->first()->id;
		$id=Category::where('slug',$slug1)->first()->id;
		$discount=1;		
		$products=Product::orderBy('id','desc')->where('category_id',$id_child)->get();
		return view('frontend.pages.categories.price.all_products_child',compact('products','id','id_child','discount'));		
	}
	public function giamgiaParent($slug){
		$id=Category::where('slug',$slug)->first()->id;
	  	$categories=Category::where('parent_id',$id)->get();
	  	$slug1=$slug;
	  	$discount=1;
	  	if(!is_null($categories)){
	    	return view('frontend.pages.categories.price.all_products_parent',compact('categories','id','slug1','discount'));
	  	}
	}
}