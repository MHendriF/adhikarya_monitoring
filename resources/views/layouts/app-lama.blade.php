<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="author" content="lapantiga.com">
  <meta name="copyright" content="PT ADHI KARYA (Persero) Tbk">
	<title>Ahsana Property Syariah | @yield('title')</title>

	@include('partials.header-lama')
	@yield('custom-header')
	@yield('csstambahan')
</head>

<body class="no-print">
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
	<div class="wrapper theme-1-active box-layout pimary-color-red">
		@include('partials.navbar')
		@include('partials.sidebar')
		@yield('content')
		@include('partials.footer-lama')
	</div>

	@stack('message')
	@yield('jsadd')
	@yield('custom-footer')
	@yield('javascript')

</body>

</html>
