    @php
    $name_child=App\Models\Category::where('id',$id_child)->first()->name;
    $str_parent=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
    $str_child=mb_convert_case(App\Models\Category::where('id',$id_child)->first()->name,MB_CASE_UPPER, "UTF-8");
    @endphp  
    <div class="mb-3 mt-2">
      <div class="float-right" style="font-size: 15px">
        @if($price==1)
          <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} <span class="hiddenphone">DƯỚI 2 TRIỆU</span></b></span>
        @elseif($price==2)
          <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} <span class="hiddenphone">TỪ 2-4 TRIỆU</span></b></span>
        @elseif($price==3)
          <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} <span class="hiddenphone">TỪ 4-7 TRIỆU</span></b></span>
        @elseif($price==4)
          <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} <span class="hiddenphone">TỪ 7-13 TRIỆU</span></b></span>
        @elseif($price==5)
          <span style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} <span class="hiddenphone">TRÊN 13 TRIỆU</span></b></span>
        @endif
      </div> 
      <span class="price-right mr-1">
        <a href="javascript:void(0)" id="price-parent-right" class="px-2 py-price">{{ $name_child }} <img  style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px"></a>
      </span>
      <span class="price-right">
        <a href="javascript:void(0)" id="price-child-right" class=""></a>
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