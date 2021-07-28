<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@if(isset($website_title)){{ $website_title }}@endif</title>

	<meta name="description" content="@if(isset($description)){{ $description }}@endif" />
	
	<meta name="keywords" content="@if(isset($meta_tags)){{ $meta_tags }}@endif" />
	
	<meta name="author" content="Paul Anyiam">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- CSS Plugins -->
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" media="screen">	
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/component.css') }}" rel="stylesheet">
	
	<!-- CSS Font Icons -->
	<link rel="stylesheet" href="{{ asset('icons/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('icons/font-awesome/css/font-awesome.min.css') }}">
	
	<!-- CSS Custom -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/additional.css') }}" rel="stylesheet">

</head>


<body class="">

	<div id="introLoader" class="introLoading"></div>
	
	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		@include('includes.header')

		
		<div class="main-wrapper">
			
			@yield('content')

			@include('includes.footer')
		
		</div>
		

	</div> 
	
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->


<!-- JS -->
<script type="text/javascript" src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>

<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery.introLoader.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/customs.js') }}"></script>

<script>

</script>


</body>
</html>