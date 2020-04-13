@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header" style="color: #000;">
          Edit Product
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('backend.partials.messages')
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->title }}" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control">{{ $product->description }}</textarea>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input type="number" class="form-control" name="price" id="exampleInputEmail1" value="{{ $product->price }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Discount</label>
              <input type="number" class="form-control" name="discount" id="exampleInputEmail1" value="{{ $product->discount }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" value="{{ $product->quantity }}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Select Category</label>
              <select name="category_id" class="form-control">
                <option value="">Please select a category for product</option>
                @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                  <option value="{{ $parent->id }}" {{ $parent->id==$product->category->id ? 'selected':'' }}>
                    {{ $parent->name }}
                  </option>
                  
                  @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                    <option value="{{ $child->id }}" {{ $child->id == $product->category->id ? 'selected': '' }}>
                     -----> {{ $child->name }}
                    </option>
                  @endforeach

                @endforeach

              </select>
              @if($errors->has('category_id'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('category_id') }}</p>
              @endif
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Select Brand</label>
              <select class="form-control" name="brand_id">
                <option value="">Please select a brand for the product</option>
                @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $br)
                  <option value="{{ $br->id }}" {{ $br->id == $product->brand->id ? 'selected' : '' }}>{{ $br->name }}</option>
                @endforeach
              </select>
              @if($errors->has('brand_id'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('brand_id') }}</p>
              @endif
            </div>

            <div class="form-group">
              <label for="oldimage">Product Old Image</label><br>  
              <img src="public/images/product/{{ $product->image }}" width="100" >
              <br>
              <label for="image">Product Image</label>
              <input type="file" class="form-control" name="image" id="image">            
            </div>

            <div class="form-group">
              <label for="oldimage">Ảnh chi tiết</label> <br>
              <div class="row">
                <div class="col-md-4">

                  <input type="file" class="form-control" name="product_image[0]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[1]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[2]" id="product_image" >
                </div>                 
              </div>
              
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection