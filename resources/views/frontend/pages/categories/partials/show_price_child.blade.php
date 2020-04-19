          @php
          $name_child=App\Models\Category::where('id',$id_child)->first()->name;
          $str_parent=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
          $str_child=mb_convert_case(App\Models\Category::where('id',$id_child)->first()->name,MB_CASE_UPPER, "UTF-8");
          @endphp          
          <div class="mb-3 mt-2">
            <div class="float-right" style="font-size: 15px">
              @if($price==1)
                <span class="font-name"><b>{{ $str_parent }} {{ $str_child }} <span class="hiddenphone">DƯỚI 2 TRIỆU</span></b></span>
              @elseif($price==2)
                <span class="font-name"><b>{{ $str_parent }} {{ $str_child }}  <span class="hiddenphone">TỪ 2-4 TRIỆU</span></b></span>
              @elseif($price==3)
                <span class="font-name"><b>{{ $str_parent }} {{ $str_child }}  <span class="hiddenphone">TỪ 4-7 TRIỆU</span></b></span>
              @elseif($price==4)
                <span class="font-name"><b>{{ $str_parent }} {{ $str_child }}  <span class="hiddenphone">TỪ 7-13 TRIỆU</span></b></span>
              @elseif($price==5)
                <span class="font-name"><b>{{ $str_parent }} {{ $str_child }}  <span class="hiddenphone">TRÊN 13 TRIỆU</span></b></span>
              @endif
            </div> 
            <span class="price-right mr-1">
              <a href="javascript:void(0)" id="price-parent-right" class="px-2 py-price">{{ $name_child }} <img src="public/images/support/close-button.png" width="12px"></a>
            </span>
            <span class="price-right">
              @if($price==1)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Dưới 2 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @elseif($price==2)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Từ 2-4 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @elseif($price==3)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Từ 4-7 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @elseif($price==4)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Từ 7-13 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @elseif($price==5)
              <a href="javascript:void(0)" id="price-child-right" class="py-price">Trên 13 triệu <img src="public/images/support/close-button.png" width="12px"></a>
              @endif
            </span>       
          </div>
          <div class="list-item " style="min-height: 250px;">            
            @if ($products->count() > 0)
              @include('frontend.pages.products.partials.all_products')
            @endif
          </div>