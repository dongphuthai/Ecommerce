    <div class="col-12 col-lg-7 page-feature" style="font-size: 14px;">
      <div class="d-flex justify-content-between" style="display: inline-block; margin-bottom: -20px;">    
        <form id="form-review" action="{{ route('review') }}" method="post" style="width: 100%; margin-bottom: 35px;">
          <span id="view-rating" class="hiddentitle" style="position: absolute;top: 14px;">
            <a href="{!! route('products.show',$product->slug) !!}#view-rating"><span class="count-review">{{ \willvincent\Rateable\Rating::where('rateable_id',$product->id)->count() }}</span> đánh giá {{ $product->title }}
            </a>
          </span>
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
     @include('frontend.pages.products.rating.comment')
    </div>