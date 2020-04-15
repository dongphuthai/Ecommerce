@extends('frontend.layouts.master')

@section('content')

  <div class="container page-feature ">
  <!-- Start Sidebar + Content -->

  <div class="mt-2 mb-2">
    <div class="row">
      <div class="col-12 col-lg-8 ">
        @include('frontend.partials.product-sidebar-parent')
      </div>  

      <div class="price col-12 col-lg-4 mt-1" style="font-size: 12px; ">
        @include('frontend.pages.categories.price.link_price_parent')                       
      </div>

      </div>    
    </div>
  </div>
  <div class="container page-feature  ">
   <div class="list-item content-product">
      @include('frontend.partials.product-sidebar-child')
      {{-- @include('frontend.partials.product-sidebar-child-ajax') --}}
    </div>
  </div>
<div class="content-child">
  <div class='container mt-2 page-feature'>
    @php
    $str=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
    @endphp 
    <div id="hidden2" >

      @if($price==1)
        <p style="font-family: arial;"><b>{{ $str }} DƯỚI 2 TRIỆU</b></p>
      @elseif($price==2)
        <p style="font-family: arial;"><b>{{ $str }} TỪ 2-4 TRIỆU</b></p>
      @elseif($price==3)
        <p style="font-family: arial;"><b>{{ $str }} TỪ 4-7 TRIỆU</b></p>
      @elseif($price==4)
        <p style="font-family: arial;"><b>{{ $str }} TỪ 7-13 TRIỆU</b></p>
      @elseif($price==5)
        <p style="font-family: arial;"><b>{{ $str }} TRÊN 13 TRIỆU</b></p>
      @endif

      <div class="list-item" style="min-height: 200px;">
        @foreach($categories as $category)  

          @php
          if($price==1) {
            $products = App\Models\Product::where('category_id',$category->id)->where('price','<','2000000')->get();
          }elseif($price==2){
            $products = App\Models\Product::where('category_id',$category->id)->where('price','>=','2000000')->where('price','<','4000000')->get();
          }elseif($price==3){
            $products = App\Models\Product::where('category_id',$category->id)->where('price','>=','4000000')->where('price','<','7000000')->get();
          }elseif($price==4){
            $products = App\Models\Product::where('category_id',$category->id)->where('price','>=','7000000')->where('price','<','13000000')->get();
          }elseif($price==5){
            $products = App\Models\Product::where('category_id',$category->id)->where('price','>','13000000')->get();
          }
          @endphp

          @if ($products->count() > 0)
            @include('frontend.pages.products.partials.all_products')
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>

  <!-- End Sidebar + Content -->
@endsection

@section('scripts')
 
@endsection
