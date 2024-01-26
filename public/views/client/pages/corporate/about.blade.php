@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'index, follow')

@section('styles')
@endsection

@section('content')

	@include('client.pages.shared.breadcrumb')

	<div class="container container-content">
		<div class="zoa-about text-center">
			<h3>
				Hakkımızda
			</h3>
			<div class="about-banner">
				<div class="hover-images">
					<img src="{{ asset_url('client/img/about/about-banner.jpg') }}" alt="Hakkımızda" class="img-responsive">
				</div>
				<div class="zoa-info">
					<div class="container">
						<div class="zoa-inside flex align-items-center justify-center">
							<p>
								<a href="#map" target="_blank">
									19 Mayıs Mah. Ağabali Cad. No: 39/1
								</a>
							</p>
							<p>
								<a href="tel:+905426715320">
									+90 542 671 53 20
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="about-content bd-bottom">
			<div class="row">
				<div class="col-md-7 col-sm-6 col-xs-12">
					<div class="about-sm">
						<div class="hover-images">
							<img src="{{ asset_url('client/img/about/small_img.jpg') }}" alt="Hakkımızda" class="img-responsive">
						</div>
					</div>
					<div class="about-info">
						<h2>
							A wayward<br> <span>vision</span> in <br>
							fashion
						</h2>
						<div class="about-desc">
							<p>
								Housing an international selection of upcoming to established designers for over fifteen years.
							</p>
							<p>
								Zoa stands for a personal and obstinate selection. Surprising with new designers every season, great attention is given to the unique & personal identity of all in-store designers. From clothing to jewellery, shoes & bags, each piece is chosen with special care.
							</p>
						</div>
						<div class="sign">
							<img src="{{ asset_url('client/img/about/signature.jpg') }}" alt="İmza" class="img-responsive">
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-6 col-xs-12">
					<div class="about-img">
						<div class="hover-images">
							<img src="{{ asset_url('client/img/about/about-2.jpg') }}" alt="Hakkımızda" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="about-bottom bd-bottom">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12 about-element">
					<h3>
						origin
					</h3>
					<p>
						an aesthetically pleasing name, leaving
						<br>
						room for personal interpretation
						<br>
						through its actions.
					</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 about-element">
					<h3>
						team
					</h3>
					<p>
						three young individuals, convinced
						<br>that a lot has yet to be explored
						<br>
						in an indispensable and ubiquitous
					</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 about-element">
					<h3>
						practicality
					</h3>
					<p>
						garments should look good, and
						<br>
						simultaneously making them
						<br>versatile is a nice challenge.
					</p>
				</div>
			</div>
		</div>
	</div>

	@if ($vendors)

		<div class="container">
			<div class="about-brand">
				<div class="owl-carousel owl-theme js-owl-team">

					@foreach ($vendors as $vendor)

						<div class="brand-item">
							<a href="{{ site_url('marka/' . $vendor->slug) }}" class="hover-images">
								
								<!--<img src="{{ asset_url('client/img/about/brand-urbane.png') }}" alt="{{ $vendor->name }}" class="img-responsive">-->

								{{ $vendor->name }}

							</a>
						</div>

					@endforeach

				</div>
			</div>
		</div>

	@endif

@endsection

@section('scripts')
@endsection
