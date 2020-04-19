@extends('frontend.layouts.master')
<!-- JAVASCRIPT -->
@section('scripts')
<script type="text/javascript">
/*Lấy ra sản phẩm thể loại con có giá 2 triệu*/
  $(document).on('click','#duoi-2-trieu',function() {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
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
        $('#price-child-right').html('Dưới 2 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">')
        $('#price-child-right').addClass('py-price')
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug;
      });
    }else{
      /*Không active: lấy ra toàn bộ sản phẩm của thể loại con đang active*/
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug2;
      });
    }         
  });
/*Lấy ra sản phẩm thể loại con có giá 2-4 triệu*/
  $(document).on('click', '#2-4-trieu', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
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
        $('#price-child-right').html('Từ 2-4 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
        $('#price-child-right').addClass('py-price');
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug;
      });
    }else{
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug2;
      });
    }
  });
/*Lấy ra sản phẩm thể loại con có giá 4-7 triệu*/
  $(document).on('click', '#4-7-trieu', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
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
        $('#price-child-right').html('Từ 4-7 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
        $('#price-child-right').addClass('py-price');
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug;
      });
    }else{
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug2;
      });
    }
  });
/*Lấy ra sản phẩm thể loại con có giá 7-13 triệu*/
  $(document).on('click', '#7-13-trieu', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
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
        $('#price-child-right').html('Từ 7-13 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
        $('#price-child-right').addClass('py-price');
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug;
      });
    }else{
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug2;
      });
    }
  });
/*Lấy ra sản phẩm thể loại con có giá trên 13 triệu*/
  $(document).on('click', '#tren-13-trieu', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
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
        $('#price-child-right').html('Trên 13 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
        $('#price-child-right').addClass('py-price');
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug;
      });
    }else{
      $.ajax({
        url:url+'/ajax/category/child/'+slug2
      }).done(function(data){
        $('.content-child').html(data);
        $(".rating").rating();
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá cao đến thấp</span>');
        location.hash=slug2;
      });
    }
  });
/*Click vào danh sách thể loại con*/
  $(document).on('click','.child-item a', function(event) {
    event.preventDefault();
    var id=$(this).attr('data-child-id');
    var slug1=$(this).attr('data-parent-slug');
    var slug2=$(this).attr('data-child-slug');
    var url="{{ url('/') }}";
    /*Khi link giá là link của thể loại cha*/
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
        $('#thap').html('<span>Giá thấp đến cao</span>');
        $('#cao').html('<span>Giá thấp đến cao</span>');
        location.hash=slug2;
      });
    /*Khi link giá là link thể loại con*/
    }else{
      /*Khi link_price_child được active: lấy ra các sản phẩm có giá đang được active*/
      if($('.child-plink').hasClass('price-active')){
        var slug=$('.price-active').attr('id')
        if(slug==='duoi-2-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/duoi-2-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.rating').rating();
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            $('#price-child-right').html('Dưới 2 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
            $('#price-child-right').addClass('py-price');
            $('#thap').html('<span>Giá thấp đến cao</span>');
            $('#cao').html('<span>Giá thấp đến cao</span>');
            location.hash=slug2+slug;
          });
        }else if(slug==='2-4-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/2-4-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.rating').rating();
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            $('#price-child-right').html('Từ 2-4 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
            $('#price-child-right').addClass('py-price');
            $('#thap').html('<span>Giá thấp đến cao</span>');
            $('#cao').html('<span>Giá thấp đến cao</span>');
            location.hash=slug2+slug;
          });
        }else if(slug==='4-7-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/4-7-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.rating').rating();
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            $('#price-child-right').html('Từ 4-7 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
            $('#price-child-right').addClass('py-price');
            $('#thap').html('<span>Giá thấp đến cao</span>');
            $('#cao').html('<span>Giá thấp đến cao</span>');
            location.hash=slug2+slug;
          });
        }else if(slug==='7-13-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/7-13-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.rating').rating();
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            $('#price-child-right').html('Từ 7-13 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
            $('#price-child-right').addClass('py-price');
            $('#thap').html('<span>Giá thấp đến cao</span>');
            $('#cao').html('<span>Giá thấp đến cao</span>');
            location.hash=slug2+slug;
          });
        }else if(slug==='tren-13-trieu'){
          $.ajax({
            url:url+'/ajax/'+slug1+'/'+slug2+'/tren-13-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $('.rating').rating();
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            $('#price-child-right').html('Trên 13 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
            $('#price-child-right').addClass('py-price');
            $('#thap').html('<span>Giá thấp đến cao</span>');
            $('#cao').html('<span>Giá thấp đến cao</span>');
            location.hash=slug2+slug;
          });
        }
      /*Không active:lấy ra tất cả sản phẩm */
      }else{
        if($('#link-new').hasClass('link-check')){
          $.ajax({
            url:url+'/ajax/child/new/'+slug1+'/'+slug2
          }).done(function(data){
            $('.content-child').html(data);
            $('.rating').rating();
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
          });
        }else if($('#link-giamgia').hasClass('link-check')){
          $.ajax({
            url:url+'/ajax/child/giam-gia/'+slug1+'/'+slug2
          }).done(function(data){
            $('.content-child').html(data);
            $('.rating').rating();
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
          });
        }else{
          $.ajax({
            url:url+'/ajax/category/child/'+slug2
          }).done(function(data){
            $('.content-child').html(data);
            $(".rating").rating();
            $('.child-item a').removeClass('active');
            $('#child_'+id).addClass('active');
            $('#thap').html('<span>Giá thấp đến cao</span>');
            $('#cao').html('<span>Giá thấp đến cao</span>');
            location.hash=slug2;
          });
        }
      }  
    }    
  });
/*Click và danh sách thể loại cha*/
  $(document).on('click', '.parent-item a', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
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
/*Click vào tên giá sản phẩm thể loại con*/
  $(document).on('click', '#price-child-right', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    var slug2=$('.child-item a.active').attr('data-child-slug');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/category/child/'+slug2
    }).done(function(data){
      $('.content-child').html(data);
      $(".rating").rating();
      $('a.child-plink').removeClass('price-active');
      $('#thap').html('<span>Giá thấp đến cao</span>');
      $('#cao').html('<span>Giá thấp đến cao</span>');
      location.hash=slug2;
    });
  });
/*Click vào tên thể loại con*/
  $(document).on('click', '#price-parent-right', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    var slug1=$('.parent-item a.active').attr('data-parent-slug');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/parent/'+slug1
    }).done(function(data){
      $('.content-parent').html(data);
      $('.rating').rating();
      $('.child-item a').removeClass('active');
      $('a.child-plink').removeClass('price-active');
    });
    $.ajax({
      url:url+'/ajax/parent-link/'+slug1
    }).done(function(data){
      $('.link_price_child').html(data);
    });
  });
/*Lấy ra thể loại cha có giá dưới 2 triệu*/
  $(document).on('click','#duoi-2t',function() {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    var slug1=$('.parent-item a.active').attr('data-parent-slug');
    var id=$(this).attr('data-parent-id');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/'+slug1+'/duoi-2t'
    }).done(function(data){
      $('.price_parent_item').html(data);
      $('.rating').rating();
      $('a.parent_plink').removeClass('price-active');
      $('#duoi-2t').addClass('price-active');
      $('#thap').html('<span>Giá thấp đến cao</span>');
      $('#cao').html('<span>Giá cao đến thấp</span>');
    });
  });
/*Lấy ra thể loại cha có giá 2-4 triệu*/
  $(document).on('click','#2-4t',function() {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    var slug1=$('.parent-item a.active').attr('data-parent-slug');
    var id=$(this).attr('data-parent-id');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/'+slug1+'/2-4t'
    }).done(function(data){
      $('.price_parent_item').html(data);
      $('.rating').rating();
      $('a.parent_plink').removeClass('price-active');
      $('#2-4t').addClass('price-active');
      $('#thap').html('<span>Giá thấp đến cao</span>');
      $('#cao').html('<span>Giá cao đến thấp</span>');
    });
  });
/*Lấy ra thể loại cha có giá 4-7 triệu*/
  $(document).on('click','#4-7t',function() {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    var slug1=$('.parent-item a.active').attr('data-parent-slug');
    var id=$(this).attr('data-parent-id');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/'+slug1+'/4-7t'
    }).done(function(data){
      $('.price_parent_item').html(data);
      $('.rating').rating();
      $('a.parent_plink').removeClass('price-active');
      $('#4-7t').addClass('price-active');
      $('#thap').html('<span>Giá thấp đến cao</span>');
      $('#cao').html('<span>Giá cao đến thấp</span>');
    });
  });
/*Lấy ra thể loại cha có giá 7-13 triệu*/
  $(document).on('click','#7-13t',function() {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    var slug1=$('.parent-item a.active').attr('data-parent-slug');
    var id=$(this).attr('data-parent-id');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/'+slug1+'/7-13t'
    }).done(function(data){
      $('.price_parent_item').html(data);
      $('.rating').rating();
      $('a.parent_plink').removeClass('price-active');
      $('#7-13t').addClass('price-active');
      $('#thap').html('<span>Giá thấp đến cao</span>');
      $('#cao').html('<span>Giá cao đến thấp</span>');
    });
  });
/*Lấy ra thể loại cha có giá tren 13 triệu*/
  $(document).on('click','#tren-13t',function() {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    var slug1=$('.parent-item a.active').attr('data-parent-slug');
    var id=$(this).attr('data-parent-id');
    var url="{{ url('/') }}";
    $.ajax({
      url:url+'/ajax/'+slug1+'/tren-13t'
    }).done(function(data){
      $('.price_parent_item').html(data);
      $('.rating').rating();
      $('a.parent_plink').removeClass('price-active');
      $('#tren-13t').addClass('price-active');
      $('#thap').html('<span>Giá thấp đến cao</span>');
      $('#cao').html('<span>Giá cao đến thấp</span>');
    });
  }); 
/*Giá thấp đến cao*/
  $(document).on('click', '#thap', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    if($('.child-item a').hasClass('active')){
      var id=$('.child-item a').attr('data-child-id');
      var slug1=$('.child-item a').attr('data-parent-slug');
      var slug2=$('.child-item a.active').attr('data-child-slug');
      var url="{{ url('/') }}";
      if($('.child-plink').hasClass('price-active')){
        if($('#tren-13-trieu').hasClass('price-active')){
          var slug=$(this).attr('id');
          $.ajax({
            url:url+'/ajax/thap/'+slug1+'/'+slug2+'/tren-13-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $(".rating").rating();
            $('#price-child-right').html('Trên 13 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
            $('#price-child-right').addClass('py-price');
            $('#thap').html('<img class="dropdown-active" src="public/images/support/check.png" width="15"><span style="padding-left: 1px"> Giá thấp đến cao</span>');
            $('#cao').html('<span style="padding-left: 10px">Giá cao đến thấp</span>');
            location.hash=slug;
          });
        }
        /*code*/
      }else{
        $.ajax({
          url:url+'/ajax/thap/child/'+slug2
        }).done(function(data){
          $('.content-child').html(data);
          $(".rating").rating();
          $('#thap').html('<img class="dropdown-active" src="public/images/support/check.png" width="15"><span style="padding-left: 1px"> Giá thấp đến cao</span>');
          $('#cao').html('<span style="padding-left: 10px">Giá cao đến thấp</span>');
          location.hash=slug2+'t-c';
        });
      }    
    }else{
      if($('a.parent_plink').hasClass('price-active')){
        /*code*/
      }else {
        var parent_id=$('.parent-item a.active').attr('data-parent-id');
        var slug1=$('.parent-item a.active').attr('data-parent-slug');
        var url="{{ url('/') }}";
        $.ajax({
          url:url+'/ajax/thap/parent/'+slug1
        }).done(function(data){
          $('.content-parent').html(data);
          $('.rating').rating();
          $('#thap').html('<img class="dropdown-active" src="public/images/support/check.png" width="15"><span style="padding-left: 1px"> Giá thấp đến cao</span>');
          $('#cao').html('<span style="padding-left: 10px">Giá cao đến thấp</span>');
          location.hash=slug1+'t-c';
        }); 
      }  
    }
  });
/*Giá cao đến thấp*/
  $(document).on('click', '#cao', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    if($('.child-item a').hasClass('active')){
      var id=$('.child-item a').attr('data-child-id');
      var slug1=$('.child-item a').attr('data-parent-slug');
      var slug2=$('.child-item a.active').attr('data-child-slug');
      var url="{{ url('/') }}";
      if($('.child-plink').hasClass('price-active')){
        if($('#tren-13-trieu').hasClass('price-active')){
          var slug=$(this).attr('id');
          $.ajax({
            url:url+'/ajax/cao/'+slug1+'/'+slug2+'/tren-13-trieu'
          }).done(function(data){
            $('.price_child_item').html(data);
            $(".rating").rating();
            $('#price-child-right').html('Trên 13 triệu <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px">');
            $('#price-child-right').addClass('py-price');
            $('#cao').html('<img class="dropdown-active" src="public/images/support/check.png" width="15"><span style="padding-left: 1px"> Giá cao đến thấp</span>');
            $('#thap').html('<span style="padding-left: 10px">Giá thấp đến cao</span>');
            location.hash=slug;
          });
        }
        /*code*/
      }else{
        $.ajax({
          url:url+'/ajax/cao/child/'+slug2
        }).done(function(data){
          console.log(data)
          $('.content-child').html(data);
          $(".rating").rating();
          $('#cao').html('<img class="dropdown-active" src="public/images/support/check.png" width="15"><span style="padding-left: 1px"> Giá cao đến thấp</span>');
          $('#thap').html('<span style="padding-left: 10px">Giá thấp đến cao</span>');
          location.hash=slug2+'c-t';
        });
      }    
    }else{
      if($('a.parent_plink').hasClass('price-active')){
        /*code*/
      }else {
        var parent_id=$('.parent-item a.active').attr('data-parent-id');
        var slug1=$('.parent-item a.active').attr('data-parent-slug');
        var url="{{ url('/') }}";
        $.ajax({
          url:url+'/ajax/cao/parent/'+slug1
        }).done(function(data){
          $('.content-parent').html(data);
          $('.rating').rating();
          $('#cao').html('<img class="dropdown-active" src="public/images/support/check.png" width="15"><span style="padding-left: 1px"> Giá cao đến thấp</span>');
          $('#thap').html('<span style="padding-left: 10px">Giá thấp đến cao</span>');
          location.hash=slug1+'c-t';
        });
      }   
    }
  });
/*Lấy ra sản phẩm mới*/
  $(document).on('click', '#link-new', function(event) {
    event.preventDefault();
    $('#link-giamgia').removeClass('link-check');
    $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
    $(this).toggleClass('link-check');
    if($('.child-item a').hasClass('active')){
      var slug1=$('.child-item a.active').attr('data-parent-slug');
      var slug2=$('.child-item a.active').attr('data-child-slug');
      var url="{{ url('/') }}";
      if($('#link-new').hasClass('link-check')){
        $.ajax({
          url:url+'/ajax/child/new/'+slug1+'/'+slug2
        }).done(function(data){
          $('.content-child').html(data);
          $('.rating').rating();
          $('a.child-plink').removeClass('price-active');
          $('#link-new').html('<span class=" mr-1" style=""><img src="public/images/support/check-link.png" width="16" height="16" style="" class="img-check"></span> Mới');
          $('#thap').html('<span>Giá thấp đến cao</span>');
          $('#cao').html('<span>Giá thấp đến cao</span>');
          location.hash='new';
        });
      }else{
          $.ajax({
            url:url+'/ajax/category/child/'+slug2
          }).done(function(data){
          $('.content-child').html(data);
          $(".rating").rating();
          $('a.child-plink').removeClass('price-active');
          $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
          $('#thap').html('<span>Giá thấp đến cao</span>');
          $('#cao').html('<span>Giá thấp đến cao</span>');
          location.hash=slug2;
      });
      }
    }else{
      var slug1=$('.parent-item a.active').attr('data-parent-slug');
      var url="{{ url('/') }}";
      if($('#link-new').hasClass('link-check')){
        $.ajax({
          url:url+'/ajax/parent/new/'+slug1
        }).done(function(data){
          $('.content-parent').html(data);
          $('.rating').rating();
          $('a.parent-plink').removeClass('price-active');
          $('#link-new').html('<span class=" mr-1" style=""><img src="public/images/support/check-link.png" width="16" height="16" style="" class="img-check"></span> Mới');
          $('#thap').html('<span>Giá thấp đến cao</span>');
          $('#cao').html('<span>Giá thấp đến cao</span>');
          location.hash='new';
        });
      }else{
        $.ajax({
          url:url+'/ajax/parent/'+slug1
        }).done(function(data){
          $('.content-parent').html(data);
          $('.rating').rating();
          $('a.parent-plink').removeClass('price-active');
          $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
          location.hash=slug1;
        });
      }
    }     
  });
/*Lấy ra sản phẩm trả góp*/
  $(document).on('click', '#link-tragop', function(event) {
    event.preventDefault();
    $(this).toggleClass('link-check');
  });
/*Lấy ra sản phẩm có giảm giá*/
  $(document).on('click', '#link-giamgia', function(event) {
    event.preventDefault();
    $('#link-new').removeClass('link-check');
    $('#link-new').html('<span class="link-check-none mr-1" style=""></span> Mới');
    $(this).toggleClass('link-check');
    if($('.child-item a').hasClass('active')){
      var slug1=$('.child-item a.active').attr('data-parent-slug');
      var slug2=$('.child-item a.active').attr('data-child-slug');
      var url="{{ url('/') }}";
      if($('#link-giamgia').hasClass('link-check')){
        $.ajax({
          url:url+'/ajax/child/giam-gia/'+slug1+'/'+slug2
        }).done(function(data){
          $('.content-child').html(data);
          $('.rating').rating();
          $('a.child-plink').removeClass('price-active');
          $('#link-giamgia').html('<span class=" mr-1" style=""><img src="public/images/support/check-link.png" width="16" height="16" style="" class="img-check"></span> Khuyến mãi<span class="new-after">MỚI</span>');
          $('#thap').html('<span>Giá thấp đến cao</span>');
          $('#cao').html('<span>Giá thấp đến cao</span>');
          location.hash='giam-gia';
        });
      }else{
          $.ajax({
            url:url+'/ajax/category/child/'+slug2
          }).done(function(data){
          $('.content-child').html(data);
          $(".rating").rating();
          $('a.child-plink').removeClass('price-active');
          $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
          $('#thap').html('<span>Giá thấp đến cao</span>');
          $('#cao').html('<span>Giá thấp đến cao</span>');
          location.hash=slug2;
      });
      }
    }else{
      var slug1=$('.parent-item a.active').attr('data-parent-slug');
      var url="{{ url('/') }}";
      if($('#link-giamgia').hasClass('link-check')){
        $.ajax({
          url:url+'/ajax/parent/giam-gia/'+slug1
        }).done(function(data){
          $('.content-parent').html(data);
          $('.rating').rating();
          $('a.parent-plink').removeClass('price-active');
          $('#link-giamgia').html('<span class=" mr-1" style=""><img src="public/images/support/check-link.png" width="16" height="16" style="" class="img-check"></span> Khuyến mãi<span class="new-after">MỚI</span>');
          $('#thap').html('<span>Giá thấp đến cao</span>');
          $('#cao').html('<span>Giá thấp đến cao</span>');
          location.hash='giam-gia';
        });
      }else{
        $.ajax({
          url:url+'/ajax/parent/'+slug1
        }).done(function(data){
          $('.content-parent').html(data);
          $('.rating').rating();
          $('a.parent-plink').removeClass('price-active');
          $('#link-giamgia').html('<span class="link-check-none mr-1" style=""></span> Khuyến mãi<span class="new-after">MỚI</span>');
          location.hash=slug1;
        });
      }
    } 
  });
    
</script>
@endsection

@section('content')
<div class="container page-feature pt-0">
  <div class="mt-3 mb-2">
    <div class="row ">
      <!-- SIDEBAR PARENT AJAX -->
      <div class="col-12 mt-0">
        @include('frontend.partials.product-sidebar-parent-ajax')
      </div>
      <!-- LINK GIÁ SP PARENT OR CHILD -->       
      <div class="price col-12 mt-3">
        <div class="link_price_child">
          @if(isset($products))
            @include('frontend.pages.categories.price.link_price_child_ajax') 
          @elseif(isset($categories))  
            @include('frontend.pages.categories.price.link_price_parent_ajax')
          @endif
        </div>        
      </div>
    </div>
   <!-- SIDEBAR CHILD AJAX -->
    <div class="list-item content-product mt-2">   
      @include('frontend.partials.product-sidebar-child-ajax')        
    </div>    
  </div>
</div>

<div class="content-parent">
  <div class="content-child">
    <div class='container mt-0 page-feature'>
      <div class="price_parent_item">
        <div class="price_child_item">
        @if(isset($products))
          <!-- XEM SẢN PHẨM THỂ LOẠI CON (từ showParent->show_price)-->
          @if(isset($setup)) 
            @include('frontend.pages.categories.partials.show_child')
          <!-- XEM GIÁ SẢN PHẨM THỂ LOẠI CON (ĐÃ XÓA CHỨC NĂNG NÀY--trước đó từ show->show_price) -->
          @else
            @include('frontend.pages.categories.partials.show_price_child')
          @endif
        <!-- XEM GIÁ SẢN PHẨM THỂ LOẠI CHA (từ showParent->show_price)-->
        @elseif(isset($categories))
          @include('frontend.pages.categories.partials.show_price_parent')
        @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection