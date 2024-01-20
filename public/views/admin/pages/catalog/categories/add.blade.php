@extends('admin.layouts.default')

@section('title', $meta['title'] . ' - Çelik Panel')

@section('styles.vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/core/menu/menu-types/vertical-menu.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/forms/form-validation.css') }}">	
@endsection

@section('content')

	<form action="" method="post" enctype="multipart/form-data">
		<div class="content-header mb-2">

			@include('admin.pages.catalog.categories.shared.breadcrumb')

		</div>
		<div class="d-flex gap-1 align-items-center justify-content-end mb-2">
			<a href="{{ site_url('admin/catalog/categories') }}" class="btn btn-outline-secondary">
				Vazgeç
			</a>
			<button type="submit" class="btn btn-outline-primary">
				Kaydet
			</button>
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
									<input type="text" name="name" class="form-control" id="name">
								</div>
								<div>
									<label class="form-label" for="description">
										Açıklama
									</label>
									<div class="form-floating mb-0">
										<textarea name="description" class="form-control char-textarea" style="height: 100px" id="description" data-length="150"></textarea>
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
									<input type="checkbox" name="status" value="1" checked class="form-check-input" id="status">
									<label class="form-check-label" id="status-label" for="status">
										Aktif
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

									@foreach ($categories as $category)
										<option value="{{ $category->id }}">
											{{ $category->name }}
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
								<input type="file" name="image" class="form-control" id="image">
							</div>
						</div>
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
@endsection

@section('scripts')
	<script src="{{ asset_url('admin/js/validate-tr.js') }}"></script>
	<script src="{{ asset_url('admin/vendors/js/forms/select/tr.js') }}"></script>


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
	</script>
@endsection
