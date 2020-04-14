@php
    if($product->category->parent->id==32||$product->category->parent->id==33){
      $phukien1=App\Models\Product::where('id',77)->first();
      $phukien2=App\Models\Product::where('id',98)->first();
      $tongtien=$product->offer_price+$phukien1->offer_price+$phukien2->offer_price;
      $tonggia=$product->price+$phukien1->price+$phukien2->price;
    }elseif ($product->category->parent->id==29) {
      $phukien1=App\Models\Product::where('id',78)->first();
      $phukien2=App\Models\Product::where('id',80)->first();
      $tongtien=$product->offer_price+$phukien1->offer_price+$phukien2->offer_price;
      $tonggia=$product->price+$phukien1->price+$phukien2->price;
    }else{
      $phukien1=null;
      $phukien2=null;
    }      
@endphp
@if(!is_null($phukien1)||!is_null($phukien2))
<div class="mt-1" style="position: relative">
  <h5>Ưu đãi khi mua phụ kiện cùng {{ $product->title }}</h5>
  <div style="display: flex; border:1px solid #e0e0e0;border-radius: 5px;">
    <div class="pt-3 uudai" >
      <img class="" src="public/images/product/{{ $product->image }}" height="120" style="display: block;margin:0 auto;">
      <div class="pt-2 text-center" >
        <a class="" href="{!! route('products.show',$product->slug) !!}">{{ $product->title }}</a>
        <p class="pl-2">
          @if($product->discount>0)
            <span class="card-text">{!! number_format($product->offer_price,0,"",".") !!}₫ </span>
            <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($product->price,0,"",".") }} ₫ </span></small>
          @else
            <span class="card-text">{{ number_format($product->price,0,"",".") }}₫ </span>
          @endif
        </p>
      </div>
    </div>
    <div class="plus">
      <img src="public/images/support/plus.png" width="20" style="position: absolute; top:40%; cursor:pointer">
    </div>
    
    <div class="pt-3 uudai" >
      <img class="" src="public/images/product/{{ $phukien1->image }}" width="120" style="display: block;margin:0 auto;">
      <div class="pt-2 text-center" >
        <a class="" href="{!! route('products.show',$phukien1->slug) !!}">{{ $phukien1->title }}</a>
        <p class="pl-2">
          @if($phukien1->discount>0)
            <span class="card-text">{!! number_format($phukien1->offer_price,0,"",".") !!}₫ </span>
            <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($phukien1->price,0,"",".") }} ₫ </span></small>
          @else
            <span class="card-text">{{ number_format($phukien1->price,0,"",".") }}₫ </span>
          @endif
        </p>
      </div>
    </div>
    <div class="plus">
      <img src="public/images/support/plus.png" width="20" style="position: absolute; top:40%; cursor:pointer">
    </div> 
    <div class="pt-3 uudai" >
      <img class="" src="public/images/product/{{ $phukien2->image }}" width="120" style="display: block;margin:0 auto;">
      <div class="pt-2 text-center" >
        <a class="" href="{!! route('products.show',$phukien2->slug) !!}">{{ $phukien2->title }}</a>
        <p class="pl-2">
          @if($phukien2->discount>0)
            <span class="card-text">{!! number_format($phukien2->offer_price,0,"",".") !!}₫ </span>
            <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($phukien2->price,0,"",".") }} ₫ </span></small>
          @else
            <span class="card-text">{{ number_format($phukien2->price,0,"",".") }}₫ </span>
          @endif
        </p>
      </div>
    </div>
    <div style="width: 25%;" class="pt-4 hiddenphone">
      <p>Tổng tiền:</p>
      <p><span class="card-text">{{ number_format($tongtien,0,"",".") }}₫</span>
      <small><span class="pl-1" style="text-decoration: line-through">{{ number_format($tonggia,0,"",".") }}₫ </span></small>
      </p>
      <form id="form-cart-multiple" action="{{ route('carts.combo') }}" method="post" accept-charset="utf-8">
        @csrf
        <input type="hidden" name="combo[0]" value="{{ $product->id }}">
        <input type="hidden" name="combo[1]" value="{{ $phukien1->id }}">
        <input type="hidden" name="combo[2]" value="{{ $phukien2->id }}">
        <button type="submit" class="btn btn-primary py-2 px-3" style="width: 80%">MUA 3 SẢN PHẨM</button>
      </form>
    </div> 
  </div>   
</div>
@endif