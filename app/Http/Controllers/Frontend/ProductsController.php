<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Parameter;
use App\Models\Slider;
use App\Models\Cmtrate;
use Illuminate\Support\Str;

use Validator;
use Auth;

use \willvincent\Rateable\Rating;

class ProductsController extends Controller
{
    public function searchType(Request $request){
      $search=$request->search;
        if(!is_null($search)){
          $products = Product::where('title','like','%'.$search.'%')->get();
          return view('frontend.pages.products.search',compact('search','products'));
        }else{
          return back();
      }  
    }  
    public function index()
    {
      $sliders = Slider::orderBy('priority', 'asc')->get();
      $products = Product::orderBy('price', 'desc')->paginate(15);
      return view('frontend.pages.products.index',compact('sliders','products'));
    }
    public function show($slug){
    	$product=Product::where('slug',$slug)->first();
    	if(!is_null($product)){
        return view('frontend.pages.products.show',compact('product'));
    	}else{
    		return redirect()->route('products')->with('errors','Sorry !! There is no product by this URL...');
    	}
    }
    public function compareProduct($slug1,$slug2){
      $product=Product::where('slug',$slug1)->first();
      $pdt=Product::where('slug',$slug2)->first();
      return view('frontend.pages.products.compare',compact('product','pdt','slug1','slug2'));
    }
    
    public function review(Request $request){
      $rules = array(
        'rate'=>'required',
        'comment'=>'required|min:50',
      );
      $messages = array(
        'rate.required' => 'Bạn cần phải chọn số sao đánh giá.',
        'comment.required' => 'Bạn cần phải để lại bình luận.',
        'comment.min' => 'Bình luận phải chứa ít nhất 50 ký tự.',
      );
      $error = Validator::make($request->all(), $rules,$messages);
      if($error->fails()){
        return response()->json(['errors' => $error->errors()->all()]);
      }

      if(Auth::check()){
        $product=Product::find($request->id);
        $rate=\willvincent\Rateable\Rating::where('user_id',Auth::id())
        ->where('rateable_id',$product->id)->first();
        if(!is_null($rate)){  
          $cmtrates=Cmtrate::where('rating_id',$rate->id)->get(); 
          if(!is_null($cmtrates)){
            foreach($cmtrates as $cmtrate){
              $cmtrate->delete();
            }
          }     
          $rate->rating=$request->rate;
          $rate->comment=$request->comment;
          $product->ratings()->save($rate);
        }else{
          $rating = new Rating;
          $rating->rating = $request->rate;        
          $rating->comment=$request->comment;
          $rating->user_id = Auth::user()->id;
          $rating->rateable_id=$request->id;
          $product->ratings()->save($rating);
          }
      }else{
        return response()->json(['errors'=>'Bạn cần đăng nhập để đánh giá sản phẩm này.']);
      }
      $countRate=\willvincent\Rateable\Rating::where('rateable_id',$product->id)->count();
      return response()->json(['count'=>$countRate,'success'=>'Cảm ơn bạn đã đánh giá sản phẩm này']);
    }

    

  public function price2(){
      $sliders = Slider::orderBy('priority', 'asc')->get();
      $products=Product::where('price','<','2000000')->get();
      return view('frontend.pages.products.index_price',compact('sliders','products')); 
  }
  public function price24(){
      $sliders = Slider::orderBy('priority', 'asc')->get();
      $products=Product::where('price','>=','2000000')->where('price','<','4000000')->get();
      return view('frontend.pages.products.index_price',compact('sliders','products')); 
  }
  public function price47(){
      $sliders = Slider::orderBy('priority', 'asc')->get();
      $products=Product::where('price','>=','4000000')->where('price','<','7000000')->get();
      return view('frontend.pages.products.index_price',compact('sliders','products')); 
  }
  public function price713(){
      $sliders = Slider::orderBy('priority', 'asc')->get();
      $products=Product::where('price','>=','7000000')->where('price','<','13000000')->get();
      return view('frontend.pages.products.index_price',compact('sliders','products')); 
  }
  public function price13(){
      $sliders = Slider::orderBy('priority', 'asc')->get();
      $products=Product::where('price','>','13000000')->get();
      return view('frontend.pages.products.index_price',compact('sliders','products')); 
  }

}
