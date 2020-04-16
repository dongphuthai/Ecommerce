@extends('frontend.layouts.master')
@section('scripts')
<script type="text/javascript">
/*Lấy ra sản phẩm có giá 2 triệu*/
  $(document).on('click','#duoi-2-trieu',function() {
    event.preventDefault();
    /*Bắt lấy slug của thể loại con đang được active*/
    var slug1=$('.child-item a.active').attr('data-parent-slug');
    var slug2=$('.child-item a.active').attr('data-child-slug');
    var slug=$(this).attr('id');
    var id=$('.child-item a').attr('data-child-id');
    var url="{{ url('/') }}";
    /*Remove class price-active */
    $('#2-4-trieu').removeClass('price-active');
    $('#4-7-trieu').removeClass('price-active');
    $('#7-13-trieu').removeClass('price-active');
    $('#tren-13-trieu').removeClass('price-active');
    /*Thêm và xóa class price-active khỏi $this*/
    $(this).toggleClass('price-active');
    // Thay cho .toggle(handler1,handler2...) trong JQ-1.9.Sự kiện click lần lượt.
    if($(this).hasClass('price-active')){
      // Đang active: lấy ra các sản phẩm dưới 2 triệu
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/duoi-2-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $(".rating").rating();
        location.hash=slug;
      });
    }else{
      /*Không active: lấy ra toàn bộ sản phẩm của thể loại con đang active*/
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        location.hash=slug2;
      });
    }         
  });
/*Lấy ra sản phẩm có giá 2-4 triệu*/
  $(document).on('click', '#2-4-trieu', function(event) {
    event.preventDefault();
    var slug1=$('.child-item a.active').attr('data-parent-slug');
    var slug2=$('.child-item a.active').attr('data-child-slug');
    var slug=$(this).attr('id');
    var id=$('.child-item a').attr('data-child-id');
    var url="{{ url('/') }}";
    $('#duoi-2-trieu').removeClass('price-active');
    $('#4-7-trieu').removeClass('price-active');
    $('#7-13-trieu').removeClass('price-active');
    $('#tren-13-trieu').removeClass('price-active');
    $(this).toggleClass('price-active');
    if($(this).hasClass('price-active')){
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/2-4-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $(".rating").rating();
        location.hash=slug;
      });
    }else{
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        location.hash=slug2;
      });
    }
  });
/*Lấy ra sản phẩm có giá 4-7 triệu*/
  $(document).on('click', '#4-7-trieu', function(event) {
    event.preventDefault();
    var slug1=$('.child-item a.active').attr('data-parent-slug');
    var slug2=$('.child-item a.active').attr('data-child-slug');
    var slug=$(this).attr('id');
    var id=$('.child-item a').attr('data-child-id');
    var url="{{ url('/') }}";
    $('#duoi-2-trieu').removeClass('price-active');
    $('#2-4-trieu').removeClass('price-active');
    $('#7-13-trieu').removeClass('price-active');
    $('#tren-13-trieu').removeClass('price-active');
    $(this).toggleClass('price-active');
    if($(this).hasClass('price-active')){
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/4-7-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $(".rating").rating();
        location.hash=slug;
      });
    }else{
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        location.hash=slug2;
      });
    }
  });
/*Lấy ra sản phẩm có giá 7-13 triệu*/
  $(document).on('click', '#7-13-trieu', function(event) {
    event.preventDefault();
    var slug1=$('.child-item a.active').attr('data-parent-slug');
    var slug2=$('.child-item a.active').attr('data-child-slug');
    var slug=$(this).attr('id');
    var id=$('.child-item a').attr('data-child-id');
    var url="{{ url('/') }}";
    $('#duoi-2-trieu').removeClass('price-active');
    $('#2-4-trieu').removeClass('price-active');
    $('#4-7-trieu').removeClass('price-active');
    $('#tren-13-trieu').removeClass('price-active');
    $(this).toggleClass('price-active');
    if($(this).hasClass('price-active')){
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/7-13-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $(".rating").rating();
        location.hash=slug;
      });
    }else{
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        location.hash=slug2;
      });
    }
  });
/*Lấy ra sản phẩm có giá trên 13 triệu*/
  $(document).on('click', '#tren-13-trieu', function(event) {
    event.preventDefault();
    var slug1=$('.child-item a.active').attr('data-parent-slug');
    var slug2=$('.child-item a.active').attr('data-child-slug');
    var slug=$(this).attr('id');
    var id=$('.child-item a').attr('data-child-id');
    var url="{{ url('/') }}";
    $('#duoi-2-trieu').removeClass('price-active');
    $('#2-4-trieu').removeClass('price-active');
    $('#7-13-trieu').removeClass('price-active');
    $('#4-7-trieu').removeClass('price-active');
    $(this).toggleClass('price-active');
    if($(this).hasClass('price-active')){
      $.ajax({
        url:url+'/ajax/'+slug1+'/'+slug2+'/tren-13-trieu'
      }).done(function(data){
        $('.price_child_item').html(data);
        $(".rating").rating();
        location.hash=slug;
      });
    }else{
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        location.hash=slug2;
      });
    }
  });
/*Sự kiện khi click vào danh sách thể loại con*/
  $(document).on('click','.child-item a', function(event) {
    event.preventDefault();
    var id=$(this).attr('data-child-id');
    var slug1=$(this).attr('data-parent-slug');
    var slug2=$(this).attr('data-child-slug');
    var url="{{ url('/') }}";
    /*Khi link_price_child được active: lấy ra các sản phẩm có giá đang được active*/
    if($('.link_price_child a').hasClass('parent_plink')){
      $.ajax({
        url:url+'/ajax/link-price/'+slug2
      }).done(function(data){
        $('.link_price_child').html(data);
      });
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        $('.child-item a').removeClass('active');
        $('#child_'+id).addClass('active');
        location.hash=slug2;
      });
    }else{
      if($('.child-plink').hasClass('price-active')){
        var slug=$('.price-active').attr('id')
        if(slug==='duoi-2-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/duoi-2-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            location.hash=slug2+slug;
          });
        }else if(slug==='2-4-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/2-4-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            location.hash=slug2+slug;
          });
        }else if(slug==='4-7-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/4-7-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            location.hash=slug2+slug;
          });
        }else if(slug==='7-13-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/7-13-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            location.hash=slug2+slug;
          });
        }else if(slug==='tren-13-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/tren-13-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            location.hash=slug2+slug;
          });
        }
      /*Không active:lấy ra tất cả sản phẩm */
      }else{
        $.ajax({
          url:url+'/ajax/category/child/'+slug2
        }).done(function(data){
          $('.content-child').html(data);
          $(".rating").rating();
          $('.child-item a').removeClass('active');
          $('#child_'+id).addClass('active');
          location.hash=slug2;
        });
      }  
    }    
  });
  /*Sự kiện click và danh sách thể loại cha*/
  $(document).on('click', '.parent-item a', function(event) {
    event.preventDefault();
    var parent_id=$(this).attr('data-parent-id');
    var slug1=$(this).attr('data-parent-slug');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/parent/'+slug1
    }).done(function(data){
      $('.content-parent').html(data);
      $('.rating').rating();
      $('.parent-item a').removeClass('active');
      $('#parent_'+parent_id).addClass('active');
      location.hash=slug1;
    });
    $.ajax({
      url:url+'/ajax/sidebar-child/'+parent_id
    }).done(function(data){
      $('.content-product').html(data);
    });
    $.ajax({
      url:url+'/ajax/parent-link/'+slug1
    }).done(function(data){
      $('.link_price_child').html(data);
    });
  });
</script>
@endsection

@section('content')

<div class="container page-feature ">
  <div class="mt-2 mb-2">
    <div class="row">
      <div class="col-12 col-lg-8 ">
        @include('frontend.partials.product-sidebar-parent-ajax')
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
      @include('frontend.partials.product-sidebar-child-ajax')        
  </div>
</div>

<div class="content-parent">
  <div class="content-child">
    <div class='container mt-2 page-feature'>
      <div class="price_parent_item">
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
  </div>
</div>
@endsection





