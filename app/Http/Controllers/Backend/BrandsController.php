<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use Illuminate\Support\Str;
use Image;
use File;

class BrandsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
    	$brands=Brand::orderBy('id','desc')->get();
    	return view('backend.pages.brands.index')->with('brands',$brands);
    }
    public function create(){	
    	return view('backend.pages.brands.create');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'image'=>'nullable|image',
    	],
    	[
    		'name.required'=>'Please provide a brand name',
    		'image.image'=>'Please provide a vaild image with .jpg, .png, .gif,...',
    	]);
    	$brand= new Brand;
    	$brand->name=$request->name;
    	$brand->description=$request->description;
    	if ($request->hasFile('image')) {
      		$image = $request->file('image');
        	$img = str::slug($brand->name).'-'.time() . '.'. $image->getClientOriginalExtension();
       	 	$location = public_path('images/brands/' .$img);
        	Image::make($image)->save($location);
        	$brand->image=$img;
		}
    	$brand->save();
    	return redirect()->route('admin.brands')->with('success','A new brand has added successfuly !!');
    }
    public function edit($id){
    	$brand=Brand::find($id);
    	if(!is_null($brand)){
    	return view('backend.pages.brands.edit')->with('brand',$brand);	
    	}else{
    		return redirect()->route('admin.brands');
    	}
    }
    public function update(Request $request,$id){
    	$this->validate($request,[
    		'name'=>'required',
    		'image'=>'nullable|image',
    	],
    	[
    		'name.required'=>'Please provide a brand name',
    		'image.image'=>'Please provide a vaild image with .jpg, .png, .gif,...',
    	]);
    	$brand= Brand::find($id);
    	$brand->name=$request->name;
    	$brand->description=$request->description;

    	if ($request->hasFile('image')) {
    		if(File::exists('public/images/brands/'.$brand->image)){
    			File::delete('public/images/brands/'.$brand->image);
    		}
      		$image = $request->file('image');
        	$img = str::slug($brand->name).'-'.time() . '.'. $image->getClientOriginalExtension();
       	 	$location = public_path('images/brands/' .$img);
        	Image::make($image)->save($location);
        	$brand->image=$img;
		}
    	$brand->save();
    	return redirect()->route('admin.brands')->with('success','A new brand has updated successfuly !!');
    }
    public function delete($id){
    	$brand = Brand::find($id);
    	if (!is_null($brand)) {
    		if(File::exists('public/images/brands/'.$brand->image)){
    			File::delete('public/images/brands/'.$brand->image);
    		}
      		$brand->delete();
    	}
    	session()->flash('success', 'Brand has deleted successfully !!');
    	return back();

  	}
}
