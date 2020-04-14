@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header" style="color: #000;">
          <h3>{{ $paralaptop->product->title }}</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.paralaptop.edit',$paralaptop->id) }}"  method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label for="cpu">CPU</label>
                <input type="text" class="form-control" name="cpu" id="cpu" aria-describedby="emailHelp" value="{{ $paralaptop->cpu }}">
              </div>
              <div class="form-group">
                <label for="ram">RAM</label>
                <input type="text" class="form-control" name="ram" id="ram" aria-describedby="emailHelp" value="{{ $paralaptop->ram }}">
              </div>
              <div class="form-group">
                <label for="hard_drive">Ổ cứng</label>
                <input type="text" class="form-control" name="hard_drive" id="hard_drive" aria-describedby="emailHelp" value="{{ $paralaptop->hard_drive }}">
              </div>
              <div class="form-group">
                <label for="screen">Màn hình</label>
                <input type="text" class="form-control" name="screen" id="screen" aria-describedby="emailHelp" value="{{ $paralaptop->screen}}">
              </div>
              <div class="form-group">
                <label for="card_screen">Card màn hình</label>
                <input type="text" class="form-control" name="card_screen" id="card_screen" aria-describedby="emailHelp" value="{{ $paralaptop->card_screen }}">
              </div>
              <div class="form-group">
                <label for="connector">Cổng kết nối</label>
                <input type="text" class="form-control" name="connector" id="connector" aria-describedby="emailHelp" value="{{ $paralaptop->connector }}" >
              </div>
              <div class="form-group">
                <label for="operating_system">Hệ điều hành</label>
                <input type="text" class="form-control" name="operating_system" id="operating_system" aria-describedby="emailHelp" value="{{ $paralaptop->operating_system }}" >                
              </div>
              <div class="form-group">
                <label for="design">Thiết kế</label>
                <input type="text" class="form-control" name="design" id="design" aria-describedby="emailHelp" value="{{ $paralaptop->design }}">
              </div>
              <div class="form-group">
                <label for="size">Kích thước</label>
                <input type="text" class="form-control" name="size" id="size" aria-describedby="emailHelp" value="{{ $paralaptop->size }}">
              </div>
              <div class="form-group">
                <label for="time_launch">Thời điểm ra mắt</label>
                <input type="number" class="form-control" name="time_launch" id="time_launch" aria-describedby="emailHelp" value="{{ $paralaptop->time_launch }}">
              </div>
              <div class="form-group">
                <label for="oldimage">Paramenter Old Image</label> <br>
                <img src="{!! asset('public/images/paralaptop/'.$paralaptop->image) !!}" width="100"> <br>

                <label for="image">Image (optional)</label>  
                <input type="file" class="form-control" name="image" id="image">
                @if($errors->has('image'))
                  <p class="form-errors small" style="color:Tomato;">{{ $errors->first('image') }}</p>
                @endif
              </div>
              <button type="submit" class="btn btn-success">Paramenter Update</button>       
            </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection