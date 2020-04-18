@extends('frontend.layouts.master')
<!-- JAVASCRIPT -->
@section('scripts')
<script type="text/javascript">
/*Lấy ra sản phẩm thể loại con có giá 2 triệu*/
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
  });
/*Click và danh sách thể loại cha*/
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
/*Click vào tên giá sản phẩm thể loại con*/
  $(document).on('click', '#price-child-right', function(event) {
    event.preventDefault();
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
        <!-- XEM SẢN PHẨM THỂ LOẠI CON -->
        @if(isset($products))
          @if(isset($setup)) 
            @include('frontend.pages.categories.price.all_products_child')
          @else
          @php
          $name_child=App\Models\Category::where('id',$id_child)->first()->name;
          $str_parent=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
          $str_child=mb_convert_case(App\Models\Category::where('id',$id_child)->first()->name,MB_CASE_UPPER, "UTF-8");
          @endphp          
          <div class="mb-3 mt-2">
            <div class="float-right" style="font-size: 15px">
              @if($price==1)
                <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} <span class="hiddenphone">DƯỚI 2 TRIỆU</span></b></span>
              @elseif($price==2)
                <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }}  <span class="hiddenphone">TỪ 2-4 TRIỆU</span></b></span>
              @elseif($price==3)
                <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }}  <span class="hiddenphone">TỪ 4-7 TRIỆU</span></b></span>
              @elseif($price==4)
                <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }}  <span class="hiddenphone">TỪ 7-13 TRIỆU</span></b></span>
              @elseif($price==5)
                <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }}  <span class="hiddenphone">TRÊN 13 TRIỆU</span></b></span>
              @endif
            </div> 
            <span class="price-right mr-1">
              <a href="javascript:void(0)" id="price-parent-right" class="px-2 py-price">{{ $name_child }} <img src="public/images/support/close-button.png" width="12px"></a>
            </span>
            <span class="price-right">
              @if($price==1)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Dưới 2 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @elseif($price==2)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Từ 2-4 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @elseif($price==3)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Từ 4-7 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @elseif($price==4)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Từ 7-13 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @elseif($price==5)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Trên 13 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @endif
            </span>       
          </div>
          <div class="list-item " style="min-height: 250px;">            
            @if ($products->count() > 0)
              @include('frontend.pages.products.partials.all_products')
            @endif
          </div>
          @endif
        <!-- XEM SẢN PHẨM THỂ LOẠI CHA -->
        @elseif(isset($categories))
          @php
            $str=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
          @endphp 
          <div id="hidden2" >
            @if($price==1)
              <p style="font-family: arial;"><b>{{ $str }} DƯỚI 2 TRIỆU</b></p>
            @elseif($price==2)
              <p style="font-family: arial;"><b>{{ $str }} TỪ 2-4 TRIỆU</b></p>
            @elseif($price==3)
              <p style="font-family: arial;"><b>{{ $str }} TỪ 4-7 TRIỆU</b></p>
            @elseif($price==4)
              <p style="font-family: arial;"><b>{{ $str }} TỪ 7-13 TRIỆU</b></p>
            @elseif($price==5)
              <p style="font-family: arial;"><b>{{ $str }} TRÊN 13 TRIỆU</b></p>
            @endif

            <div class="list-item" style="min-height: 200px;">
              @foreach($categories as $category)  
                @php
                if($price==1) {
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','<','2000000')->get();
                }elseif($price==2){
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','>=','2000000')->where('price','<','4000000')->get();
                }elseif($price==3){
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','>=','4000000')->where('price','<','7000000')->get();
                }elseif($price==4){
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','>=','7000000')->where('price','<','13000000')->get();
                }elseif($price==5){
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','>','13000000')->get();
                }
                @endphp

                @if ($products->count() > 0)
                  @include('frontend.pages.products.partials.all_products')
                @endif
              @endforeach
            </div>
          </div>
        @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection