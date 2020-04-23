@extends('frontend.layouts.master')
	@section('title')
  		Bigshop | Ecommerce Site
	@endsection
@section('content')
	<div class='container page-feature'>
	    <h2 class="pb-2">Giỏ hàng của bạn</h2>
			@if(App\Models\Cart::totalItem() >0)
			<div class="reload_table" style="margin-bottom: 200px">
				<table id="cart_table" class="table table-bordered table-stripe text-center" >
				<thead>
					<tr>
						<th>No.</th>
						<th>Sản phẩm</th>
						<th>Ảnh</th>
						<th>Số lượng</th>
	          			<th>Giá</th>
	          			<th>Giảm giá</th>
	          			<th>Tổng giá</th>
	          			<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					@php
					$total_price=0;
					@endphp
					@foreach(App\Models\Cart::totalCarts() as $cart)
					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>
							<a href="{{ route('products.show', $cart->product->slug) }}">{{ $cart->product->title }}</a>
						</td>
						<td>
							@if ($cart->product->images->count() > 0)
	                		<img src="{{ asset('public/images/products/'. $cart->product->images->first()->image) }}" width="60px">
	              			@endif
						</td>
						<td >
							<form id="cart_update" class="form-inline cart_update" action="{!! route('carts.update', $cart->id) !!}" method="post" data_id="{{ $cart->id }}">
	                			@csrf
	                			<input style="width: 75%" id="product_quantity_{{ $cart->id }}" type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
	                			<button id="update_button" type="submit" class="btn btn-success ml-1">Thêm</button>
	              			</form>
						</td>
						<td>{{ number_format($cart->product->price,0,"",".")}}₫</td>
						<td>{{ number_format($cart->product->discount,0,"",".") }}₫</td>
						<td>
							@php
	              			$total_price += $cart->product->offer_price * $cart->product_quantity;
	              			@endphp
							{{ number_format(($cart->product->offer_price)*($cart->product_quantity),0,"",".") }}₫
						</td>
						<td style="width: 10%">
			                <form id="cart_delete" class="form-inline cart_delete" action="{{ route('carts.delete',$cart->id) }}" method="post" data-id="{{ $cart->id }}">
								@csrf
			                    <button id="ok_button_{{ $cart->id }}" type="submit" class="btn btn-danger" style="width: 100%">Xóa</button>
			                </form>
						</td>
					</tr>
					@endforeach
					<tr>
	          			<td colspan="5"></td>
	          			<td>Tổng cộng:</td>
	          			<td colspan="2">
	            			<strong>  {{ number_format($total_price,0,"","." )}}₫</strong>
	          			</td>
	        		</tr>
				</tbody>
			</table>
		</div>
		<div class="d-flex flex-row-reverse mb-4">
			<a href="{{ route('checkouts') }}" class="btn btn-warning btn-lg ">Thanh toán</a>
      		<a href="{{ route('products') }}" class="btn btn-info btn-lg mr-2">Tiếp tục mua hàng...</a>
      	</div>
    	<div class="clearfix"></div>
		@else
			<div class="alert alert-warning pb-5" style="margin-bottom: 200px">
				<strong>
					Không có sản phẩm nào trong giỏ hàng
				</strong>
				<br>
				<a href="{{ route('products') }}" class="btn btn-info btn-lg mr-2 mt-3">Tiếp tục mua hàng...</a>
			</div>
		@endif
	</div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).on('submit','.cart_delete', function(event) {
			event.preventDefault();
			var id=$(this).attr('data-id');
			var url="{{ url('/') }}";
			$.ajax({
				url:url+'/cart/delete/'+id,
				method:"POST",
				beforeSend:function(){
					$('#ok_button_'+id).text('Đang xóa...');
			},
			success:function(data)
			{
					setTimeout(function(){
					$('.reload_table').load(' #cart_table');
					$('#totalItem').html(data.totalItem);
				},1000);
			}
			})
		});
		$(document).on('submit','.cart_update', function(event) {
			event.preventDefault();
			var id=$(this).attr('data_id');
			var url="{{ url('/') }}";
			var html='';
			$.ajax({
				url:url+'/cart/update/'+id,
				method:"POST",
				data:$(this).serialize()
			}).done(function(data){
				if(data.success){
					alertify.set('notifier','position', 'top-center');
 					alertify.success('Bạn đã thêm sản phẩm vào giỏ hàng. Giỏ hàng có: '+ data.totalItem + ' sản phẩm');				
 				}
				setTimeout(function(){
					$('#totalItem').html(data.totalItem);
				},2000);
			});
		});
	</script>
@endsection