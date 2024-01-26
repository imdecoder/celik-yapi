<div class="col-lg-4 col-12">
	<div class="card card-customers-table">
		<div class="card-header">
			<h4 class="card-title">
				Yeni Müşteriler
			</h4>
		</div>
		<div class="card-body">

			@if ($customers)

				<div class="table-responsive">
					<table class="table table-hover">
						<tbody>

							@foreach ($customers as $customer)

								<tr>
									<td>
										<a href="{{ site_url('admin/customers/edit/' . $customer->id) }}" class="d-flex align-items-center">
											<div class="avatar rounded">
												<div class="avatar-content">
													<img src="{{ $customer->avatar ? upload_url('images/cache/customers/40x40/' . $customer->avatar) : asset_url('admin/images/avatars/default.jpg') }}" alt="{{ $customer->firstname . ' ' . $customer->lastname }}" width="40" height="40">
												</div>
											</div>
											<div class="text-secondary">
												<div class="fw-bolder">
													{{ $customer->firstname . ' ' . $customer->lastname }}
												</div>
												<div class="font-small-2">
													{{ $customer->email }}
												</div>
											</div>
										</a>
									</td>
								</tr>

							@endforeach

						</tbody>
					</table>
				</div>

			@else

				<div class="alert alert-info p-1">
					Kayıtlı müşteri bulunamadı.
				</div>

			@endif

		</div>
	</div>
</div>
