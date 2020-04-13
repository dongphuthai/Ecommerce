@extends('frontend.layouts.master')

@section('content')
  <div class='container margin-top-20 mb-3'>
  	<div class="card card-body">
	    <h2>Xác nhận mua hàng</h2>
	    <hr>
	    <div class="row">
	    	<div class="col-md-7 border-right">
	          @foreach (App\Models\Cart::totalCarts() as $cart)
	            <p>
	              {{ $cart->product->title }} -
	              <strong>{{ $cart->product->price }}₫ </strong>
	              - {{ $cart->product_quantity }} sản phẩm
	            </p>
	          @endforeach
	        </div>
	        <div class="col-md-5">
	          @php
	            $total_price = 0;
	          @endphp
	          @foreach (App\Models\Cart::totalCarts() as $cart)
	             @php
	               $total_price += $cart->product->price * $cart->product_quantity;
	             @endphp
	          @endforeach
	          <p>Tổng giá : <strong>{{ $total_price }}₫</strong></p>
	          <p>Tổng giá có cộng phí giao hàng: <strong>{{ $total_price + App\Models\Setting::first()->shipping_cost }}₫</strong></p>
	        </div>
	    </div>
    	<p>
        	<a href="{{ route('carts') }}">Thay đổi giỏ hàng</a>
        </p>
     </div>

    <div class="card card-body mt-2 mb-4">
    	<h2 class="mb-3">Thanh toán</h2>
    	<form action="{{ route('checkouts.store') }}" method="post" accept-charset="utf-8">
    		@csrf
    	<div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">Người nhận</label>
    		<div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autofocus>

            @if ($errors->has('name'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>
        </div>


        <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

          <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>

            @if ($errors->has('email'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="phone_no" class="col-md-4 col-form-label text-md-right">Điện thoại</label>

          <div class="col-md-6">
            <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>

            @if ($errors->has('phone_no'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('phone_no') }}</strong>
              </span>
            @endif
          </div>
        </div>
		
		<div class="form-group row">
          <label for="message" class="col-md-4 col-form-label text-md-right">Thêm tin nhắn (không bắt buộc)</label>

          <div class="col-md-6">
            <textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="4" name="message"></textarea>

            @if ($errors->has('message'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('message') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="shipping_address" class="col-md-4 col-form-label text-md-right">Địa chỉ nhận hàng (*)</label>

          <div class="col-md-6">
            <textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

            @if ($errors->has('shipping_address'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('shipping_address') }}</strong>
              </span>
            @endif
          </div>
        </div>

		<div class="form-group row">
          <label for="payment_method" class="col-md-4 col-form-label text-md-right">Phương thức thanh toán</label>

          <div class="col-md-6">
            <select class="form-control" name="payment_method_id" id="payments" required>
              <option value="">Chọn một phương thức thanh toán</option>
              @foreach ($payments as $payment)
                <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
              @endforeach
            </select>

           	@foreach($payments as $payment)
				
					@if($payment->short_name=="cash_in")
						<div id="payment_{{ $payment->short_name }}" class="alert alert-success hidden mt-3 text-center">
							<h3>
								Bạn không cần làm gì thêm. Click và chờ nhận hàng thôi nào.
							</h3>
							
							<small>
								Bạn sẽ nhận được sản phẩm của bạn sau 1 hoặc 2 ngày.
							</small>
						</div>
					@else
						<div id="payment_{{ $payment->short_name }}" class="alert alert-success hidden mt-3 text-center">
							<h3>{{ $payment->name }}</h3>
							<p>
								<strong>{{ $payment->name }} No: {{ $payment->no }}</strong><br>
								<strong>Account Type: {{ $payment->type }}</strong>
							</p>
							<div class="alert alert-success">
								Vui lòng gửi số tiền của bạn đến tài khoản trên...
							</div>

							
						</div>
					@endif
				
           	@endforeach

           	<input type="text" class="form-control hidden" id="transaction_id" name="transaction_id" value="" placeholder="Enter transaction code">

          </div>
        </div>

        <div class="form-group row">
        	<div class="col-md-6 offset-md-4">
        		<button type="submit" class="btn btn-primary">
        			Order Now
        		</button>
        	</div>
        </div>

    	</form>
    </div>

  </div>
@endsection

@section('scripts')


	<script type="text/javascript">
        $("#payments").change(function(){
        	$payment_method=$("#payments").val();
        	if($payment_method=="cash_in"){
        		$("#payment_cash_in").removeClass('hidden');
        		$("#payment_bkash").addClass('hidden');
        		$("#payment_rocket").addClass('hidden');
        	}else if($payment_method=="bkash"){
        		$("#payment_bkash").removeClass('hidden');
        		$("#payment_cash_in").addClass('hidden');
        		$("#payment_rocket").addClass('hidden');
        		$("#transaction_id").removeClass('hidden');
        	}else if($payment_method=="rocket"){
        		$("#payment_rocket").removeClass('hidden');
        		$("#payment_cash_in").addClass('hidden');
        		$("#payment_bkash").addClass('hidden');
        		$("#transaction_id").removeClass('hidden');
        	}
        })
    </script>

@endsection
