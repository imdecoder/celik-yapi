@extends('admin.layouts.auth')

@section('title', 'Çelik Panel')

@section('styles.vendor')
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/core/menu/menu-types/vertical-menu.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/plugins/forms/form-validation.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/pages/authentication.css') }}">
@endsection

@section('content')

	<!-- Login basic -->
	<div class="card mb-0">
		<div class="card-body">
			<a href="{{ site_url('admin/login') }}" class="brand-logo">
				<svg
					viewbox="0 0 139 95"
					height="28"
					xmlns="http://www.w3.org/2000/svg"
					xmlns:xlink="http://www.w3.org/1999/xlink"
				>
					<defs>
						<lineargradient
							id="linearGradient-1"
							x1="100%"
							x2="50%"
							y1="10.5120544%"
							y2="89.4879456%"
						>
							<stop
								stop-color="#000000"
								offset="0%"
							></stop>
							<stop
								stop-color="#FFFFFF"
								offset="100%"
							></stop>
						</lineargradient>
						<lineargradient
							id="linearGradient-2"
							x1="64.0437835%"
							x2="37.373316%"
							y1="46.3276743%"
							y2="100%"
						>
							<stop
								stop-color="#EEEEEE"
								stop-opacity="0" offset="0%"
							></stop>
							<stop
								stop-color="#FFFFFF"
								offset="100%"
							></stop>
						</lineargradient>
					</defs>
					<g
						id="Page-1"
						stroke="none"
						stroke-width="1"
						fill="none"
						fill-rule="evenodd"
					>
						<g
							id="Artboard"
							transform="translate(-400.000000, -178.000000)"
						>
							<g
								id="Group"
								transform="translate(400.000000, 178.000000)"
							>
								<path
									class="text-primary"
									id="Path"
									d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
									style="fill: currentColor"
								/>
								<path
									id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
									fill="url(#linearGradient-1)"
									opacity="0.2"
								/>
								<polygon
									id="Path-2"
									fill="#000000"
									opacity="0.049999997"
									points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"
								/>
								<polygon
									id="Path-21"
									fill="#000000"
									opacity="0.099999994"
									points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"
								/>
								<polygon
									id="Path-3"
									fill="url(#linearGradient-2)"
									opacity="0.099999994"
									points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"
								/>
							</g>
						</g>
					</g>
				</svg>
				<h2 class="brand-text text-primary ms-1">
					Çelik Panel
				</h2>
			</a>
			<h4 class="card-title mb-1">
				Şifreni mi unuttun? 🔒
			</h4>
			<p class="card-text mb-2">
				Şifrenizi sıfırlamanız için size bir bağlantı gönderelim.
			</p>

			@if (isset($message['class']))

				<div class="alert alert-{{ $message['class'] }}" role="alert">
					<div class="alert-body">
						<strong>{{ $message['title'] }}!</strong>
						{{ $message['text'] }}
					</div>
				</div>

			@endif

			@if ($message['display'] == 'block')

				<form action="" method="post" class="auth-forgot-password-form mt-2">
					<div class="mb-1">
						<label for="forgot-password-email" class="form-label">
							E-posta Adresi
						</label>
						<input type="text" name="email" class="form-control" id="forgot-password-email" aria-describedby="forgot-password-email" tabindex="1" autofocus>
					</div>
					<button type="submit" class="btn btn-primary w-100" tabindex="2">
						Şifremi Sıfırla
					</button>
				</form>

			@endif

			<p class="text-center mt-2">
				<a href="{{ site_url('admin/login') }}">
					<i data-feather="chevron-left"></i>
					Giriş sayfasına git
				</a>
			</p>
		</div>
	</div>
	<!-- /Login basic -->

@endsection

@section('scripts.vendor')
	<script src="{{ asset_url('admin/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
@endsection

@section('scripts')
	<script src="{{ asset_url('admin/js/scripts/pages/auth-forgot-password.js') }}"></script>
@endsection
