<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
	<div class="navbar-container d-flex content">
		<div class="bookmark-wrapper d-flex align-items-center">
			<ul class="nav navbar-nav d-xl-none">
				<li class="nav-item">
					<a href="#" class="nav-link menu-toggle">
						<i class="ficon" data-feather="menu"></i>
					</a>
				</li>
			</ul>
			<ul class="nav navbar-nav bookmark-icons">
				@include('admin.layouts.partials.bookmark-list')
			</ul>
			<ul class="nav navbar-nav">
				<li class="nav-item d-none d-lg-block">
					@include('admin.layouts.partials.bookmark')
				</li>
			</ul>
		</div>
		<ul class="nav navbar-nav align-items-center ms-auto">

			<li class="nav-item dropdown dropdown-language">
				@include('admin.layouts.partials.language')
			</li>
			<li class="nav-item">
				<a title="Görünümü Değiştir" class="nav-link nav-link-style" data-bs-toggle="tooltip" data-bs-placement="bottom">
					<i class="ficon" data-feather="moon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ site_url() }}" target="_blank" title="Siteyi Görüntüle" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="bottom">
					<i class="ficon" data-feather="monitor"></i>
				</a>
			</li>
			<li class="nav-item nav-search">
				@include('admin.layouts.partials.search')
			</li>
			<li class="nav-item dropdown dropdown-notification me-25">
				@include('admin.layouts.partials.notification')
			</li>
			<li class="nav-item dropdown dropdown-user">
				@include('admin.layouts.partials.profile')
			</li>
		</ul>
	</div>
</nav>

@include('admin.layouts.partials.search-list')
<!-- END: Header-->
