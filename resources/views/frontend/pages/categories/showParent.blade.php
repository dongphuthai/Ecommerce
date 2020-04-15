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

      <div class="price col-12 col-lg-4 mt-1" style="font-size: 12px; ">
        <div class="link_price_parent">
          @include('frontend.pages.categories.price.link_price_parent')
        </div>               
      </div>

      </div>    
    </div>
  </div>
  <div class="container page-feature  ">
    <div class="list-item content-product">
      {{-- @include('frontend.partials.product-sidebar-mobile') --}}
      @foreach (App\Models\Category::orderBy('id', 'asc')->where('parent_id', $id)->get() as $child)
        <div class="{{ ($id==41||$id==45)?'watches-item': 'mobile-item'}}" >
        <a id="parent_{{ $child->id }}" href="the-loai/{{ $slug1 }}/{{ $child->slug }}" data-child-id="{{ $child->id }}" class="list-group-item list-group-item-action p-0 btn">
          <img src="{!! asset('public/images/categories/'.$child->image) !!}" width="100%" style="height: auto; background: #fff;">
        </a>
      </div>
      @endforeach
    </div>
  </div>

  <div class="{{ $id==32?'':'hidden' }}">
    @include('frontend.partials.featured.phone-featured')
  </div>
  <div class="{{ $id==29?'':'hidden' }}">
    @include('frontend.partials.featured.laptop-featured')
  </div>
  <div class="{{ $id==45?'':'hidden' }}">
    @include('frontend.partials.featured.phu-kien-featured')
  </div>
  <div class="{{ $id==33?'':'hidden' }}">
    @include('frontend.partials.featured.tablet-featured')
  </div>
  <div class=" {{ $id==41?'':'hidden' }}">
    @include('frontend.partials.featured.watches-featured')
  </div>

  <div class='container mt-2 page-feature'> 
    @php
    $str=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
    @endphp
    <p style="font-family: arial;"><b>TẤT CẢ {{ $str }}</b></p>                 
    <div class="list-item">
      @foreach($categories as $category)             
        @php           
          $products = App\Models\Product::where('category_id',$category->id)->paginate(15);
        @endphp
        @if ($products->count() > 0)
          @include('frontend.pages.products.partials.all_products')
        @endif
      @endforeach
    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection
