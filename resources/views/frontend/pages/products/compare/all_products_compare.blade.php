<div class='container' style="font-size: 14px;">
  <div class="row">
    <div class="col-xl-7 col-12 page-feature">
      <h5 class="pb-3">So sánh với các sản phẩm tương tự</h5>
      <div class="list-item height-item" >
        @foreach($categories as $category)
          @php
            $products = App\Models\Product::where('category_id',$category->id)
            ->where('price','>',$price-2990000)
            ->where('id','<>',$id)
            ->where('price','<',$price+2990000)
            ->take(3)->get();
          @endphp
          @if($products->count() > 0)
            @foreach($products as $pdt)
              <div class=" item mb-2 product-compara-x"  {{-- style="width: 33.3%" --}}>               
                <a href="{!! route('products.show',$pdt->slug) !!}" >
                  <div class="img-hover-zoom ">                     
                    <img class=" card-img-top pl-0 pr-0 pl-sm-2 pr-sm-2 pl-md-0 pr-md-0 pl-lg-3 pr-lg-3 pl-xl-3 pr-xl-3 pt-3 card-img-page" src="public/images/product/{{ $pdt->image }} " alt=" {{ $pdt->title }}" >
                    @if($pdt->discount>0)
                      <label class="card-title m-0 giam-gia"><img src="public/images/discount.png" width="18"> Giảm {!! number_format($pdt->discount,0,"",".") !!}₫</label>
                    @else
                      <label class="card-title m-0 tra-gop">Trả góp 0%</label>
                    @endif
                  </div>                     
                </a>
                       
                <div class="card-body text-center p-0 pt-2">
                  <h4 class="card-title mb-1">
                    <a href="{!! route('products.show',$pdt->slug) !!}" class="pdt-title">{{ $pdt->title }}</a>
                  </h4>
                  <p>
                    @if($pdt->discount>0)
                      <span class="card-text">{!! number_format($pdt->offer_price,0,"",".") !!}₫ </span>
                      <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($pdt->price,0,"",".") }} ₫ </span></small>
                    @else
                      <span class="card-text">{{ number_format($pdt->price,0,"",".") }}₫ </span>
                    @endif
                  </p> 
                  <input id="input-{{ $pdt->id }}" name="input-{{ $pdt->id }}" class="rating rating-loading rating-compare" data-min="0" data-max="5" data-step="0.1" value="{{ $pdt->averageRating }}" data-size="x" disabled >
                  <div style="margin-top:-15px">
                    <a href="compare/{{ $product->slug }}-vs-{{ $pdt->slug }}" id="compare-href">So sánh chi tiết</a>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        @endforeach
      </div>
    </div>
    <div class="col-xl-5 col-12 page-feature">
      <h5>Hướng dẫn về {{ $product->title }}</h5>
    </div>
  </div>
</div>

@section('scripts')
  <script type="text/javascript">
    $("#input-1").rating();
  </script>
@endsection

