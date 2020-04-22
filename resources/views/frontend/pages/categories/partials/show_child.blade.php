            @php
              $str_parent=App\Models\Category::where('id',$id)->first()->name;
              $str_child=App\Models\Category::where('id',$id_child)->first()->name;
            @endphp
            <div class="mb-3 mt-2">
              <div class="float-right">
                <span class="font-name"><b>{{ $str_parent }} {{ $str_child }}</b></span>
              </div>     
              <span class="price-right mr-1">
                <a href="javascript:void(0)" id="price-parent-right" class="px-2 py-price">{{ $str_child }} <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px"></a>
              </span>
              <span class="price-right mr-1">
                @if(isset($thap))
                  <a href="javascript:void(0)" id="price-child-right" class="px-2 py-price">Từ thấp đến cao <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px"></a>
                @elseif(isset($cao))
                  <a href="javascript:void(0)" id="price-child-right" class="px-2 py-price">Từ cao đến thấp <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px"></a>
                @endif
              </span>
            </div> 
            <div class="list-item " style="min-height: 250px;">            
              @if ($products->count() > 0)
                @include('frontend.pages.products.partials.all_products')
              @endif
            </div>
