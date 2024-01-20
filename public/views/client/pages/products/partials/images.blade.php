<div class="product-images">

	<!--<div class="ribbon zoa-sale">
		<span>%15</span>
	</div>
	<div class="ribbon zoa-hot">
		<span>Trend</span>
	</div>
	<div class="ribbon zoa-new">
		<span>Yeni</span>
	</div>-->

	<div class="main-img js-product-slider">
		<a href="{{ site_url('urun/' . $product->slug) }}" class="hover-images effect">
			<img src="{{ $product->image ? upload_url('images/cache/products/600x600/' . $product->image) : asset_url('client/img/default.jpg') }}" alt="{{ $product->name }}" class="img-responsive">
		</a>
	</div>
</div>
