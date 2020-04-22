<div class="row">
    <div class="col-xl-5 col-lg-7 p-md-5 p-lg-0">    
        <div class="carousel-inner pt-2 pl-4 pr-4 pb-4">
          @php $i=1; @endphp
          @foreach($product->images as $image)
            <div class="product-item carousel-item {{ $i == 1 ? 'active':'' }}" style="background-color: #f0f0f0;">
              <img class="d-block w-100" src="public/images/products/{{ $image->image }}" height="auto" alt="First slide">
            </div>
            @php $i++; @endphp
          @endforeach
      </div>
    </div>

    <div class="col-xl-4 col-lg-5 col-md-6 pl-lg-2 ">
      <div style="padding-left: 0px">        
        <h3><b>
          @if($product->discount>0)
            <span class="font-price">{!! number_format($product->offer_price,0,"",".") !!}₫ </span>
            <small><span class="pl-1" style="text-decoration: line-through; font-size: 18px; color: #999;">{{ number_format($product->price,0,"",".") }} ₫ </span></small>
            <label class="card-title m-0 giam-gia-show"><img src="public/images/discount.png" width="18"> Giảm {!! number_format($product->discount,0,"",".") !!}₫</label>
          @else
            <span class="font-price">{{ number_format($product->price,0,"",".") }}₫ </span>
            <label class="card-title m-0 tra-gop-show">Trả góp 0%</label>
          @endif
        </b></h3>
          
        <div class="con-hang">{{ $product->quantity > 0 ? 'CÒN HÀNG' : 'HẾT HÀNG' }}</div>
        <div class="qua-tang">
          <div class="titlequatang">QUÀ TẶNG</div>
          <div class="indexkhuyenmai">
            <div class="sttkhuyenmai">
              <div>1</div>
            </div> 
            <div class="chitietkhuyenmai">Tặng 2 suất mua đồng hồ thời trang giảm giá 40% (không áp dụng thêm khuyễn mãi khác).</div>
          </div>          
          @if($product->discount>0)
            <div class="indexkhuyenmai">
              <div class="sttkhuyenmai">
                <div>2</div>
              </div>
              <div class="chitietkhuyenmai">Trả góp 0% thẻ tín dụng.</div>
            </div>
            <div class="indexkhuyenmai">
              <div class="sttkhuyenmai">
                <div>3</div>
              </div>
              <div class="chitietkhuyenmai">Giảm ngay 1 triệu khi mua online (áp dụng đặt và nhận hàng từ 5 - 30/4) (đã trừ vào giá).</div>
            </div>
          @else
            <div class="indexkhuyenmai">
              <div class="sttkhuyenmai">
                <div>2</div>
              </div>
              <div class="chitietkhuyenmai">Trả góp 0% thẻ tín dụng</div>
            </div>
          @endif
        </div>
      </div>
      <div>
        <div style="font-size: 13px;color: #d0021b;font-style: italic; line-height: 15px;padding-top: 8px;">Quà tặng không áp dụng đối với chương trình: "XẢ KHO CUỐI THÁNG", "KHUYẾN MÃI GIỜ VÀNG".</div>
        <div class="mt-4">         
          @include('frontend.pages.products.partials.cart-button')
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-lg-12 col-md-6 pt-2 pl-lg-3 pl-md-0">
      <div>
        <div class="phone-lienhe">        
          Gọi đặt mua:
          <a href="#"><img src="public/images/call.png" width="14" class="pb-1">
          <b>0989748373</b></a>         
        </div>
        <div class="baohanh">
          <div class="yentammuahang">
            <div>Yên tâm mua hàng tại Bigshop</div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/truck.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              Miễn phí giao hàng và lắp đặt toàn tỉnh Bắc Giang.
              <a href="">Xem chi tiết.</a>
            </div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/truck.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              Hỗ trợ vận chuyển cho đơn hàng từ 500.000₫.
            </div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/money.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              <b>Miễn phí công lắp đặt.</b> Không phát sinh vật tư.
            </div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/refresh.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              <a href="#">Đổi trả miễn phí trong 30 ngày.</a>
            </div>
          </div>
          <div class="vanchuyenvalapdat">
            <div><img src="public/images/support/shield.png" width="20" style="padding-bottom: 5px;"></div>
            <div class="pl-2">
              Bảo hành chính hãng.<a href="#"> Xem chính sách bảo hành.</a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>