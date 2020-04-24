<div class='container mt-3 page-feature'>
  <div class="mb-2" style="font-family: arial;">
    <span ><b>PHỤ KIỆN NỔI BẬT NHẤT</b></span>
    @php
      $count=App\Models\Product::count_product(45);
    @endphp
    <span class="float-right" style="font-size: 14px;"><a href="the-loai/phu-kien">Xem tất cả {{ $count }} phụ kiện</a></span>
  </div>
  <div class="list-item" >                                
    @php
      $products=App\Models\Product::whereIn('id',[77,99,97,79,98])->get();
    @endphp
    @foreach($products as $product)
      @include('frontend.pages.products.partials.all_pro')
    @endforeach
    <div class="card item hiddentablet">
      @php
        $product=App\Models\Product::where('id','78')->first();
      @endphp          
      @include('frontend.partials.featured.product-hidden')
    </div>
  </div>  
</div>