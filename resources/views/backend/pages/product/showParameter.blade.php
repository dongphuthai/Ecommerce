@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header" style="color: #000;">
          <h3>{{ $parameter->product->title }}</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.parameter.edit',$parameter->id) }}"  method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label for="screen">Screen</label>
                <input type="text" class="form-control" name="screen" id="screen" aria-describedby="emailHelp" value="{{ $parameter->screen}}">
              </div>
              <div class="form-group">
                <label for="operating_system">Operating system</label>
                <input type="text" class="form-control" name="operating_system" id="operating_system" aria-describedby="emailHelp" value="{{ $parameter->operating_system }}">
              </div>
              <div class="form-group">
                <label for="cpu">CPU</label>
                <input type="text" class="form-control" name="cpu" id="cpu" aria-describedby="emailHelp" value="{{ $parameter->cpu }}">
              </div>
              <div class="form-group">
                <label for="rear_camera">Rear camera</label>
                <input type="text" class="form-control" name="rear_camera" id="rear_camera" aria-describedby="emailHelp" value="{{ $parameter->rear_camera}}">
              </div>
              <div class="form-group">
                <label for="front_camera">Front camera</label>
                <input type="text" class="form-control" name="front_camera" id="front_camera" aria-describedby="emailHelp" value="{{ $parameter->front_camera}}">
              </div>
              <div class="form-group">
                <label for="ram">RAM</label>
                <input type="number" class="form-control" name="ram" id="ram" aria-describedby="emailHelp" value="{{ $parameter->ram }}" placeholder="2">
                @if($errors->has('ram'))
                  <p class="form-errors small" style="color:Tomato;">{{ $errors->first('ram') }}</p>
                @endif
              </div>
              <div class="form-group">
                <label for="internal_memory">Internal memory</label>
                <input type="number" class="form-control" name="internal_memory" id="internal_memory" aria-describedby="emailHelp" value="{{ $parameter->internal_memory}}" placeholder="32">
                @if($errors->has('internal_memory'))
                  <p class="form-errors small" style="color:Tomato;">{{ $errors->first('internal_memory') }}</p>
                @endif
              </div>
              <div class="form-group">
                <label for="memory">Memory</label>
                <input type="text" class="form-control" name="memory" id="memory" aria-describedby="emailHelp" value="{{ $parameter->memory}}">
              </div>
              <div class="form-group">
                <label for="sim">Sim</label>
                <input type="text" class="form-control" name="sim" id="sim" aria-describedby="emailHelp" value="{{$parameter->sim}}">
              </div>
              <div class="form-group">
                <label for="pin">Pin</label>
                <input type="text" class="form-control" name="pin" id="pin" aria-describedby="emailHelp" value="{{$parameter->pin}}">
              </div>
              <div class="form-group">
                <label for="oldimage">Parameter Old Image</label> <br>
                <img src="{!! asset('public/images/parameter/'.$parameter->image) !!}" width="100"> <br>

                <label for="image">Image (optional)</label>  
                <input type="file" class="form-control" name="image" id="image">
                @if($errors->has('image'))
                  <p class="form-errors small" style="color:Tomato;">{{ $errors->first('image') }}</p>
                @endif
              </div>
              <button type="submit" class="btn btn-success">Parameter Update</button>       
            </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection