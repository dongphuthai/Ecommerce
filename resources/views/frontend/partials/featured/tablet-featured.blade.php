<div class='container mt-3 page-feature'>
  <div class="mb-2" style="font-family: arial;">
    <span ><b>TABLET NỔI BẬT NHẤT</b></span>
    @php
      $count=App\Models\Product::count_product(33);
    @endphp
    <span class="float-right" style="font-size: 14px;"><a href="the-loai/tablet">Xem tất cả {{ $count }} máy tính bảng</a></span>
  </div>
  <div class="list-item" >
    <div class="card feature" >
      @php
        $product=App\Models\Product::where('id','91')->first();
      @endphp
      @include('frontend.partials.featured.product-km')
    </div>                          
    @php
      $products=App\Models\Product::whereIn('id',[90,89,88,])->get();
    @endphp
    @foreach($products as $product)
      @include('frontend.pages.products.partials.all_pro')
    @endforeach  
    <div class="card item hiddentablet">
      @php
        $product=App\Models\Product::where('id','73')->first();
      @endphp  
    @include('frontend.partials.featured.product-hidden')
    </div>
  </div>  
</div>