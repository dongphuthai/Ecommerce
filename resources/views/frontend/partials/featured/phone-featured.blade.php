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
      @include('frontend.partials.featured.product-km')
    </div>                             
    @php
      $products=App\Models\Product::whereIn('id',[63,64,65,66,67,68,69])->get();
    @endphp
    @foreach($products as $product)
      @include('frontend.pages.products.partials.all_pro')
    @endforeach
    <div class="card item hiddenphone">
      @php
        $product=App\Models\Product::where('id','87')->first();
      @endphp
      @include('frontend.partials.featured.product-hidden')
    </div>
  </div>  
</div>