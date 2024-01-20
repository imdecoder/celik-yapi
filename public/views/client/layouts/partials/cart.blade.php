<div class="pushmenu pushmenu-left cart-box-container">
	<div class="cart-list">
		<div class="cart-list-heading">
			<h3 class="cart-title">
				Sepetim {{ $cart_products ? '(' . count($cart_products) . ')' : null }}
			</h3>
			<span class="close-left js-close">
				<i class="ion-ios-close-empty"></i>
			</span>
		</div>
		<div class="cart-inside">

			@if ($cart_products)

				<ul class="list">

					@foreach ($cart_products as $cart)

						<li class="item-cart">
							<div class="product-img-wrap">
								<a href="{{ site_url('urun/' . product_field($cart['code'], 'slug')) }}">
									<img src="{{ product_field($cart['code'], 'image') ? upload_url('images/cache/products/600x600/' . product_field($cart['code'], 'image')) : asset_url('client/img/default.jpg') }}" alt="{{ product_field($cart['code'], 'name') }}" width="150" height="150" class="img-responsive">
								</a>
							</div>
							<div class="product-details">
								<div class="inner-left">
									<div class="product-name">
										<a href="{{ site_url('urun/' . product_field($cart['code'], 'slug')) }}">
											{{ product_field($cart['code'], 'name') }}
										</a>
									</div>
									<div class="product-price">
										<span>₺{{ product_field($cart['code'], 'discount') > 0 ? turkishLira(product_field($cart['code'], 'discount')) : turkishLira(product_field($cart['code'], 'price')) }}</span>
									</div>
									<div class="cart-qtt">
										<button type="button" class="quantity-left-minus btn btn-number js-minus" data-type="minus" data-field="{{ $cart['code'] }}">
											<span class="minus-icon">
												<i class="ion-ios-minus-empty"></i>
											</span>
										</button>
										<input type="text" name="qty" value="{{ $cart['qty'] }}" min="1" max="99" class="product_quantity_number js-number">
										<button type="button" class="quantity-right-plus btn btn-number js-plus" data-type="plus" data-field="{{ $cart['code'] }}">
											<span class="plus-icon">
												<i class="ion-ios-plus-empty"></i>
											</span>
										</button>
									</div>
								</div>
							</div>
						</li>

					@endforeach

				</ul>
				<div class="cart-bottom">

					<!--<div class="cart-form">
						<div class="cart-note-form">
							<label for="CartSpecialInstructions" class="cart-note cart-note_text_label small--text-center">
								Sipariş Notu (Opsiyonel):
							</label>
							<textarea rows="6" name="note" class="cart-note__input form-control note--input" id="CartSpecialInstructions"></textarea>
						</div>
					</div>-->

					<div class="cart-button">
						<a href="{{ site_url('sepet') }}" class="zoa-btn cart">
							Sepete Git
						</a>
					</div>
					<div class="cart-button">
						<a href="{{ site_url('odeme') }}" class="zoa-btn checkout">
							Ödeme Yap
						</a>
					</div>
				</div>
				<!-- End cart bottom -->

			@else

				<span>Alışveriş sepetiniz boş.</span>

			@endif

		</div>
	</div>
</div>
