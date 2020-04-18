		
		<label>Chọn mức giá:</label>
          <a id="duoi-2-trieu" data-slug1="{{ $slug1 }}" data-slug2="{{ $slug2 }}" href="{{ $slug1 }}/{{ $slug2 }}/duoi-2-trieu" class="pr-1 pl-1 child-plink @if(isset($price)){{ $price==1 ? 'price-active':''}}@endif">Dưới 2 triệu</a>
          <a id="2-4-trieu" data-slug1="{{ $slug1 }}" data-slug2="{{ $slug2 }}" href="{{ $slug1 }}/{{ $slug2 }}/2-4-trieu" class="pr-1 pl-1 child-plink @if(isset($price)){{ $price==2 ? 'price-active':''}}@endif">Từ 2-4 triệu</a>
          <a id="4-7-trieu" data-slug1="{{ $slug1 }}" data-slug2="{{ $slug2 }}" href="{{ $slug1 }}/{{ $slug2 }}/4-7-trieu" class="pr-1 pl-1 child-plink @if(isset($price)){{ $price==3 ? 'price-active':''}}@endif">Từ 4-7 triệu</a>
          <a id="7-13-trieu" data-slug1="{{ $slug1 }}" data-slug2="{{ $slug2 }}" href="{{ $slug1 }}/{{ $slug2 }}/7-13-trieu" class="pr-1 pl-1 child-plink @if(isset($price)){{ $price==4 ? 'price-active':''}}@endif">Từ 7-13 triệu</a>
          <a id="tren-13-trieu" data-slug1="{{ $slug1 }}" data-slug2="{{ $slug2 }}" href="{{ $slug1 }}/{{ $slug2 }}/tren-13-trieu" class="pr-1 pl-1 child-plink @if(isset($price)){{ $price==5 ? 'price-active':''}}@endif">Trên 13 triệu</a>
          <a class="mr-4 ml-4" href=""><span class="link-check-none mr-1" style=""></span> Mới</a>
          <a class="mr-3 ml-1" href=""><span class="mr-1" style=""><img src="public/images/support/check-link.png" width="16" height="16" style="background: #007bff;border-radius: 5px;padding:2px"></span> Mới</a>
        <div class="float-right expand">
         	<span class="criteria" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         		Sắp xếp
         	</span>
         	<div class="dropdown-menu dropdown-menu-right" style="font-size: 14px;">
			     <a id="thap" class="dropdown-item" href="javascript:void(0)">Giá thấp đến cao</a>
			     <a id="cao" class="dropdown-item" href="javascript:void(0)">Giá cao đến thấp</a>
			   </div>
        </div>
