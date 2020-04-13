<div class='container mt-3 page-feature'>
  <div class="mb-2" style="font-family: arial;">
    <span ><b>PHỤ KIỆN NỔI BẬT NHẤT</b></span>

    {{-- @php     
      $categories = App\Models\Category::where('parent_id',45)->get();
      foreach($categories as $category){
        $products=App\Models\Product::where('category_id',$category->id)->get();
      }        
        dd($products);
    @endphp --}}

    {{-- @php
    $rating=\willvincent\Rateable\Rating::where('rating',5)->where('rateable_id',87)->count();
    dd($rating);
    @endphp --}}

    <span class="float-right" style="font-size: 14px;"><a href="products/category/parent/phu-kien">Xem tất cả sản phẩm</a></span>
  </div>
    <div class="list-item" >                                
      @php
        $products=App\Models\Product::whereIn('id',[77,99,97,79,98])->get();
      @endphp
      @foreach($products as $product)
        <div class="card item ">
          
              <a href="{!! route('products.show',$product->slug) !!}" >
              <div class="img-hover-zoom ">                
                <img class=" card-img-top card-img-top pl-0 pr-0 pl-md-3 pr-md-3 pl-lg-4 pr-lg-4 pl-xl-4 pr-xl-4 pt-3 card-img-page" src="public/images/product/{{ $product->image }} " alt=" {{ $product->title }}" >
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
          <div class="card item hiddentablet">
            @php
              $product=App\Models\Product::where('id','78')->first();
            @endphp          
            <a href="{!! route('products.show',$product->slug) !!}" > 
              <div class="img-hover-zoom ">               
                <img class=" card-img-top card-img-top pl-0 pr-0 pl-md-3 pr-md-3 pl-lg-4 pr-lg-4 pl-xl-4 pr-xl-4 pt-3 card-img-page" src="public/images/product/{{ $product->image }} " alt=" {{ $product->title }}" > 
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