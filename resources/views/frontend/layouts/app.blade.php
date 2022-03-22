<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="title" content="Nirapod Host - Secure & Trusted Services">
	<meta name="description" content="Nirapod Host - Secure & Trusted Services">
	<meta name="og:title" content="Nirapod Host - Secure & Trusted Services">
	<meta name="og:image" content="{{ asset(Settings('logo')) }}">
	<meta name="og:description" content="Nirapod Host - Secure & Trusted Services">
	<meta name="keywords" content="hosting, hosting bangladesh, best hosting, hosting bd, nirapod host, secure host, trusted hosting, cheap price hosting, vps server hosting, dedicated server hosting, reseller best hosting,.">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
	<meta name="revisit-after" content="1 days">
	<meta name="author" content="Nirapod Host">
	@yield('meta')
	<title>@yield('title')</title>
	<meta name="description" content="">
	<link href="{{ asset(Settings('site_icon')) }}" rel="shortcut icon">
	<!-- Fonts -->
	<link href="{{ asset('frontend/fonts/cloudicon/cloudicon.css') }}" rel="stylesheet" onload="if(media!='all')media='all'">
	<link href="{{ asset('frontend/fonts/fontawesome/css/all.css') }}" rel="stylesheet" onload="if(media!='all')media='all'">
	<link href="{{ asset('frontend/fonts/opensans/opensans.css') }}" rel="stylesheet" onload="if(media!='all')media='all'">
	<!-- CSS styles -->
	<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" onload="if(media!='all')media='all'">
	<link href="{{ asset('frontend/css/swiper.min.css') }}" rel="stylesheet" onload="if(media!='all')media='all'">
	<link href="{{ asset('frontend/css/animate.min.css') }}" rel="stylesheet" onload="if(media!='all')media='all'">
	<link href="{{ asset('frontend/css/style.min.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
	<!-- Custom color styles -->
    <link href="{{ asset('frontend/css/gdpr-cookie.min.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/colors/pink.css') }}" rel="stylesheet" title="pink" onload="if(media!='all')media='all'" />
	<link href="{{ asset('frontend/css/colors/blue.css') }}" rel="stylesheet" title="blue" onload="if(media!='all')media='all'" />
	<link href="{{ asset('frontend/css/colors/green.css') }}" rel="stylesheet" title="green" onload="if(media!='all')media='all'" />
	<link href="{{ asset('frontend/css/colors/dark.css') }}" rel="stylesheet" title="dark" onload="if(media!='all')media='all'" />

	@stack('css')

</head>

<body>
		<!--Start of Tawk.to Script-->
		<script type="text/javascript">

		</script>
		<!--End of Tawk.to Script-->
	<!-- ***** LOADING PAGE ****** -->
	<div id="spinner-area">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
			<div class="spinner-txt">NirapodHost</div>
		</div>
	</div>
	<!-- ***** UPLOADED MENU FROM HEADER.HTML ***** -->
    @include('frontend.inc.header')
	@yield('content')
	<!-- ***** UPLOADED FOOTER FROM FOOTER.HTML ***** -->
	@include('frontend.inc.footer')
	<!-- ***** BUTTON GO TOP ***** -->
	<a href="#0" class="cd-top"> <i class="fas fa-angle-up"></i> 
	</a>
	<!-- Javascript -->
	<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
	<script src="{{ asset('frontend/js/typed.js') }}"></script>
	<script defer src="{{ asset('frontend/js/popper.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/jquery.countdown.js') }}"></script>
	<script defer src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/slick.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/isotope.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/jquery.scrollme.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/swiper.min.js') }}"></script>
	<script async src="{{ asset('frontend/js/lazysizes.min.js') }}"></script>
	<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/gdpr-cookie.min.js') }}"></script>
	<script>
		new WOW().init();
	</script>
	<script defer src="{{ asset('frontend/js/scripts.min.js') }}"></script>
	<script>
		var typed1 = new Typed('#typed1', {
            strings: {!! Settings('slider_typed_title') !!},
            typeSpeed: 50,
            backSpeed: 20,
            smartBackspace: true,
            loop: true
		});
        $("#nav-toggle").click(function(){
            $("#nav-toggle").toggleClass("active");
        });

        $.gdprcookie.init({});
        $(document.body)
        .on("gdpr:show", function() {
            console.log("Cookie dialog is shown");
        })
        .on("gdpr:accept", function() {
        var preferences = $.gdprcookie.preference();
            console.log("Preferences saved:", preferences);
        })
        .on("gdpr:advanced", function() {
            console.log("Advanced button was pressed");
        });
        if ($.gdprcookie.preference("marketing") === true) {
            console.log("This should run because marketing is accepted.");
        }
    </script>
	@stack('js')
</body>

</html>