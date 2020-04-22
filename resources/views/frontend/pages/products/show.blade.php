@extends('frontend.layouts.master')

@section('title')
  {{ $product->title }} | Ecommerce Site
@endsection

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

<!-- Show Products  -->
<div class='container page-feature pt-2'>  
  <div >  
    <div style="font-size: 14px;" class="mb-2 mt-1">
       <a href="">Trang chủ</a>
       <span class="duongdan px-1">›</span>
       <a href="the-loai/{{ $product->category->parent->slug }}">{{ $product->category->parent->name }}</a>
       <span class="duongdan px-1">›</span>
       <a href="the-loai/{{ $product->category->parent->slug }}/{{ $product->category->slug }}">{{ $product->category->name }}</a>
    </div>
    <h4> {{ $product->description }} <a href="{!! route('products.show',$product->slug) !!}#view-rating" style="font-size: 15px;"><span class="count-review">{{ \willvincent\Rateable\Rating::where('rateable_id',$product->id)->count() }}</span> đánh giá </a>
    
      <div class="fb-like" data-href="https://www.codeinhouse.com/how-to-integrate-facebook-like-and-share-post-button-in-laravel/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true" style="float: right;"></div> 
    </h4>
  </div>
  <hr style="border:1px solid rgba(0, 0, 0, 0.1)">           
  
  @include('frontend.pages.products.partials/show_product')
  @include('frontend.pages.products.rating.uudai')

  </div>
</div>
<div class="{{ $product->category->parent->id==29||$product->category->parent->id==32||$product->category->parent->id==33 ? 'product-compare':'' }}">
  
</div>
<!-- Rating Star -->
<div class="container">
  <div class="row">
    @include('frontend.pages.products.rating.rating')
    @if( $product->category->parent->id==33||$product->category->parent->id==32)
      @include('frontend.pages.products.rating.cauhinh')
    @elseif($product->category->parent->id==29)
      @include('frontend.pages.products.rating.cauhinhlaptop')
    @endif
  </div>
</div>
@endsection


@section('scripts')   
  <script type="text/javascript">
    $(".rating").rating();
  </script> 

  <script type="text/javascript">
    $(document).ready(function(){
      $('.text-rating').hide();     
      $('#rate').mouseup(function() {
        $('.text-rating').show();
      });

      $('.text').hide();
      /*LOOP RATING*/
      $('.cmthref').each(function(){
        var id=$(this).attr('rate_id');
        $('#like-href-'+id).click(function(event) {
          $('#like-href-'+id).html('1 thích');
        });
        $('#cmt-'+id).click(function(event) {
          event.preventDefault();
          $('#text-'+id).toggle();
          /*LOOP COMMENT*/
          $('.text-'+id).each(function(){
            var comment_id=$(this).attr('comment_id');
            $('#child-'+comment_id).toggle();
          });
        });
        /*AJAX SUBMIT COMMENT*/
        $('#submit_cmtrate-'+id).on('submit', function(event) {
          event.preventDefault();
          $.ajax({
            url:"{{ route('rating.comment') }}",
            method:"POST",
            data:$(this).serialize(),
            //dataType:"json",
            success:function(data){
              var html='';
              if(data.errors){
                for(var count = 0; count < data.errors.length; count++){
                  html += '<p id="result-cmt" style="color:#ff3c00; font-size:12px;"><i>' + data.errors[count] + '</i></p>';
                }
                $('#result-errors-'+id).html(html);
                $('#cmt'+id).html(html);
                setTimeout(function(){
                  $("#result-cmt").remove();
                }, 100000 );
              }else{
                $('#submit_cmtrate-'+id)[0].reset();
                var comment=Number($('#count_comment-'+id).html());
                ++comment;
                html=''+comment+'';
                $('#count_comment-'+id).html(html);
                $('#tl_comment-'+id).html('thảo luận');
                console.log(html)
                $('#cmt-child-rating-'+id).before(data);
                $('#cmt-child-rating-'+id).addClass('ml-4');
              }
            }
          });
        });
      });      

      $('.skillbar-bar').each(function(){
        $(this).animate({
            width:$(this).attr('data-percent')
        },400);
      });
    });
  </script>

  <!-- AJAX PRODUCT COMPARE -->
  <script type="text/javascript">
    $(document).ready(function(){
      var url="{{ url('/') }}";
      var slug=$('#rateable_id').attr('data-slug');
      $.ajax({
        url:url+'/ajax/product-compare/'+slug
      }).done(function(data){
        $('.product-compare').html(data);
        $(".rating-compare").rating();
      });
    });
  </script>

  <!-- AJAX STAR -->
  <script type="text/javascript">      
    $('#form-review').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: "{{ route('review') }}",
        method:"POST",
        data: $(this).serialize(),
        dataType:"json",
          success:function(data){
            var html='';
            if(data.errors){
              for(var count = 0; count < data.errors.length; count++){
                html += '<span style="color:#ff3c00;">' + data.errors[count] + '</span>';
              }
              $('#rating-result').html(html);
              setTimeout(function(){
                  $("#rating-result").empty();
                }, 10000 );
            }else{
              $('#form-review')[0].reset();
              $('.count-review').html(data.count);
              html='<p id="p_success" style="color:#28a745;">'+data.success+'</p>';
                $('#rating-result').html(html);
                setTimeout(function(){
                  $("#rating-result").empty();
                }, 10000 );             
              $(".rating").rating();
              $('#skillbar').load(" #skillbar",function(){
                $('.text-rating').hide();
                $('.skillbar-bar').each(function(){
                  $(this).animate({
                      width:$(this).attr('data-percent')
                  },500);
                });
              });
            }
          }
      });
    });
  </script>

  <script type="text/javascript">
    
  </script>
@endsection
