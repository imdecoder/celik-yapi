<div class="pushmenu menu-home5">
	<div class="menu-push">
		<span class="close-left js-close">
			<i class="ion-ios-close-empty f-40"></i>
		</span>
		<div class="clearfix"></div>
		<form action="{{ site_url('ara') }}" method="get" class="searchform" id="searchform" role="search">
			<div>
				<label for="q" class="screen-reader-text"></label>
				<input type="text" name="q" placeholder="Ürün, marka veya kategori adı" id="q" autocomplete="off">
				<button type="submit" id="searchsubmit">
					<i class="ion-ios-search-strong"></i>
				</button>
			</div>
		</form>
		<ul class="nav-home5 js-menubar">
			<li class="level1">
				<a href="{{ site_url() }}">
					Anasayfa
				</a>
			</li>
			<li class="level1 dropdown">
				<a href="{{ site_url('urunler') }}">
					Ürünler
				</a>
				<span class="icon-sub-menu"></span>
				<div class="menu-level1 js-open-menu">
					<ul class="level1">

						@if ($mobile_categories)

							<li class="level2">
								<a href="{{ site_url('kategoriler') }}">
									Kategoriler
								</a>
								<ul class="menu-level-2">

									@foreach ($mobile_categories as $category)
										
										<li class="level3">
											<a href="{{ site_url('kategori/' . $category->slug) }}">
												{{ $category->name }}
											</a>
										</li>

									@endforeach

								</ul>
							</li>

						@endif

						<li class="level2">
							<a href="{{ site_url('trend-urunler') }}">
								Trend Ürünler
							</a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</li>
			<li class="level1 dropdown">
				<a href="{{ site_url('blog') }}">
					Blog
				</a>
			</li>
			<li class="level1 dropdown">
				<a href="{{ site_url('iletisim') }}">
					İletişim
				</a>
			</li>
		</ul>
		<ul class="mobile-account">
			<li>
				<a href="{{ site_url('giris-yap') }}">
					<i class="fa fa-unlock-alt"></i>
					Giriş Yap / Kayıt Ol
				</a>
			</li>
		</ul>
		<h4 class="mb-title text-center">
			Sosyal Medya
		</h4>
		<div class="mobile-social mg-bottom-30">
			<a href="#">
				<i class="fa fa-facebook"></i>
			</a>
			<a href="#">
				<i class="fa fa-instagram"></i>
			</a>
			<a href="#">
				<i class="fa fa-twitter"></i>
			</a>

			<!--<a href="#">
				<i class="fa fa-youtube"></i>
			</a>-->

		</div>
	</div>
</div>
