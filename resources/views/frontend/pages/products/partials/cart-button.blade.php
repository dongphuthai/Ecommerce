<div>
	<form class=" " action="{{ route('carts.store') }}" method="post" accept-charset="utf-8" style="margin-top:-15px;">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="product_id" value="{{ $product->id }}">
		<button class="button-cart" onclick="addToCart({{ $product->id }})" type="button">		
			<div>MUA NGAY</div>
			<span class="hiddenphone">Giao tận nơi, nhanh chóng</span>
		</button>
	</form>
</div>
<div class="muatragop">
	<a href="#" >
		<div class="buttontragop mr-0 mr-xl-1" >
			<div>MUA TRẢ GÓP 0%</div>
			<span class="hiddenphone">Thủ tục đơn giản</span>
		</div>
	</a>
</div>
<div class="muatragop">
	<a href="#" >
		<div class="buttontragop" >
			<div>TRẢ GÓP QUA THẺ</div>
			<span class="hiddenphone">Visa, Master, JCB</span>
		</div>
	</a>
</div>