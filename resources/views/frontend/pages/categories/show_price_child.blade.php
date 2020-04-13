@extends('frontend.layouts.master')

@section('content')

  <div class="container page-feature ">
  <!-- Start Sidebar + Content -->

  <div class="mt-2 mb-2">
    <div class="row">
      <div class="col-12 col-lg-8 ">
        @include('frontend.partials.product-sidebar-parent')
      </div>  
      
      @php
        $name_category=Illuminate\Support\Str::slug(App\Models\Category::where('id',$id_child)->first()->name);      
      @endphp 

      <div class="price col-12 col-lg-4 mt-1" style="font-size: 12px; ">
        @include('frontend.pages.categories.price.link_price_child')           
      </div>

      </div>    
    </div>
  </div>
  <div class="container page-feature  ">
   <div class="list-item content-product">
      @include('frontend.partials.product-sidebar-child')
    </div>
  </div>

  <div class='container mt-2 page-feature'> 
    @php
    $str_parent=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
    $str_child=mb_convert_case(App\Models\Category::where('id',$id_child)->first()->name,MB_CASE_UPPER, "UTF-8");
    @endphp
    
    @if($price==1)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} DƯỚI 2 TRIỆU</b></p>
    @elseif($price==2)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} TỪ 2 ĐẾN 4 TRIỆU</b></p>
    @elseif($price==3)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} TỪ 4 ĐẾN 7 TRIỆU</b></p>
    @elseif($price==4)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} TỪ 7 ĐẾN 13 TRIỆU</b></p>
    @elseif($price==5)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} TRÊN 13 TRIỆU</b></p>
    @endif

    <div class="list-item " style="min-height: 250px;">            
        @if ($products->count() > 0)
          @include('frontend.pages.products.partials.all_products')
        @endif
    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection

@section('scripts')
 
@endsection
