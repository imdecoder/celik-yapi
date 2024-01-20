<div class="single-product-info product-info product-grid-v2">
	<h3 class="product-title">
		<a href="{{ site_url('urun/' . $product->slug) }}">
			{{ $product->name }}
		</a>
	</h3>
	<div class="product-price">

		@if ($product->discount > 0)

			<span class="old thin">₺{{ turkishLira($product->price) }}</span>
			<span>₺{{ turkishLira($product->discount) }}</span>

		@else

			<span>₺{{ turkishLira($product->price) }}</span>

		@endif

	</div>
	<div class="flex product-rating">
		<div class="group-star">
			<span class="star star-5"></span>
			<span class="star star-4"></span>
			<span class="star star-3"></span>
			<span class="star star-2"></span>
			<span class="star star-1"></span>
		</div>
		<div class="number-rating">
			(2 yorum)
		</div>
	</div>
	<div class="short-desc">
		<p class="product-desc">
			{{ $product->description }}
		</p>
	</div>
	<div class="single-product-button-group">
		<div class="flex align-items-center element-button" data-product="{{ $product->code }}">
			<div class="zoa-qtt">
				<button type="button" class="quantity-left-minus btn btn-number js-minus" data-type="minus" data-field="{{ $product->code }}"></button>
				<input type="text" name="qty" value="1" min="1" max="99" class="product_quantity_number js-number">
				<button type="button" class="quantity-right-plus btn btn-number js-plus" data-type="plus" data-field="{{ $product->code }}"></button>
			</div>
			<a href="javascript:void(0)" class="zoa-btn zoa-addcart">
				<i class="zoa-icon-cart"></i>
				Sepete Ekle
			</a>
		</div>
		<a href="javascript:void(0)" class="btn-wishlist" data-product="{{ $product->code }}">
			<span class="add-wishlist">+ Favorilere Ekle</span>
			<span class="delete-wishlist hidden">- Favorilerden Sil</span>
		</a>
	</div>
	<div class="product-tags">
		<div class="element-tag">
			<label>
				SKU:
			</label>
			<span>{{ $product->sku ? $product->sku : 'Bilinmiyor' }}</span>
		</div>
		<div class="element-tag">
			<label>
				Marka:
			</label>
			<a href="{{ site_url('marka/' . $product->vendor_slug) }}">
				{{ $product->vendor_name }}
			</a>
		</div>
		<div class="element-tag">
			<label>
				Kategori:
			</label>
			<a href="{{ site_url('kategori/' . $product->category_slug) }}">
				{{ $product->category_name }}
			</a>
		</div>

		<!--<div class="element-tag">
			<label>
				Etiketler:
			</label>
			<span>Yok</span>
		</div>-->

	</div>
	<div class="product-social">
		<label>
			Paylaş
		</label>
		<div class="social" data-href="{{ site_url('urun/' . $product->slug) }}">
			<a href="javascript:void(0)">
				<i class="fa fa-facebook"></i>
			</a>
			<a href="javascript:void(0)">
				<i class="fa fa-instagram"></i>
			</a>
			<a href="javascript:void(0)">
				<i class="fa fa-twitter"></i>
			</a>
		</div>
	</div>
</div>
