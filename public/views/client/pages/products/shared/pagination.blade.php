@if ($list['products']->rowCount())

	<div class="shop-bottom">
		<ul class="pagination">

			@for ($p = $list['pagination']['pages']['left']; $p <= $list['pagination']['pages']['right']; $p++)

				@if ($list['pagination']['page'] == $p)

					<li class="active">
						<a href="javascript:void(0)">
							{{ $p }}
						</a>
					</li>

				@else

					<li>
						<a href="{{ '?marka=' . $list['vendor'] . '&kategori=' . $list['category'] . '&sirala=' . $list['sort'] . '&s=' . $p }}">
							{{ $p }}
						</a>
					</li>

				@endif

			@endfor

		</ul>
		<div class="shop-element right v2">
			<span>{{ turkishNumber($list['pagination']['count']) }} üründen {{ $limit }} tanesi gösteriliyor</span>
		</div>
	</div>

@endif
