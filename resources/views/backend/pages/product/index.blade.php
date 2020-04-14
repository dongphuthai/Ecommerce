@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header" style="color: #000;">
        Manage Product
      </div>
      <div class="card-body">
        @include('backend.partials.messages')
        <table class="table table-hover table-striped"  id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Product Code</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($products as $product)
            @php
              $parent_id=$product->category->parent->id;
            @endphp         
            <tr>
              <td>#</td>
              <td>#PLE{{ $product->id }}</td>
              <td>{{ $product->title }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->quantity }}</td>
              <td>   
                @if($parent_id==32||$parent_id==33)
                  <a href="{{ route('admin.product.parameter.show', $product->id) }}" class="btn btn-info mb-1">Xem thông số</a>
                  <a href="#updateModal{{ $product->id }}" data-toggle="modal" class="btn btn-primary mb-1">Thêm thông số</a>
                @elseif($parent_id==29)
                  <a href="{{ route('admin.product.paralaptop.show', $product->id) }}" class="btn btn-info mb-1">Xem thông số laptop</a>
                  <a href="#laptopModal{{ $product->id }}" data-toggle="modal" class="btn btn-primary mb-1">Thêm thông số </a>
                @endif
                          
                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success mb-1">Sửa sản phẩm</a>
                <a href="#deleteModal{{ $product->id }}" data-toggle="modal" class="btn btn-danger mb-1">Xóa</a>              

                <!-- Update Modal -->
                <div class="modal fade" id="updateModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are sure to update for {{ $product->title }}?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="{!! route('admin.product.parameter.update')!!}"  method="post" enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <div class="form-group">
                            <label for="product_id">ID of {{ $product->title }}</label>
                            <input type="number" class="form-control" name="product_id" id="product_id" aria-describedby="emailHelp" value="{{ $product->id }}">
                          </div>
                          <div class="form-group">
                            <label for="screen">Screen</label>
                            <input type="text" class="form-control" name="screen" id="screen" aria-describedby="emailHelp" value="{{ old('screen') }}">
                          </div>
                          <div class="form-group">
                            <label for="operating_system">Operating system</label>
                            <input type="text" class="form-control" name="operating_system" id="operating_system" aria-describedby="emailHelp" value="{{ old('operating_system') }}">
                          </div>
                          <div class="form-group">
                            <label for="cpu">CPU</label>
                            <input type="text" class="form-control" name="cpu" id="cpu" aria-describedby="emailHelp" value="{{ old('cpu') }}">
                          </div>
                          <div class="form-group">
                            <label for="rear_camera">Rear camera</label>
                            <input type="text" class="form-control" name="rear_camera" id="rear_camera" aria-describedby="emailHelp" value="{{ old('rear_camera') }}">
                          </div>
                          <div class="form-group">
                            <label for="front_camera">Front camera</label>
                            <input type="text" class="form-control" name="front_camera" id="front_camera" aria-describedby="emailHelp" value="{{ old('front_camera') }}">
                          </div>
                          <div class="form-group">
                            <label for="ram">RAM</label>
                            <input type="number" class="form-control" name="ram" id="ram" aria-describedby="emailHelp" value="{{ old('ram') }}" placeholder="2">
                            @if($errors->has('ram'))
                              <p class="form-errors small" style="color:Tomato;">{{ $errors->first('ram') }}</p>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="internal_memory">Internal memory</label>
                            <input type="number" class="form-control" name="internal_memory" id="internal_memory" aria-describedby="emailHelp" value="{{ old('internal_memory') }}" placeholder="32">
                            @if($errors->has('internal_memory'))
                              <p class="form-errors small" style="color:Tomato;">{{ $errors->first('internal_memory') }}</p>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="memory">Memory</label>
                            <input type="text" class="form-control" name="memory" id="memory" aria-describedby="emailHelp" value="{{ old('memory') }}">
                          </div>
                          <div class="form-group">
                            <label for="sim">Sim</label>
                            <input type="text" class="form-control" name="sim" id="sim" aria-describedby="emailHelp" value="{{ old('sim') }}">
                          </div>
                          <div class="form-group">
                            <label for="pin">Pin</label>
                            <input type="text" class="form-control" name="pin" id="pin" aria-describedby="emailHelp" value="{{ old('pin') }}">
                          </div>
                          <div class="form-group">
                            <label for="image">Image (optional)</label>  
                            <input type="file" class="form-control" name="image" id="image">
                            @if($errors->has('image'))
                              <p class="form-errors small" style="color:Tomato;">{{ $errors->first('image') }}</p>
                            @endif
                          </div>
                          <button type="submit" class="btn btn-success">Product Update</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                     
                        </form>
                      </div>                       
                    </div>
                  </div>
                </div>

                <!-- Laptop Modal -->
                <div class="modal fade" id="laptopModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are sure to update for {{ $product->title }}?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="{!! route('admin.product.paralaptop.update')!!}"  method="post" enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <div class="form-group">
                            <label for="product_id">ID of {{ $product->title }}</label>
                            <input type="number" class="form-control" name="product_id" id="product_id" aria-describedby="emailHelp" value="{{ $product->id }}">
                          </div>
                          <div class="form-group">
                            <label for="cpu">CPU</label>
                            <input type="text" class="form-control" name="cpu" id="cpu" aria-describedby="emailHelp" value="{{ old('cpu') }}">
                          </div>
                          <div class="form-group">
                            <label for="ram">RAM</label>
                            <input type="text" class="form-control" name="ram" id="ram" aria-describedby="emailHelp" value="{{ old('ram') }}">
                          </div>
                          <div class="form-group">
                            <label for="hard_drive">Ổ cứng</label>
                            <input type="text" class="form-control" name="hard_drive" id="hard_drive" aria-describedby="emailHelp" value="{{ old('hard_drive') }}">
                          </div>
                          <div class="form-group">
                            <label for="screen">Màn hình</label>
                            <input type="text" class="form-control" name="screen" id="screen" aria-describedby="emailHelp" value="{{ old('screen') }}">
                          </div>
                          <div class="form-group">
                            <label for="card_screen">Card màn hình</label>
                            <input type="text" class="form-control" name="card_screen" id="card_screen" aria-describedby="emailHelp" value="{{ old('card_screen') }}">
                          </div>
                          <div class="form-group">
                            <label for="connector">Cổng kết nối</label>
                            <input type="text" class="form-control" name="connector" id="connector" aria-describedby="emailHelp" value="{{ old('connector') }}" >
                          </div>
                          <div class="form-group">
                            <label for="operating_system">Hệ điều hành</label>
                            <input type="text" class="form-control" name="operating_system" id="operating_system" aria-describedby="emailHelp" value="{{ old('operating_system') }}" >                        
                          </div>
                          <div class="form-group">
                            <label for="design">Thiết kế</label>
                            <input type="text" class="form-control" name="design" id="design" aria-describedby="emailHelp" value="{{ old('design') }}">
                          </div>
                          <div class="form-group">
                            <label for="size">Kích thước</label>
                            <input type="text" class="form-control" name="size" id="size" aria-describedby="emailHelp" value="{{ old('size') }}">
                          </div>
                          <div class="form-group">
                            <label for="time_launch">Thời điểm ra mắt</label>
                            <input type="number" class="form-control" name="time_launch" id="time_launch" aria-describedby="emailHelp" value="{{ old('time_launch') }}">
                          </div>
                          <div class="form-group">
                            <label for="image">Image (optional)</label>  
                            <input type="file" class="form-control" name="image" id="image">
                            @if($errors->has('image'))
                              <p class="form-errors small" style="color:Tomato;">{{ $errors->first('image') }}</p>
                            @endif
                          </div>
                          <button type="submit" class="btn btn-success">Product Update</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                     
                        </form>
                      </div>                       
                    </div>
                  </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{!! route('admin.product.delete', $product->id) !!}"  method="post">
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger">Permanent Delete</button>
                        </form>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>

              </td>
            </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
              <th>#</th>
              <th>Product Code</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
