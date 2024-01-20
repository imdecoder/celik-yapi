<section class="app-user-list">
	<div class="row">
		<div class="col-lg-3 col-6">
			<div class="card {{ segments(3) ? 'bg-light' : null }}">
				<a href="{{ site_url('admin/catalog/categories') }}" class="card-body d-flex align-items-center justify-content-between">
					<div>
						<h3 class="fw-bolder mb-75">
							{{ $catalog['total'] }}
						</h3>
						<span class="text-dark">Toplam Kategori</span>
					</div>
					<div class="avatar bg-light-primary p-50">
						<span class="avatar-content">
							<i data-feather="shopping-bag" class="font-medium-4"></i>
						</span>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<div class="card {{ segments(3) != 'active' ? 'bg-light' : null }}">
				<a href="{{ site_url('admin/catalog/categories/active') }}" class="card-body d-flex align-items-center justify-content-between">
					<div>
						<h3 class="fw-bolder mb-75">
							{{ $catalog['active'] }}
						</h3>
						<span class="text-dark">Aktif Kategoriler</span>
					</div>
					<div class="avatar bg-light-success p-50">
						<span class="avatar-content">
							<i data-feather="shopping-bag" class="font-medium-4"></i>
						</span>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<div class="card {{ segments(3) != 'passive' ? 'bg-light' : null }}">
				<a href="{{ site_url('admin/catalog/categories/passive') }}" class="card-body d-flex align-items-center justify-content-between">
					<div>
						<h3 class="fw-bolder mb-75">
							{{ $catalog['passive'] }}
						</h3>
						<span class="text-dark">Pasif Kategoriler</span>
					</div>
					<div class="avatar bg-light-secondary p-50">
						<span class="avatar-content">
							<i data-feather="shopping-bag" class="font-medium-4"></i>
						</span>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<div class="card {{ segments(3) != 'trash' ? 'bg-light' : null }}">
				<a href="{{ site_url('admin/catalog/categories/trash') }}" class="card-body d-flex align-items-center justify-content-between">
					<div>
						<h3 class="fw-bolder mb-75">
							{{ $catalog['trash'] }}
						</h3>
						<span class="text-dark">Silinen Kategoriler</span>
					</div>
					<div class="avatar bg-light-danger p-50">
						<span class="avatar-content">
							<i data-feather="shopping-bag" class="font-medium-4"></i>
						</span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
