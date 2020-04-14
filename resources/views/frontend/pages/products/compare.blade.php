@extends('frontend.layouts.master')

@section('content')

<div class="container page-feature pt-2" style="font-size: 14px">
  <div style="font-size: 14px;" class="mb-2 mt-1">
    <a href="">Trang chủ</a>
    <span class="duongdan px-1">›</span>
    <a href="the-loai/{{ $product->category->parent->slug }}">{{ $product->category->parent->name }}</a>
    <span class="duongdan px-1">›</span>
    <a href="the-loai/{{ $product->category->parent->slug }}/{{ $product->category->slug }}">{{ $product->category->name }}</a>
    <span class="duongdan px-1">›</span>
    <a href="products/{{ $product->slug }}">{{ $product->title }}</a>
  </div>
  <h4 class="pb-2" class="data-compare">So sánh điện thoại
    <span id="slug1" title1="{{ $slug1 }}"><b>{{ $product->title }}</b></span>
    <span id="slug2" title2="{{ $slug2 }}">và <b>{{ $pdt->title }}</b></span>
  </h4>
  <section>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"></li>
      <li class="cp-cell cp-cell-2 cp-product pt-4" id="itemProd1">
        <a href="{!! route('products.show',$product->slug) !!}" >        
          <img class="img-product p-1" src="public/images/product/{{ $product->image }} " alt=" {{ $product->title }}" >            
          @if($product->discount>0)
            <label class="card-title m-0 giam-gia-parent hiddenphone"><img src="public/images/discount.png" width="18"> Giảm {!! number_format($product->discount,0,"",".") !!}₫</label>
          @else
            <label class="card-title m-0 tra-gop-parent hiddenphone">Trả góp 0%</label>
          @endif
          <div class="card-body p-0 pt-2 pl-2">         
            <h4 class="card-title mb-1 pl-2">
              <a class="product-title" href="{!! route('products.show',$product->slug) !!}">{{ $product->title }}</a>
              <a href="{!! route('products.show',$product->slug) !!}#view-rating"><small style="color: blue"><span>{{ \willvincent\Rateable\Rating::where('rateable_id',$product->id)->count() }}</span> đánh giá</small></a>
            </h4>
            <p class="pl-2">
            @if($product->discount>0)
              <span class="card-text">{!! number_format($product->offer_price,0,"",".") !!}₫ </span>
              <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($product->price,0,"",".") }} ₫ </span></small>
            @else
              <span class="card-text">{{ number_format($product->price,0,"",".") }}₫ </span>
            @endif
            </p>
            
            <input id="input-{{ $product->id }}" name="input-id" class="rating rating-loading " data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="x" disabled >
          </div>
        </a>
      </li>
      <li class="cp-cell cp-cell-3 cp-product pt-4" >
        <div class="cancelPro2">
          <img src="public/images/support/delete.png" class="cancel-img" id="cancel-img" width="22">
        </div>
        <div id="itemProd2">
          
        </div>        
      </li>
    </ul>    
  </section>

  @if( $product->category->parent->id==33||$product->category->parent->id==32)
    @include('frontend.pages.products.compare.table_compare')
  @elseif($product->category->parent->id==29)
    @include('frontend.pages.products.compare.table_compare_laptop')
  @endif

  <section>
    <h2 class="compare-table-title mb-0">Thông tin khác</h2>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"><span class="cp-space">Thời điểm ra mắt</span></li>
      <li class="cp-cell cp-cell-2">
        <span class="cp-space"></span>
      </li>
      <li class="cp-cell cp-cell-3 cp-product">
        <span class="cp-space" id="para1"></span>
      </li>
    </ul>
    <ul class="compare-table compare-product mb-0">
      <li class="cp-cell cp-cell-1"></li>
      <li class="cp-cell cp-cell-2 cp-product pt-2 pb-2" id="itemProd1">
        <div class="mt-3 p-2" id="card-button1">
           @include('frontend.pages.products.partials.cart-button')
        </div>
      </li>
      <li class="cp-cell cp-cell-3 cp-product pt-2" >
        <div class="mt-3 p-2" id="card-button2">
          
        </div>      
      </li>
    </ul>
  </section>
</div>
@endsection


@section('scripts')
  <script type="text/javascript">
    $("#input-id").rating();
  </script> 
<!-- STAR PAGE COMPARE -->
  <script type="text/javascript">
    $(document).ready(function(){
      var slug=$('#slug2').attr('title2');
      var url="{{ url('/') }}";
      $.ajax({
        url:url+'/ajax/card-compare/'+slug
      }).done(function(data){
        $('#itemProd2').html(data);
        $(".rating").rating();
      });
      $.ajax({
        url:url+'/ajax/card-compare/para/'+slug
      }).done(function(data){
        if(data.parent_id==29){
          $('#para1').html(data.para.cpu);
          $('#para2').html(data.para.ram);
          $('#para3').html(data.para.hard_drive);
          $('#para4').html(data.para.screen);
          $('#para5').html(data.para.card_screen);
          $('#para6').html(data.para.connector);
          $('#para7').html(data.para.operating_system);
          $('#para8').html(data.para.design);
          $('#para9').html(data.para.size);
          $('#para10').html(data.para.time_launch);
        }else if(data.parent_id==32||data.parent_id==33){
          $('#para1').html(data.para.screen);
          $('#para2').html(data.para.operating_system);
          $('#para3').html(data.para.rear_camera);
          $('#para4').html(data.para.front_camera);
          $('#para5').html(data.para.cpu);
          $('#para6').html(data.para.ram);
          $('#para7').html(data.para.internal_memory);
          $('#para8').html(data.para.memory);
          $('#para9').html(data.para.sim);
          $('#para10').html(data.para.pin);
        }       
      });
      $.ajax({
        url:url+'/ajax/button-compare/'+slug
      }).done(function(data){
        $('#card-button2').html(data);
      });
    });
  </script>
<!-- CLICK CANCEL BUTTON -->
  <script type="text/javascript">   
    $(document).on('click', '#cancel-img', function(event) {
      event.preventDefault();
      $('#para1').empty();
      $('#para2').empty();
      $('#para3').empty();
      $('#para4').empty();
      $('#para5').empty();
      $('#para6').empty();
      $('#para7').empty();
      $('#para8').empty();
      $('#para9').empty();
      $('#para10').empty(); 
      $('#card-button2').empty();  
      $('#itemProd2').empty();
      $('#slug2').empty();
      $('.cancelPro2').empty();
      $('#itemProd2').html('<h6 class="hiddenphone text-center" style="font-size:14px;"><b>CHỌN SẢN PHẨM ĐỂ SO SÁNH</b></h6><div class="input-group search-input"><input type="text" class="form-control search-compare" id="search-compare" name="search" placeholder="Nhập sản phẩm cần so sánh" ></div>');
      var slug=$('#slug1').attr('title1');
      var url="{{ url('/') }}";
        var engine = new Bloodhound({
            remote: {
                url:  url+'/products/new/search?search=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('search'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });
        $(".search-compare").typeahead({
            hint: true,
            highlight: true,
            minLength: 3
        },{
            source: engine.ttAdapter(),
            limit:10,
            display: function(data){
            },templates: {
                suggestion: function (data) {
                    var price=number_format(data.price, 0, ',', '.');
                    return '<a href="products/'+data.slug+'" class="list-group-item" style="width:370px">' + data.title + '</a>';
                }
            }
        });
    });
  </script>
<!-- CLICK SEARCH PRODUCT COMPARE -->
  <script type="text/javascript">
    $(document).on('click', '.search-input a', function(event) {
      event.preventDefault();
      var slug=($(this).attr('href').split('/')[1]);
      var url="{{ url('/') }}";
      $.ajax({
        url:url+'/ajax/card-compare/'+slug
      }).done(function(data){
        $(".rating").rating();
        $('#itemProd2').html(data);
        $('.cancelPro2').html('<img src="public/images/support/delete.png" class="cancel-img" id="cancel-img" width="22">');
      });
      $.ajax({
        url:url+'/ajax/card-compare/para/'+slug
      }).done(function(data){
        if(data.parent_id==29){
          $('#para1').html(data.para.cpu);
          $('#para2').html(data.para.ram);
          $('#para3').html(data.para.hard_drive);
          $('#para4').html(data.para.screen);
          $('#para5').html(data.para.card_screen);
          $('#para6').html(data.para.connector);
          $('#para7').html(data.para.operating_system);
          $('#para8').html(data.para.design);
          $('#para9').html(data.para.size);
          $('#para10').html(data.para.time_launch);
        }else if(data.parent_id==32||data.parent_id==33){
          $('#para1').html(data.para.screen);
          $('#para2').html(data.para.operating_system);
          $('#para3').html(data.para.rear_camera);
          $('#para4').html(data.para.front_camera);
          $('#para5').html(data.para.cpu);
          $('#para6').html(data.para.ram);
          $('#para7').html(data.para.internal_memory);
          $('#para8').html(data.para.memory);
          $('#para9').html(data.para.sim);
          $('#para10').html(data.para.pin);
        }
        $('#slug2').html('và <b>'+data.pdt.title+'</b>');
      });
      $.ajax({
        url:url+'/ajax/button-compare/'+slug
      }).done(function(data){
        $('#card-button2').html(data);

      });
    });
  </script>


  
@endsection