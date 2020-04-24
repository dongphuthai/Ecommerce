<div class='container mt-3 page-feature mb-4'>
  <div class="mb-2" style="font-family: arial;">
    <span ><b>ĐỒNG HỒ NỔI BẬT NHẤT</b></span>
    @php
      $count=App\Models\Product::count_product(41);
    @endphp
    <span class="float-right" style="font-size: 14px;"><a href="the-loai/watches">Xem tất cả {{ $count }} đồng hồ</a></span>
  </div>
  <div class="list-item" >                                
    @php
      $products=App\Models\Product::whereIn('id',[84,83,103,100,101])->get();
    @endphp
    @foreach($products as $product)
      @include('frontend.pages.products.partials.all_pro')
    @endforeach 
    <div class="card item hiddentablet">
      @php
        $product=App\Models\Product::where('id','107')->first();
      @endphp      
      @include('frontend.partials.featured.product-hidden')
    </div>          
  </div>  
</div>