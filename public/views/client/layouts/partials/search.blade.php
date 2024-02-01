<div class="search-form-wrapper header-search-form">
	<div class="container">
		<div class="search-results-wrapper">
			<div class="btn-search-close">
				<i class="ion-ios-close-empty"></i>
			</div>
		</div>

		<!--<ul class="zoa-category text-center">
			<li>
				<a href="#">
					Tüm Kategoriler
				</a>
			</li>
			<li>
				<a href="#">
					Musluk
				</a>
			</li>
		</ul>-->

		<div class="flex justify-content-center align-items-center h-50">
			<form action="{{ site_url('ara') }}" method="get" role="search" class="search-form has-categories-select">
				<input type="text" name="q" placeholder="Ürün, marka veya kategori adı..." class="search-input" autocomplete="off">
				<button type="submit" id="search-btn">
					<i class="ion-ios-search-strong"></i>
				</button>
			</form>
		</div>
	</div>
</div>
