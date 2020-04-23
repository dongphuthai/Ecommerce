<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriesController extends Controller
{
    public function elementProduct($categories,$slug){
        $products=array();
        foreach($categories as $key => $category){
            $pdts=Product::orderBy('price','asc')->where('category_id',$category->id)->get();
            foreach($pdts as $pdt){
                $pdt=array($pdt);
                $products=array_merge_recursive($pdt,$products);
            }        
        } 
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage=15;
        $currentItems = array_slice($products, $perPage * ($currentPage - 1), $perPage);
        $products= new LengthAwarePaginator($currentItems,count($products),$perPage,$currentPage);
        $products->withPath('the-loai/'.$slug);
        return $products;
    }
    public function show($slug1,$slug2){
        $sliders = Slider::orderBy('priority', 'asc')->get();
        $id_child=Category::where('slug',$slug2)->first()->id;
        $products=Product::orderBy('id','desc')->where('category_id',$id_child)->get();
        $id=Category::where('slug',$slug1)->first()->id; 
        $setup=1;
        return view('frontend.pages.categories.show_price',compact('slug1','slug2','sliders','products','id','id_child','setup'));
    }

    public function showParent($slug){       
        $sliders = Slider::orderBy('priority', 'asc')->get();
        $id=Category::where('slug',$slug)->first()->id;
        $categories=Category::where('parent_id',$id)->get();       
        $products=$this->elementProduct($categories,$slug);
        $slug1=$slug;
        if(!is_null($products)){
            return view('frontend.pages.categories.showParent',compact('products','sliders','id','slug1'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    /*Price Parent*/
    public function showPrice2($slug1){
        $id=Category::where('slug',$slug1)->first()->id;
        $categories=Category::where('parent_id',$id)->get();
        $price=1;   
        if(!is_null($categories)){
            return view('frontend.pages.categories.show_price',compact('slug1','categories','id','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    public function showPrice24($slug1){
        $id=Category::where('slug',$slug1)->first()->id;
        $categories=Category::where('parent_id',$id)->get();  
        $price=2;    
        if(!is_null($categories)){
            return view('frontend.pages.categories.show_price',compact('slug1','categories','id','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    public function showPrice47($slug1){
        $id=Category::where('slug',$slug1)->first()->id;
        $categories=Category::where('parent_id',$id)->get();
        $price=3;     
        if(!is_null($categories)){
            return view('frontend.pages.categories.show_price',compact('slug1','categories','id','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    public function showPrice713($slug1){
        $id=Category::where('slug',$slug1)->first()->id;
        $categories=Category::where('parent_id',$id)->get(); 
        $price=4;
        if(!is_null($categories)){
            return view('frontend.pages.categories.show_price',compact('slug1','categories','id','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    public function showPrice13($slug1){
        $id=Category::where('slug',$slug1)->first()->id;
        $categories=Category::where('parent_id',$id)->get();
        $price=5;
        if(!is_null($categories)){
            return view('frontend.pages.categories.show_price',compact('slug1','categories','id','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    /*Price Child*/
    public function show2($slug1,$slug2){ 
        $id=Category::where('slug',$slug2)->first()->id;  
        $products=Product::where('category_id',$id)->where('price','<','2000000')->get();
        $id_child=$id;
        $id=Category::where('slug',$slug1)->first()->id; 
        $price=1;        
        if(!is_null($products)){
            return view('frontend.pages.categories.show_price',compact('slug1','slug2','products','id','id_child','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    public function show24($slug1,$slug2){ 
        $id=Category::where('slug',$slug2)->first()->id;    
        $products=Product::where('category_id',$id)->where('price','>=','2000000')->where('price','<','4000000')->get();
        $id_child=$id;
        $id=Category::where('slug',$slug1)->first()->id;
        $price=2;          
        if(!is_null($products)){
            return view('frontend.pages.categories.show_price',compact('slug1','slug2','products','id','id_child','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    public function show47($slug1,$slug2){ 
        $id=Category::where('slug',$slug2)->first()->id;   
        $products=Product::where('category_id',$id)->where('price','>=','4000000')->where('price','<','7000000')->get();
        $id_child=$id;
        $id=Category::where('slug',$slug1)->first()->id; 
        $price=3;        
        if(!is_null($products)){
            return view('frontend.pages.categories.show_price',compact('slug1','slug2','products','id','id_child','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    public function show713($slug1,$slug2){ 
        $id=Category::where('slug',$slug2)->first()->id;    
        $products=Product::where('category_id',$id)->where('price','>=','7000000')->where('price','<','13000000')->get();
        $id_child=$id;
        $id=Category::where('slug',$slug1)->first()->id; 
        $price=4;         
        if(!is_null($products)){
            return view('frontend.pages.categories.show_price',compact('slug1','slug2','products','id','id_child','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
    public function show13($slug1,$slug2){ 
        $id=Category::where('slug',$slug2)->first()->id;    
        $products=Product::where('category_id',$id)->where('price','>','13000000')->get();
        $id_child=$id;
        $id=Category::where('slug',$slug1)->first()->id;
        $price=5;
        if(!is_null($products)){
            return view('frontend.pages.categories.show_price',compact('slug1','slug2','products','id','id_child','price'));
        }else{
            session()->flash('errors','Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
}
