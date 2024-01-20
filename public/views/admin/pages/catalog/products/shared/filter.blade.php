<form action="" method="get">
	<div class="row gap-1 gap-lg-0 mx-2 my-2">
		<div class="col-12 col-lg-2">
			<button type="button" class="btn btn-outline-secondary w-100" id="filter-btn">
				<i data-feather="filter"></i>
				Filtreler
				<i data-feather="chevron-down" class="filter-icon"></i>
				<i data-feather="chevron-up" class="filter-icon hidden"></i>
			</button>
		</div>
		<div class="col-12 col-lg-10">
			<div class="input-group input-group-merge">
				<span class="input-group-text">
					<i data-feather="search"></i>
				</span>
				<input type="search" name="q" value="{{ $search }}" placeholder="Ürün veya marka adına göre arama yapabilirsiniz." class="form-control">
			</div>
		</div>
	</div>
	<div class="{{ !$code && !$category && !$price && !$date ? 'hidden' : null }} row mx-2 my-2" id="filter" style="row-gap: 15px">
		<div class="col-lg-4 col-6">
			<label class="form-label" for="code">
				Ürün Kodu
			</label>
			<input type="text" name="code" value="{{ $code }}" class="form-control" id="code">
		</div>
		<div class="col-lg-4 col-6">
			<label class="form-label" for="category">
				Kategori
			</label>
			<select name="category" class="form-select select2 mb-md-0 mb-2" id="category">
				<option value="">
					Tüm Kategoriler
				</option>

				@foreach ($categories as $item)

					<option value="{{ $item->id }}" {{ $category == $item->id ? 'selected' : null }}>
						{{ $item->name }}
					</option>

				@endforeach

			</select>
		</div>
		<div class="col-lg-4 col-6">
			<label class="form-label" for="vendor">
				Marka
			</label>
			<select name="vendor" class="form-select select2 mb-md-0 mb-2" id="vendor">
				<option value="" selected>
					Tüm Markalar
				</option>

				@foreach ($vendors as $item)

					<option value="{{ $item->id }}" {{ $vendor == $item->id ? 'selected' : null }}>
						{{ $item->name }}
					</option>

				@endforeach

			</select>
		</div>
		<div class="col-lg-4 col-6">
			<label class="form-label" for="price">
				Fiyat
			</label>
			<input type="text" name="price" value="{{ $price }}" class="form-control" id="price">
		</div>
		<div class="col-lg-4 col-6">
			<label class="form-label" for="date">
				Oluşturulma Tarihi
			</label>
			<div class="input-group">
				<input type="text" name="date" value="{{ $date }}" class="form-control pickadate" id="date">
				<span class="input-group-text">
					<i data-feather="calendar"></i>
				</span>
			</div>
		</div>
		<div class="col-12">
			<a href="{{ site_url('admin/catalog/products') }}" class="btn btn-secondary" style="margin-right: 10px">
				Vazgeç
			</a>
			<button type="submit" class="btn btn-primary">
				Ara
			</button>
		</div>
	</div>
</form>
