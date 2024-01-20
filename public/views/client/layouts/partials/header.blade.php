<header id="header" class="header-{{ segments(0) ? 'v1' : 'v2' }}">
	<div class="topbar">

		<!--<button type="button" class="js-promo close">
			<i class="ion-ios-close-empty black" aria-hidden="true"></i>
		</button>-->

		<div class="container container-content">
			<div class="row flex">
				<div class="col-xs-8 col-sm-6">
					<div class="topbar-left">

						@include('client.layouts.partials.whatsapp')

					</div>
				</div>
				<div class="col-sm-4 hidden-xs">

					@include('client.layouts.partials.notice')

				</div>
				<div class="col-xs-4 col-sm-6 flex justify-content-end">
					<div class="topbar-right">

						@include('client.layouts.partials.currency')

						@include('client.layouts.partials.language')

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header-center">
		<div class="container container-content">
			<div class="row flex align-items-center justify-content-between">
				<div class="col-md-4 col-xs-4 col-sm-4 col2 hidden-lg hidden-md">

					@include('client.layouts.partials.mobile-button')

				</div>
				<div class="col-md-8">

					@include('client.layouts.partials.navbar')

				</div>
				<div class="col-md-3 col-xs-4 col-sm-4 col2 flex justify-content-center">

					@include('client.layouts.partials.logo')

				</div>
				<div class="col-md-9 col-xs-4 col-sm-4 col2 flex  justify-content-end">

					@include('client.layouts.partials.topbar-buttons')

				</div>
			</div>
		</div>
	</div>
</header>
