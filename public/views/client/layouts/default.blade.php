<!DOCTYPE html>
<html lang="tr">
<head>

	@include('client.layouts.partials.tags')

	@include('client.layouts.partials.icons')

	@include('client.layouts.partials.styles')

	<script>
		const API_URL = '{{ site_url('api') }}'
		const ASSET_URL = '{{ asset_url('client') }}'
		const SITE_URL = '{{ site_url() }}'
	</script>

	@yield('styles')

</head>
<body>

	<!-- push menu -->
	@include('client.layouts.partials.mobile-menu')
	<!-- end push menu -->

	<!-- pushcart -->
	@include('client.layouts.partials.cart')
	<!-- End pushcart -->

	<!-- Search -->
	@include('client.layouts.partials.search')
	<!-- End Search -->

	<!-- Account -->
	@include('client.layouts.partials.account')
	<!-- End Account -->

	<div class="wrappage">
		
		<!-- header -->
		@include('client.layouts.partials.header')
		<!-- End header -->

		<!-- content -->
		@yield('content')
		<!-- End content -->

		@include('client.layouts.partials.policy')

		<!-- Footer -->
		@include('client.layouts.partials.footer')
		<!-- End Footer -->

	</div>

	@include('client.layouts.partials.scroll-top')

	@include('client.layouts.partials.scripts')

	@yield('scripts')

</body>
</html>
