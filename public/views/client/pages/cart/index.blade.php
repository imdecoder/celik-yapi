@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'noindex, nofollow')

@section('styles')
	<style type="text/css">
		.link-start,
		.link-start:hover {
			text-decoration: underline;
		}

		.product-img img {
			width: 150px;
		}

		.price {
			font-family: inherit;
		}

		@media screen and (max-width: 767px) {
			.table-responsive {
				border: none;
			}
		}
	</style>
@endsection

@section('content')

	<!-- Shopping cart -->
	<div class="container">
		<div class="zoa-cart">
			<ul class="account-tab">
				<li class="active">
					<a href="javascript:void(0)">
						Alışveriş Sepeti
					</a>
				</li>
				
				<!--<li>
					<a href="{{ site_url('favoriler') }}">
						Favoriler
					</a>
				</li>-->

			</ul>
			<div class="tab-content">
				
				@if ($products)
				
					<div id="cart" class="tab-pane fade in active">
						<div class="shopping-cart">
							<div class="table-responsive">
								<table class="table cart-table">
									<thead>
										<tr>
											<th class="product-thumbnail">
												Resim
											</th>
											<th class="product-name">
												Ürün
											</th>
											<th class="product-price">
												Fiyat
											</th>
											<th class="product-quantity">
												Adet
											</th>
											<th class="product-subtotal">
												Toplam
											</th>
											<th class="product-remove">
												Sil
											</th>
										</tr>
									</thead>
									<tbody>

										@foreach ($products as $product)

											<tr class="item_cart">
												<td class=" product-name">
													<div class="product-img">
														<a href="{{ $product->link }}">
															<img src="{{ $product->image }}" alt="{{ $product->name }}" width="150" height="150">
														</a>
													</div>
												</td>
												<td class="product-desc">
													<div class="product-info">
														<a href="{{ $product->link }}">
															{{ $product->name }}
														</a>
														
														<!--<span>#SKU: 113106</span>-->

													</div>
												</td>
												<td class="product-same total-price">
													<p class="price">
														₺{{ $product->price }}
													</p>
												</td>
												<td class="bcart-quantity single-product-detail">
													<div class="cart-qtt">
														<button
															type="button"
															class="quantity-left-minus btn btn-number js-minus"
															data-type="minus"
															data-field="{{ $product->code }}"
														>
															<span class="minus-icon">
																<i class="ion-ios-minus-empty"></i>
															</span>
														</button>
														<input
															type="text"
															name="qty"
															value="{{ $product->qty }}"
															class="product_quantity_number js-number"
														>
														<button
															type="button"
															class="quantity-right-plus btn btn-number js-plus"
															data-type="plus"
															data-field="{{ $product->code }}"
														>
															<span class="plus-icon">
																<i class="ion-ios-plus-empty"></i>
															</span>
														</button>
													</div>
												</td>
												<td class="total-price">
													<p class="price">
														₺{{ $product->total }}
													</p>
												</td>
												<td class="product-remove">
													<a href="javascript:void(0)" title="Sepetten Sil" class="btn-del" data-product="{{ $product->code }}">
														<i class="ion-ios-close-empty"></i>
													</a>
												</td>
											</tr>

										@endforeach

									</tbody>
								</table>
							</div>
							<div class="table-cart-bottom">
								<div class="row">
									<div class="col-md-7 col-sm-6 col-xs-12">
										<div class="cart-btn-group">
											<a href="{{ site_url('urunler') }}" class="btn-continue">
												Alışverişe Devam Et
											</a>
											<a href="javascript:void(0)" class="btn-clear" data-product="{{ $product->code }}">
												Sepeti Temizle
											</a>
										</div>
										<div class="coupon-group">
											<form action="" method="post" class="form_coupon">
												<input type="text" name="coupon" placeholder="İndirim Kodu" id="coupon" class="newsletter-input form-control">
												<div class="input-icon">
													<img src="{{ asset_url('client/img/coupon.png') }}" alt="İndirim Kodu">
												</div>
											</form>
											<a href="javascript:void(0)" class="btn-update">
												Uygula
											</a>
										</div>
									</div>
									<div class="col-md-5 col-sm-6 col-xs-12">
										<div class="cart-text">
											<div class="cart-element">
												<p>
													Ara Toplam:
												</p>
												<p>
													₺{{ $cart->subtotal }}
												</p>
											</div>
											<div class="cart-element">
												<p>
													Kargo Ücreti:
												</p>
												<p>
													₺{{ $cart->shipping_cost }}
												</p>
											</div>
											<div class="cart-element text-bold">
												<p>
													Toplam:
												</p>
												<p>
													₺{{ $cart->total }}
												</p>
											</div>
										</div>
										<a href="{{ site_url('odeme') }}" class="zoa-btn zoa-checkout">
											Ödeme Yap
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				@else

					<p>
						Alışveriş sepetiniz boş.
						<a href="{{ site_url('urunler') }}" class="link-start">
							Alışverişe başla!
						</a>
					</p>

				@endif

			</div>
		</div>   
	</div>
	<!-- End Shopping cart -->

@endsection

@section('scripts')
	<script>
		$('.btn-del').click(function() {
			const code = $(this).data('product')

			Swal.fire({
				title: 'Uyarı!',
				text: 'Ürünü sepetten çıkartmak istediğinize emin misiniz?',
				icon: 'warning',
				confirmButtonText: 'Evet',
				cancelButtonText: 'İptal',
				showCancelButton: true
			}).then(function(isConfirm) {
				if (isConfirm.value) {
					$.post(API_URL + '/product/cart', { action: 'delete', code: code, qty: 0 }, function(data) {
						Swal.fire({
							title: data.title,
							text: data.text,
							icon: data.icon,
							confirmButtonText: 'Tamam'
						}).then(function() {
							window.location.reload()
						})
					})
				}
			})
		})

		$('.btn-update').click(function() {
			Swal.fire({
				title: 'Bilgi!',
				text: 'Kupon kodu uygulaması geçici olarak kapatılmıştır.',
				icon: 'info',
				confirmButtonText: 'Tamam'
			}).then(function() {
				// TODO: Burayı geliştirmeye devam et.
			})
		})

		$('.btn-clear').click(function() {
			const code = $(this).data('product')

			Swal.fire({
				title: 'Uyarı!',
				text: 'Alışveriş sepetinizi temizlemek istediğinize emin misiniz?',
				icon: 'warning',
				confirmButtonText: 'Evet',
				cancelButtonText: 'İptal',
				showCancelButton: true
			}).then(function(isConfirm) {
				if (isConfirm.value) {
					$.post(API_URL + '/product/cart', { action: 'clear' }, function(data) {
						Swal.fire({
							title: data.title,
							text: data.text,
							icon: data.icon,
							confirmButtonText: 'Tamam'
						}).then(function() {
							window.location.reload()
						})
					})
				}
			})
		})
	</script>
@endsection
