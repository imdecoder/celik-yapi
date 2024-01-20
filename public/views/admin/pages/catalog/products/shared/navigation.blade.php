<section class="my-1">
	<div class="action-buttons d-flex gap-1">
		<a href="{{ site_url('admin/catalog/products/add') }}" class="btn btn-outline-primary">
			<i data-feather="plus-circle"></i>
			Ürün Ekle
		</a>
		<a href="{{ site_url('admin/catalog/products/showcase') }}" class="btn btn-outline-primary waves-effect">
			<i data-feather="align-left"></i>
			Vitrin Düzeni
		</a>
		<a href="{{ site_url('admin/catalog/products/buttons') }}" class="btn btn-outline-primary waves-effect">
			<i data-feather="copy"></i>
			Ürün Butonları
		</a>
		<a href="#" class="btn btn-outline-secondary waves-effect dropdown-toggle" id="dropdownMenuMore" data-bs-toggle="dropdown" aria-expanded="false">
			Daha Fazla
		</a>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuMore">
			<a href="{{ site_url('admin/catalog/products/comments') }}" class="dropdown-item">
				<i data-feather="message-circle"></i>
				Ürün Yorumları
			</a>
			<a href="{{ site_url('admin/catalog/products/feeds') }}" class="dropdown-item">
				<i data-feather="list"></i>
				Ürün Önerileri
			</a>
			<a href="{{ site_url('admin/catalog/products/stock-warnings') }}" class="dropdown-item">
				<i data-feather="bell"></i>
				Ürün Haber Listesi
			</a>
			<a href="{{ site_url('admin/catalog/products/price-warnings') }}" class="dropdown-item">
				<i data-feather="percent"></i>
				İndirim Talepleri
			</a>
			<a href="{{ site_url('admin/catalog/products/shopping-experiences') }}" class="dropdown-item">
				<i data-feather="smile"></i>
				Alışveriş Deneyimleri
			</a>
		</div>
	</div>
</section>
