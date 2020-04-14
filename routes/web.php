<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');
Route::get('/search', 'Frontend\ProductsController@searchType')->name('type.search');
Route::get('/compare/{slug}/search','Frontend\PagesController@searchCompare')->name('search.compare');
//Compare Route
Route::get('/compare/{slug1}-vs-{slug2}','Frontend\ProductsController@compareProduct')
->where('slug1', '[a-zA-Z0-9-_]+')
->where('slug2', '[a-zA-Z0-9-_]+')
->name('compare.product');
/*Frontend Category Router*/
Route::get('/the-loai/{slug}', 'Frontend\CategoriesController@showParent')
->where('slug', '[a-zA-Z0-9-_]+')
->name('categories.show.parent');
Route::get('/the-loai/{slug1}/{slug2}', 'Frontend\CategoriesController@show')
->where('slug1', '[a-zA-Z0-9-_]+')
->where('slug2', '[a-zA-Z0-9-_]+')
->name('categories.show');


//Price Routes
Route::get('/duoi-2-trieu', 'Frontend\ProductsController@price2')->name('products.price2');
Route::get('/2-4-trieu', 'Frontend\ProductsController@price24')->name('products.price24');
Route::get('/4-7-trieu', 'Frontend\ProductsController@price47')->name('products.price47');
Route::get('/7-13-trieu', 'Frontend\ProductsController@price713')->name('products.price713');
Route::get('/tren-13-trieu', 'Frontend\ProductsController@price13')->name('products.price13');

//Products Routes
Route::group(['prefix' => 'products'], function(){
  Route::get('/', 'Frontend\ProductsController@index')->name('products');
  Route::get('/{slug}', 'Frontend\ProductsController@show')->name('products.show');
  Route::get('/new/search', 'Frontend\PagesController@search')->name('search');
  //Rating Routes
  Route::post('/review','Frontend\ProductsController@review')->name('review');
  Route::post('/rating/comment','Frontend\PagesController@rateComment')->name('rating.comment');
  Route::get('/rating/show/{slug}','Frontend\PagesController@rateShow')->name('rating.show');
  //Category Routes
  Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
  
  //Show price category parent
  Route::get('{slug1}/duoi-2-trieu', 'Frontend\CategoriesController@showPrice2')->name('categories.show.parent.price2');
  Route::get('{slug1}/2-4-trieu', 'Frontend\CategoriesController@showPrice24')->name('categories.show.parent.price24');
  Route::get('{slug1}/4-7-trieu', 'Frontend\CategoriesController@showPrice47')->name('categories.show.parent.price47');
  Route::get('{slug1}/7-13-trieu', 'Frontend\CategoriesController@showPrice713')->name('categories.show.parent.price713');
  Route::get('{slug1}/tren-trieu', 'Frontend\CategoriesController@showPrice13')->name('categories.show.parent.price13');
  //Show price category child
  Route::get('{slug1}/{slug2}/duoi-2-trieu', 'Frontend\CategoriesController@show2')->name('categories.show.child.price2');
  Route::get('{slug1}/{slug2}/2-4-trieu', 'Frontend\CategoriesController@show24')->name('categories.show.child.price24');
  Route::get('{slug1}/{slug2}/4-7-trieu', 'Frontend\CategoriesController@show47')->name('categories.show.child.price47');
  Route::get('{slug1}/{slug2}/7-13-trieu', 'Frontend\CategoriesController@show713')->name('categories.show.child.price713');
  Route::get('{slug1}/{slug2}/tren-13-trieu', 'Frontend\CategoriesController@show13')->name('categories.show.child.price13');
});

//User Routes
Route::group(['prefix' => 'user'], function(){
  Route::get('/token/{token}','Frontend\VerificationController@verify')->name('user.verification');
  Route::get('/dashboard','Frontend\UsersController@dashboard')->name('user.dashboard');
  Route::get('/profile', 'Frontend\UsersController@profile')->name('user.profile');
  Route::post('/profile/update', 'Frontend\UsersController@profileUpdate')->name('user.profile.update');
});
//Cart Routes
Route::group(['prefix' => 'cart'], function(){
  Route::get('/','Frontend\CartsController@index')->name('carts');
  Route::post('/store', 'Frontend\CartsController@store')->name('carts.store');
  Route::post('/update/{id}','Frontend\CartsController@update')->name('carts.update');
  Route::post('/delete/{id}','Frontend\CartsController@destroy')->name('carts.delete');
  Route::post('/combo/uu-dai','Frontend\CartsController@combo')->name('carts.combo');
});
//Ckeckout Routes
Route::group(['prefix' => 'checkout'], function(){
  Route::get('/','Frontend\CheckoutsController@index')->name('checkouts');
  Route::post('/store','Frontend\CheckoutsController@store')->name('checkouts.store');
});

// Admin Routes
Route::group(['prefix' => 'admin'], function(){
  	Route::get('/', 'Backend\PagesController@index')->name('admin.index');

    //Admin Login Routes
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');

    //Password Email send 
    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

     // Password Reset
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');



  // Product Routes
  	Route::group(['prefix' => '/products'], function(){
    	Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
    	Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
    	Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');
    	Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');
    	Route::post('/product/edit/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
    	Route::post('/product/delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');
      //Parameter Route
      Route::get('/parameter/show/{id}', 'Backend\ProductsController@showParameter')->name('admin.product.parameter.show');
      Route::post('/parameter/edit/{id}', 'Backend\ProductsController@editParameter')->name('admin.product.parameter.edit');
      Route::post('/parameter/update', 'Backend\ProductsController@updateParameter')->name('admin.product.parameter.update');
      //Para Laptop Routes
      Route::get('/paralaptop/show/{id}', 'Backend\ProductsController@showParalaptop')->name('admin.product.paralaptop.show');
      Route::post('/paralaptop/edit/{id}', 'Backend\ProductsController@editParalaptop')->name('admin.product.paralaptop.edit');
      Route::post('/paralaptop/update', 'Backend\ProductsController@updateParalaptop')->name('admin.product.paralaptop.update');
  	});


     // Orders Routes
    Route::group(['prefix' => '/orders'], function(){
      Route::get('/', 'Backend\OrdersController@index')->name('admin.orders');
      Route::get('/view/{id}', 'Backend\OrdersController@show')->name('admin.order.show');
      Route::post('/delete/{id}', 'Backend\OrdersController@delete')->name('admin.order.delete');

      Route::post('/completed/{id}', 'Backend\OrdersController@completed')->name('admin.order.completed');

      Route::post('/paid/{id}', 'Backend\OrdersController@paid')->name('admin.order.paid');
      Route::post('/charge-update/{id}', 'Backend\OrdersController@chargeUpdate')->name('admin.order.charge');
      Route::get('invoice/{id}', 'Backend\OrdersController@invoice')->name('admin.order.invoice');
    });

  	// Category Routes
  	Route::group(['prefix' => '/categories'], function(){
    	Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories');
    	Route::get('create', 'Backend\CategoriesController@create')->name('admin.category.create');
    	Route::get('edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');
    	Route::post('store', 'Backend\CategoriesController@store')->name('admin.category.store');
    	Route::post('category/edit/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');
    	Route::post('category/delete/{id}', 'Backend\CategoriesController@delete')->name('admin.category.delete');
  	});

    //Brand Routes
    Route::group(['prefix' => '/brands'], function(){
      Route::get('/', 'Backend\BrandsController@index')->name('admin.brands');
      Route::get('create', 'Backend\BrandsController@create')->name('admin.brand.create');
      Route::get('edit/{id}', 'Backend\BrandsController@edit')->name('admin.brand.edit');
      Route::post('store', 'Backend\BrandsController@store')->name('admin.brand.store');
      Route::post('brand/edit/{id}', 'Backend\BrandsController@update')->name('admin.brand.update');
      Route::post('brand/delete/{id}', 'Backend\BrandsController@delete')->name('admin.brand.delete');
    });

    // Division Routes
  Route::group(['prefix' => '/divisions'], function(){
    Route::get('/', 'Backend\DivisionsController@index')->name('admin.divisions');
    Route::get('/create', 'Backend\DivisionsController@create')->name('admin.division.create');
    Route::get('/edit/{id}', 'Backend\DivisionsController@edit')->name('admin.division.edit');
    Route::post('/store', 'Backend\DivisionsController@store')->name('admin.division.store');
    Route::post('/division/edit/{id}', 'Backend\DivisionsController@update')->name('admin.division.update');
    Route::post('/division/delete/{id}', 'Backend\DivisionsController@delete')->name('admin.division.delete');
  });

  // District Routes
  Route::group(['prefix' => '/districts'], function(){
    Route::get('/', 'Backend\DistrictsController@index')->name('admin.districts');
    Route::get('/create', 'Backend\DistrictsController@create')->name('admin.district.create');
    Route::get('/edit/{id}', 'Backend\DistrictsController@edit')->name('admin.district.edit');
    Route::post('/store', 'Backend\DistrictsController@store')->name('admin.district.store');
    Route::post('/district/edit/{id}', 'Backend\DistrictsController@update')->name('admin.district.update');
    Route::post('/district/delete/{id}', 'Backend\DistrictsController@delete')->name('admin.district.delete');
  });

  // Slider Routes
  Route::group(['prefix' => '/sliders'], function(){
    Route::get('/', 'Backend\SlidersController@index')->name('admin.sliders');
    Route::post('/slider/store', 'Backend\SlidersController@store')->name('admin.slider.store');
    Route::post('/ajax/slider/store', 'Backend\SlidersController@stores')->name('ajax-crud.store');
    Route::post('/slider/edit/{id}', 'Backend\SlidersController@update')->name('admin.slider.update');
    Route::post('/slider/delete/{id}', 'Backend\SlidersController@delete')->name('admin.slider.delete');
  });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home/login', 'Auth\LoginController@login')->name('login');


//API Routes
Route::get('get-districts/{id}',function($id){
  return json_encode(App\Models\District::where('division_id',$id)->get());
});
Route::get('get-category/{id}',function($id){
  return json_encode(App\Models\Category::orderBy('name', 'asc')->where('parent_id', $id)->get());
});
/*PRODUCT AJAX*/
Route::get('ajax/products',function(){
  $products = App\Models\Product::orderBy('price', 'desc')->paginate(15);
  return view('frontend.pages.products.partials.all',compact('products'))->render();
});
/*PARENT PRRODUCT AJAX*/
Route::get('ajax/category/{id}',function($id){
  $products=App\Models\Product::orderBy('id','desc')->where('category_id',$id)->get();
  $id_child=$id;
  $id=App\Models\Category::find($id)->parent_id;  
  return view('frontend.pages.products.partials.all_products_child',compact('products','id','id_child'))->render();
})->name('categories.show.ajax');
/*PRODUCT COMPARE SHOW AJAX*/
Route::get('ajax/product-compare/{slug}',function($slug){
  $product=App\Models\Product::where('slug',$slug)->first();
  $parent_id=$product->category->parent->id;
  $categories=App\Models\Category::where('parent_id',$parent_id)->get();
  $price=$product->price;
  $id=$product->id;
  return view('frontend.pages.products.compare.all_products_compare',compact('price','categories','id','product'));
});
/*CARD PRODUCT COMPARE AJAX*/
Route::get('ajax/card-compare/{slug}',function($slug){
  $pdt=App\Models\Product::where('slug',$slug)->first();
  return view('frontend.pages.products.compare.card-product-compare',compact('pdt'));
});
/*TABLE PARA COMPARE AJAX*/
Route::get('ajax/card-compare/para/{slug}',function($slug){
  $pdt=App\Models\Product::where('slug',$slug)->first();
  $parent_id=$pdt->category->parent->id;
  if($parent_id==32||$parent_id==33){
    $para=$pdt->para;
  }elseif ($parent_id==29) {
    $para=$pdt->paralaptop;
  }  
  return response()->json(['para'=>$para,'pdt'=>$pdt,'parent_id'=>$parent_id]);
});
/*BUTTON COMPARE AJAX*/
Route::get('ajax/button-compare/{slug}',function($slug){
  $pdt=App\Models\Product::where('slug',$slug)->first();
  return view('frontend.pages.products.compare.cart-button-compare',compact('pdt'));
});


