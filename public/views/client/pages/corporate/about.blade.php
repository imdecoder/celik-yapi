@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'index, follow')

@section('styles')
	<style type="text/css">
		.zoa-info a {
			color: #777;
		}

		.zoa-info a:hover {
			color: #fff;
		}
	</style>
@endsection

@section('content')

	@include('client.pages.shared.breadcrumb')

	<div class="container container-content">
		<div class="zoa-about text-center">
			<h3>
				Hakkımızda
			</h3>
			<div class="about-banner">
				<div class="hover-images">
					<img src="{{ asset_url('client/img/about/hakkimizda.jpg') }}" alt="Hakkımızda" class="img-responsive">
				</div>
				<div class="zoa-info">
					<div class="container">
						<div class="zoa-inside flex align-items-center justify-center">
							<p>
								<a href="#map"> <!-- TODO: target="_blank" -->
									19 Mayıs Mah. Ağabali Cad. No: 39/1
								</a>
							</p>
							<p>
								<a href="tel:+905426715320">
									+90 542 671 53 20
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="about-content bd-bottom">
			<div class="row">
				<div class="col-md-7 col-sm-6 col-xs-12">

					<!--<div class="about-sm">
						<div class="hover-images">
							<img src="{{ asset_url('client/img/about/small_img.jpg') }}" alt="Hakkımızda" class="img-responsive">
						</div>
					</div>-->

					<div class="about-info">
						<h2>
							Çelik Yapı
							<br>
							<span>Market</span>
						</h2>
						<div class="about-desc">
							<p>
								Hızla gelişen teknoloji ile sınırsız insan ihtiyaçlarını karşılamak için 1995 yılında,
								yöneticisi olan <strong>Arif Çelik</strong> ve uzman personeli ile <strong>Çelik Yapı</strong> adı altında
								Yapı Market sektörüne ilk adımını attılar. Binlerce çeşit ürünle müşterilerimizin ihtiyaçlarına
								cevap verebilmek için mağazada dekoratif ürünlerden mobilya aksesuarlarına, inşaat ürünlerinden mutfak,
								banyo ve seramiğe, bahçe mobilyalarından aydınlatma ürünlerine, hazır perdeye, halıdan boyaya ve
								parkeye kadar on binlerce ürün satmakta. 2024 yılından itibaren <strong>Çelik Yapı Market</strong> ünvanı ile
								tüm yapı ürünlerini kapsayacak şekilde ve ürün yelpazesini genişleterek	faaliyetlerini sürdürmektedir.
							</p>
							<p>
								İstikrarlı, kararlı, kaliteli satış ilkeleri ve kaliteli ürün çeşitleri ile müşterilerine
								hizmet etmeyi benimseyen firmamız bu ilkelerinden hiçbir zaman ödün vermemiştir.
								Sektördeki önceliğini yaptığı yatırımlar ve aldığı istikrarlı kararlarla sürdürmektedir.
								<br>
								1995 Yılından bu yana Yapı Aksesuarları konusunda hizmet vermekte olan <strong>Çelik Yapı</strong> artan müşteri
								talebine daha iyi hizmet verebilmek için gelişimine devam etmekdedir.
							</p>
							<p>
								Uzman ve nitelikli personelleri ile koşulsuz müşteri memnuniyeti ilkesi ve ödün vermediği,
								kalitesiyle tüm ilişkilerinde dürüstlüğü ilke edinerek çalışmalarına devam eden firmamız
								zaman içerisinde Samsun'un ve Karadeniz bölgesinin kendi sektöründeki en önemli
								firmalarından biri haline gelmiş, Faaliyete başladığı ilk günden beri, sektörde kalitenin ve
								yeniliğin öncüsü olan firmamız, hem yatırımlarına hem de araştırma, geliştirme ve
								pazarlama faaliyetlerine hız kesmeden devam ederek, hem sizlere hak ettiğiniz kaliteyi
								en uygun şartlarda sunmaya devam edecek, hemde sektörde faaliyet gösteren işletmelere ürün ve
								hizmet sunmakla birlikte, edinilmiş tecrübelerini de paylaşmak suretiyle sektörün gelişmesine,
								hem de ülke ekonomisine katkısını sürdürecektir.
							</p>
						</div>
						
						<!--<div class="sign">
							<img src="{{ asset_url('client/img/about/signature.jpg') }}" alt="İmza" class="img-responsive">
						</div>-->

					</div>
				</div>
				<div class="col-md-5 col-sm-6 col-xs-12">
					<div class="about-img">
						<div class="hover-images">
							<img src="{{ asset_url('client/img/about/hakkimizda-2.jpg') }}" alt="Hakkımızda" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="about-bottom bd-bottom">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12 about-element">
					<h3>
						Misyonumuz
					</h3>
					<p>
						Sektörümüzdeki gelişmeleri yakından izleyerek, şirketimizin başarısını ve
						ürünlerimizin kalitesini etkileyen tüm süreçleri sürekli olarak iyileştirmek,
						Müşterilerimizin gereksinimlerini zaman-fiyat-kalite yönünden en uygun koşullarda
						karşılamak, verimliliğimizi arttırarak şirketimizin karlılığını üst düzeye çıkarmak,
						çalışanlarımızın sağlık ve iş güvenliğini gözeterek her türlü iş kazasını
						en aza indirmek ve çevreyi korumak, dürüst ve güvenilir bir firma olarak
						müşterilerimizin memnuniyetini sağlamaktır.
					</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 about-element">
					<h3>
						Vizyonumuz
					</h3>
					<p>
						Sahip olduğumuz deneyim ve bilgi birikimini arttırarak, hizmet ve kalite açısından
						sektörümüzde lider bir kuruluş olmak, edindiğimiz bilgi birikimini diğer çözüm ortaklarına
						verdiğimiz hizmet anlayışıyla paylaşmak sureti ile faaliyet gösterdiğimiz sektörde diğer
						yabancı sermayeli kurumsal firmaların çizgisinde Türk gücünün, Türk girişimciliğinin,
						Türk sermayesinin ve Türk insanının da aynı çizgide yol kat etmelerine önderlik etmektir.
					</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 about-element">
					<h3>
						Değerlerimiz
					</h3>
					<p>
						Saygı ve Bağlılık, "Biz" olmak, Yaratıcılık, Liderlik.
					</p>
				</div>
			</div>
		</div>
	</div>

	@if ($vendors)

		<div class="container">
			<div class="about-brand">
				<div class="owl-carousel owl-theme js-owl-team">

					@foreach ($vendors as $vendor)

						<div class="brand-item">
							<a href="{{ site_url('marka/' . $vendor->slug) }}" class="hover-images">
								<img src="{{ asset_url('client/img/default.jpg') }}" alt="{{ $vendor->name }}" class="img-responsive">
							</a>
						</div>

					@endforeach

				</div>
			</div>
		</div>

	@endif

@endsection

@section('scripts')
@endsection
