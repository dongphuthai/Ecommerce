<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Response;
use Validator;
use Image;
use File;
class SlidersController extends Controller
{
  public function handleUploadedImage($image,$slider,$name){
    if (!is_null($image)) {
      $img=time().'.'.$image->getClientOriginalExtension();
      $location=public_path('images/'.$name.'/'.$img);
      Image::make($image)->save($location);
      $slider->image=$img;
    }
  }
  
  public function __construct(){
    $this->middleware('auth:admin');
  }
  public function index(){
    $sliders = Slider::orderBy('priority', 'asc')->get();
    return view('backend.pages.sliders.index', compact('sliders'));
  }
  public function store(Request $request){
  	$this->validate($request,[
  		'title'=>'required',
  		'image'=>'image|required',
  		'priority'=>'required',
  		'button_link'=>'nullable|url',
  	],[
  		'title.required'=>'Please provide slider title',
  		'priority.required'=>'Please provide slider priority',
  		'image.required'=>'Please provide slider image',
  		'image.image'=>'Please provide a valid slider image',
  		'button_link.url'=>'Please provide a valid slider button link',
  	]);

    $slider=new Slider;
    $slider->title = $request->title;   
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->priority = $request->priority; 
    if($request->hasFile('image')){
    	$image=$request->file('image');
    	$img=time().'.'.$image->getClientOriginalExtension();
    	$location=public_path('images/sliders/'.$img);
    	Image::make($image)->save($location);
    	$slider->image=$img;
    }
    $slider->save();
    session()->flash('success', 'A new slider has added successfully !!');
    return redirect()->route('admin.sliders');
  }

  public function stores(Request $request){
    $rules = array(
      'title'=>'required',
      'image'=>'image|required',
      'priority'=>'required',
      'button_link'=>'nullable|url',
        );
    $error = Validator::make($request->all(), $rules);
      if($error->fails()){
        return response()->json(['errors' => $error->errors()->all()]);
      }      
    $slider=new Slider;
    $slider->title = $request->title; 
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->priority = $request->priority;  
    $this->handleUploadedImage($request->file('image'),$slider,'sliders');
    $slider->save();
    return response()->json(['success'=>'Thêm slider thành công']);
  }
  public function update(Request $request, $id){
      $this->validate($request,[
  		'title'=>'required',
  		'image'=>'image',
  		'priority'=>'required',
  		'button_link'=>'nullable|url',
  	],[
  		'title.required'=>'Please provide slider title',
  		'priority.required'=>'Please provide slider priority',
  		'image.image'=>'Please provide a valid slider image',
  		'button_link.url'=>'Please provide a valid slider button link',
  	]);

    $slider = Slider::find($id);
    $slider->title = $request->title;   
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->priority = $request->priority;
    if ($request->hasFile('image')) {
    	if(File::exists('public/images/sliders/'.$slider->image)){
    		File::delete('public/images/sliders/'.$slider->image);
    	}
      $image = $request->file('image');
      $img = time() . '.'. $image->getClientOriginalExtension();
      $location = public_path('images/sliders/' .$img);
      Image::make($image)->save($location);
      $slider->image=$img;
		}
    $slider->save();
    session()->flash('success', 'Slider has updated successfully !!');
    return redirect()->route('admin.sliders');
  }

  public function delete($id){
    $slider = Slider::find($id);
    if (!is_null($slider)) {
      if(File::exists('public/images/sliders/'.$slider->image)){
    			File::delete('public/images/sliders/'.$slider->image);
    	}
      $slider->delete();
    }
    session()->flash('success', 'Slider has deleted successfully !!');
    return back();
  }
}