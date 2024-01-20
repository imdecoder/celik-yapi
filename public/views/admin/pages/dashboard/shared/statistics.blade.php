<!-- Statistics Card -->
<div class="col-12">
	<div class="card card-statistics">
		<div class="card-header">
			<h4 class="card-title">
				İstatistikler
			</h4>
			<div class="d-flex align-items-center">
				<p class="card-text font-small-2 me-25 mb-0">
					Az önce güncellendi
				</p>
			</div>
		</div>
		<div class="card-body statistics-body">
			<div class="row">
				<div class="col-xl-3 col-6 mb-2 mb-xl-0">
					<a href="{{ site_url('admin/customers') }}" class="d-flex flex-row">
						<div class="avatar bg-light-primary me-2">
							<div class="avatar-content">
								<i class="avatar-icon" data-feather="user"></i>
							</div>
						</div>
						<div class="my-auto">
							<h4 class="fw-bolder mb-0">
								{{ $statistics['customers'] }}
							</h4>
							<p class="card-text text-dark font-small-3 mb-0">
								Müşteriler
							</p>
						</div>
					</a>
				</div>
				<div class="col-xl-3 col-6 mb-2 mb-sm-0">
					<a href="{{ site_url('admin/catalog/vendors') }}" class="d-flex flex-row">
						<div class="avatar bg-light-warning me-2">
							<div class="avatar-content">
								<i class="avatar-icon" data-feather="list"></i>
							</div>
						</div>
						<div class="my-auto">
							<h4 class="fw-bolder mb-0">
								{{ $statistics['vendors'] }}
							</h4>
							<p class="card-text text-dark font-small-3 mb-0">
								Markalar
							</p>
						</div>
					</a>
				</div>
				<div class="col-xl-3 col-6 mb-2 mb-sm-0">
					<a href="{{ site_url('admin/catalog/products') }}" class="d-flex flex-row">
						<div class="avatar bg-light-danger me-2">
							<div class="avatar-content">
								<i class="avatar-icon" data-feather="shopping-bag"></i>
							</div>
						</div>
						<div class="my-auto">
							<h4 class="fw-bolder mb-0">
								{{ $statistics['products'] }}
							</h4>
							<p class="card-text text-dark font-small-3 mb-0">
								Ürünler
							</p>
						</div>
					</a>
				</div>
				<div class="col-xl-3 col-6 mb-2 mb-xl-0">
					<a href="{{ site_url('admin/orders') }}" class="d-flex flex-row">
						<div class="avatar bg-light-info me-2">
							<div class="avatar-content">
								<i class="avatar-icon" data-feather="shopping-cart"></i>
							</div>
						</div>
						<div class="my-auto">
							<h4 class="fw-bolder mb-0">
								{{ $statistics['orders'] }}
							</h4>
							<p class="card-text text-dark font-small-3 mb-0">
								Siparişler
							</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/ Statistics Card -->
