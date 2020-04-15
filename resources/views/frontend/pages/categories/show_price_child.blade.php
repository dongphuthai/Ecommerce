@extends('frontend.layouts.master')
@section('scripts')
<script type="text/javascript">
  $(document).on('click', '#duoi-2-trieu', function(event) {
    event.preventDefault();
    var slug1=$(this).attr('data-slug1');
    var slug2=$(this).attr('data-slug2');
    var slug=$(this).attr('id');
    var url="{{ url('/') }}";  
    $.ajax({
      url:url+'/ajax/'+slug1+'/'+slug2+'/duoi-2-trieu'
    }).done(function(data){
      $('.price_child_item').html(data);
      location.hash=slug;
    });
    $.ajax({
      url:url+'/ajax/link-price/'+slug1+'/'+slug2+'/duoi-2-trieu'
    }).done(function(data){
      $('.link_price_child').html(data);
    });
  });
  
  $(document).on('click', '#2-4-trieu', function(event) {
    event.preventDefault();
    var slug1=$(this).attr('data-slug1');
    var slug2=$(this).attr('data-slug2');
    var slug=$(this).attr('id');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/'+slug1+'/'+slug2+'/2-4-trieu'
    }).done(function(data){
      $('.price_child_item').html(data);
      location.hash=slug;
    });
    $.ajax({
      url:url+'/ajax/link-price/'+slug1+'/'+slug2+'/2-4-trieu'
    }).done(function(data){
      $('.link_price_child').html(data);
    });
  });

  $(document).on('click', '#4-7-trieu', function(event) {
    event.preventDefault();
    var slug1=$(this).attr('data-slug1');
    var slug2=$(this).attr('data-slug2');
    var slug=$(this).attr('id');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/'+slug1+'/'+slug2+'/4-7-trieu'
    }).done(function(data){
      $('.price_child_item').html(data);
      location.hash=slug;
    });
    $.ajax({
      url:url+'/ajax/link-price/'+slug1+'/'+slug2+'/4-7-trieu'
    }).done(function(data){
      $('.link_price_child').html(data);
    });
  });

  $(document).on('click', '#7-13-trieu', function(event) {
    event.preventDefault();
    var slug1=$(this).attr('data-slug1');
    var slug2=$(this).attr('data-slug2');
    var slug=$(this).attr('id');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/'+slug1+'/'+slug2+'/7-13-trieu'
    }).done(function(data){
      $('.price_child_item').html(data);
      location.hash=slug;
    });
    $.ajax({
      url:url+'/ajax/link-price/'+slug1+'/'+slug2+'/7-13-trieu'
    }).done(function(data){
      $('.link_price_child').html(data);
    });
  });

  $(document).on('click', '#tren-13-trieu', function(event) {
    event.preventDefault();
    var slug1=$(this).attr('data-slug1');
    var slug2=$(this).attr('data-slug2');
    var slug=$(this).attr('id');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/'+slug1+'/'+slug2+'/tren-13-trieu'
    }).done(function(data){
      $('.price_child_item').html(data);
      location.hash=slug;
    });
    $.ajax({
      url:url+'/ajax/link-price/'+slug1+'/'+slug2+'/tren-13-trieu'
    }).done(function(data){
      $('.link_price_child').html(data);
    });
  });

  $(document).on('click','.child-item a', function(event) {
    event.preventDefault();
    var id=$(this).attr('data-child-id');
    var slug1=$(this).attr('data-parent-slug');
    var slug2=$(this).attr('data-child-slug');
    var slug=$('.price-active').attr('id')
    if(slug==='duoi-2-trieu'){
      console.log(slug)
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/duoi-2-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $('.child-item a').removeClass('active');
        $('#parent_'+id).addClass('active');
        location.hash=slug2+slug;
      });
    }else if(slug==='2-4-trieu'){
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/2-4-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $('.child-item a').removeClass('active');
        $('#parent_'+id).addClass('active');
        location.hash=slug2+slug;
      });
    }else if(slug==='4-7-trieu'){
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/4-7-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $('.child-item a').removeClass('active');
        $('#parent_'+id).addClass('active');
        location.hash=slug2+slug;
      });
    }else if(slug==='7-13-trieu'){
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/7-13-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $('.child-item a').removeClass('active');
        $('#parent_'+id).addClass('active');
        location.hash=slug2+slug;
      });
    }else if(slug==='tren-13-trieu'){
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/tren-13-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $('.child-item a').removeClass('active');
        $('#parent_'+id).addClass('active');
        location.hash=slug2+slug;
      });
    }
    
  });
  
</script>
@endsection

@section('content')

<div class="container page-feature ">
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
          @include('frontend.pages.categories.price.link_price_child_ajax')   
        </div>        
      </div>
    </div>    
  </div>
</div>
  <div class="container page-feature  ">
   <div class="list-item content-product">
      {{-- @include('frontend.partials.product-sidebar-child') --}}
      @include('frontend.partials.product-sidebar-child-ajax')
    </div>
  </div>
<div class="content-child">
  <div class='container mt-2 page-feature'>
    <div class="price_child_item">
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
  </div>
</div>
@endsection





