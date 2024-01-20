<ul class="nav navbar-nav js-menubar hidden-xs hidden-sm">
	<li class="level1 dropdown hassub">
		<a href="{{ site_url('urunler') }}">
			Ürünler
		</a>
		<div class="menu-level-1 dropdown-menu style4">
			<ul class="level1">
				<li class="level2 col-6">
					<a href="{{ site_url('kategoriler') }}">
						Kategoriler
					</a>

					@if ($navbar_categories)

						<ul class="menu-level-2">
							
							@foreach ($navbar_categories as $category)

								<li class="level3">
									<a href="{{ site_url('kategori/' . $category->slug) }}">
										{{ $category->name }}
									</a>
								</li>

							@endforeach

							<li class="level3">
								<a href="{{ site_url('kategoriler') }}" style="font-weight: bold">
									<span style="margin-right: 3px">
										Daha Fazla Kategori
									</span>
									<i class="ion-ios-arrow-right"></i>
								</a>
							</li>
						</ul>

					@else

						<span>Kategori bulunamadı.</span>

					@endif

				</li>
				<li class="level2 col-6">
					<a href="{{ site_url('trend-urunler') }}">
						Trend Ürünler
					</a>

					@if ($trend_products)

						<ul class="menu-level-2">
							
							@foreach ($trend_products as $product)

								<li class="level3">
									<a href="{{ site_url('urun/' . $product->slug) }}">
										{{ short($product->name, 25) }}
									</a>
								</li>

							@endforeach

							<li class="level3">
								<a href="{{ site_url('urunler') }}" style="font-weight: bold">
									<span style="margin-right: 3px">
										Daha Fazla Ürün
									</span>
									<i class="ion-ios-arrow-right"></i>
								</a>
							</li>
						</ul>

					@else

						<span>Ürün bulunamadı.</span>

					@endif

				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</li>
	<li class="level1 {{ segments(0) == 'blog' ? 'active' : null }}">
		<a href="{{ site_url('blog') }}">
			Blog
		</a>
	</li>
	<li class="level1 {{ segments(0) == 'iletisim' ? 'active' : null }}">
		<a href="{{ site_url('iletisim') }}">
			İletişim
		</a>
	</li>
</ul>
