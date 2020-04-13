<div class="price col-12 col-lg-4 mt-1" style="font-size: 12px; ">
  <label>Chọn mức giá:</label>              
    <a href="{{ route('products.price2') }}" class="pr-1 {{ Route::is('products.price2') ? 'active':''}}">Dưới 2 triệu</a>
    <a href="{{ route('products.price24') }}" class=" pr-1 {{ Route::is('products.price24') ? 'active':''}}">Từ 2-4 triệu</a>
    <a href="{{ route('products.price47') }}" class=" pr-1 {{ Route::is('products.price47') ? 'active':''}}">Từ 4-7 triệu</a>
    <a href="{{ route('products.price713') }}" class=" pr-1 {{ Route::is('products.price713') ? 'active':''}}">Từ 7-13 triệu</a>
    <a href="{{ route('products.price13') }}" class=" pr-1 {{ Route::is('products.price13') ? 'active':''}}">Trên 13 triệu</a>           
</div>