<nav class="navbar navbar-expand-lg navbar-dark bg-light">
  <div class="container">


    <a class="navbar-brand" href="{{ route('index') }}">
      <img src="public/images/logo.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item mr-1">
          <form class=" my-2 my-lg-0" action="{!! route('type.search') !!}" method="get">   
            <div class="input-group">
              <input type="text" class="form-control search" id="search" name="search" placeholder="Nhập sản phẩm cần tìm" style="border-bottom-right-radius: 0;border-top-right-radius: 0;">
              <div class="input-group-append">
                <button class="btn  search-icon-button" type="submit" ><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </li>
        <li class="nav-item {{ Route::is('products') ? 'active':''}}">
          <a class="nav-link" href="{{ route('products') }}">Sản phẩm</a>
        </li>
        <li class="nav-item {{ Route::is('contact') ? 'active':''}}">
          <a class="nav-link" href="{{ route('contact') }}">Liên hệ</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">Hỏi đáp</a>
        </li>
        

      </ul>

      <ul class="navbar-nav ml-auto">
        <li>
          <a class="nav-link btn-cart-nav" href="{{ route('carts') }}">
            <div class=" " style="padding: 5px!important; background: #006EB7 ">
              <span style="font-size: 20px;"><img src="public/images/support/cart.png" width="35"></span>
              <span class="badge badge-warning " id="totalItem" style="vertical-align:top;">
                {{ App\Models\Cart::totalItem() }}
              </span>
            </div>
          </a>
        </li>
        @guest
          <li><a class="nav-link mt-2" href="{{ route('login') }}">Login</a></li>
          <li><a class="nav-link mt-2 " href="{{ route('register') }}">Register</a></li>
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link btn-cart-nav dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">
              {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
              <span class="caret"></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

              <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                My dashboard
              </a>

              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>

  </div>
</div>
</nav>
<!-- End Navbar Part -->

@section('scripts')

@endsection