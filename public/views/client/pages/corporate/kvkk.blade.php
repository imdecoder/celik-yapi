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
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-1 col-md-offset-0 faqs">
					<h1>
						{{ $meta['title'] }}
					</h1>
					<div class="faq-block">
						<p>
							Metin.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
@endsection
