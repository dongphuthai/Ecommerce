<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Hóa đơn - {{ $order->id }}</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('public/asset/css/admin_style.css') }}">
  <link rel="shortcut icon" href="{{ public_path('images/favicon.png') }}" />
  <style type="text/css">
      *{ font-family:Noto Sans, DejaVu Sans,sans-serif; font-size: 12px;}

      .content-wrapper{
        background-color: #fff;
      }
      .invoice-header{
        background-color: #f7f7f7;
        padding: 20px 20px 0px 20px;
        border-bottom: 1px solid gray;
      }
      .invoice-right-top h3{
        padding-right: 20px;
        margin-top: 20px;
        color: #ec5d01;
        font-size: 55px!important;
        font-family: serif;
      }
      .invoice-left-top{
        border-left: 4px solid #ec5d00;
        padding-left: 20px;
        padding-top: 20px;
      }
      thead{
        background-color: #ec5d01;
        color: #fff;
      }
      .authority h5{
        margin-top: -10px;
        color: #ec5d01;

      }
      .thanks h4{
        color:#ec5d01;
        font-size: 25px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px; 
      }
      .site-address p{
        line-height: 6px;
        font-weight: 300;
      }
      .site-logo{
        
      }

  </style>
  
</head>
<body>
  
<div class="main-panel">
  <div class="content-wrapper " >

    <div class="invoice-header ">
      <div class="float-left site-logo ">
        <img src="{{ public_path('images/favicon.png') }}" alt="">
      </div>
      <div class="float-right site-address">
        <h4>Ecommerce</h4>
        <p>15/3, Lang Giang, Bac Giang</p>
        <p>Phone: <a href="">0989748373</a></p>
        <p>Email: <a href="">info@gmail.com</a></p>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="invoice-description">
      <div class="invoice-left-top float-left ">
        <h6>Invoice to</h6>
        <h3>{{ $order->name }}</h3>
        <div class="address">
          <p><strong>Address: </strong>
            {{ $order->shipping_address }}</p>
            <p>Phone: {{ $order->phone_no }}</p>
            <p>Enail: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
        </div>
      </div>

      <div class="invoice-right-top float-right ">
        <h3>Hóa đơn #{{ $order->id }}</h3>
        <p>{{ $order->created_at }}</p>
      </div>
      <div class="clearfix"></div>
    </div>
      
      <div class="card-body">
        <h3>Sản phẩm</h3>
        @if ($order->carts->count() > 0)

        <table class="table table-bordered table-stripe text-center">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tên sản phẩm</th>             
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng giá</th>
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
                {{ $cart->product_quantity }}
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
            </tr>
            @endforeach
            <tr>
              <td colspan="3"></td>
              <td>
                Giảm giá:
              </td>
              <td colspan="2">
                <strong>  {{ $order->custom_discount }} VND</strong>
              </td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td>
                Phí giao hàng:
              </td>
              <td colspan="2">
                <strong>  {{ $order->shipping_charge }} VND</strong>
              </td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td>
                Tổng cộng:
              </td>
              <td colspan="2">
                <strong>  {{ $total_price + $order->shipping_charge - $order->custom_discount }} VND</strong>
              </td>
            </tr>
          </tbody>
        </table>
        @endif
        <div class="thanks mt-3">
          <h4>Cảm ơn bạn đã mua sản phẩm của Bigshop !!</h4>
        </div>
        <div class="authority float-right mt-5">
          <p>------------------------------</p>
          <h5>Chữ ký:</h5>
        </div>
        <div class="clearfix"></div>
      </div>

  </div>
</div>

</body>
</html>