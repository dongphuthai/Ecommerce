<!-- Lấy ra sản phẩm mới -->
@if(isset($date))
  @foreach($products as $product)
    @php
      $time= $product->created_at->getTimestamp();
      $subtime=($date-$time)/(60*60*24);
    @endphp
    @if($subtime<10)
      @include('frontend.pages.products.partials.all_pro')
    @endif
  @endforeach
<!-- Lấy ra sản phẩm đang giảm giá -->
@elseif(isset($discount))
  @foreach($products as $product)
    @if($product->discount>0)
      @include('frontend.pages.products.partials.all_pro')
    @endif
  @endforeach
<!-- Lấy ra sản phẩm thông thường -->
@else
  @foreach($products as $product)
    @include('frontend.pages.products.partials.all_pro')
  @endforeach
@endif
 
@section('scripts')
  <script type="text/javascript">
    $(".rating").rating();
  </script>
@endsection

