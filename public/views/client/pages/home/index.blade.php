@extends('client.layouts.default')

@section('title', $meta['title'])
@section('description', $meta['description'])
@section('robots', 'index, follow')

@section('styles')
	<style>
		.banner.pad {
			padding-bottom: 0;
		}
	</style>
@endsection

@section('content')

	@include('client.pages.home.category')

	@include('client.pages.home.featured')

	@include('client.pages.home.trend')

	@include('client.pages.home.banner')

	@include('client.layouts.partials.newsletter')

@endsection

@section('scripts')
@endsection
