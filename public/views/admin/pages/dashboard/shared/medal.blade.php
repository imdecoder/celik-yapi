<!-- Medal Card -->
<div class="col-xl-4 col-md-6 col-12">
	<div class="card card-congratulation-medal">
		<div class="card-body">
			<h5>
				{{ $logged_user->firstname }}, tebrikler! 🎉
			</h5>
			<p class="card-text font-small-3">
				Yeni sipariş rekoru kırıldı
			</p>
			<h3 class="text-primary mb-75 mt-2 pt-50">
				₺12.273
			</h3>
			<a href="{{ site_url('admin/orders') }}" class="btn btn-primary">
				Siparişler
			</a>
			<img src="{{ asset_url('admin/images/illustration/badge.svg') }}" alt="Sipariş Rekoru" class="congratulation-medal">
		</div>
	</div>
</div>
<!--/ Medal Card -->
