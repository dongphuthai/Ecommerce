@extends('frontend.layouts.master')

@section('scripts')
<script type="text/javascript">
  $(document).on('click', '.child-item a', function(event) {
    event.preventDefault();
    var id=$(this).attr('data-child-id');
    var slug=$(this).attr('data-child-slug');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/category/'+id
    }).done(function(data){
      $('.content-child').html(data);
      $(".rating").rating();
      $('.child-item a').removeClass('active');
      $('#parent_'+id).addClass('active');
      location.hash=slug;
    });
    $.ajax({
      url:url+'/ajax/link-price/'+slug
    }).done(function(data){
      $('.link_price_child').html(data);
    });
  });
</script>
@endsection

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
          <div class="link_price_child">   
            @include('frontend.pages.categories.price.link_price_child')   
          </div>   
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


