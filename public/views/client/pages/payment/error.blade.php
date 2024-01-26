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
					Başarısız Ödeme!
				</h2>
				<p class="text-center" style="color: #eb5050; margin-bottom: 30px">
					Bir hata oluştu ve ödemeniz alınamadı.
				</p>
			</div>
			
		</div>
	</div>

@endsection

@section('scripts')
@endsection
