      <a href="{!! route('products.show',$product->slug) !!}">
        @if($product->id==96)
        <img class="card-img-top card-img-page" src="public/images/right-sidebar/laptop-feature.jpg" >
        @elseif($product->id==87)
        <img class="card-img-top card-img-page" src="public/images/right-sidebar/phone-featured.jpg" >
        @elseif($product->id==91)
        <img class="card-img-top card-img-page" src="public/images/right-sidebar/tablet-featured.jpg" >
        @endif
        @if($product->discount>0)
          <label class="card-title m-0 giam-gia-parent"><img src="public/images/discount.png" width="18"> Giảm {!! number_format($product->discount,0,"",".") !!}₫</label>
        @else
          <label class="card-title m-0 tra-gop-parent">Trả góp 0%</label>
        @endif
      </a>
      <div class="card-body p-0 pt-2">         
        <h4 class="card-title mb-1 pl-2">
          <a class="product-title" href="{!! route('products.show',$product->slug) !!}">{{ $product->title }}</a>
        </h4>
        <p class="pl-2">
          @if($product->discount>0)
            <span class="card-text">{!! number_format($product->offer_price,0,"",".") !!}₫ </span>
            <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($product->price,0,"",".") }} ₫ </span></small>
          @else
            <span class="card-text">{{ number_format($product->price,0,"",".") }}₫ </span>
          @endif
        </p>
        <input id="inputt-{{ $product->id }}" name="input-id" class="rating rating-loading " data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="x" disabled >
      </div>