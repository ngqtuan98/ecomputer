<!doctype html>
<html>
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicon-->
	<link rel="shortcut icon" href="source/img/fav1.png">
	<meta charset="UTF-8">
	<base href="{{asset('')}}">
	<!-- Site Title -->
	<title>E-computer</title>
	<!--
	CSS
		============================================= -->

		
		
	@yield('extra-css')
	<link rel="stylesheet" href="source/css/checkout.css">
	<link href="source/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="source/css/linearicons.css">
	<link rel="stylesheet" href="source/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/css/themify-icons.css">
	<link rel="stylesheet" href="source/css/bootstrap.css">
	<link rel="stylesheet" href="source/css/owl.carousel.css">
	<link rel="stylesheet" href="source/css/nice-select.css">
	<link rel="stylesheet" href="source/css/nouislider.min.css">
	<link rel="stylesheet" href="source/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="source/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="source/css/magnific-popup.css">
	<link rel="stylesheet" href="source/css/main.css">

	<style>
		/* Paste this css to your style sheet file or under head tag */
		/* This only works with JavaScript, 
		if it's not present, don't show loader */
		.no-js #loader {
			display: none;
		}

		.js #loader {
			display: block;
			position: absolute;
			left: 100px;
			top: 0;
		}

		.se-pre-con {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url(source/images/loader-64x/Preloader_1.gif) center no-repeat #fff;
		}
	</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script>
		//paste this code under head tag or in a seperate js file.
		// Wait for window load
		$(window).load(function() {
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");;
		});
	</script>

</head>

<body>
	<div class="se-pre-con"></div>
	<!-- Start Header Area -->
	@include('header')
	<!-- End Header Area -->
	@yield('content')
	<!-- start footer Area -->
	@include('footer')
	<!-- End footer Area -->
	@yield('extra-js')

	<script src="https://apps.elfsight.com/p/platform.js" defer></script>
	<script src="source/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="source/js/vendor/bootstrap.min.js"></script>
	<script src="source/js/jquery.ajaxchimp.min.js"></script>
	<script src="source/js/jquery.nice-select.min.js"></script>
	<script src="source/js/jquery.sticky.js"></script>
	<script src="source/js/nouislider.min.js"></script>
	<script src="source/js/countdown.js"></script>
	<script src="source/js/jquery.magnific-popup.min.js"></script>
	<script src="source/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="source/js/gmaps.min.js"></script>
	<script src="source/js/main.js"></script>

</body>

</html>