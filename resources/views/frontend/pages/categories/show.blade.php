@extends('frontend.layouts.master')

@section('content')

<div class="container page-feature ">
  <!-- Start Sidebar + Content -->
  @include('frontend.pages.products.partials.slider')

  <div class="mt-2 mb-2">
    <div class="row">
      <div class="col-12 col-lg-8 ">
        @include('frontend.partials.product-sidebar-parent')
      </div>

      @php
        $name_category=Illuminate\Support\Str::slug(App\Models\Category::where('id',$id_child)->first()->name);      
      @endphp  

      <div class="price col-12 col-lg-4 mt-1" style="font-size: 12px; ">
        <label>Chọn mức giá:</label>              
          @include('frontend.pages.categories.price.link_price_child')   
      </div>
    </div>    
  </div>
</div>

<div class="container page-feature  ">
  <div class="list-item ">
    @include('frontend.partials.product-sidebar-child-ajax')
  </div>
</div>

<div class="content-child">
  @include('frontend.pages.products.partials.all_products_child')
</div>
@endsection
