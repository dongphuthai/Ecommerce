@extends('frontend.layouts.master')

@section('title')
  Bigshop | Ecommerce Site
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).on('click','ul.pagination li.page-item a', function(e) {
      e.preventDefault();
      var page=($(this).attr('href').split('page=')[1]);
      var slug=$('.parent-item a.active').attr('data-parent-slug');
      getProducts(page,slug);
    });
    var url="{{ url('/') }}";
    function getProducts(page,slug){
      $.ajax({
        url:url+'/ajax/the-loai/'+slug+'?page='+page
      }).done(function(data){
        $('.content-showParent').html(data);
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
      <div class="col-12 col-lg-8 ">
        @include('frontend.partials.product-sidebar-parent')
      </div> 
      <div class="price col-12 col-lg-4 mt-1" style="font-size: 12px; ">
        <div class="link_price_parent">
          @include('frontend.pages.categories.price.link_price_parent')
        </div>               
      </div>
    </div> 
    <div class="list-item mt-3">
      @include('frontend.partials.product-sidebar-child')
    </div>   
  </div>   
</div>
  <!-- Sản phẩm nổi bật -->
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
    $str=App\Models\Category::where('id',$id)->first()->name;
    @endphp
    <p class="font-name pt-2"><b>TẤT CẢ {{ $str }}</b></p>                 
    <div class="list-item content-showParent">
      @if (count($products) > 0)
        @include('frontend.pages.products.partials.all')
      @endif
    </div>
  </div>
@endsection

