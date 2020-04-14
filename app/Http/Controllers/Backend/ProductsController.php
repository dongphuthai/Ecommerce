<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Parameter;
use App\Models\ProductImage;
use App\Models\Paralaptop;
use Illuminate\Support\Str;

use Image;
use File;

class ProductsController extends Controller
{
  public function __construct()
    {
      $this->middleware('auth:admin');
    }
  public function index()
  {
    $products = Product::orderBy('id', 'desc')->get();
    
    return view('backend.pages.product.index')->with('products', $products);
  }

  public function create()
  {
    return view('backend.pages.product.create');
  }

  public function edit($id)
  {
    $product = Product::find($id);
    $product_image=ProductImage::where('product_id',$id)->get();
    return view('backend.pages.product.edit',compact('product','product_image'));
  }

  public function store(Request $request)
  {

    $request->validate([
      'title'         => 'required|max:150',
      'description'     => 'required',
      'price'             => 'required|numeric',
      'quantity'             => 'required|numeric',
      'category_id'             => 'required|numeric',
      'brand_id'             => 'required|numeric',
    ]);

    $product = new Product;

    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;

    $product->slug = str::slug($request->title);
    $product->category_id = $request->category_id;
    $product->brand_id = $request->brand_id;
    $product->admin_id = 1;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $img = $product->slug.'-'.time() . '.'. $image->getClientOriginalExtension();
        $location = public_path('images/product/' .$img);
        Image::make($image)->save($location);
        $product->image=$img;
    }
    $product->save();

    if ($request->hasFile('product_image')) {
      $i=0;
      foreach ($request->product_image as $images) {
        $imgs = $product->slug.'-'.time().$i.'.'. $images->getClientOriginalExtension();
        $locations = public_path('images/products/' .$imgs);
        Image::make($images)->save($locations);

        $product_image = new ProductImage;
        $product_image->product_id = $product->id;
        $product_image->image = $imgs;
        $product_image->save();
        $i++;
      }
    }

    return redirect()->route('admin.product.create');
  }
  public function update(Request $request, $id)
  {

    $request->validate([
      'title'         => 'required|max:150',
      'description'     => 'required',
      'price'             => 'required|numeric',
      'quantity'             => 'required|numeric',
      'category_id'             => 'required|numeric',
      'brand_id'             => 'required|numeric',
    ]);

    $product = Product::find($id);
    $product_image=ProductImage::where('product_id',$id)->get();

    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount = $request->discount;
    $product->offer_price=$request->price-$request->discount;
    $product->quantity = $request->quantity;
    $product->slug = str::slug($request->title);
    $product->category_id = $request->category_id;
    $product->brand_id = $request->brand_id;

    if ($request->hasFile('image')) {
        if(File::exists('public/images/product/'.$product->image)){
          File::delete('public/images/product/'.$product->image);
        }
          $image = $request->file('image');
          $img = $product->slug.'-'.time() . '.'. $image->getClientOriginalExtension();
          $location = public_path('images/product/' .$img);
          Image::make($image)->save($location);
          $product->image=$img;
    }

    $product->save();

    if($request->hasFile('product_image')){
      foreach($product_image as $img){
        if(File::exists('public/images/products/'.$img->image)){
          File::delete('public/images/products/'.$img->image);
        }
        $img->delete();
      }
      $i=0;
      foreach ($request->product_image as $images) {
        $image_new = $product->slug.'-'.time().$i.'.'. $images->getClientOriginalExtension();
        $locations = public_path('images/products/'.$image_new);
        Image::make($images)->save($locations);

        $product_image = new ProductImage;
        $product_image->product_id = $product->id;
        $product_image->image = $image_new;
        $product_image->save();
        $i++;
      }

    }

    return redirect()->route('admin.products')->with('success','A new product has updated successfuly !!');

  }

  public function delete($id)
  {
    $product = Product::find($id);

    //Delete all images
    $product_image=ProductImage::where('product_id',$product->id)->get();
      if (!is_null($product)) {
        if(File::exists('public/images/product/'.$product->image)){
            File::delete('public/images/product/'.$product->image);
        }
        if(!is_null($product_image)){
          foreach($product_image as $img){
            if(File::exists('public/images/products/'.$img->image)){
              File::delete('public/images/products/'.$img->image);
            }
            $img->delete();
          }
        }
      $product->delete();
    }  
    session()->flash('success', 'Product has deleted successfully !!');
    return back();
  }

  public function updateParameter(Request $request){
    $request->validate([
      'product_id'       => 'required|numeric',
      'ram'              => 'numeric',
      'internal_memory'  => 'numeric',
      'image'            => 'nullable|image',
    ]);
    $parameter=new Parameter();
    $parameter->product_id=$request->product_id;
    $parameter->screen=$request->screen;
    $parameter->operating_system=$request->operating_system;
    $parameter->cpu=$request->cpu;
    $parameter->rear_camera=$request->rear_camera;
    $parameter->front_camera=$request->front_camera;
    $parameter->ram=$request->ram;
    $parameter->internal_memory=$request->internal_memory;
    $parameter->memory=$request->memory;
    $parameter->sim=$request->sim;
    $parameter->pin=$request->pin;


    if($request->hasFile('image')){
      $image=$request->file('image');
      $img = $parameter->product->slug.'-'.time() . '.'. $image->getClientOriginalExtension();
      $location=public_path('images/parameter/'.$img);
      Image::make($image)->save($location);
      $parameter->image=$img;
    }
    $parameter->save();
    return redirect()->route('admin.products')->with('success','Cập nhật thông số cho điện thoại thành công !!');
  }

  public function showParameter($id){
    $parameter=Parameter::where('product_id',$id)->first();    
    if(!is_null($parameter)){
      return view('backend.pages.product.showParameter',compact('parameter'));
    }else{
      return redirect()->route('admin.products')->with('success','Cập nhật thông số cho điện thoại để xem cấu hình chi tiết.');
    }
  }
  public function editParameter(Request $request,$id){
    $request->validate([
      'ram'              => 'numeric',
      'internal_memory'  => 'numeric',
      'image'            => 'nullable|image',
    ]);
    $parameter=Parameter::find($id);
    $parameter->screen=$request->screen;
    $parameter->operating_system=$request->operating_system;
    $parameter->cpu=$request->cpu;
    $parameter->rear_camera=$request->rear_camera;
    $parameter->front_camera=$request->front_camera;
    $parameter->ram=$request->ram;
    $parameter->internal_memory=$request->internal_memory;
    $parameter->memory=$request->memory;
    $parameter->sim=$request->sim;
    $parameter->pin=$request->pin;

    if($request->hasFile('image')){
      if(File::exists('public/images/parameter/'.$parameter->image)){
          File::delete('public/images/parameter/'.$parameter->image);
        }
      $image=$request->file('image');
      $img = $parameter->product->slug.'-'.time() . '.'. $image->getClientOriginalExtension();
      $location=public_path('images/parameter/'.$img);
      Image::make($image)->save($location);
      $parameter->image=$img;
    }
    $parameter->save();
    return redirect()->route('admin.products')->with('success','Đã cập nhật thông số thành công !!');
  } 
  public function updateParalaptop(Request $request){
    $request->validate([
      'product_id'       => 'required|numeric',
      'image'            => 'nullable|image',
    ]);
    $paralaptop=new Paralaptop();
    $paralaptop->product_id=$request->product_id;
    $paralaptop->cpu=$request->cpu;
    $paralaptop->ram=$request->ram;
    $paralaptop->hard_drive=$request->hard_drive;
    $paralaptop->screen=$request->screen;
    $paralaptop->card_screen=$request->card_screen;
    $paralaptop->connector=$request->connector;
    $paralaptop->operating_system=$request->operating_system;
    $paralaptop->design=$request->design;
    $paralaptop->size=$request->size;
    $paralaptop->time_launch=$request->time_launch;


    if($request->hasFile('image')){
      $image=$request->file('image');
      $img = $paralaptop->product->slug.'-'.time() . '.'. $image->getClientOriginalExtension();
      $location=public_path('images/paralaptop/'.$img);
      Image::make($image)->save($location);
      $paralaptop->image=$img;
    }
    $paralaptop->save();
    return redirect()->route('admin.products')->with('success','Cập nhật thông số cho laptop thành công !!');
  }
  public function showParalaptop($id){
    $paralaptop=Paralaptop::where('product_id',$id)->first();    
    if(!is_null($paralaptop)){
      return view('backend.pages.product.showParalaptop',compact('paralaptop'));
    }else{
      return redirect()->route('admin.products')->with('success','Cập nhật thông số cho laptop để xem cấu hình chi tiết.');
    }
  }
  public function editParalaptop(Request $request,$id){
    $request->validate([
      'image'            => 'nullable|image',
    ]);
    $paralaptop=Paralaptop::find($id);
    $paralaptop->cpu=$request->cpu;
    $paralaptop->ram=$request->ram;
    $paralaptop->hard_drive=$request->hard_drive;
    $paralaptop->screen=$request->screen;
    $paralaptop->card_screen=$request->card_screen;
    $paralaptop->connector=$request->connector;
    $paralaptop->operating_system=$request->operating_system;
    $paralaptop->design=$request->design;
    $paralaptop->size=$request->size;
    $paralaptop->time_launch=$request->time_launch;

    if($request->hasFile('image')){
      if(File::exists('public/images/paralaptop/'.$paralaptop->image)){
          File::delete('public/images/paralaptop/'.$paralaptop->image);
        }
      $image=$request->file('image');
      $img = $paralaptop->product->slug.'-'.time() . '.'. $image->getClientOriginalExtension();
      $location=public_path('images/paralaptop/'.$img);
      Image::make($image)->save($location);
      $paralaptop->image=$img;
    }
    $paralaptop->save();
    return redirect()->route('admin.products')->with('success','Đã cập nhật thông số thành công !!');
  } 
}


//php artisan config:cache
//php artisan view:clear
//composer dump-autoload