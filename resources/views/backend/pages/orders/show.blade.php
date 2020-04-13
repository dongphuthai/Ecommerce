@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Mã sản phẩm #LE{{ $order->id }}
      </div>
      <div class="card-body">
        @include('backend.partials.messages')
        <h3>Thông tin</h3>
        <div class="row">
          <div class="col-md-6 border-right">
            <p><strong>Tên khách hàng : </strong>{{ $order->name }}</p>
            <p><strong>Số điện thoại : </strong>{{ $order->phone_no }}</p>
            <p><strong>Email : </strong>{{ $order->email }}</p>
            <p><strong>Địa chỉ : </strong>{{ $order->shipping_address }}</p>
          </div>
          <div class="col-md-6">
            <p><strong>Phương thức thanh toán: </strong> {{ $order->payment->name }}</p>
            <p><strong>Mã thanh toán: </strong> {{ $order->transaction_id }}</p>
          </div>
        </div>
        <hr>
        <h3>Sản phẩm: </h3>


        @if ($order->carts->count() > 0)

        <table class="table table-bordered table-stripe">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tên sản phẩm</th>
              <th>Ảnh</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng giá</th>
              <th>
                Delete
              </th>
            </tr>
          </thead>
          <tbody>
            @php
            $total_price = 0;
            @endphp
            @foreach ($order->carts as $cart)
            <tr>
              <td>
                {{ $loop->index + 1 }}
              </td>
              <td>
                <a href="{{ route('products.show', $cart->product->slug) }}">{{ $cart->product->title }}</a>
              </td>
              <td>
                @if ($cart->product->images->count() > 0)
                <img src="{{ asset('public/images/products/'. $cart->product->images->first()->image) }}" width="60px">
                @endif
              </td>
              <td>
                <form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
                  @csrf
                  <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
                  <button type="submit" class="btn btn-success ml-1">Update</button>
                </form>
              </td>
              <td>
                {{ $cart->product->price }} VND
              </td>
              <td>
                @php
                $total_price += $cart->product->price * $cart->product_quantity;
                @endphp

                {{ $cart->product->price * $cart->product_quantity }} VND
              </td>
              <td>
                <form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
                  @csrf
                  <input type="hidden" name="cart_id" />
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
            <tr>
              <td colspan="4"></td>
              <td>
                Tổng tiền:
              </td>
              <td colspan="2">
                <strong>  {{ $total_price }} VND</strong>
              </td>
            </tr>
          </tbody>
        </table>
        @endif

        <hr>
        <form action="{{ route('admin.order.charge', $order->id) }}" class=" form-inline"  method="post">
          @csrf
          <div class="form-group col-md-4">
            <label class="pr-2">Phí giao hàng</label>
            <input type="number" class="form-control" name="shipping_charge" id="shipping_charge" value="{{ $order->shipping_charge }}" >
          </div>
          <br> 
          <div class="form-group col-md-4">
            <label class="pr-2">Giảm giá</label>
            <input type="number" class="form-control" name="custom_discount" id="custom_discount" value="{{ $order->custom_discount }}" >
          </div>         
          <br>      
          <input type="submit" value="Update" class="btn btn-success mr-3">
          <a href="{{ route('admin.order.invoice',$order->id) }}" class="btn btn-info">Tạo hóa đơn</a>
        </form>
        <hr>

        <form action="{{ route('admin.order.completed', $order->id) }}" class="form-inline" style="display: inline-block!important;" method="post">
          @csrf
          @if ($order->is_completed)
          <input type="submit" value="Hủy đơn hàng" class="btn btn-danger">
          @else
          <input type="submit" value="Hoàn thành đơn hàng" class="btn btn-success">
          @endif
        </form>


        <form action="{{ route('admin.order.paid', $order->id) }}" class="form-inline" style="display: inline-block!important;" method="post">
          @csrf
          @if ($order->is_paid)
          <input type="submit" value="Hủy thanh toán" class="btn btn-danger">
          @else
          <input type="submit" value="Đã thanh toán" class="btn btn-success">
          @endif
        </form>

      </div>
    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
