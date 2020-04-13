<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Support\Str;
use Image;
use File;

class CategoriesController extends Controller
{
    public function __construct()
      {
        $this->middleware('auth:admin');
      }
    public function index(){
    	$categories=Category::orderBy('id','asc')->get();
    	return view('backend.pages.categories.index')->with('categories',$categories);
    }
    public function create(){
    	$main_categories=Category::orderBy('name','asc')->where('parent_id',NULL)->get();
    	return view('backend.pages.categories.create')->with('main_categories',$main_categories);
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'image'=>'nullable|image',
    	],
    	[
    		'name.required'=>'Please provide a category name',
    		'image.image'=>'Please provide a vaild image with .jpg, .png, .gif,...',
    	]);
    	$category= new Category;
    	$category->name=$request->name;
        $category->slug=Str::slug($request->name);
    	$category->description=$request->description;
    	$category->parent_id=$request->parent_id;

    	if ($request->hasFile('image')) {
      		$image = $request->file('image');
        	$img = str::slug($category->name).'-'.time() . '.'. $image->getClientOriginalExtension();
       	 	$location = public_path('images/categories/' .$img);
        	Image::make($image)->save($location);
        	$category->image=$img;
		}

    	$category->save();
    	return redirect()->route('admin.categories')->with('success','A new category has added successfuly !!');

    }
    public function edit($id){
    	$main_categories=Category::orderBy('name','asc')->where('parent_id',NULL)->get();
    	$category=Category::find($id);
    	if(!is_null($category)){
    	return view('backend.pages.categories.edit')->with('category',$category)->with('main_categories',$main_categories);	
    	}else{
    		return redirect()->route('admin.categories');
    	}
    }
    public function update(Request $request,$id){
    	$this->validate($request,[
    		'name'=>'required',
    		'image'=>'nullable|image',
    	],
    	[
    		'name.required'=>'Please provide a category name',
    		'image.image'=>'Please provide a vaild image with .jpg, .png, .gif,...',
    	]);
    	$category= Category::find($id);
    	$category->name=$request->name;
        $category->slug=Str::slug($request->name);
    	$category->description=$request->description;
    	$category->parent_id=$request->parent_id;

    	if ($request->hasFile('image')) {
    		if(File::exists('public/images/categories/'.$category->image)){
    			File::delete('public/images/categories/'.$category->image);
    		}
      		$image = $request->file('image');
        	$img = str::slug($category->name).'-'.time() . '.'. $image->getClientOriginalExtension();
       	 	$location = public_path('images/categories/' .$img);
        	Image::make($image)->save($location);
        	$category->image=$img;
		}

    	$category->save();
    	return redirect()->route('admin.categories')->with('success','A new category has updated successfuly !!');

    }
    public function delete($id)
  	{
    	$category = Category::find($id);

    	if (!is_null($category)) {
    		if($category->parent_id==NULL){
    			$sub_categories=Category::orderBy('name','asc')->where('parent_id',NULL)->get();
    			foreach($sub_categories as $sub){
    				if(File::exists('public/images/categories/'.$sub->image)){
    					File::delete('public/images/categories/'.$sub->image);
    				}
    				$sub->delete();
    			}
    		}

    		if(File::exists('public/images/categories/'.$category->image)){
    			File::delete('public/images/categories/'.$category->image);
    		}
      		$category->delete();
    	}
    	session()->flash('success', 'Category has deleted successfully !!');
    	return back();

  	}
}
