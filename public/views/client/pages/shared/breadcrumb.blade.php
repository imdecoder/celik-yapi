<div class="container container-content">
	<ul class="breadcrumb">
		<li>
			<a href="{{ site_url() }}">
				Anasayfa
			</a>
		</li>

		@if (segments(0) == 'urun')

			<li>
				<a href="{{ site_url('urunler') }}">
					Ürünler
				</a>
			</li>
			<li>
				<a href="{{ site_url('kategori/' . $meta['category']['slug']) }}">
					{{ $meta['category']['name'] }}
				</a>
			</li>
			<li class="active">
				{{ $meta['title'] }}
			</li>

		@elseif (segments(0) == 'kategori')

			<li>
				<a href="{{ site_url('kategoriler') }}">
					Kategoriler
				</a>
			</li>
			<li class="active">
				{{ $meta['title'] }}
			</li>

		@else

			<li class="active">
				{{ $meta['title'] }}
			</li>

		@endif

	</ul>
</div>
