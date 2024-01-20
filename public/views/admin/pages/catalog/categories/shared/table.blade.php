<table class="table table-hover">
	<thead>
		<tr>
			<th class="text-center">
				<i data-feather="image"></i>
			</th>
			<th>
				Kategori Adı
			</th>
			<th>
				Üst Kategori
			</th>
			<th>
				Durum
			</th>
			<th>
				Oluşturulma Tarihi
			</th>
			<th>
				İşlemler
			</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach ($categories as $category)

			<tr>
				<td class="text-center">
					<img src="{{ $category->image ? upload_url('images/cache/categories/40x40/' . $category->image) : asset_url('admin/images/default.jpg') }}" alt="{{ $category->name }}" width="40" height="40">
				</td>
				<td>
					{{ $category->name }}
				</td>
				<td>

					@if ($category->parent_id)
						<a href="{{ site_url('admin/catalog/categories/edit/' . $category->parent_id) }}">
							{{ $category->parent_name }}
						</a>
					@else
						-
					@endif

				</td>
				<td>
					<div class="form-check form-switch">
						<input type="checkbox" name="status" {{ $category->status ? 'checked' : null }} {{ $category->deleted_at ? 'disabled' : null }} class="form-check-input" data-category="{{ $category->id }}">
					</div>
				</td>
				<td>
					<span title="{{ timeConvert($category->created_at) }}" data-bs-toggle="tooltip" data-bs-placement="bottom">
						{{ timeAgo($category->created_at) }}
					</span>
				</td>
				<td>
					<div class="dropdown">
						<button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
							<i data-feather="more-vertical"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-end">

							@if ($category->status)
								<a href="{{ site_url('kategori/' . $category->slug) }}" target="_blank" class="dropdown-item">
									<i class="me-50" data-feather="external-link"></i>
									<span>Sitede Görüntüle</span>
								</a>
							@endif

							<a href="{{ site_url('admin/catalog/categories/edit/' . $category->id) }}" class="dropdown-item">
								<i class="me-50" data-feather="edit-2"></i>
								<span>Düzenle</span>
							</a>

							@if ($category->deleted_at)
								<a href="{{ site_url('admin/catalog/categories/restore/' . $category->id) }}" class="dropdown-item">
									<i class="me-50" data-feather="refresh-ccw"></i>
									<span>Kurtar</span>
								</a>
								<a href="javascript:void(0)" class="dropdown-item delete-force" data-href="{{ site_url('admin/catalog/categories/delete-force/' . $category->id) }}">
									<i class="me-50" data-feather="trash"></i>
									<span>Tamamen Sil</span>
								</a>
							@else
								<a href="javascript:void(0)" class="dropdown-item trash-confirm" data-href="{{ site_url('admin/catalog/categories/delete/' . $category->id) }}">
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
