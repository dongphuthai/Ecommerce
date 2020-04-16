
<div class='container mt-2 page-feature '> 
  <div class="price_parent_item">
    <div class="price_child_item">
    @php
    $str_parent=mb_convert_case(App\Models\Category::where('id',$id)->first()->name,MB_CASE_UPPER, "UTF-8");
    $str_child=mb_convert_case(App\Models\Category::where('id',$id_child)->first()->name,MB_CASE_UPPER, "UTF-8");
    @endphp
    <p style="font-family: arial;"><b>TẤT CẢ {{ $str_parent }} {{ $str_child }}</b></p>         
      <div class="list-item " style="min-height: 250px;">            
        @if ($products->count() > 0)
          @include('frontend.pages.products.partials.all_products')
        @endif   
      </div>
    </div>
  </div>
</div>

  {{-- <div class="mt-4 d-flex justify-content-center" >
      {{ $products->links() }}
  </div> --}}

@section('scripts')
  <script type="text/javascript">

    $("#input-1").rating();

  </script>
@endsection

