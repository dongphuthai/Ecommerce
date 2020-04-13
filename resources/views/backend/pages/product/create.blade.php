@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header" style="color: #000;">
          Add Product
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include('backend.partials.messages')
            
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{ old('title') }}">
              @if($errors->has('title'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('title') }}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
              @if($errors->has('description'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('description') }}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input type="number" class="form-control" name="price" id="exampleInputEmail1">
              @if($errors->has('price'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('price') }}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="number" class="form-control" name="quantity" id="exampleInputEmail1">
              @if($errors->has('quantity'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('quantity') }}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="category_parent">Category Parent</label>           
                <select class="form-control" id="category_parent" name="category_parent">
                  <option value="">Please select your category</option>
                  @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                  <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                  @endforeach
                </select>              
          </div>
          <div class="form-group">
              <label for="category_id">Category</label>            
                <select class="form-control" name="category_id" id="category_id">
                  
                </select>      
          </div>
  

            <div class="form-group">
              <label for="exampleInputEmail1">Select Brand</label>
              <select name="brand_id" class="form-control">
                <option value="">Please select a brand for product</option>
                @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
                  <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach

              </select>
              @if($errors->has('brand_id'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('brand_id') }}</p>
              @endif
            </div>

            <div class="form-group">
              <label for="image">Product Image</label>  
              <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group">
              <label for="product_image">Ảnh chi tiết</label>
              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[0]" id="product_image">
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[1]" id="product_image">
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[2]" id="product_image">
                </div>

              </div>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection

@section('scripts')

    <script type="text/javascript"> 
        $("#category_parent").change(function(){
            var category_parent=$("#category_parent").val();
            //Send an ajax request to server
            // $("#district_area").html("");
            var option="";
            var url="{{ url('/') }}";
            $.get( url+"/get-category/" + category_parent, function( data ) {
                data=JSON.parse(data);
                data.forEach( function(element) {
                   option+="<option value='"+ element.id +"'>"+ element.name +"</option>"; 
                });
                $("#category_id").html(option);
            });
        });
        
    </script>
@endsection
