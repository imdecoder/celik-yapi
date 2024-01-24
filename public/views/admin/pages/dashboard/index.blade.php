@extends('admin.layouts.default')

@section('title', 'Çelik Panel')

@section('styles.vendor')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/charts/apexcharts.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/extensions/toastr.min.css') }}">
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/core/menu/menu-types/vertical-menu.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/pages/dashboard-ecommerce.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/charts/chart-apex.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/extensions/ext-component-toastr.css') }}">

	<style type="text/css">
		.card-customers-table .card-body {
			padding: 0;
			margin: 1.5rem 2rem;
		}

		.card-customers-table .table tbody tr:last-child td:first-child,
		.card-customers-table .table tbody tr:last-child td:last-child {
			border-radius: 0;
		}

		.card-customers-table .table > :not(caption) > * > *,
		.card-orders-table td .badge {
			padding: 0.5rem 1rem;
		}

		.card-customers-table td .avatar {
			background-color: #f8f8f8;
			margin-right: 2rem;
		}

		.card-orders-table .table thead,
		.card-orders-table .table tbody {
			border-width: 1px;
		}
	</style>
@endsection

@section('content')

	<!-- Dashboard Ecommerce Starts -->
	<section id="dashboard-ecommerce">
		<div class="row match-height">

			<!-- include('admin.pages.dashboard.shared.medal') -->

			@include('admin.pages.dashboard.shared.statistics')

		</div>
		<div class="row match-height">

			@include('admin.pages.dashboard.shared.customers')

			@include('admin.pages.dashboard.shared.last-orders')

		</div>
		<div class="row match-height">
			<div class="col-lg-4 col-12">
				<div class="row match-height">

					<!-- include('admin.pages.dashboard.shared.orders') -->

					<!-- include('admin.pages.dashboard.shared.profit') -->

					<!-- include('admin.pages.dashboard.shared.earnings') -->

				</div>
			</div>

			<!-- include('admin.pages.dashboard.shared.revenue') -->

		</div>
		<div class="row match-height">

			<!-- include('admin.pages.dashboard.shared.company') -->

			<!-- include('admin.pages.dashboard.shared.meetup') -->

			<!-- include('admin.pages.dashboard.shared.states') -->

			<!-- include('admin.pages.dashboard.shared.goal') -->

			<!-- include('admin.pages.dashboard.shared.transaction') -->

		</div>
	</section>
	<!-- Dashboard Ecommerce ends -->

@endsection

@section('scripts.vendor')
	<script src="{{ asset_url('admin/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
@endsection

@section('scripts')
	<script src="{{ asset_url('admin/vendors/js/charts/apexcharts.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/extensions/toastr.min.js') }}"></script>
	<script src="{{ asset_url('admin/js/scripts/pages/dashboard-ecommerce.js') }}"></script>

	<script>
		$('#last-orders tr').click(function() {
			const href = $(this).data('href')
			window.location.href = href
		})
	</script>
@endsection