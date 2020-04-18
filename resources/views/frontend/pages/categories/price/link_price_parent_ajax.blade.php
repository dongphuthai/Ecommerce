		<label>Chọn mức giá:</label>              
          <a id="duoi-2t" data-slug1="{{ $slug1 }}" href="{{ route('categories.show.parent.price2', $slug1) }}" class="parent_plink pr-1 {{ Route::is('categories.show.parent.price2') ? 'price-active':''}}">Dưới 2 triệu</a>
          <a id="2-4t" data-slug1="{{ $slug1 }}" href="{{ route('categories.show.parent.price24', $slug1) }}" class="parent_plink pr-1 {{ Route::is('categories.show.parent.price24') ? 'price-active':''}}">Từ 2-4 triệu</a>
          <a id="4-7t" data-slug1="{{ $slug1 }}" href="{{ route('categories.show.parent.price47', $slug1) }}" class="parent_plink pr-1 {{ Route::is('categories.show.parent.price47') ? 'price-active':''}}">Từ 4-7 triệu</a>
          <a id="7-13t" data-slug1="{{ $slug1 }}" href="{{ route('categories.show.parent.price713', $slug1) }}" class="parent_plink pr-1 {{ Route::is('categories.show.parent.price713') ? 'price-active':''}}">Từ 7-13 triệu</a>
          <a id="tren-13t" data-slug1="{{ $slug1 }}" href="{{ route('categories.show.parent.price13', $slug1) }}" class="parent_plink pr-1 {{ Route::is('categories.show.parent.price13') ? 'price-active':''}}">Trên 13 triệu</a> 
         <div class="float-right expand">
         	<span class="criteria" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         		Sắp xếp
         	</span>
         	<div class="dropdown-menu dropdown-menu-right" style="font-size: 14px;">
			    <a id="thap" class="dropdown-item" href="javascript:void(0)">Giá thấp đến cao</a>
			    <a id="cao" class="dropdown-item" href="javascript:void(0)">Giá cao đến thấp</a>
			 </div>
         </div>