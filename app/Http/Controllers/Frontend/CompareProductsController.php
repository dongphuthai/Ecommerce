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

class CompareProductsController extends Controller
{
/*PRODUCT COMPARE SHOW AJAX*/
    public function compareShowProduct($slug){
	  	$product=Product::where('slug',$slug)->first();
	  	$parent_id=$product->category->parent->id;
	  	$categories=Category::where('parent_id',$parent_id)->get();
	  	$price=$product->price;
	  	$id=$product->id;
	  	return view('frontend.pages.products.compare.all_products_compare',compact('price','categories','id','product'));
	}
	public function compareCard($slug){
	  	$pdt=Product::where('slug',$slug)->first();
	  	return view('frontend.pages.products.compare.card-product-compare',compact('pdt'));
	}
	public function compareTable($slug){
	  	$pdt=Product::where('slug',$slug)->first();
	  	$parent_id=$pdt->category->parent->id;
	  	if($parent_id==32||$parent_id==33){
	    $para=$pdt->para;
	  	}elseif ($parent_id==29) {
	    $para=$pdt->paralaptop;
	  	}  
	  	return response()->json(['para'=>$para,'pdt'=>$pdt,'parent_id'=>$parent_id]);
	}
	public function compareButton($slug){
	  	$pdt=Product::where('slug',$slug)->first();
	  	return view('frontend.pages.products.compare.cart-button-compare',compact('pdt'));
	}
}
