          @php
            $str=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
          @endphp 
          <div id="hidden2" >
            @if($price==1)
              <p class="font-name"><b>{{ $str }} DƯỚI 2 TRIỆU</b></p>
            @elseif($price==2)
              <p class="font-name"><b>{{ $str }} TỪ 2-4 TRIỆU</b></p>
            @elseif($price==3)
              <p class="font-name"><b>{{ $str }} TỪ 4-7 TRIỆU</b></p>
            @elseif($price==4)
              <p class="font-name"><b>{{ $str }} TỪ 7-13 TRIỆU</b></p>
            @elseif($price==5)
              <p class="font-name"><b>{{ $str }} TRÊN 13 TRIỆU</b></p>
            @endif

            <div class="list-item" style="min-height: 200px;">
              @foreach($categories as $category)  
                @php
                if($price==1) {
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','<','2000000')->get();
                }elseif($price==2){
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','>=','2000000')->where('price','<','4000000')->get();
                }elseif($price==3){
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','>=','4000000')->where('price','<','7000000')->get();
                }elseif($price==4){
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','>=','7000000')->where('price','<','13000000')->get();
                }elseif($price==5){
                  $products = App\Models\Product::where('category_id',$category->id)->where('price','>','13000000')->get();
                }
                @endphp

                @if ($products->count() > 0)
                  @include('frontend.pages.products.partials.all_products')
                @endif
              @endforeach
            </div>
          </div>