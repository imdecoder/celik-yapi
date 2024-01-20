@extends('admin.layouts.default')

@section('title', $meta['title'] . ' - Çelik Panel')

@section('styles.vendor')
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset_url('admin/css/core/menu/menu-types/vertical-menu.css') }}">
@endsection

@section('content')

	<div class="content-header mb-2">

		@include('admin.pages.catalog.categories.shared.breadcrumb')

	</div>
	<div class="content-body">
		<div class="row">
			<div class="col-12">
				<div class="alert alert-{{ $result['class'] }} p-2">
					{!! $result['text'] !!}
				</div>			
			</div>
		</div>
	</div>

@endsection

@section('scripts.vendor')
@endsection

@section('scripts')
@endsection
