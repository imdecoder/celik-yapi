@extends('admin.layouts.default')

@section('title', $meta['title'] . ' - Çelik Panel')

@section('styles.vendor')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/extensions/toastr.min.css') }}">
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/core/menu/menu-types/vertical-menu.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/extensions/ext-component-toastr.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/jquery-ui.min.css') }}">

	<style>
		.handle {
			cursor: move;
		}

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

		@include('admin.pages.catalog.categories.shared.breadcrumb')

	</div>
	<div class="content-body">

		@include('admin.pages.catalog.categories.shared.list')

		@include('admin.pages.catalog.categories.shared.navigation')

		<!-- Hoverable rows start -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="table-responsive">

						@if ($categories->rowCount())

						<table class="table">
							<thead>
								<tr>
									<th></th>
									<th class="text-center">
										<i data-feather="image"></i>
									</th>
									<th>
										Kategori
									</th>
								</tr>
							</thead>
							<tbody id="list">

								@foreach ($categories as $category)

									<tr id="{{ $category->id }}">
										<td class="text-center">
											<i class="handle" data-feather="menu"></i>
										</td>										
										<td class="text-center">
											<img src="{{ $category->image ? upload_url('images/cache/categories/40x40/' . $category->image) : asset_url('admin/images/default.jpg') }}" alt="{{ $category->name }}" width="40" height="40">
										</td>
										<td>
											{{ $category->name }}
										</td>
									</tr>
						
								@endforeach
						
							</tbody>
						</table>						

						@else

							<div class="alert alert-warning m-3" role="alert">
								<div class="alert-body">
									<strong>Uyarı!</strong>
									Sistemde kayıtlı hiç bir kategori bulunamadı.
								</div>
							</div>

						@endif

					</div>
				</div>
			</div>
		</div>
		<!-- Hoverable rows end -->

	</div>

@endsection

@section('scripts.vendor')
	<script src="{{ asset_url('admin/vendors/js/extensions/toastr.min.js') }}"></script>
@endsection

@section('scripts')
	<script src="{{ asset_url('admin/js/scripts/extensions/ext-component-toastr.js') }}"></script>
	<script src="{{ asset_url('admin/js/jquery-ui.min.js') }}"></script>

	<script>
		$('#list').sortable({ 
			handle : '.handle', 
			update : function() { 
				const order = $('#list').sortable('toArray') 

				$.post(API_URL + '/category/priorty', { order: order }, function(data) {
					toastr[data.class](data.message, data.title, {
						positionClass: 'toast-bottom-right',
						showMethod: 'fadeIn',
						hideMethod: 'fadeOut',
						timeOut: 2000
					})
				})
			} 
		})
	</script>
@endsection
