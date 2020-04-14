@extends('frontend.layouts.master')

@section('content')

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

<div class="container page-feature pt-2">
  <div style="font-size: 14px;" class="mb-2 mt-1">
    <a href="">Trang chủ</a>
    <span class="duongdan px-1">›</span>
    <a href="the-loai/{{ $product->category->parent->slug }}">{{ $product->category->parent->name }}</a>
    <span class="duongdan px-1">›</span>
    <a href="the-loai/{{ $product->category->parent->slug }}/{{ $product->category->slug }}">{{ $product->category->name }}</a>
    <span class="duongdan px-1">›</span>
    <a href="products/{{ $product->slug }}">{{ $product->title }}</a>
  </div>
  <h5 id="view-rating"  >
    <b><span class="count-review">{{ \willvincent\Rateable\Rating::where('rateable_id',$product->id)->count() }}</span> đánh giá {{ $product->title }}</b>
    <div class="fb-like" data-href="https://www.codeinhouse.com/how-to-integrate-facebook-like-and-share-post-button-in-laravel/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true" style="float: right;"></div>
  </h5>
  <hr>
  <div class="row pt-1">
    <div class="col-12 col-xl-4 mb-3" style="font-size: 14px;">
      <div class="hiddentitle">
        <img class=" " src="public/images/product/{{ $product->image }}" width="170" height="auto" style="">
        <div style="position: absolute;top: 35px;left:210px;">
          <b><p>{{ $product->title }}</p>
          <p style="color:#e10b41">{!! number_format($product->offer_price,0,"",".") !!}₫</p></b>
          <a href="{!! route('products.show',$product->slug) !!}" class="btn btn-primary py-1 px-4 mt-3">Xem chi tiết</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-xl-8 " style="font-size: 14px;">
      <div class="d-flex justify-content-between" style="display: inline-block; margin-bottom: -20px;">    
        <form id="form-review" action="{{ route('review') }}" method="post" style="width: 100%; margin-bottom: 35px;">

          <div class="form-inline float-right pb-1" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div id="rate">                              
              <small>
                <input id="input-1 " name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="" data-size="xs">
              </small>              
              <input id="rateable_id" type="hidden" data-slug="{{ $product->slug }}" name="id" required="" value="{{ $product->id }}" > 
            </div>
              <button type="submit" class="btn btn-success ml-3 p-1" style="font-size: 14px;">Đánh giá sản phẩm</button>
            </div>
            <div id="rating-result" class="pt-3" style="font-size: 12px"></div>
            <div class="form-group text-rating pt-4" style="margin-bottom: 10px;">
              <label for="comment"></label>
              <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Nhập đánh giá về sản phẩm (tối thiểu 50 ký tự)"></textarea>
            </div>
        </form>
      </div>

      <div id="skillbar">
        <div class="in_skillbar" style="display: flex;" >
          <div class="left">
            <span id="danhgia" class="side-left">{{ number_format($product->averageRating,1) }}</span>
            <small style="vertical-align: top; color: orange" class="hidden-star"><i class="fas fa-star" ></i></small>
          </div>
          <div class="side" style="border-left: 1px solid rgba(0, 0, 0, 0.1); padding-left: 10px;">
            <div>5 <i class="fas fa-star" ></i></div>
            <div class="">4 <i class="fas fa-star" ></i></div>
            <div class="">3 <i class="fas fa-star" ></i></div>
            <div class="">2 <i class="fas fa-star" ></i></div>
            <div class="">1 <i class="fas fa-star" ></i></div>
          </div>
          @php
            $ratings=\willvincent\Rateable\Rating::where('rateable_id',$product->id)->get();
            if($ratings->count()>0){
              $rating=$ratings->count();             
            }else{
              $rating=1;
            }
          @endphp

          <div class="middle">
            <div class="bar-container">
              <div class="skill-color">
                <div class="skillbar-bar" data-percent="{{ $percent=$ratings->where('rating','5')->count()/$rating*100 }}%"></div>
              </div>
              <div class="skill-color">
                <div class="skillbar-bar bar-margin" data-percent="{{ $percent=$ratings->where('rating','4')->count()/$rating*100 }}%"></div>
              </div>  
              <div class="skill-color">
                <div class="skillbar-bar bar-margin" data-percent="{{ $percent=$ratings->where('rating','3')->count()/$rating*100 }}%"></div>
              </div>
              <div class="skill-color">
                <div class="skillbar-bar bar-margin" data-percent="{{ $percent=$ratings->where('rating','2')->count()/$rating*100 }}%"></div>
              </div>
              <div class="skill-color">
                <div class="skillbar-bar bar-margin" data-percent="{{ $percent=$ratings->where('rating','1')->count()/$rating*100 }}%"></div>
              </div>
            </div>
          </div>

          <div class="side right">
            <div><a href="#">{{ $ratings->where('rating',5)->count() }} đánh giá</a></div>
            <div><a href="#">{{ $ratings->where('rating',4)->count() }} đánh giá</a></div>
            <div><a href="#">{{ $ratings->where('rating',3)->count() }} đánh giá</a></div>
            <div><a href="#">{{ $ratings->where('rating',2)->count() }} đánh giá</a></div>
            <div><a href="#">{{ $ratings->where('rating',1)->count() }} đánh giá</a></div>
          </div>
        </div>
      </div>    
    </div>
  </div>
  <hr class="mb-0 mt-3">
  <div class="row">
    <div class="col-12 col-xl-8" style="font-size: 14px;">
      <!-- COMMENT -->
      <div style="font-size: 14px">
        <ul class="ratingLst pl-0 mt-2">                   
          @foreach($ratings as $rating)
            @if(!is_null($rating->comment))
                <li class="par ml-2 mt-3">
                  <div class="rh">
                    <span>{{ App\Models\User::where('id',$rating->user_id)->first()->first_name}} {{ App\Models\User::where('id',$rating->user_id)->first()->last_name}}</span>
                    <span><small>
                        <input id="input-{{ $rating->id }} " name="" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $rating->rating }}" data-size="xs" disabled>
                    </small></span>
                  </div>
                  <div class="rc ml-2">
                    <p class=""><i>{{ $rating->comment }}</i></p>
                    @php 
                      Carbon\Carbon::setLocale('vi') ;
                      $comments=App\Models\Cmtrate::where('rating_id',$rating->id)->get();
                    @endphp
                    <div style="margin-top: -12px; color: #999;">
                      <span><a href="javascript:void(0)" class="cmthref" rate_id="{{ $rating->id }}" id="cmt-{{ $rating->id }}" style="color: #007bff">
                        <span id="count_comment-{{ $rating->id }}">{{ count($comments)>0 ? count($comments):'' }}</span> <span id="tl_comment-{{ $rating->id }}">{{ count($comments)>0 ? 'thảo luận':'Thảo luận' }}</span>
                      </a></span>
                      <span> • </span>
                      <span style="">{{ $rating->updated_at->diffForHumans(Carbon\Carbon::now()) }}</span>
                    </div>                                         
                  </div>
                </li>

                @if(count($comments)==0)
                  <li class="par ml-3 mt-3" id="cmt-child-rating-{{ $rating->id }}">
                    <div class="rh">                   
                      <div class="mt-2 mb-3 text" id="text-{{ $rating->id }}" style="border: none;padding-left: 0px;">
                        <form id="submit_cmtrate-{{ $rating->id }}" action="{{ route('rating.comment') }}" method="post" accept-charset="utf-8" class="form-inline">
                          @csrf
                          <input type="text" class="form-control mr-2" name="cmtrating" value="" placeholder="Nhập thảo luận của bạn" style="font-size: 14px;padding:7px;width: 380px">
                          <input type="hidden" name="rating_id" value="{{ $rating->id }}"> 
                          <button class="rrSend" type="submit">Gửi</button>
                        </form>
                        <div id="result-errors-{{ $rating->id }}">
                        
                        </div>
                      </div >                     
                    </div>
                  </li>
                @endif
                
                @if(count($comments)>0)
                  @foreach($comments as $comment) 
                    @php 
                    $rate_cmt=\willvincent\Rateable\Rating::where('id',$comment->rating_id)->first();
                    @endphp                   
                    <li class="par ml-4 mt-3 text text-{{ $comment->rating_id }}" comment_id="{{ $comment->id }}" id="child-{{ $comment->id }}">
                      <div class="rh">
                        <span>{{ App\Models\User::where('id',$comment->user_id)->first()->first_name}} {{ App\Models\User::where('id',$comment->user_id)->first()->last_name}}</span>
                      </div>
                      <div class="rc ml-2">
                        <p class=""><i>{{ $comment->cmtrating }}</i></p>
                        @php 
                          Carbon\Carbon::setLocale('vi') ;
                        @endphp
                        <div style="margin-top: -12px; color: #999;">                  
                          <span style="">{{ $comment->updated_at->diffForHumans(Carbon\Carbon::now()) }}</span>
                        </div>                                          
                      </div>
                    </li>
                  @endforeach                 

                  <li class="par ml-4 mt-3 child-cmt" id="cmt-child-rating-{{ $rating->id }}">
                    <div class="mt-3 mb-3 text" id="text-{{ $rating->id }}" style="border: none;padding-left: 0px;">
                      <form id="submit_cmtrate-{{ $rating->id }}" action="{{ route('rating.comment') }}" method="post" accept-charset="utf-8" class="form-inline">
                        @csrf
                        <input type="text" class="form-control mr-2" name="cmtrating" value="" placeholder="Nhập thảo luận của bạn" style="font-size: 14px;padding:7px;width: 380px">
                        <input type="hidden" name="rating_id" value="{{ $rating->id }}"> 
                        <button class="rrSend" type="submit">Gửi</button>
                      </form> 
                      <div id="result-errors-{{ $rating->id }}">
                        
                      </div>                  
                    </div >
                  </li>
                @endif

            @endif
          @endforeach         
        </ul>
      </div> 
    </div>
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

      $('.cmthref').each(function(){
        var id=$(this).attr('rate_id');
        $('#cmt-'+id).click(function(event) {
          event.preventDefault();
          $('#text-'+id).toggle();
          $('.text-'+id).each(function(){
            var comment_id=$(this).attr('comment_id');
            $('#child-'+comment_id).toggle();
          });
        });
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