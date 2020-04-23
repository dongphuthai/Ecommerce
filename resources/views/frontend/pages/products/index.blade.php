@extends('frontend.layouts.master')

@section('scripts')
<script type="text/javascript">
  $(".rating").rating();
</script> 
<!-- PRODUCT AJAX -->
<script type="text/javascript">
    $(document).on('click','.pagination-all nav ul.pagination a', function(e) {
      e.preventDefault();
      var page=($(this).attr('href').split('page=')[1]);
      getProducts(page);
    });
    var url="{{ url('/') }}";
    function getProducts(page){
      $.ajax({
        url:url+'/ajax/products?page='+page
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
        <div style="display: flex;" class="text-center parent-item">
          @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
            <a id="parent_{{ $parent->id }}" href="{{ route('categories.show.parent',$parent->slug) }}" class="list-group-item list-group-item-action p-0 btn ">
              <img src="{!! asset('public/images/categories/'.$parent->image) !!}" width="25" style="padding-top: 3px;">
              <p class="mb-0 hiddentitle" style="font-size: 14px;">{{ $parent->name }}</p>
            </a>
          @endforeach
        </div>
      </div>     
        @include('frontend.pages.products.partials.price') 
      </div>    
    </div>
  </div>
  
  <div class='container mt-2 page-feature'>
    <p><b>TẤT CẢ SẢN PHẨM</b></p> 
    <div class="list-item content-product">
      @include('frontend.pages.products.partials.all')
      {{-- <div class="list-item content-product"></div> --}}
    </div>
  </div>
@endsection
