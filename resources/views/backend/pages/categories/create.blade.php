@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Category
        </div>
        <div class="card-body">
          <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include('backend.partials.messages')
            
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Catagory Name">
              @if($errors->has('name'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('name') }}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
              @if($errors->has('description'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('description') }}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="parent_id">Parent Category (optional)</label>
              <select class="form-control" name="parent_id" id="parent">
                <option value="">Please select a Parent category</option>
                @foreach($main_categories as $category)
                  <option value="{{ $category->id }}"> {{ $category->name }} </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="image">Category Image (optional)</label>  
              <input type="file" class="form-control" name="image" id="image">
              @if($errors->has('image'))
                <p class="form-errors small" style="color:Tomato;">{{ $errors->first('image') }}</p>
              @endif
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
