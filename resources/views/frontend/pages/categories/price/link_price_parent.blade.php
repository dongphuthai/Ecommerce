  
		<label>Chọn mức giá:</label>              
          <a href="{{ route('categories.show.parent.price2', $slug1) }}" class="pr-1 {{ Route::is('categories.show.parent.price2') ? 'active':''}}">Dưới 2 triệu</a>
          <a href="{{ route('categories.show.parent.price24', $slug1) }}" class="pr-1 {{ Route::is('categories.show.parent.price24') ? 'active':''}}">Từ 2-4 triệu</a>
          <a href="{{ route('categories.show.parent.price47', $slug1) }}" class="pr-1 {{ Route::is('categories.show.parent.price47') ? 'active':''}}">Từ 4-7 triệu</a>
          <a href="{{ route('categories.show.parent.price713', $slug1) }}" class="pr-1 {{ Route::is('categories.show.parent.price713') ? 'active':''}}">Từ 7-13 triệu</a>
          <a href="{{ route('categories.show.parent.price13', $slug1) }}" class="pr-1 {{ Route::is('categories.show.parent.price13') ? 'active':''}}">Trên 13 triệu</a> 
