@if ($categories->rowCount())

	<div class="d-flex justify-content-center">
		<nav aria-label="Sayfalama">
			<ul class="pagination mb-3">
				<li class="page-item {{ $pagination['page'] != 1 ?: 'disabled' }}">
					<a href="{{ $pagination['page'] != 1 ? '?q=' . $search . '&parent=' . $parent . '&date=' . $date . '&p=1' : 'javascript:void(0)' }}" class="page-link" {{ $pagination['page'] != 1 ?: 'tabindex="-1" aria-disabled="true"' }}>
						İlk Sayfa
					</a>
				</li>
				<li class="page-item {{ $pagination['page'] != 1 ?: 'disabled' }}">
					<a href="{{ $pagination['page'] != 1 ? '?q=' . $search . '&parent=' . $parent . '&date=' . $date . '&p=' . ($pagination['page'] - 1) : 'javascript:void(0)' }}" class="page-link" {{ $pagination['page'] != 1 ?: 'tabindex="-1" aria-disabled="true"' }}>
						Önceki
					</a>
				</li>

				@for ($p = $pagination['pages']['left']; $p <= $pagination['pages']['right']; $p++)

					@if ($pagination['page'] == $p)

						<li class="page-item active" aria-current="page">
							<a href="javascript:void(0)" class="page-link">
								{{ $p }}
							</a>
						</li>

					@else

						<li class="page-item">
							<a href="{{ '?q=' . $search . '&parent=' . $parent . '&date=' . $date . '&p=' . $p }}" class="page-link">
								{{ $p }}
							</a>
						</li>

					@endif

				@endfor

				<li class="page-item {{ $pagination['page'] != $pagination['total'] ?: 'disabled' }}">
					<a href="{{ $pagination['page'] != $pagination['total'] ? '?q=' . $search . '&parent=' . $parent . '&date=' . $date .  '&p=' . ($pagination['page'] + 1) : 'javascript:void(0)' }}" class="page-link" {{ $pagination['page'] != $pagination['total'] ?: 'tabindex="-1" aria-disabled="true"' }}>
						Sonraki
					</a>
				</li>
				<li class="page-item {{ $pagination['page'] != $pagination['total'] ?: 'disabled' }}">
					<a href="{{ $pagination['page'] != $pagination['total'] ? '?q=' . $search . '&parent=' . $parent . '&date=' . $date . '&p=' . $pagination['total'] : 'javascript:void(0)' }}" class="page-link" {{ $pagination['page'] != $pagination['total'] ?: 'tabindex="-1" aria-disabled="true"' }}>
						Son Sayfa
					</a>
				</li>
			</ul>
		</nav>
	</div>

@endif
