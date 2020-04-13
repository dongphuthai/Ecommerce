@extends('frontend.layouts.master')

@section('content')

  <div class="container page-feature ">
  <!-- Start Sidebar + Content -->
  @include('frontend.pages.products.partials.slider')

  <div class="mt-2 mb-2">
  <div class="row">
    <div class="col-12 col-lg-8">
      @include('frontend.partials.product-sidebar-parent')
    </div>     
      @include('frontend.pages.products.partials.price') 
    </div>    
    </div>
  </div>
  
  <div class='container mt-2 page-feature'>
    <p style="font-family: arial;"><b>TẤT CẢ SẢN PHẨM</b></p> 
    <div class="list-item content-product">
      @include('frontend.pages.products.partials.all')
    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection


@section('scripts')
  <script type="text/javascript">
    $("#input-id").rating();
  </script> 
@endsection