@extends('frontend.layouts.master')

@section('title')
  Bigshop | Ecommerce Site
@endsection

@section('content')
  <div class='container margin-top-20'>
    <h4>Có {{ $products->count() }} sản phẩm được tìm thấy cho từ khóa <b>"{{ $search }}"</b></h4>
    <div class="list-item">         
      @include('frontend.pages.products.partials.all_products')          
    </div>       
  </div>
@endsection
