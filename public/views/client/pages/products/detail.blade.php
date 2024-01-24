@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'index, follow')

@section('content')

	@include('client.pages.shared.breadcrumb')

	<div class="container">
		<div class="single-product-detail">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="flex product-img-slide">

						@include('client.pages.products.partials.images')

					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">

					@include('client.pages.products.partials.info')

				</div>
			</div>
		</div>
		<div class="single-product-tab bd-bottom">

			@include('client.pages.products.partials.tabs')

			<div class="tab-content">
				
				@include('client.pages.products.partials.content')

				@include('client.pages.products.partials.reviews')

			</div>
		</div>

		@include('client.pages.products.partials.related')

	</div>

@endsection

@section('scripts')
@endsection
