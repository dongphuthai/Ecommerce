@extends('frontend.layouts.master')

@section('scripts')
<script type="text/javascript">
  $(document).on('click','.pagination-all nav ul.pagination a', function(e) {
    e.preventDefault();
    var page=($(this).attr('href').split('page=')[1]);
    getProducts(page);
  });
  var url="{{ url('/') }}";
  function getProducts(page){
    $.ajax({
      url:url+'/ajax/tren-13-trieu?page='+page
    }).done(function(data){
      $('.content-product').html(data);
      location.hash=page;          
      $(".rating").rating();           
    });
  }
</script>
@endsection

@section('content')
<div class="container page-feature ">
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
    <p style="font-family: arial;">
      <b>TẤT CẢ SẢN PHẨM {{ Route::is('products.price2') ? 'DƯỚI 2 TRIỆU':''}}{{ Route::is('products.price24') ? 'TỪ 2-4 TRIỆU':''}}{{ Route::is('products.price47') ? 'TỪ 4-7 TRIỆU':''}}{{ Route::is('products.price713') ? 'TỪ 7-13 TRIỆU':''}}{{ Route::is('products.price13') ? 'TRÊN 13 TRIỆU':''}}
      </b>
    </p> 
    <div class="list-item content-product">
      @include('frontend.pages.products.partials.all')
    </div>
  </div>
@endsection
@section('scripts')
  <script type="text/javascript">
    $(".rating").rating();
  </script> 
@endsection