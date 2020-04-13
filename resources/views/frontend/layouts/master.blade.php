<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<base href="{{ asset('') }}">
	<title>
		@yield('title','Laravel Ecommerce Project')
	</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="public/images/favicon.png" />

	@include('frontend.partials.styles')	

</head>
<body>

	<div class="wrapper">		
		@include('frontend.partials.nav')
		@include('frontend.partials.messages')
		@yield('content')
		@include('frontend.partials.footer')		
	</div>

	@include('frontend.partials.scripts')
	@yield('scripts')

{{-- <script type="text/javascript"> 
    $("document").ready(function(){
        setTimeout(function(){
          $(".alert").remove();
        }, 30000 ); 
    });
</script> --}}
 
</body>
</html>