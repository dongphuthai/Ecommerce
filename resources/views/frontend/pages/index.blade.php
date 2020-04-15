@extends('frontend.layouts.master')

@section('content')

<div class="container page-feature ">
  <!-- Start Sidebar + Content -->
  @include('frontend.pages.products.partials.slider')

  <div class="mt-2 mb-2">
  <div class="row">
    <div class="col-12 col-lg-8">
      <div style="display: flex;" class="text-center">
        @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
          <a id="parent_{{ $parent->id }}" href="{{ route('categories.show.parent',$parent->slug) }}" class="list-group-item list-group-item-action p-0 btn">
            <img src="{!! asset('public/images/categories/'.$parent->image) !!}" width="25" style="padding-top: 3px;">
            <p class="mb-0 hiddentitle" style="font-size: 14px; font-family: arial;">{{ $parent->name }}</p>
          </a>
        @endforeach
      </div>
    </div>     
    @include('frontend.pages.products.partials.price') 
  </div>    
</div>
</div>
  
  @include('frontend.partials.featured.phone-featured')
  @include('frontend.partials.featured.laptop-featured')
  @include('frontend.partials.featured.tablet-featured')
  @include('frontend.partials.featured.phu-kien-featured')
  @include('frontend.partials.featured.watches-featured')

  <script type="text/javascript">
    var url="{{ url('/') }}"
    function Redirect() {
      window.location=url+"/products";
    }
  </script>

  <!-- End Sidebar + Content -->
@endsection
