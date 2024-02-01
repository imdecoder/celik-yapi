@if ($relatedProducts)

	<div class="container container-content">
		<div class="product-related">
			<h3 class="related-title text-center">
				Benzer Ürünler
			</h3>
			<div class="owl-carousel owl-theme owl-cate v2 js-owl-cate">

				@foreach ($relatedProducts as $product)

					<div class="product-item">
						<div class="product-img">
							<a href="{{ site_url('urun/' . $product->slug) }}">
								<img src="{{ $product->image ? upload_url('images/cache/products/600x600/' . $product->image) : asset_url('client/img/default.jpg') }}" alt="{{ $product->name }}" width="210" height="210" class="img-responsive">
							</a>

							<div class="ribbon zoa-discount">
								<span>%20</span>
							</div>

							<!--<div class="ribbon zoa-sale">
								<span>%15</span>
							</div>
							<div class="ribbon zoa-hot">
								<span>Trend</span>
							</div>
							<div class="ribbon zoa-new">
								<span>Yeni</span>
							</div>-->

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
								
								@if ($product->discount > 0)

									<span class="old">₺{{ turkishLira($product->price) }}</span>
									<span>₺{{ turkishLira($product->discount) }}</span>

								@else

									<span>₺{{ turkishLira($product->price) }}</span>

								@endif

							</div>
						</div>
					</div>

				@endforeach

			</div>
		</div>
	</div>

@endif
