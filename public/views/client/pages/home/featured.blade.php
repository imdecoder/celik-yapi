<div class="zoa-product pad2 bd-bottom">
	<h3 class="title text-center">
		Öne Çıkanlar
	</h3>
	<div class="container">
		<div class="row engoc-row-equal">

			@if ($products)

				@foreach ($products as $product)

					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 product-item">
						<div class="product-img">
							<a href="{{ site_url('urun/' . $product->slug) }}">
								<img src="{{ upload_url('images/cache/products/600x600/' . $product->image) }}" alt="{{ $product->name }}" width="300" height="300" class="img-responsive">
							</a>
							<div class="ribbon zoa-sale">
								<span>%20 İndirim</span>
							</div>
							<div class="product-button-group" data-product="{{ $product->code }}">
								<a href="javascript:void(0)" class="zoa-btn zoa-wishlist">
									<span class="zoa-icon-heart"></span>
								</a>
								<a href="javascript:void(0)" class="zoa-btn zoa-addcart">
									<span class="zoa-icon-cart"></span>
								</a>
							</div>
						</div>
						<div class="product-info text-center">
							<h3 class="product-title">
								<a href="{{ site_url('urun/' . $product->slug) }}">
									{{ $product->name }}
								</a>
							</h3>
							<div class="product-price">

								@if ($product->discount)

									<span class="old">₺{{ turkishLira($product_price) }}</span>
									<span>₺{{ turkishLira($product->discount) }}</span>

								@else

									<span>₺{{ turkishLira($product->price) }}</span>

								@endif

							</div>
						</div>
					</div>

				@endforeach

			@else

				Yok!

			@endif

		</div>

		<!--<div class="text-center">
			<a href="#" class="zoa-btn btn-loadmore">
				Devamını Göster
			</a>
		</div>-->

	</div>
</div>
