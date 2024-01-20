<div class="row breadcrumbs-top">
	<div class="col-12">
		<h2 class="content-header-title float-start mb-0">
			{{ $meta['title'] ?: 'Kategoriler' }}
		</h2>
		<div class="breadcrumb-wrapper">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{{ site_url('admin/dashboard') }}">
						Anasayfa
					</a>
				</li>
				<li class="breadcrumb-item">
					Katalog
				</li>
				
				@if (segments(3))
					<li class="breadcrumb-item">
						<a href="{{ site_url('admin/catalog/categories') }}">
							Kategoriler
						</a>
					</li>
					<li class="breadcrumb-item">
						{{ $meta['title'] }}
					</li>
				@else
					<li class="breadcrumb-item">
						Kategoriler
					</li>
				@endif

			</ol>
		</div>
	</div>
</div>
