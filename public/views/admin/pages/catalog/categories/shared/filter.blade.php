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
				<input type="search" name="q" value="{{ $search }}" placeholder="Kategori adına göre arama yapabilirsiniz." class="form-control">
			</div>
		</div>
	</div>
	<div class="{{ !$parent && !$date ? 'hidden' : null }} row mx-2 my-2" id="filter" style="row-gap: 15px">
		<div class="col-lg-4 col-6">
			<label class="form-label" for="parent">
				Üst Kategori
			</label>
			<select name="parent" class="select2 form-select" id="parent">
				<option value="">
					Yok
				</option>

				@foreach ($parents as $category)
					<option value="{{ $category->id }}" {{ $category->id == $parent ? 'selected' : null }}>
						{{ $category->name }}
					</option>
				@endforeach

			</select>
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
			<a href="{{ site_url('admin/catalog/categories') }}" class="btn btn-secondary" style="margin-right: 10px">
				Vazgeç
			</a>
			<button type="submit" class="btn btn-primary">
				Ara
			</button>
		</div>
	</div>
</form>
