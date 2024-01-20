<table class="table table-hover">
	<thead>
		<tr>
			<th class="text-center">
				<i data-feather="image"></i>
			</th>
			<th>
				Ürün Adı
			</th>
			<th>
				Marka
			</th>
			<!--<th>
				Kategori
			</th>-->
			<th>
				Pazaryeri
			</th>
			<th>
				Stok
			</th>
			<th>
				Durum
			</th>
			<th>
				Fiyat
			</th>
			<th>
				İşlemler
			</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach ($products as $product)

			<!-- TODO: /maybe/ id="basic-context-menu" -->
			<tr>
				<td class="text-center">
					<img src="{{ $product->image ? upload_url('images/cache/products/40x40/' . $product->image) : asset_url('admin/images/default.jpg') }}" alt="{{ $product->name }}" width="40" height="40">
				</td>
				<td>
					{{ $product->name }}
				</td>
				<td>
					<a href="{{ site_url('admin/catalog/vendors/edit/' . $product->vendor_id) }}">
						{{ $product->vendor_name }}
					</a>
				</td>
				<td>
					
					@if ($product->hb_sku)
						<div class="avatar-group">
							<div title="Hepsiburada" class="avatar pull-up my-0" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom">
								<img src="{{ asset_url('admin/images/marketplaces/hepsiburada.png') }}" alt="Hepsiburada" width="26" height="26">
							</div>
						</div>
					@else
						-
					@endif

				</td>
				<td>
					{{ $product->quantity ?: '-' }}
				</td>
				<td>
					<div class="form-check form-switch">
						<input type="checkbox" name="status" {{ $product->status ? 'checked' : null }} {{ $product->deleted_at ? 'disabled' : null }} class="form-check-input" data-product="{{ $product->code }}">
					</div>
				</td>
				<td>

					@if ($product->discount > 0)

						{{ '₺' . turkishLira($product->discount) }}

					@else

						{{ $product->price > 0 ? '₺' . turkishLira($product->price) : '-' }}

					@endif

				</td>
				<td>
					<div class="dropdown">
						<button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
							<i data-feather="more-vertical"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-end">

							@if ($product->status)
								<a href="{{ site_url('urun/' . $product->slug) }}" target="_blank" class="dropdown-item">
									<i class="me-50" data-feather="external-link"></i>
									<span>Sitede Görüntüle</span>
								</a>
							@endif

							<a href="{{ site_url('admin/catalog/products/edit/' . $product->code) }}" class="dropdown-item">
								<i class="me-50" data-feather="edit-2"></i>
								<span>Düzenle</span>
							</a>

							@if ($product->deleted_at)
								<a href="{{ site_url('admin/catalog/products/restore/' . $product->code) }}" class="dropdown-item">
									<i class="me-50" data-feather="refresh-ccw"></i>
									<span>Kurtar</span>
								</a>
								<a href="javascript:void(0)" class="dropdown-item delete-force" data-href="{{ site_url('admin/catalog/products/delete-force/' . $product->code) }}">
									<i class="me-50" data-feather="trash"></i>
									<span>Tamamen Sil</span>
								</a>
							@else
								<a href="javascript:void(0)" class="dropdown-item trash-confirm" data-href="{{ site_url('admin/catalog/products/delete/' . $product->code) }}">
									<i class="me-50" data-feather="trash"></i>
									<span>Sil</span>
								</a>
							@endif

						</div>
					</div>
				</td>
			</tr>

		@endforeach

	</tbody>
</table>
