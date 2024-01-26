<div class="col-lg-8 col-12">
	<div class="card card-orders-table">
		<div class="card-header">
			<h4 class="card-title">
				Son Siparişler
			</h4>
		</div>
		<div class="card-body">

			@if ($orders)

				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<th>
								Müşteri
							</th>
							<th>
								Sipariş Durumu
							</th>
							<th>
								Ödeme Türü
							</th>
							<th>
								Toplam	
							</th>							
						</thead>
						<tbody id="last-orders">

							@foreach ($orders as $order)

								<tr data-href="{{ site_url('admin/orders/view/' . $order->code) }}">
									<td class="text-secondary">
										<div class="fw-bolder">
											{{ $order->customer_name }}
										</div>
										<div class="font-small-2">
											{{ $order->customer_email }}
										</div>
									</td>
									<td>

										@if ($order->status_id == 1)

											<div class="badge badge-light-success">
												<i data-feather="check"></i>
												{{ $order->status_name }}
											</div>

										@elseif ($order->status_id == 4)

											<div class="badge badge-light-warning">
												<i data-feather="clock"></i>
												{{ $order->status_name }}
											</div>

										@else

											<div class="badge badge-light-danger">
												<i data-feather="alert-triangle"></i>
												{{ $order->status_name }}
											</div>

										@endif

									</td>
									<td>
										PayTR
									</td>
									<td class="text-primary fw-bolder">
										₺{{ turkishLira($order->total) }}
									</td>
								</tr>

							@endforeach

						</tbody>
					</table>
				</div>

			@else

				<div class="alert alert-info p-1">
					Kayıtlı sipariş bulunamadı.
				</div>

			@endif

		</div>
	</div>
</div>
