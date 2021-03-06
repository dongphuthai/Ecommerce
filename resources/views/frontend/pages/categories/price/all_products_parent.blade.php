<div class="content-child">
  <div class='container mt-2 page-feature'>
    <div class="price_parent_item">
      <div class="price_child_item">
        @php
          $str=App\Models\Category::where('id',$id)->first()->name;
        @endphp
        <p class="font-name"><b>TẤT CẢ {{ $str }}</b></p>                 
        <div class="list-item">
          @foreach($categories as $category)             
            @php            
              $products = App\Models\Product::where('category_id',$category->id)->paginate(30);          
            @endphp
            @if ($products->count() > 0)
              @include('frontend.pages.products.partials.all_products')
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>