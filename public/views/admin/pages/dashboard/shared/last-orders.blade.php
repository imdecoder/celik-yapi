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
								Müşteri / Tarih
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

							<!-- foreach ($orders as $order) -->

								<tr data-href="{{ site_url('admin/orders/view/1') }}">
									<td class="text-secondary">
										<div class="fw-bolder">
											Ad Soyad
										</div>
										<div class="font-small-2">
											adsoyad@mail.com
										</div>
									</td>
									<td>
										<div class="badge badge-light-warning">
											<i data-feather="clock"></i>
											Onay Bekliyor
										</div>
									</td>
									<td>
										Havale
									</td>
									<td class="text-primary fw-bolder">
										₺100,00
									</td>
								</tr>

							<!-- endforeach -->

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
