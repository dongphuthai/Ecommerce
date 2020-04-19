<!-- Lấy ra sản phẩm thể loại cha được sắp xếp dùng hàm usort -->
<div class="content-child">
  <div class='container mt-2 page-feature'>
    <div class="price_parent_item">
      <div class="price_child_item">
        @php
          $str=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
        @endphp
        <div class="mb-3 mt-2">
          <div class="float-right">
            <span style="font-family: arial;"><b>TẤT CẢ {{ $str }}</b></span> 
          </div> 
          <span class="price-right mr-1">
            @if(isset($thap))
              <a href="javascript:void(0)" id="price-parent-right" class="px-2 py-price">Từ thấp đến cao <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px"></a>
            @elseif(isset($cao))
              <a href="javascript:void(0)" id="price-parent-right" class="px-2 py-price">Từ cao đến thấp <img style="padding-bottom: 2px;" src="public/images/support/close-button.png" width="12px"></a>
            @endif
          </span> 
        </div>              
        <div class="list-item">                              
          @include('frontend.pages.products.partials.all_products')
        </div>
      </div>
    </div>
  </div>
</div>