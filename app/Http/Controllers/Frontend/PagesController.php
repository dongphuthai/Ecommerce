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

class PagesController extends Controller
{  
  public function rateShow($slug){
    $product=Product::where('slug',$slug)->first();
    return view('frontend.pages.products.rating.rating_show',compact('product','slug'));
  }
  public function rateComment(Request $request){
    $rules = array(
      'cmtrating'=>'required'
    );
    $messages = array(
      'cmtrating.required' => 'Bạn cần phải để lại bình luận.'
    );
    $error = Validator::make($request->all(), $rules,$messages);
    if($error->fails()){
        return response()->json(['errors' => $error->errors()->all()]);
    }

    if(Auth::check()){
      $comment=new Cmtrate();
      $comment->cmtrating=$request->cmtrating;
      $comment->rating_id=$request->rating_id;
      $comment->user_id=Auth::id();
      $comment->save();
      return view('frontend.pages.products.rating.rating_comment',compact('comment'));
    }else{
      return response()->json(['errors'=>'Bạn cần đăng nhập để thảo luận.']);
    }
  }
	public function index(){
    $sliders = Slider::orderBy('priority', 'asc')->get();
		$products = Product::orderBy('id', 'desc')->paginate(20);
    return view('frontend.pages.index', compact('products','sliders'));
	}
	public function contact(){
		return view('frontend.pages.contact');
	}
  
  public function search(Request $request){
    $search=$request->search;
    $products = Product::orderBy('price','desc')->where('title','like','%'.$search.'%')->get();  
    return response()->json($products);
  }

  public function searchCompare(Request $request,$slug){
    $search=$request->search;
    $parent_id = Product::where('slug',$slug)->first()->category->parent->id; 
    $id=Product::where('slug',$slug)->first()->id;
    $categories=Category::where('parent_id',$parent_id)->get();
    $products=array();
    foreach($categories as $key => $category){
      $pdts=Product::orderBy('price','desc')->where('id','<>',$id)->where('category_id',$category->id)->where('slug','like','%'.$search.'%')->get();     
      foreach($pdts as $pdt){
        $pdt=array($pdt);
        $products=array_merge_recursive($pdt,$products);
      }  
    }
    return $products;
  }

  public function showCompare($slug){
    $product=Product::where('slug',$slug)->first();
    $slug1=$slug;
    return view('frontend.pages.products.compare',compact('product','slug1'));
  }

    
}
