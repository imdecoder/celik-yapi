<section class="my-1">
	<div class="action-buttons d-flex gap-1">
		<a href="{{ site_url('admin/catalog/categories/add') }}" class="btn btn-outline-primary">
			<i data-feather="plus-circle"></i>
			Kategori Ekle
		</a>
		<a href="{{ site_url('admin/catalog/categories/priorty') }}" class="btn {{ segments(3) == 'priorty' ? 'btn-primary' : 'btn-outline-primary' }}">
			<i data-feather="list"></i>
			Sıralama
		</a>
	</div>
</section>
