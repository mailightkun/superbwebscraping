<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>@yield('title', 'Superb Web Scraper Tutorial by iAPDesign.com')</title>
 
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	@yield('meta')

	@section('style')
		 <link rel="stylesheet" href="{{ URL::asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
		 <link rel="stylesheet" href="{{ URL::asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	@show
	@yield('stylesheets')
	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{ URL::asset("assets/vendor/jquery/jquery.min.js") }}"><\/script>')</script>
	@yield('script.header')
 
</head>
<body>
 
@yield('content')

@section('script.footer')
	 <!-- Script Footer -->
	 <script src="{{ URL::asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	 <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@show
 
</body>
</html>