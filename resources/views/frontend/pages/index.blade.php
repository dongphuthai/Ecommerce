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
  
  @include('frontend.partials.featured.phone-featured')
  @include('frontend.partials.featured.laptop-featured')
  @include('frontend.partials.featured.tablet-featured')
  @include('frontend.partials.featured.phu-kien-featured')
  @include('frontend.partials.featured.watches-featured')

  <script type="text/javascript">
    var url="{{ url('/') }}"
    function Redirect() {
      window.location=url+"/products";
    }
  </script>

  <!-- End Sidebar + Content -->
@endsection
