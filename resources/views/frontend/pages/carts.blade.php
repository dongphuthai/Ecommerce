@extends('frontend.layouts.master')
@section('content')

	<div class='container mt-3'>
    <h2 class="pb-2">Giỏ hàng của bạn</h2>
		@if(App\Models\Cart::totalItem() >0)
			<table id="cart_table" class="table table-bordered table-stripe text-center">
			<thead>
				<tr>
					<th>No.</th>
					<th>Sản phẩm</th>
					<th>Ảnh</th>
					<th>Số lượng</th>
          			<th>Giá</th>
          			<th>Giảm giá</th>
          			<th>Tổng giá</th>
          			<th>
          				Xóa
          			</th>
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
					<td>
						<form class="form-inline" action="{!! route('carts.update', $cart->id) !!}" method="post">
                			<input type="hidden" name="_token" value="{{ csrf_token() }}">
                			<input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
                			<button type="submit" class="btn btn-success ml-1">Cập nhật</button>
              			</form>
					</td>
					<td>
						{{ number_format($cart->product->price,0,"",".")}}₫
					</td>
					<td>
						{{ number_format($cart->product->discount,0,"",".") }}₫
					</td>
					<td>
						@php
              			$total_price += $cart->product->offer_price * $cart->product_quantity;
              			@endphp
						{{ number_format(($cart->product->offer_price)*($cart->product_quantity),0,"",".") }}₫
					</td>
					<td>
						<a href="#deleteModal" data-toggle="modal" class="btn btn-danger mb-1">Xóa</a>
						<!-- Delete Modal -->
		                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                  <div class="modal-dialog" role="document">
		                    <div class="modal-content">
		                      <div class="modal-header">
		                        <h5 class="modal-title" id="exampleModalLabel">{{ $cart->product->title }}</h5>
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                          <span aria-hidden="true">&times;</span>
		                        </button>
		                      </div>
		                      <div class="modal-body">
		                        <h6 class="text-left" id="">Bạn muốn xóa sản phẩm này khỏi giỏ hàng?</h6>
		                      </div>
		                      <div class="modal-footer">
		                      	<form id="cart_delete" class="form-inline" action="{{ route('carts.delete',$cart->id) }}"  method="post">
		                          @csrf
		                          <input type="hidden" name="cart_id" id="cart_id" data-cart-id="{{ $cart->id }}">
		                          <button id="ok_button" type="submit" class="btn btn-danger">OK</button>
		                        </form>
		                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                      </div>
		                    </div>
		                  </div>
		                </div>
					</td>
				</tr>
				@endforeach
				<tr>
          			<td colspan="5"></td>
          			<td>
            			Tổng cộng:
          			</td>
          			<td colspan="2">
            			<strong>  {{ number_format($total_price,0,"","." )}}₫</strong>
          			</td>
        			</tr>
			</tbody>
		</table>
		<div class="d-flex flex-row-reverse mb-4">
			<a href="{{ route('checkouts') }}" class="btn btn-warning btn-lg ">Thanh toán</a>
      		<a href="{{ route('products') }}" class="btn btn-info btn-lg mr-2">Tiếp tục mua hàng...</a>
      	</div>
    	<div class="clearfix"></div>
		@else
			<div class="alert alert-warning">
				<strong>
					Không có sản phẩm nào trong giỏ hàng
				</strong>
				<br>
				<a href="{{ route('products') }}" class="btn btn-info btn-lg mr-2">Tiếp tục mua hàng...</a>
			</div>
		@endif

	</div>

@endsection

{{-- @section('scripts')
<script>
    $(document).ready(function() {
      $('#cart_table').DataTable();
    });
  </script>
	<script type="text/javascript">
		$('#cart_delete').on('submit', function(event) {
			event.preventDefault();
			var id=$('#cart_id').attr('data-cart-id');
			var url="{{ url('/') }}";
			$.ajax({
				url:url+'/cart/delete/'+id,
				beforeSend:function(){
					$('#ok_button').text('Xóa...');
			},
			success:function(data)
			{
				setTimeout(function(){
					$('#deleteModal').modal('hide');
					$('#cart_table').DataTable().ajax.reload();
				},2000);
			}

			})
		});
	</script>
@endsection --}}