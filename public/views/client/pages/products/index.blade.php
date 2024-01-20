@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'index, follow')

@section('content')

	@include('client.pages.products.shared.breadcrumb')

	<div class="container container-content">
		<div class="row">
			
			@include('client.pages.products.shared.filter')

			@if ($list['products']->rowCount())

				<div class="col-md-9 col-sm-12 col-xs-12 collection-list">
					<div class="product-collection-grid product-grid bd-bottom">
						<div class="shop-top">
							<div class="shop-element left">
								<h1 class="shop-title">
									{{ $meta['title'] }}
								</h1>
							</div>
							<div class="shop-element left right">

								@include('client.pages.products.shared.sort')

							</div>
						</div>
						<div class="row engoc-row-equal">

							@foreach ($list['products'] as $product)

								@include('client.pages.products.shared.product')

							@endforeach

						</div>

						@include('client.pages.products.shared.pagination')

					</div>
				</div>

			@else

				@include('client.pages.products.shared.message')

			@endif

		</div>
	</div>

	@include('client.layouts.partials.newsletter')

@endsection

@section('scripts')
@endsection
