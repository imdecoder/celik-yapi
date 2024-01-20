@extends('admin.layouts.default')

@section('title', $meta['title'] . ' - Çelik Panel')

@section('styles.vendor')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/pickers/pickadate/pickadate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/extensions/toastr.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/extensions/sweetalert2.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/extensions/jquery.contextMenu.min.css') }}">
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/core/menu/menu-types/vertical-menu.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/forms/form-validation.css') }}">
	
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/extensions/ext-component-toastr.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/extensions/ext-component-sweet-alerts.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/extensions/ext-component-context-menu.css') }}">

	<style>
		@media (max-width: 641px) {
			.action-buttons {
				flex-wrap: wrap;
			}

			.action-buttons a {
				flex-basis: calc(50% - 1rem);
			}
		}
	</style>
@endsection

@section('content')

	<div class="content-header mb-2">

		@include('admin.pages.catalog.products.shared.breadcrumb')

	</div>
	<div class="content-body">

		@include('admin.pages.catalog.products.shared.list')

		@include('admin.pages.catalog.products.shared.navigation')

		<!-- Hoverable rows start -->
		<div class="row" id="table-hover-row">
			<div class="col-12">
				<div class="card">
					<div class="table-responsive">

						@include('admin.pages.catalog.products.shared.filter')

						@if ($products->rowCount())

							@include('admin.pages.catalog.products.shared.table')

						@else

							@include('admin.pages.catalog.products.shared.message')

						@endif

					</div>
				</div>
			</div>

			@include('admin.pages.catalog.products.shared.pagination')

		</div>
		<!-- Hoverable rows end -->

	</div>

@endsection

@section('scripts.vendor')
	<script src="{{ asset_url('admin/vendors/js/forms/select/select2.full.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/jszip.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/forms/cleave/cleave.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>

	<script src="{{ asset_url('admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset_url('admin/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset_url('admin/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset_url('admin/vendors/js/pickers/pickadate/legacy.js') }}"></script>

	<script src="{{ asset_url('admin/vendors/js/extensions/toastr.min.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

	<script src="{{ asset_url('admin/vendors/js/extensions/jquery.contextMenu.min.js') }}"></script>
    <script src="{{ asset_url('admin/vendors/js/extensions/jquery.ui.position.min.js') }}"></script>
@endsection

@section('scripts')
	<script src="{{ asset_url('admin/js/scripts/pages/app-user-list.js') }}"></script>

	<script src="{{ asset_url('admin/js/scripts/extensions/ext-component-toastr.js') }}"></script>
	<script src="{{ asset_url('admin/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>

	<script>
		$('input[name="status"]').change(function() {
			const product_code = $(this).data('product')

			$.post(API_URL + '/product/status', { code: product_code }, function(data) {
				toastr[data.class](data.message, data.title, {
					positionClass: 'toast-bottom-right',
					showMethod: 'fadeIn',
					hideMethod: 'fadeOut',
					timeOut: 2000
				})

				if (data.class !== 'success') {
					$(this).prop('disabled', true)
				}
			})
		})

		$('.trash-confirm').click(function() {
			const href = $(this).data('href')

			Swal.fire({
				title: 'Uyarı',
				text: 'Ürünü silmek istediğinize emin misiniz?',
				icon: 'warning',
				confirmButtonText: 'Evet',
				cancelButtonText: 'İptal',
				showCancelButton: true
			}).then(result => {
				if (result.isConfirmed) {
					window.location.href = href
				}
			})
		})

		$('.delete-force').click(function() {
			const href = $(this).data('href')

			Swal.fire({
				title: 'Uyarı',
				text: 'Ürünü tamamen silmek istediğinize emin misiniz?',
				icon: 'warning',
				confirmButtonText: 'Evet',
				cancelButtonText: 'İptal',
				showCancelButton: true
			}).then(result => {
				if (result.isConfirmed) {
					window.location.href = href
				}
			})
		})

		// TODO: Basic Context Menu
		/*const isRtl = $('html').attr('data-textdirection') === 'rtl'

		$.contextMenu({
			selector: '#basic-context-menu',
			callback: function (key, options) {
				let r = 'clicked ' + key

				window.console &&
				toastr['success']('', r, {
					rtl: isRtl
				})
			},
			items: {
				'Option 1': { name: 'Option 1' },
				'Option 2': { name: 'Option 2' }
			}
		})*/

		$('.pickadate').pickadate({
			format: 'yyyy/mm/dd',
			monthsFull: [
				'Ocak',
				'Şubat',
				'Mart',
				'Nisan',
				'Mayıs',
				'Haziran',
				'Temmuz',
				'Ağustos',
				'Eylül',
				'Ekim',
				'Kasım',
				'Aralık'
			],
			monthsShort: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Aralık'],
			weekdaysShort: ['Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt', 'Paz'],
			today: 'Bugün',
			clear: 'Temizle',
			close: 'İptal'
		})
	</script>
@endsection
