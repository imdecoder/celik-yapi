<!-- BEGIN: Main Menu -->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item me-auto">
				<a href="{{ site_url('admin/dashboard') }}" class="navbar-brand">
					<span class="brand-logo">
						<svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
							<defs>
								<lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
									<stop stop-color="#000000" offset="0%"></stop>
									<stop stop-color="#FFFFFF" offset="100%"></stop>
								</lineargradient>
								<lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
									<stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
									<stop stop-color="#FFFFFF" offset="100%"></stop>
								</lineargradient>
							</defs>
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g id="Artboard" transform="translate(-400.000000, -178.000000)">
									<g id="Group" transform="translate(400.000000, 178.000000)">
										<path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
										<path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
										<polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
										<polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
										<polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
									</g>
								</g>
							</g>
						</svg>
					</span>
					<h2 class="brand-text">
						Çelik Panel
					</h2>
				</a>
			</li>
			<li class="nav-item nav-toggle">
				<a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
					<i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
					<i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="shadow-bottom"></div>
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class="nav-item {{ segments(1) == 'dashboard' ? 'active' : null }}">
				<a href="{{ site_url('admin/dashboard') }}" class="d-flex align-items-center">
					<i data-feather="home"></i>
					<span class="menu-title text-truncate" data-i18n="Dashboards">Anasayfa</span>
				</a>
			</li>
			<li class="navigation-header">
				<span data-i18n="Product Managment">Genel Yönetim</span>
				<i data-feather="more-horizontal"></i>
			</li>
			<li class="nav-item">
				<a href="#" class="d-flex align-items-center">
					<i data-feather="shopping-bag"></i>
					<span class="menu-title text-truncate" data-i18n="Catalog">Katalog</span>
				</a>
				<ul class="menu-content">
					<li class="{{ segments(1) == 'catalog' && segments(2) == 'products' ? 'active' : null }}">
						<a href="{{ site_url('admin/catalog/products') }}">
							<span class="menu-item text-truncate" data-i18n="Products">Ürünler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'catalog' && segments(2) == 'categories' ? 'active' : null }}">
						<a href="{{ site_url('admin/catalog/categories') }}">
							<span class="menu-item text-truncate" data-i18n="Filter Managment">Kategoriler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'catalog' && segments(2) == 'vendors' ? 'active' : null }}">
						<a href="{{ site_url('admin/catalog/vendors') }}">
							<span class="menu-item text-truncate" data-i18n="Vendors">Markalar</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'catalog' && segments(2) == 'variants' ? 'active' : null }}">
						<a href="{{ site_url('admin/catalog/variants') }}">
							<span class="menu-item text-truncate" data-i18n="Varitants">Varyant Sistemi</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'catalog' && segments(2) == 'customization' ? 'active' : null }}">
						<a href="{{ site_url('admin/catalog/customization') }}">
							<span class="menu-item text-truncate" data-i18n="Product Customization">Ürün Özelleştirme</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'catalog' && segments(2) == 'info' ? 'active' : null }}">
						<a href="{{ site_url('admin/catalog/info') }}">
							<span class="menu-item text-truncate" data-i18n="Extra Properties">Ek Bilgiler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'catalog' && segments(2) == 'properties' ? 'active' : null }}">
						<a href="{{ site_url('admin/catalog/properties') }}">
							<span class="menu-item text-truncate" data-i18n="Extra Properties">Ek Özellikler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'catalog' && segments(2) == 'seo-tags' ? 'active' : null }}">
						<a href="{{ site_url('admin/catalog/seo-tags') }}">
							<span class="menu-item text-truncate" data-i18n="SEO+ Tags">SEO+ Etiketleri</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'catalog' && segments(2) == 'filters' ? 'active' : null }}">
						<a href="#">
							<span class="menu-item text-truncate" data-i18n="Filters">Filtreler</span>
						</a>
						<ul class="menu-content">
							<li class="{{ segments(1) == 'catalog' && segments(2) == 'labels' ? 'active' : null }}">
								<a href="{{ site_url('admin/catalog/labels') }}">
									<span class="menu-item text-truncate" data-i18n="Personal Tags">Kişisel Etiketler</span>
								</a>
							</li>
							<li class="{{ segments(1) == 'catalog' && segments(2) == 'feature-groups' ? 'active' : null }}">
								<a href="{{ site_url('admin/catalog/feature-groups') }}">
									<span class="menu-item text-truncate" data-i18n="Product Features">Ürün Özellikleri</span>
								</a>
							</li>
							<li class="{{ segments(1) == 'catalog' && segments(2) == 'price-ranges' ? 'active' : null }}">
								<a href="{{ site_url('admin/catalog/price-ranges') }}">
									<span class="menu-item text-truncate" data-i18n="Price Ranges">Fiyat Aralıkları</span>
								</a>
							</li>
							<li class="{{ segments(1) == 'catalog' && segments(2) == 'filter-settings' ? 'active' : null }}">
								<a href="{{ site_url('admin/catalog/filter-settings') }}">
									<span class="menu-item text-truncate" data-i18n="Filter Settings">Filtre Ayarları</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="" class="d-flex align-items-center">
					<i data-feather="shopping-cart"></i>
					<span class="menu-title text-truncate" data-i18n="Orders">Siparişler</span>
				</a>
				<ul class="menu-content">
					<li class="{{ segments(1) == 'orders' && !segments(2) ? 'active' : null }}">
						<a href="{{ site_url('admin/orders') }}">
							<span class="menu-item text-truncate" data-i18n="Orders">Siparişler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'orders' && segments(2) == 'draft' ? 'active' : null }}">
						<a href="{{ site_url('admin/orders/draft') }}">
							<span class="menu-item text-truncate" data-i18n="Draft Orders">Taslak Siparişler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'orders' && segments(2) == 'payments' ? 'active' : null }}">
						<a href="{{ site_url('admin/orders/payments') }}">
							<span class="menu-item text-truncate" data-i18n="Payments">Ödemeler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'orders' && segments(2) == 'refund-requests' ? 'active' : null }}">
						<a href="{{ site_url('admin/orders/refund-requests') }}">
							<span class="menu-item text-truncate" data-i18n="Refund Requests">İptal ve İade</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'orders' && segments(2) == 'active-carts' ? 'active' : null }}">
						<a href="{{ site_url('admin/orders/active-carts') }}">
							<span class="menu-item text-truncate" data-i18n="Active Carts">Aktif Sepetler</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="menu-item text-truncate" data-i18n="Active Carts">Sepet Hatırlatma</span>
						</a>
						<ul class="menu-content">
							<li class="{{ segments(1) == 'orders' && segments(2) == 'abandoned-carts' ? 'active' : null }}">
								<a href="{{ site_url('admin/orders/abandoned-carts') }}">
									<span class="menu-item text-truncate" data-i18n="Abandoned Carts">Terkedilen Sepetler</span>
								</a>
							</li>
							<li class="{{ segments(1) == 'orders' && segments(2) == 'abandoned' ? 'active' : null }}">
								<a href="{{ site_url('admin/orders/abandoned') }}">
									<span class="menu-item text-truncate" data-i18n="Abandoned Orders">Terkedilen Siparişler</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="{{ segments(1) == 'orders' && segments(2) == 'distributors' ? 'active' : null }}">
						<a href="{{ site_url('admin/orders/distributors') }}">
							<span class="menu-item text-truncate" data-i18n="Distributors">Kişisel Tedarikçiler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'orders' && segments(2) == 'shipping-preferences' ? 'active' : null }}">
						<a href="{{ site_url('admin/orders/shipping-preferences') }}">
							<span class="menu-item text-truncate" data-i18n="Shipping Preferences">Teslimat Ek Ayarları</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'orders' && segments(2) == 'fraud-risks' ? 'active' : null }}">
						<a href="{{ site_url('admin/orders/fraud-risks') }}">
							<span class="menu-item text-truncate" data-i18n="Fraud Risks">Risk Kriterleri</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'orders' && segments(2) == 'invoice-settings' ? 'active' : null }}">
						<a href="{{ site_url('admin/orders/invoice-settings') }}">
							<span class="menu-item text-truncate" data-i18n="Invoice Settings">Fatura Ayarları</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'orders' && segments(2) == 'invoice-design' ? 'active' : null }}">
						<a href="{{ site_url('admin/orders/invoice-design') }}">
							<span class="menu-item text-truncate" data-i18n="Invoice Design">Fatura Tasarlama</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="d-flex align-items-center">
					<i data-feather="clipboard"></i>
					<span class="menu-title text-truncate" data-i18n="Contents">İçerikler</span>
				</a>
				<ul class="menu-content">
					<li class="{{ segments(1) == 'contents' && segments(2) == 'pages' ? 'active' : null }}">
						<a href="{{ site_url('admin/contents/pages') }}">
							<span class="menu-item text-truncate" data-i18n="Pages">Sayfalar</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'contents' && segments(2) == 'articles' ? 'active' : null }}">
						<a href="{{ site_url('admin/contents/articles') }}">
							<span class="menu-item text-truncate" data-i18n="Articles">Makaleler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'contents' && segments(2) == 'polls' ? 'active' : null }}">
						<a href="{{ site_url('admin/contents/polls') }}">
							<span class="menu-item text-truncate" data-i18n="Polls">Anketler</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'contents' && segments(2) == 'forms' ? 'active' : null }}">
						<a href="{{ site_url('admin/contents/forms') }}">
							<span class="menu-item text-truncate" data-i18n="Forms">Formlar</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'contents' && segments(2) == 'settings' ? 'active' : null }}">
						<a href="{{ site_url('admin/contents/settings') }}">
							<span class="menu-item text-truncate" data-i18n="Content Settings">İçerik Ayarları</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="d-flex align-items-center">
					<i data-feather="layers"></i>
					<span class="menu-title text-truncate" data-i18n="Integrations">Entegrasyonlar</span>
				</a>
				<ul class="menu-content">
					<li class="{{ segments(1) == 'contents' && segments(2) == 'integrations' ? 'active' : null }}">
						<a href="{{ site_url('admin/integrations') }}">
							<span class="menu-item text-truncate" data-i18n="Orders">Entegrasyonlar</span>
						</a>
					</li>
					<li class="{{ segments(1) == 'contents' && segments(2) == 'marketplaces' ? 'active' : null }}">
						<a href="{{ site_url('admin/integrations/marketplaces') }}">
							<span class="menu-item text-truncate" data-i18n="Marketplaces">Pazaryerleri</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="navigation-header">
				<span data-i18n="Customer Managment">Müşteri Yönetimi</span>
				<i data-feather="more-horizontal"></i>
			</li>
			<li class="nav-item {{ segments(1) == 'customers' ? 'active' : null }}">
				<a href="{{ site_url('admin/customers') }}" class="d-flex align-items-center">
					<i data-feather="users"></i>
					<span class="menu-title text-truncate" data-i18n="Customers">Müşteriler</span>
				</a>
			</li>
			<li class="navigation-header">
				<span data-i18n="Analytics">Analizler</span>
				<i data-feather="more-horizontal"></i>
			</li>
			<li class="nav-item {{ segments(1) == 'rival-analysis' ? 'active' : null }}">
				<a href="{{ site_url('admin/rival-analysis') }}" class="d-flex align-items-center">
					<i data-feather="bar-chart-2"></i>
					<span class="menu-title text-truncate" data-i18n="Rival Analysis">Rakip Analizi</span>
				</a>
			</li>
			<li class="navigation-header">
				<span data-i18n="Help & More">Yardım & Daha Fazlası</span>
				<i data-feather="more-horizontal"></i>
			</li>
			<li class="nav-item {{ segments(1) == 'support' ? 'active' : null }}">
				<a href="{{ site_url('admin/support') }}" class="d-flex align-items-center">
					<i data-feather="life-buoy"></i>
					<span class="menu-title text-truncate" data-i18n="Support">Destek</span>
				</a>
			</li>
		</ul>
	</div>
</div>
<!-- END: Main Menu-->
