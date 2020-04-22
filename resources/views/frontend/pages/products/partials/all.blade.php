
  @foreach($products as $product)
    <div class="card item">
      <a href="{!! route('products.show',$product->slug) !!}" >
        <div class="img-hover-zoom ">                     
          <img class=" card-img-top px-0 px-md-3 px-lg-4 px-xl-4 pt-3 pt-xl-4 card-img-page" src="public/images/product/{{ $product->image }} " alt=" {{ $product->title }}"> 
          @if($product->discount>0)
            <label class="card-title m-0 giam-gia"><img src="public/images/discount.png" width="18"> Giảm {!! number_format($product->discount,0,"",".") !!}₫</label>
          @else
            <label class="card-title m-0 tra-gop">Trả góp 0%</label>
          @endif          
        </div>                     
      </a>    
      <div class="card-body text-center p-0 pt-2">
        <h4 class="card-title mb-1">
          <a href="{!! route('products.show',$product->slug) !!}" class="product-title">{{ $product->title }}</a>
        </h4>
        <p class="card-price">
          @if($product->discount>0)
            <span class="card-text">{!! number_format($product->offer_price,0,"",".") !!}₫ </span>
            <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($product->price,0,"",".") }} ₫ </span></small>
          @else
            <span class="card-text">{{ number_format($product->price,0,"",".") }}₫ </span>
          @endif                    
        </p>
        <input id="input-{{ $product->id }}" name="input-1" class="rating rating-loading " data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="x" disabled >
      </div>
    </div>
  @endforeach
  <div class="mt-4 d-flex justify-content-center pagination-all" style="width: 100%;">
      {{ $products->links() }}
  </div>

@section('scripts')
  <script type="text/javascript">
    $(".rating").rating();
  </script>
@endsection

