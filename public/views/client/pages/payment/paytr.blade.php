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
					PayTR ile Ödeme
				</h2>
			</div>
			<iframe src="https://www.paytr.com/odeme/guvenli/{{ $token }}" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
		</div>
	</div>

@endsection

@section('scripts')
	<script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
	<script>iFrameResize({},'#paytriframe')</script>
@endsection