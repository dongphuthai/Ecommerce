<div class='container mt-3 page-feature'>
  <div class="mb-2" style="font-family: arial;">
    <span ><b>ĐIỆN THOẠI NỔI BẬT NHẤT</b></span>
    @php
      $count=App\Models\Product::count_product(32);
    @endphp
    <span class="float-right" style="font-size: 14px;"><a href="the-loai/dien-thoai">Xem tất cả {{ $count }} điện thoại</a></span>
  </div>

    <div class="list-item" >
      <div class="card feature" >
        @php
          $product=App\Models\Product::where('id','87')->first();
        @endphp
        <a href="{!! route('products.show',$product->slug) !!}">
          <img class="card-img-top card-img-page" src="public/images/right-sidebar/phone-featured.jpg" >
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
          <input id="input-{{ $product->id }}" name="input-id" class="rating rating-loading " data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="x" disabled >
        </div>
      </div>
                             
      @php
        $products=App\Models\Product::whereIn('id',[63,64,65,66,67,68,69])->get();
      @endphp
      @foreach($products as $product)
        <div class="card item ">
              <a href="{!! route('products.show',$product->slug) !!}" > 
              <div class="img-hover-zoom ">               
                <img class=" card-img-top pl-0 pr-0 pl-md-3 pr-md-3 pl-lg-4 pr-lg-4 pl-xl-4 pr-xl-4 pt-3 pt-xl-4 card-img-page" src="public/images/product/{{ $product->image }} " alt=" {{ $product->title }}" >
                @if($product->discount>0)
                  <label class="card-title m-0 giam-gia"><img src="public/images/discount.png" width="18"> Giảm {!! number_format($product->discount,0,"",".") !!}₫</label>
                @else
                  <label class="card-title m-0 tra-gop">Trả góp 0%</label>
                @endif 
              </div>                      
              </a>
           
          <div class="card-body text-center p-0 pt-2">
            <h4 class="card-title mb-1">
            <a class="product-title" href="{!! route('products.show',$product->slug) !!}">{{ $product->title }}</a>
            </h4>
        <p>
          @if($product->discount>0)
            <span class="card-text">{!! number_format($product->offer_price,0,"",".") !!}₫ </span>
            <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($product->price,0,"",".") }} ₫ </span></small>
          @else
            <span class="card-text">{{ number_format($product->price,0,"",".") }}₫ </span>
          @endif
        </p>
            <input id="input-{{ $product->id }}" name="input-id" class="rating rating-loading " data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="x" disabled >
          </div>
        </div>
      @endforeach

      <div class="card item hiddenphone">
        @php
          $product=App\Models\Product::where('id','87')->first();
        @endphp
        <a href="{!! route('products.show',$product->slug) !!}" > 
          <div class="img-hover-zoom ">               
            <img class=" card-img-top card-img-top pl-0 pr-0 pl-md-3 pr-md-3 pl-lg-4 pr-lg-4 pl-xl-4 pr-xl-4 pt-3 pt-xl-4 card-img-page" src="public/images/product/{{ $product->image }} " alt=" {{ $product->title }}" >
            @if($product->discount>0)
              <label class="card-title m-0 giam-gia"><img src="public/images/discount.png" width="18"> Giảm {!! number_format($product->discount,0,"",".") !!}₫</label>
            @else
              <label class="card-title m-0 tra-gop">Trả góp 0%</label>
            @endif 
          </div>                      
        </a>
        
        <div class="card-body text-center p-0 pt-2">         
          <h4 class="card-title mb-1 pl-2">
            <a class="product-title" href="{!! route('products.show',$product->slug) !!}">{{ $product->title }}</a>
          </h4>
        <p>
          @if($product->discount>0)
            <span class="card-text">{!! number_format($product->offer_price,0,"",".") !!}₫ </span>
            <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($product->price,0,"",".") }} ₫ </span></small>
          @else
            <span class="card-text">{{ number_format($product->price,0,"",".") }}₫ </span>
          @endif
        </p>
          <input id="input-{{ $product->id }}" name="input-id" class="rating rating-loading " data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="x" disabled >
        </div>
      </div>

    </div>  
</div>