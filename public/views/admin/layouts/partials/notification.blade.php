<a class="nav-link" href="#" data-bs-toggle="dropdown">
	<i class="ficon" data-feather="bell"></i>
	<span class="badge rounded-pill bg-danger badge-up">5</span>
</a>
<ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
	<li class="dropdown-menu-header">
		<div class="dropdown-header d-flex">
			<h4 class="notification-title mb-0 me-auto">
				Bildirimler
			</h4>
			<div class="badge rounded-pill badge-light-primary">
				6 Yeni
			</div>
		</div>
	</li>
	<li class="scrollable-container media-list">
		<a href="#" class="d-flex">
			<div class="list-item d-flex align-items-start">
				<div class="me-1">
					<div class="avatar">
						<img src="{{ asset_url('admin/images/portrait/small/avatar-s-15.jpg') }}" alt="avatar" width="32" height="32">
					</div>
				</div>
				<div class="list-item-body flex-grow-1">
					<p class="media-heading">
						<span class="fw-bolder">Congratulation Sam 🎉</span>
						winner!
					</p>
					<small class="notification-text">
						Won the monthly best seller badge.
					</small>
				</div>
			</div>
		</a><a class="d-flex" href="#">
			<div class="list-item d-flex align-items-start">
				<div class="me-1">
					<div class="avatar">
						<img src="{{ asset_url('admin/images/portrait/small/avatar-s-3.jpg') }}" alt="avatar" width="32" height="32">
					</div>
				</div>
				<div class="list-item-body flex-grow-1">
					<p class="media-heading">
						<span class="fw-bolder">New message</span>
						received
					</p>
					<small class="notification-text">
						You have 10 unread messages
					</small>
				</div>
			</div>
		</a><a class="d-flex" href="#">
			<div class="list-item d-flex align-items-start">
				<div class="me-1">
					<div class="avatar bg-light-danger">
						<div class="avatar-content">
							MD
						</div>
					</div>
				</div>
				<div class="list-item-body flex-grow-1">
					<p class="media-heading">
						<span class="fw-bolder">Revised Order 👋</span>
						checkout
					</p>
					<small class="notification-text">
						MD Inc. order updated
					</small>
				</div>
			</div>
		</a>
		<div class="list-item d-flex align-items-center">
			<h6 class="fw-bolder me-auto mb-0">
				Sistem Bildirimleri
			</h6>
			<div class="form-check form-check-primary form-switch">
				<input type="checkbox" checked class="form-check-input" id="systemNotification">
				<label class="form-check-label" for="systemNotification"></label>
			</div>
		</div>
		<a href="#" class="d-flex">
			<div class="list-item d-flex align-items-start">
				<div class="me-1">
					<div class="avatar bg-light-danger">
						<div class="avatar-content">
							<i class="avatar-icon" data-feather="x"></i>
						</div>
					</div>
				</div>
				<div class="list-item-body flex-grow-1">
					<p class="media-heading">
						<span class="fw-bolder">Server down</span>
						registered
					</p>
					<small class="notification-text">
						USA Server is down due to high CPU usage
					</small>
				</div>
			</div>
		</a>
		<a href="#" class="d-flex">
			<div class="list-item d-flex align-items-start">
				<div class="me-1">
					<div class="avatar bg-light-success">
						<div class="avatar-content">
							<i class="avatar-icon" data-feather="check"></i>
						</div>
					</div>
				</div>
				<div class="list-item-body flex-grow-1">
					<p class="media-heading">
						<span class="fw-bolder">Sales report</span>
						generated
					</p>
					<small class="notification-text">
						Last month sales report generated
					</small>
				</div>
			</div>
		</a>
		<a href="#" class="d-flex">
			<div class="list-item d-flex align-items-start">
				<div class="me-1">
					<div class="avatar bg-light-warning">
						<div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
					</div>
				</div>
				<div class="list-item-body flex-grow-1">
					<p class="media-heading">
						<span class="fw-bolder">High memory</span>
						usage
					</p>
					<small class="notification-text">
						BLR Server using high memory
					</small>
				</div>
			</div>
		</a>
	</li>
	<li class="dropdown-menu-footer">
		<a href="{{ site_url('admin/notifications') }}" class="btn btn-primary w-100">
			Tüm Bildirimleri Görüntüle
		</a>
	</li>
</ul>
