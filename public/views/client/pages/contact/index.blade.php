@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'index, follow')

@section('styles')
@endsection

@section('content')

	@include('client.pages.shared.breadcrumb')

	<div class="container container-content">
		<div class="contact-form">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 contact-item">
					<div class="contact-img hover-images">
						<img src="{{ asset_url('client/img/contact_bg.jpg') }}" alt="Bize Ulaşın" class="img-responsive">
						<div class="box-center overlay-img contact-overlay-img">
							<a href="mailto:celikyapi55@hotmail.com" class="email">
								<span>celikyapi55@hotmail.com</span>
							</a>
							<div class="social">
								<a href="#">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="#">
									<i class="fa fa-instagram"></i>
								</a>
								<a href="#">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#">
									<i class="fa fa-youtube"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<h3 class="contact-title">
						Bize Ulaşın
					</h3>
					<form action="" method="post" class="form-customer form-login">
						<div class="form-group">
							<input type="text" name="name" placeholder="İsim" class="form-control form-account" required>
						</div>
						<div class="form-group">
							<input type="email" name="email" placeholder="E-posta adresi" class="form-control form-account" required>
						</div>
						<div class="form-group">
							<input type="text" name="phone" placeholder="Telefon numarası" class="form-control form-account" required>
						</div>
						<div class="form-group">
							<textarea name="message" placeholder="Mesaj" rows="7" class="form-control form-account" required></textarea>
						</div>
						<div class="btn-button-group mg-top-30 mg-bottom-15">
							<button type="submit" class="zoa-btn btn-login hover-white">
								Gönder
							</button>
						</div>
					</form>
					<div class="alert alert-success mt-20">
						<strong>Başarılı!</strong> Mesajınız başarıyla bize ulaştı.
					</div>
				</div>
			</div>
		</div>
		<div class="contact-bottom">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12 about-element">
					<h3>
						E-posta
					</h3>
					<p>
						<a href="mailto:celikyapi55@hotmail.com">
							<span>celikyapi55@hotmail.com</span>
						</a>
					</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 about-element">
					<h3>
						İletişim
					</h3>
					<p>
						<a href="https://api.whatsapp.com/send?phone=+903624324834" target="_blank">
							<span>+90 362 432 48 34</span>
						</a>
					</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 about-element">
					<h3>
						Adres
					</h3>
					<p>
						19 Mayıs Mah. Ağabali Cad. No: 39/1, İlkadım/Samsun
					</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 about-element">
					<h3>
						Çalışma
					</h3>
					<p>
						Pzt-Cmt: 09:00 - 18:00
					</p>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
@endsection
