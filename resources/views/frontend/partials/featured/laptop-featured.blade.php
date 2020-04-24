<div class='container mt-3 page-feature'>
  <div class="mb-2" style="font-family: arial;">
    <span ><b>LAPTOP NỔI BẬT NHẤT</b></span>
    @php
      $count=App\Models\Product::count_product(29);
    @endphp
    <span class="float-right" style="font-size: 14px"><a href="the-loai/laptop">Xem tất cả {{ $count }} laptop</a></span>
  </div>
  <div class="list-item" >
    <div class="card feature" >
      @php
        $product=App\Models\Product::where('id','96')->first();
      @endphp
      @include('frontend.partials.featured.product-km')
    </div>                          
    @php
      $products=App\Models\Product::whereIn('id',[95,94,93,])->get();
    @endphp
    @foreach($products as $product)
      @include('frontend.pages.products.partials.all_pro')
    @endforeach
    <div class="card item hiddentablet">
      @php
        $product=App\Models\Product::where('id','92')->first();
      @endphp            
      @include('frontend.partials.featured.product-hidden')
    </div>
  </div>  
</div>