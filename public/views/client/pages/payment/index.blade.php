@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'noindex, nofollow')

@section('styles')
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
								<h5>Returning Custumer? <span style="text-transform: uppercase;"> click<a href="#" style="color:#333; text-decoration:underline"> here </a>to login</span></h5>
								<h5>Have a coupon?<span style="text-transform: uppercase;"> click <a href="#" style="color:#333; text-decoration:underline"> here</a> to enter your code</span></h5>
							</div>
							<div class="billing">
								<h2 style="font-size: 26px; padding-bottom: 20px; font-weight: bold">
									Teslimat Bilgileri
								</h2>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label class="out">
											Ad
											<span style="color:#f33">*</span>
										</label>
										<br>
										<input type="text" name="firstname" required class="country">
									</div>
									<div class="col-md-6 col-sm-6">
										<label class="out">
											Soyad
											<span style="color:#f33">*</span>
										</label>
										<br>
										<input type="text" name="lastname" required class="country">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label class="out">
											E-posta Adresi
											<span style="color:#f33">*</span>
										</label>
										<br>
										<input type="text" name="email" required class="country">
									</div>
									<div class="col-md-6 col-sm-6">
										<label class="out">
											Telefon Numarası
											<span style="color:#f33">*</span>
										</label>
										<br>
										<input type="text" name="phone" required class="district">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label class="out">
											İl
											<span style="color:#f33">*</span>
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
											<span style="color:#f33">*</span>
										</label>
										<br>
										<select name="district" class="district">
											<option value="">
												İlçe Seçin
											</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label class="out">
											Adres
											<span style="color:#f33">*</span>
										</label>
										<input type="text" name="address" required class="district">
									</div>
									<div class="col-md-6 col-sm-6">
										<label class="out">
											Posta Kodu
											<span style="color:#f33">*</span>
										</label>
										<br>
										<input type="text" name="zip_code"  class="country">
									</div>									
								</div>
								<input type="checkbox" name="customer" id="customer">
								<label for="customer">
									<span style="color: #333;font-size:13px">
										Yeni hesap oluştur
									</span>
								</label>
								<br>
								<label class="out" style="margin-top:20px">
									Sipariş Notu
								</label>
								<textarea name="message" class="comment"></textarea>
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
										<h5 style="color:#222; font-size: 14px; font-weight: bold">
											Kargo:
										</h5>
										<div class="radio">
											<span id="prince2" style="color:#6c6c6c;font-size:14px">
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
										<input type="radio" name="payment_type" value="transfer" class="so1">
										<span style="font-size: 16px;color:#494949; font-weight: bold">
											Havale/EFT ile Ödeme
										</span>
										<p style="padding-left: 20px;padding-bottom: 20px">
											Make your payment directly into our bank account.Please use your Order ID as the payment reference. Your order shipped until the funds have cleared in our account.
										</p>
										<hr>
										<input type="radio" name="payment_type" value="paytr" class="so2" id="paytr">
										<label for="paytr">
											<span style="font-size: 16px;color:#494949">
												PayTR ile Ödeme
											</span>
										</label>
										<br>
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
@endsection
