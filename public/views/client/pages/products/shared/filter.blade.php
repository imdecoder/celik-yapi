<div class="col-md-3 col-sm-3 col-xs-12 col-left collection-sidebar" id="filter-sidebar">
	<div class="close-sidebar-collection hidden-lg hidden-md">
		<span>Filtrele</span>
		<i class="icon_close ion-close"></i>
	</div>

	@if ($list['vendors'])

		<div class="widget-filter filter-cate filter-size">
			<h3>
				Marka
			</h3>
			<ul>

				@foreach ($list['vendors'] as $vendor)

					<li>
						<a href="{{ site_url('urunler?marka=' . $vendor->slug . '&kategori=' . $list['category'] . '&sirala=' . $list['sort']) }}" class="{{ $vendor->slug == $list['vendor'] ? 'active' : null }}">
							{{ $vendor->name }}
						</a>
					</li>

				@endforeach

			</ul>
		</div>

	@endif

	@if ($list['categories'])

		<div class="widget-filter filter-cate no-pd-top">
			<h3>
				Kategori
			</h3>
			<ul>

				@foreach ($list['categories'] as $category)

					<li>
						<a href="{{ site_url('urunler?marka=' . $list['vendor'] . '&kategori=' . $category->slug . '&sirala=' . $list['sort']) }}" class="{{ $category->slug == $list['category'] ? 'active' : null }}">
							{{ $category->name }}
						</a>
					</li>

				@endforeach

			</ul>
		</div>

	@endif

</div>
