@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'noindex, nofollow')

@section('styles')
@endsection

@section('content')

	@include('client.pages.shared.breadcrumb')	

	<div class="zoa-404">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<img src="{{ asset_url('client/img/404.png') }}" alt="Sayfa Bulunamadı" width="552" height="600" class="img-responsive">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<h1>
						Oops!
					</h1>
					<h3>
						Sayfa Bulunamadı
					</h3>
					<p>
						Üzgünüz ama ulaşmaya çalıştığınız sayfayı bulamadık.
						Bu sayfa silinmiş veya adresi değişmiş olabilir.
					</p>
					<a href="javascript:history.back()" class="zoa-back">
						Geri dön
					</a>
				</div>
			</div>
		</div>
	</div>

	@include('client.layouts.partials.newsletter')

@endsection

@section('scripts')
@endsection
