<ul class="js-filter">
	<li class="filter">
		<a href="javascript:void(0)">
			<i class="zoa-icon-sort"></i>
			Sırala:
			<span>{{ $list['sort'] ? $list['sort_name'] : 'Varsayılan' }}</span>
		</a>
		<ul class="dropdown-menu">
			<li>
				<a href="{{ site_url('urunler?marka=' . $list['vendor'] . '&kategori=' . $list['category']) }}">
					Varsayılan
				</a>
			</li>   
			<li>
				<a href="{{ site_url('urunler?marka=' . $list['vendor'] . '&kategori=' . $list['category'] . '&sirala=populer') }}">
					En Çok Satanlar
				</a>
			</li>
			<li>
				<a href="{{ site_url('urunler?marka=' . $list['vendor'] . '&kategori=' . $list['category'] . '&sirala=fiyat_yuksek') }}">
					En Yüksek Fiyat
				</a>
			</li>
			<li>
				<a href="{{ site_url('urunler?marka=' . $list['vendor'] . '&kategori=' . $list['category'] . '&sirala=fiyat_dusuk') }}">
					En Düşük Fiyat
				</a>
			</li>
		</ul>
	</li>
</ul>
