@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'noindex, nofollow')

@section('styles')
	<style type="text/css">
		.total,
		.content-radio {
			justify-content: space-between;
		}

		.total .prince {
			padding-left: 0;
		}

		.content-radio .radio {
			margin-left: 0;
		}

		textarea.comment {
			padding: 15px 20px;
		}
	</style>
@endsection

@section('content')

	@include('client.pages.shared.breadcrumb')	

	<div class="check-out">
		<div class="container">
			<div class="titlell">
				<h2>
					Ödeme
				</h2>
			</div>
			<form action="{{ site_url('odeme/paytr') }}" method="post">
				<div class="row">
					<div class="col-md-7 col-sm-7">
						<div class="form-name">
							<div class="content">
								<h5>
									Zaten bir hesabınız var mı?
									<a href="{{ site_url('giris-yap') }}" style="color: #333; text-decoration: underline">
										Giriş Yap
									</a>
								</h5>
								<h5>
									Henüz bir hesabınız yok mu?
									<a href="{{ site_url('kayit-ol') }}" style="color: #333; text-decoration: underline">
										Kayıt Ol
									</a>
								</h5>
							</div>
							<div class="billing">
								<h2 style="font-size: 26px; font-weight: bold; padding-bottom: 20px">
									Teslimat Bilgileri
								</h2>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label class="out">
											Ad
											<span style="color: #f33">*</span>
										</label>
										<br>
										<input type="text" name="firstname" required class="country">
									</div>
									<div class="col-md-6 col-sm-6">
										<label class="out">
											Soyad
											<span style="color: #f33">*</span>
										</label>
										<br>
										<input type="text" name="lastname" required class="country">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label class="out">
											E-posta Adresi
											<span style="color: #f33">*</span>
										</label>
										<br>
										<input type="email" name="email" required class="country" style="text-transform: none">
									</div>
									<div class="col-md-6 col-sm-6">
										<label class="out">
											Telefon Numarası
											<span style="color: #f33">*</span>
										</label>
										<br>
										<input type="text" name="phone" placeholder="(555) 555-5555" maxlength="14" required class="district" id="phone-number">
									</div>
								</div>
								
								<!--<div class="row">
									<div class="col-md-6 col-sm-6">
										<label class="out">
											İl
											<span style="color: #f33">*</span>
										</label>
										<br>
										<select name="city" class="district">
											<option value="">
												İl Seçin
											</option>
										</select>
									</div>
									<div class="col-md-6 col-sm-6">
										<label class="out">
											İlçe
											<span style="color: #f33">*</span>
										</label>
										<br>
										<select name="district" class="district">
											<option value="">
												İlçe Seçin
											</option>
										</select>
									</div>
								</div>-->

								<div class="row">
									<div class="col-md-12 col-sm-12">
										<label class="out">
											Adres
											<span style="color: #f33">*</span>
										</label>
										<input type="text" name="address" required class="district">
									</div>
								</div>
								<input type="checkbox" name="new_customer" value="1" id="new_customer">
								<label for="new_customer">
									<span style="color: #333; font-size: 13px; text-transform: none">
										Yeni bir hesap oluştur
									</span>
								</label>
								<br>
								<label class="out" style="margin-top: 20px">
									Sipariş Notu
								</label>
								<textarea name="note" class="comment" placeholder="Opsiyonel"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-sm-5 ">
						<div class="order">
							<div class="content-order">
								<div class="table">
									<table>
										<caption>
											Siparişiniz
										</caption>
										<thead>
											<tr>
												<th>
													Ürün
												</th>
												<th></th>
												<th>
													Toplam
												</th>
											</tr>
										</thead>
										<tbody>

											@foreach ($products as $product)

												<tr>
													<td>{{ $product->name }}</td>
													<td>
														<i class="fa fa-times" aria-hidden="true"></i>
														{{ $product->qty }}
													</td>
													<td>
														₺{{ $product->price }}
													</td>
												</tr>

											@endforeach

										</tbody>
									</table>
								</div>
								<div class="content-total">
									<div class="total">
										<h5 class="sub-total">
											Ara Toplam
										</h5>
										<h5 class="prince">
											₺{{ $cart->subtotal }}
										</h5>
									</div>
									<div class="content-radio">
										<h5 style="color: #222; font-size: 14px; font-weight: bold">
											Kargo:
										</h5>
										<div class="radio">
											<span id="prince2" style="color: #6c6c6c; font-size: 14px">
												₺{{ $cart->shipping_cost }}
											</span>
										</div>
									</div>
									<div class="total">
										<h5 class="sub-total">
											Toplam
										</h5>
										<h5 class="prince">
											₺{{ $cart->total }}
										</h5>
									</div>
									<div class="payment">
										<div class="place-ober">
											<button type="submit" class="ober">
												Ödeme Sayfasına Devam Et
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
	<script>
		$('#phone-number').keydown(function(e) {
			let key = e.which || e.charCode || e.keyCode || 0
			$phone = $(this)

			if ($phone.val().length === 1 && (key === 8 || key === 46)) {
				$phone.val('(')
				return false
			} else if ($phone.val().charAt(0) !== '(') {
				$phone.val('(' + String.fromCharCode(e.keyCode) + '')
			}

			if (key !== 8 && key !== 9) {
				if ($phone.val().length === 4) {
					$phone.val($phone.val() + ')')
				}

				if ($phone.val().length === 5) {
					$phone.val($phone.val() + ' ')
				}
				
				if ($phone.val().length === 9) {
					$phone.val($phone.val() + '-')
				}
			}

			return (
				key == 8 || 
				key == 9 ||
				key == 46 ||
				(key >= 48 && key <= 57) ||
				(key >= 96 && key <= 105)
			)
		}).bind('focus click', function() {
			$phone = $(this)

			if ($phone.val().length === 0) {
				$phone.val('(')
			} else {
				var val = $phone.val()
				$phone.val('').val(val)
			}
		}).blur(function() {
			$phone = $(this)

			if ($phone.val() === '(') {
				$phone.val('')
			}
		})
	</script>
@endsection
