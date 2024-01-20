@extends('admin.layouts.default')

@section('title', $meta['title'] . ' - Çelik Panel')

@section('styles.vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/forms/select/select2.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/core/menu/menu-types/vertical-menu.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/forms/form-validation.css') }}">
	
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
@endsection

@section('content')

	<form action="" method="post" enctype="multipart/form-data">
		<div class="content-header mb-2">

			@include('admin.pages.catalog.categories.shared.breadcrumb')

		</div>
		<div class="d-flex justify-content-between mb-2">
			<div class="d-flex">

				@if ($category->status)
					<a href="{{ site_url('kategori/' . $category->slug) }}" target="_blank" class="btn btn-outline-secondary">
						<i class="me-50" data-feather="external-link"></i>
						Sitede Görüntüle
					</a>
				@endif
	
			</div>
			<div class="d-flex gap-1">
				<a href="{{ site_url('admin/catalog/categories') }}" class="btn btn-outline-secondary">
					Vazgeç
				</a>
				<button type="submit" class="btn btn-outline-primary">
					Kaydet
				</button>
			</div>
		</div>
		<div class="content-body">

			@if ($error)
				<div class="row">
					<div class="col-12">
						<div class="alert alert-{{ $error['class'] }} py-1 px-2">
							{!! $error['text'] !!}
						</div>
					</div>
				</div>
			@else

				@if ($action)
					<div class="row">
						<div class="col-12">
							<div class="alert alert-success py-1 px-2">
								<strong>Başarılı!</strong>
								Ürün kategorisi güncelleme işlemi başarılı!
							</div>
						</div>
					</div>
				@endif

			@endif

			<!-- Inputs start -->
			<section>
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-body">
								<div class="mb-2">
									<label class="form-label" for="name">
										Adı
									</label>
									<input type="text" name="name"  value="{{ $category->name }}" class="form-control" id="name">
								</div>
								<div>
									<label class="form-label" for="description">
										Açıklama
									</label>
									<div class="form-floating mb-0">
										<textarea name="description" class="form-control char-textarea" style="height: 100px" id="description" data-length="150">{{ $category->description }}</textarea>
									</div>
									<small class="textarea-counter-value float-end">
										<span class="char-count">0</span> / 150
									</small>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									Durumu
								</h4>
							</div>
							<div class="card-body">
								<div class="form-check form-switch">
									<input type="checkbox" name="status" value="1" {{ $category->status ? 'checked' : null }} class="form-check-input" id="status">
									<label class="form-check-label" id="status-label" for="status">
										{{ $category->status ? 'Aktif' : 'Pasif' }}
									</label>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									Üst Kategori
								</h4>
							</div>
							<div class="card-body">
								<select name="parent_id" class="select2 form-select">
									<option value="0" selected>
										Yok
									</option>

									@foreach ($categories as $item)
										<option value="{{ $item->id }}" {{ $item->id == $category->parent_id ? 'selected' : null }}>
											{{ $item->name }}
										</option>
									@endforeach

								</select>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									Resim
								</h4>
							</div>
							<div class="card-body">

								@if ($category->image)
									<img src="{{ upload_url('images/cache/categories/600x600/' . $category->image) }}" alt="{{ $category->name }}" width="200" class="border mb-1">
								@endif

								<input type="file" name="image" class="form-control" id="image">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 d-flex gap-1 mb-2">
						<a href="javascript:void(0)" class="btn btn-danger waves-effect {{ $category->deleted_at ? 'delete-force' : 'trash-confirm' }}" data-href="{{ $category->deleted_at ? site_url('admin/catalog/categories/delete-force/' . $category->id) : site_url('admin/catalog/categories/delete/' . $category->id) }}">
							Sil
						</a>

						@if ($category->deleted_at)
							<a href="{{ site_url('admin/catalog/categories/restore/' . $category->id) }}" class="btn btn-outline-success waves-effect">
								Kurtar
							</a>
						@endif

					</div>
				</div>
			</section>
			<!-- Inputs end -->

		</div>
	</form>

@endsection

@section('scripts.vendor')
    <script src="{{ asset_url('admin/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset_url('admin/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>

	<script src="{{ asset_url('admin/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endsection

@section('scripts')
	<script src="{{ asset_url('admin/js/validate-tr.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/forms/select/tr.js') }}"></script>

	<script src="{{ asset_url('admin/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>

	<script>
		$('.select2').each(function () {
			var $this = $(this)

			$this.wrap('<div class="position-relative"></div>')
			$this.select2({
				// the following code is used to disable x-scrollbar when click in select input and
				// take 100% width in responsive also
				dropdownAutoWidth: true,
				width: '100%',
				dropdownParent: $this.parent(),
				language: 'tr-TR'
			})
		})

		$('#status').change(function() {
			const status = $(this).is(':checked')

			if (status) {
				$('#status-label').html('Aktif')
			} else {
				$('#status-label').html('Pasif')
			}
		})

		$('.trash-confirm').click(function() {
			const href = $(this).data('href')

			Swal.fire({
				title: 'Uyarı',
				text: 'Kategoriyi silmek istediğinize emin misiniz?',
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
				text: 'Kategoriyi tamamen silmek istediğinize emin misiniz?',
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
	</script>
@endsection
