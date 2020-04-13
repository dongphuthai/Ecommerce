@extends('frontend.layouts.master')

@section('title')
  {{ $product->title }} | Ecommerce Site
@endsection

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

<!-- Show Products  -->
<div class='container page-feature pt-4'>
  <div >
    <h4> {{ $product->title }} <a href="{!! route('products.show',$product->slug) !!}#view-rating" style="font-size: 15px;"><span class="count-review">{{ \willvincent\Rateable\Rating::where('rateable_id',$product->id)->count() }}</span> đánh giá </a>
    
      <div class="fb-like" data-href="https://www.codeinhouse.com/how-to-integrate-facebook-like-and-share-post-button-in-laravel/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true" style="float: right;"></div> 
    </h4>
  </div>
  <hr style="border:1px solid rgba(0, 0, 0, 0.1)">           
  <div class="row">
    <div class="col-lg-5 p-md-5 p-lg-0">    
        <div class="carousel-inner pt-2 pl-4 pr-4 pb-4">
          @php $i=1; @endphp
          @foreach($product->images as $image)
            <div class="product-item carousel-item {{ $i == 1 ? 'active':'' }}" style="background-color: #f0f0f0;">
              <img class="d-block w-100" src="public/images/products/{{ $image->image }}" height="auto" alt="First slide">
            </div>
            @php $i++; @endphp
          @endforeach
      </div>
    </div>

    <div class="col-lg-4 col-md-6 pl-lg-2 ">
      <div style="padding-left: 0px">        
        <h3><b>
          @if($product->discount>0)
            <span class="font-price">{!! number_format($product->offer_price,0,"",".") !!}₫ </span>
            <small><span class="pl-1" style="text-decoration: line-through; font-size: 18px; color: #999;">{{ number_format($product->price,0,"",".") }} ₫ </span></small>
            <label class="card-title m-0 giam-gia-show"><img src="public/images/discount.png" width="18"> Giảm {!! number_format($product->discount,0,"",".") !!}₫</label>
          @else
            <span class="font-price">{{ number_format($product->price,0,"",".") }}₫ </span>
            <label class="card-title m-0 tra-gop-show">Trả góp 0%</label>
          @endif
        </b></h3>
          
        <div class="con-hang">{{ $product->quantity > 0 ? 'CÒN HÀNG' : 'HẾT HÀNG' }}</div>
        <div class="qua-tang">
          <div class="titlequatang">QUÀ TẶNG</div>
          <div class="indexkhuyenmai">
            <div class="sttkhuyenmai">
              <div>1</div>
            </div> 
            <div class="chitietkhuyenmai">Tặng 2 suất mua đồng hồ thời trang giảm giá 40% (không áp dụng thêm khuyễn mãi khác).</div>
          </div>          
          @if($product->discount>0)
            <div class="indexkhuyenmai">
              <div class="sttkhuyenmai">
                <div>2</div>
              </div>
              <div class="chitietkhuyenmai">Trả góp 0% thẻ tín dụng.</div>
            </div>
            <div class="indexkhuyenmai">
              <div class="sttkhuyenmai">
                <div>3</div>
              </div>
              <div class="chitietkhuyenmai">Giảm ngay 1 triệu khi mua online (áp dụng đặt và nhận hàng từ 5 - 30/4) (đã trừ vào giá).</div>
            </div>
          @else
            <div class="indexkhuyenmai">
              <div class="sttkhuyenmai">
                <div>2</div>
              </div>
              <div class="chitietkhuyenmai">Trả góp 0% thẻ tín dụng</div>
            </div>
          @endif
        </div>
      </div>
      <div>
        <div style="font-size: 13px;color: #d0021b;font-style: italic; line-height: 15px;padding-top: 8px;">Quà tặng không áp dụng đối với chương trình: "XẢ KHO CUỐI THÁNG", "KHUYẾN MÃI GIỜ VÀNG".</div>
        <div class="mt-4">         
          @include('frontend.pages.products.partials.cart-button')
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 pt-2 pl-lg-3 pl-md-0">
      <div>
        <div class="phone-lienhe">        
          Gọi đặt mua:
          <a href="#"><img src="public/images/call.png" width="14" class="pb-1">
          <b>0989748373</b></a>         
        </div>
        <div class="baohanh">
          <div class="yentammuahang">
            <div>Yên tâm mua hàng tại Bigshop</div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/truck.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              Miễn phí giao hàng và lắp đặt toàn tỉnh Bắc Giang.
              <a href="">Xem chi tiết.</a>
            </div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/truck.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              Hỗ trợ vận chuyển cho đơn hàng từ 500.000₫.
            </div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/money.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              <b>Miễn phí công lắp đặt.</b> Không phát sinh vật tư.
            </div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/refresh.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              <a href="#">Đổi trả miễn phí trong 30 ngày.</a>
            </div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/shield.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              Bảo hành chính hãng.<a href="#"> Xem chính sách bảo hành.</a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
<div class="{{ $product->category->parent->id==29||$product->category->parent->id==32||$product->category->parent->id==33 ? 'product-compare':'' }}">
  
</div>
<!-- Rating Star -->
<div class="container">
  <div class="row">
    @include('frontend.pages.products.rating.rating')
    @include('frontend.pages.products.rating.cauhinh')
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
