<!DOCTYPE html>
<html lang="tr" class="loading" data-textdirection="ltr">
<head>

	<!-- BEGIN: Meta Tags -->
	@include('admin.layouts.partials.meta')
	<!-- END: Meta Tags -->

	<!-- END: Icons -->
	@include('admin.layouts.partials.icons')
	<!-- END: Icons -->

	<!-- END: Fonts -->
	@include('admin.layouts.partials.fonts')
	<!-- END: Fonts -->

	<!-- BEGIN: Vendor CSS -->
	@include('admin.layouts.partials.styles-vendor')
	<!-- END: Vendor CSS -->

	<!-- BEGIN: Theme CSS -->
	@include('admin.layouts.partials.styles-theme')
	<!-- END: Theme CSS -->

	<!-- BEGIN: Page CSS -->
	@yield('styles')
	<!-- END: Page CSS -->

	@include('admin.layouts.partials.constants')

</head>
<!-- END: Head -->

<!-- BEGIN: Body -->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row"></div>
			<div class="content-body">
				<div class="auth-wrapper auth-basic px-2">
					<div class="auth-inner my-2">

						@yield('content')

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Content -->

	<!-- BEGIN: Vendor JS -->
	@include('admin.layouts.partials.scripts-vendor')
	<!-- BEGIN Vendor JS -->

	<!-- BEGIN: Page Vendor JS -->
	@yield('scripts.vendor')
	<!-- END: Page Vendor JS -->

	<!-- BEGIN: Theme JS -->
	@include('admin.layouts.partials.scripts-theme')
	<!-- END: Theme JS -->

	<!-- BEGIN: Page JS-->
	@yield('scripts')
	<!-- END: Page JS -->

	@include('admin.layouts.partials.feather')

	@include('admin.layouts.partials.scripts-custom')

</body>
<!-- END: Body-->

</html>
