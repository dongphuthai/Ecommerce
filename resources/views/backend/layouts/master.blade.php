<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <base href="{{ asset('') }}">
  <title>Star Admin Free Bootstrap-4 Admin Dashboard Template</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="public/asset/css/bootstrap/bootstrap.css">
  <!-- endinject -->
  <link rel="stylesheet" type="text/css" href="public/asset/css/admin_style.css">
  <link rel="stylesheet" type="text/css" href="public/asset/css/datatables.min.css">
  <link rel="shortcut icon" href="public/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    @include('backend.partials.nav')


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
        @include('backend.partials.left_sidebar')

        @yield('content')

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script type="text/javascript" src="public/asset/js/jquery-3.4.1.min.js"></script>
  {{-- <script type="text/javascript" src="public/asset/dist/jquery.min.js"></script> --}}
  <script type="text/javascript" src="public/asset/dist/popper.min.js"></script>
  <script type="text/javascript" src="public/asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="public/asset/js/data-table.min.js"></script>

  {{-- <script type="text/javascript"> 
    $("document").ready(function(){
        setTimeout(function(){
          $(".alert").remove();
        }, 5000 ); 
    });
  </script> --}}
  @yield('scripts')
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    } );
  </script> 
</body>

</html>
