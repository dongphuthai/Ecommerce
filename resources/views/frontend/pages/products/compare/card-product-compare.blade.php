        <a href="{!! route('products.show',$pdt->slug) !!}" >        
          <img class="img-product p-1" src="public/images/product/{{ $pdt->image }} " alt=" {{ $pdt->title }}" >
          @if($pdt->discount>0)
            <label class="card-title m-0 giam-gia-parent hiddenphone"><img src="public/images/discount.png" width="18"> Giảm {!! number_format($pdt->discount,0,"",".") !!}₫</label>
          @else
            <label class="card-title m-0 tra-gop-parent hiddenphone">Trả góp 0%</label>
          @endif
          <div class="card-body p-0 pt-2 pl-2">         
            <h4 class="card-title mb-1 pl-2">
              <a class="product-title" href="{!! route('products.show',$pdt->slug) !!}">{{ $pdt->title }}</a>
              <a href="{!! route('products.show',$pdt->slug) !!}#view-rating"><small style="color: blue"><span>{{ \willvincent\Rateable\Rating::where('rateable_id',$pdt->id)->count() }}</span> đánh giá</small></a>
            </h4>
            <p class="pl-2">
            @if($pdt->discount>0)
              <span class="card-text">{!! number_format($pdt->offer_price,0,"",".") !!}₫ </span>
              <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($pdt->price,0,"",".") }} ₫ </span></small>
            @else
              <span class="card-text">{{ number_format($pdt->price,0,"",".") }}₫ </span>
            @endif
            </p>
            <input id="input-{{ $pdt->id }}" name="input-id" class="rating rating-loading " data-min="0" data-max="5" data-step="0.1" value="{{ $pdt->averageRating }}" data-size="x" disabled >
          </div>
        </a>