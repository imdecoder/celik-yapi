@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'index, follow')

@section('styles')
@endsection

@section('content')

	@include('client.pages.corporate.shared.breadcrumb')

	<div class="wrapper-faqs">
		<div class="container">
			<h1>
				{{ $meta['title'] }}
			</h1>
			<p>
				Metin.
			</p>
		</div>
	</div>

@endsection

@section('scripts')
@endsection
