    @php
    $str_parent=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
    $str_child=mb_convert_case(App\Models\Category::where('id',$id_child)->first()->name,MB_CASE_UPPER, "UTF-8");
    @endphp
    
    @if($price==1)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} DƯỚI 2 TRIỆU</b></p>
    @elseif($price==2)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} TỪ 2 ĐẾN 4 TRIỆU</b></p>
    @elseif($price==3)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} TỪ 4 ĐẾN 7 TRIỆU</b></p>
    @elseif($price==4)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} TỪ 7 ĐẾN 13 TRIỆU</b></p>
    @elseif($price==5)
      <p style="font-family: arial;"><b>{{ $str_parent }} {{ $str_child }} TRÊN 13 TRIỆU</b></p>
    @endif

    <div class="list-item " style="min-height: 250px;">            
        @if ($products->count() > 0)
          @include('frontend.pages.products.partials.all_products')
        @endif
    </div>