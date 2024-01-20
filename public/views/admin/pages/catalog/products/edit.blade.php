@extends('admin.layouts.default')

@section('title', $meta['title'] . ' - Çelik Panel')

@section('styles.vendor')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/editors/quill/quill.bubble.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/forms/select/select2.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/forms/form-quill-editor.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/forms/form-validation.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/extensions/ext-component-sweet-alerts.css') }}">

	<style>
		.editor {
			min-height: 200px;
		}
	</style>	
@endsection

@section('content')

	<form action="" method="post" enctype="multipart/form-data">
		<div class="content-header mb-2">

			@include('admin.pages.catalog.products.shared.breadcrumb')

		</div>
		<div class="d-flex justify-content-between mb-2">
			<div class="d-flex">

				@if ($product->status)
					<a href="{{ site_url('urun/' . $product->slug) }}" target="_blank" class="btn btn-outline-secondary">
						<i class="me-50" data-feather="external-link"></i>
						Sitede Görüntüle
					</a>
				@endif

			</div>
			<div class="d-flex gap-1">
				<a href="{{ site_url('admin/catalog/products') }}" class="btn btn-outline-secondary">
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
								Ürün güncelleme işlemi başarılı!
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
									<input type="text" name="name" value="{{ $product->name }}" class="form-control" id="name">
								</div>
								<div class="mb-0">
									<label class="form-label" for="snow-wrapper">
										Detay
									</label>
									<input type="hidden" name="content" id="content">
									<div id="snow-wrapper">
										<div id="snow-container">
											<div class="quill-toolbar">
												<span class="ql-formats">
													<select class="ql-header">
														<option value="1">
															Başlık
														</option>
														<option value="2">
															Alt Başlık
														</option>
														<option selected>
															Normal
														</option>
													</select>
													<select class="ql-font">
														<option selected>
															Sailec Light
														</option>
														<option value="sofia">
															Sofia Pro
														</option>
														<option value="slabo">
															Slabo 27px
														</option>
														<option value="roboto">
															Roboto Slab
														</option>
														<option value="inconsolata">
															Inconsolata
														</option>
														<option value="ubuntu">
															Ubuntu Mono
														</option>
													</select>
												</span>
												<span class="ql-formats">
													<button class="ql-bold"></button>
													<button class="ql-italic"></button>
													<button class="ql-underline"></button>
												</span>
												<span class="ql-formats">
													<button class="ql-list" value="ordered"></button>
													<button class="ql-list" value="bullet"></button>
												</span>
												<span class="ql-formats">
													<button class="ql-link"></button>
													<button class="ql-image"></button>
													<button class="ql-video"></button>
												</span>
												<span class="ql-formats">
													<button class="ql-formula"></button>
													<button class="ql-code-block"></button>
												</span>
												<span class="ql-formats">
													<button class="ql-clean"></button>
												</span>
											</div>
											<div class="editor">
												{!! $product->content !!}
											</div>
										</div>
									</div>
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
									<input type="checkbox" name="status" value="1" {{ $product->status ? 'checked' : null }} class="form-check-input" id="status">
									<label class="form-check-label" id="status-label" for="status">
										{{ $product->status ? 'Aktif' : 'Pasif' }}
									</label>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									Kategori
								</h4>
							</div>
							<div class="card-body">
								<select name="category" class="select2 form-select">
									<option value="" selected disabled>
										Bir seçim yapın
									</option>

									@foreach ($categories as $category)
										<option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : null }}>
											{{ $category->name }}
										</option>
									@endforeach

								</select>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									Marka
								</h4>
							</div>
							<div class="card-body">
								<select name="vendor" class="select2 form-select">
									<option value="" selected disabled>
										Bir seçim yapın
									</option>

									@foreach ($vendors as $vendor)
										<option value="{{ $vendor->id }}" {{ $product->vendor_id == $vendor->id ? 'selected' : null }}>
											{{ $vendor->name }}
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

								@if ($product->image)
									<img src="{{ upload_url('images/cache/products/600x600/' . $product->image) }}" alt="{{ $product->name }}" width="200" class="border mb-1">
								@endif

								<input type="file" name="image" class="form-control" id="image">
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									Fiyatlar
								</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-4">
										<label class="form-label" for="price">
											Fiyat
										</label>
										<div class="input-group">
											<input type="text" name="price" value="{{ $product->price }}" class="form-control" id="price">
											<span class="input-group-text user-select-none">₺</span>
										</div>
									</div>
									<div class="col-4">
										<label class="form-label" for="discount">
											İndirim
										</label>
										<div class="input-group">
											<input type="text" name="discount" value="{{ $product->discount }}" class="form-control" id="discount">
											<span class="input-group-text user-select-none">₺</span>
										</div>
									</div>
									<div class="col-4">
										<label class="form-label" for="tax">
											KDV
										</label>
										<input type="text" name="tax" value="" class="form-control" id="tax">
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									Stok
								</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-4">
										<label class="form-label" for="sku">
											Stok Kodu
										</label>
										<input type="text" name="sku" value="{{ $product->sku }}" class="form-control" id="sku">
									</div>
									<div class="col-4">
										<label class="form-label" for="barcode">
											Barkod
										</label>
										<input type="text" name="barcode" value="{{ $product->barcode }}" class="form-control" id="barcode">
									</div>
									<div class="col-4">
										<label class="form-label" for="stock">
											Stok
										</label>
										<div class="input-group">
											<input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" id="stock">
											<span class="input-group-text user-select-none">Adet</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									Özet
								</h4>
							</div>
							<div class="card-body">
								<div class="form-floating mb-0">
									<textarea name="description" class="form-control char-textarea" style="height: 100px" id="textarea-counter" data-length="150">{{ $product->description }}</textarea>
								</div>
								<small class="textarea-counter-value float-end">
									<span class="char-count">0</span> / 150
								</small>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 d-flex gap-1 mb-2">
						<a href="javascript:void(0)" class="btn btn-danger waves-effect {{ $product->deleted_at ? 'delete-force' : 'trash-confirm' }}" data-href="{{ $product->deleted_at ? site_url('admin/catalog/products/delete-force/' . $product->code) : site_url('admin/catalog/products/delete/' . $product->code) }}">
							Sil
						</a>

						@if ($product->deleted_at)
							<a href="{{ site_url('admin/catalog/products/restore/' . $product->code) }}" class="btn btn-outline-success waves-effect">
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
	<script src="{{ asset_url('admin/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset_url('admin/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset_url('admin/vendors/js/editors/quill/quill.min.js') }}"></script>

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

		// Snow Editor
		var snowEditor = new Quill('#snow-container .editor', {
			bounds: '#snow-container .editor',
			modules: {
				formula: true,
				syntax: true,
				toolbar: '#snow-container .quill-toolbar'
			},
			theme: 'snow'
		})

		$('#status').change(function() {
			const status = $(this).is(':checked')

			if (status) {
				$('#status-label').html('Aktif')
			} else {
				$('#status-label').html('Pasif')
			}
		})

		$('form').on('submit', function() {
			const content = $('#snow-container .ql-editor').html()
			$('#content').val(content)
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
	</script>
@endsection
