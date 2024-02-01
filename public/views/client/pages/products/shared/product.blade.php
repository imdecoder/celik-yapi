<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 product-item">
	<div class="product-img">
		<a href="{{ site_url('urun/' . $product->slug) }}">
			<img src="{{ upload_url('images/cache/products/600x600/' . $product->image) }}" alt="{{ $product->name }}" width="300" height="300" class="img-responsive">
		</a>
		<div class="ribbon zoa-discount">
			<span>%20</span>
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
			
			@if ($product->discount > 0)
				<span class="old">₺{{ turkishLira($product->price) }}</span>
				<span>₺{{ turkishLira($product->discount) }}</span>
			@else
				<span>₺{{ turkishLira($product->price) }}</span>
			@endif

		</div>
	</div>
</div>
