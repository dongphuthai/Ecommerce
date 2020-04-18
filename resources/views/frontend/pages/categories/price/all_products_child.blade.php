
<div class='container mt-2 page-feature '> 
  <div class="price_parent_item">
    <div class="price_child_item">
    @php
    $name_child=App\Models\Category::where('id',$id_child)->first()->name;
    $str_parent=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
    $str_child=mb_convert_case(App\Models\Category::where('id',$id_child)->first()->name,MB_CASE_UPPER, "UTF-8");
    @endphp
    <div class="mb-3 mt-2">
      <div class="float-right">
        <span style="font-family: arial;"><b>TẤT CẢ {{ $str_parent }} {{ $str_child }}</b></span>
      </div>     
      <span class="price-right mr-1">
        <a href="javascript:void(0)" id="price-parent-right" class="px-2 py-price">{{ $name_child }} <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px"></a>
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
    </div>
  </div>
</div>

@section('scripts')
  <script type="text/javascript">

    $("#input-1").rating();

  </script>
@endsection

