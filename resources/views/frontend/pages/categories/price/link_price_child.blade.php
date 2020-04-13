		<label>Chọn mức giá:</label>              
          <a href="products/{{ $slug1 }}/{{ $slug2 }}/duoi-2-trieu" class="pr-1 {{ Route::is('categories.show.child.price2') ? 'active':''}}">Dưới 2 triệu</a>
          <a href="products/{{ $slug1 }}/{{ $slug2 }}/2-4-trieu" class="pr-1 {{ Route::is('categories.show.child.price24') ? 'active':''}}">Từ 2-4 triệu</a>
          <a href="products/{{ $slug1 }}/{{ $slug2 }}/4-7-trieu" class="pr-1 {{ Route::is('categories.show.child.price47') ? 'active':''}}">Từ 4-7 triệu</a>
          <a href="products/{{ $slug1 }}/{{ $slug2 }}/7-13-trieu" class="pr-1 {{ Route::is('categories.show.child.price713') ? 'active':''}}">Từ 7-13 triệu</a>
          <a href="products/{{ $slug1 }}/{{ $slug2 }}/tren-13-trieu" class="pr-1 {{ Route::is('categories.show.child.price13') ? 'active':''}}">Trên 13 triệu</a> 