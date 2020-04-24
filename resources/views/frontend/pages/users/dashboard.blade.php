@extends('frontend.pages.users.master')

@section('sub-content')
  <div class='container'>
    <h2>Xin chào {{ $user->first_name . ' '. $user->last_name }}</h2>
    <p>Bạn có thể thay đổi thông tin cá nhân của bạn ở đây...</p>
    <hr>

    <div class="row">
      <div class="col-md-4">
        <div class="card card-body mt-2 pointer" onclick="location.href='{{ route('user.profile') }}'">
          <h3>Cập nhật hồ sơ</h3>
        </div>
      </div>
    </div>
  </div>
@endsection
