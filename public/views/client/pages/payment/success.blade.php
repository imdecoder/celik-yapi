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
					Ödeme Başarılı!
				</h2>
				<p class="text-center" style="color: #4bb543; margin-bottom: 30px">
					Ödemeniz başarılı bir şekilde alınmıştır.
				</p>
			</div>
			
		</div>
	</div>

@endsection

@section('scripts')
@endsection
