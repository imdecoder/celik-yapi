@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'index, follow')

@section('styles')
	<style type="text/css">
		.corporate-page .content {
			margin-top: 80px;
			margin-bottom: 40px;
		}

		.corporate-page .content p {
			line-height: 28px;
		}

		.corporate-page .content ul,
		.corporate-page .content ol {
			padding: 5px 20px;
		}

		.corporate-page .content ul:first-child,
		.corporate-page .content ol:first-child {
			padding: 5px 0;
		}

		.corporate-page .content ul,
		.corporate-page .content ol {
			list-style: initial;
		}

		.corporate-page .content li {
			margin-bottom: 10px;
		}

		.corporate-page .content .list-circle li {
			list-style: circle;
		}

		.corporate-page .content .list-square li {
			list-style: square;
		}
	</style>
@endsection

@section('content')

	@include('client.pages.corporate.shared.breadcrumb')

	<div class="corporate-page">
		<div class="container">
			<h1>
				{{ $meta['title'] }}
			</h1>
			<div class="content">
				<p class="text-center">
					<strong>
						Çerez Politikası
					</strong>
				</p>
				<br>
				<br>
				<p>
					<strong>ÇELİK SIHHİ TESİSAT</strong> (<strong>"ŞİRKET"</strong> veya olarak anılacaktır.)
					olarak
					<a href="{{ site_url() }}">
						celikyapimarket.com.tr
					</a>
					web sitesinde ("Site"), sitenin uzantılarında, uygulamalarımız
					yahut dijital ortamda sizlerin kullanımına sunduğumuz benzeri tüm çevrimiçi
					veya çevrimdışı mecralarımızı
					(anılan tüm mecralar birlikte "Platform" olarak anılacaktır.)
					kullanımınız veya ziyaretiniz sırasında sizlerin deneyimini geliştirmek için çerezler,
					birtakım teknolojilerden ("çerezler") faydalanmaktayız. 
					<br>
					<br>
					Bu teknolojilerin kullanımı başta 6698 sayılı Kişisel Verilerin Korunması Kanunu
					("KVKK" veya "Kanun") olmak üzere tabi olduğumuz mevzuata uygun şekilde
					gerçekleştirilmektedir.
					<br>
					<br>
					İşbu Çerez Politikası'nın amacı, Platformların kullanımı esnasında kullanılmakta
					olan çerezler kullanılarak kişisel verilerin işlenmesi nedeniyle elde edilen
					kişisel verilere ilişkin sizlere bilgi vermektir. İşbu metinde sitemizde ve
					uygulamalarımızda hangi amaçlarla hangi tür çerezleri kullandığımızı ve
					bu çerezleri nasıl kontrol edebileceğinizi sizlere açıklamak istiyoruz.
					<br>
					<br>
					Şirket olarak sitemizde ve uygulamalarımızda kullandığımız çerezleri gerekmesi
					durumunda kullanmaktan vazgeçebilir, bunların türlerini veya fonksiyonlarını
					değiştirebilir veya sitemize ve uygulamalarımızda yeni çerezler ekleyebiliriz.
					Dolayısıyla işbu Çerez Politikası'nın hükümlerini dilediğimiz zaman değiştirme
					hakkını saklı tutarız. Güncel Çerez Politikası üzerinde gerçekleştirilmiş olan
					her türlü değişiklik sitede, uygulamada veya herhangi bir kamuya açık mecrada
					yayınlanmakla birlikte yürürlük kazanacaktır. Son güncelleme tarihini metnin
					sonunda bulabilirsiniz.
					<br>
					<br>
					<u>
						Kişisel verilerinizin şirketimiz tarafından işlenme amaçları konusunda detaylı bilgilere;
					</u>
					<a href="{{ site_url('kvkk') }}" target="_blank">
						<strong>
							<u>Şirket Kişisel Verilerin Korunması ve İşlenmesi Politikasından ulaşabilirsiniz.</u>
						</strong>
					</a>
					<br>
					<br>
					<br>
					<strong>
						Kişisel Veri Toplamanın Yöntemi ve Hukuki Sebebi
					</strong>
					<br>
					<br>
					Kişisel verileriniz, internet sitemizi ziyaretiniz kapsamında veya uygulamalarımızı
					kullanmanız dolayısıyla elektronik ortamda çerezler yoluyla Şirketimizin
					meşru menfaati hukuki sebebine dayalı olarak toplanmaktadır.
					Hedefleme ve profilleme vasıtasıyla gerçekleştirilen tanıtım faaliyetleri ise
					yalnızca açık rızanız olması halinde gerçekleştirilmektedir.
					Toplanan kişisel verileriniz Kanun'un 5. ve 6. maddelerinde belirtilen
					kişisel veri işleme şartları ve amaçları kapsamında işbu Çerez Politikasında
					belirtilen amaçlarla da işlenebilmektedir.
					<br>
					<br>
					<br>
					<strong>
						Kişisel Verilerin Kimlere ve Hangi Amaçla Aktarılabileceği
					</strong>
					<br>
					<br>
					Şirket olarak, Çerez Politikası kapsamındaki kişisel verilerinizi
					yukarıda belirtilen amaçların gerçekleştirilebilmesi ile sınırlı olarak ve
					mevzuata uygun şekilde, kanunen yetkili kamu kurumlarıyla paylaşabiliriz.
					<br>
					<br>
					<br>
					<strong>
						Hangi Çerezler Hangi Amaçlarla Kullanılmaktadır?
					</strong>
					<br>
					<br>
					ŞİRKET olarak sitemizde ve uygulamalarımızda çeşitli amaçlarla çerezler
					kullanmakta ve bu çerezler vasıtasıyla kişisel verilerinizi işlemekteyiz.
					Bu amaçlar başlıca şunlardır:
					<ul class="list-circle">
						<li>
							<strong>
								Sitenin ve uygulamaların çalışması için gerekli
								temel fonksiyonları gerçekleştirmek.
							</strong>
							Örneğin, oturum açan üyelerin Sitede farklı sayfaları ziyaret ederken
							tekrar şifre girmelerine gerek kalmaması.
						</li>
						<li>
							<strong>
								Siteyi ve uygulamaları analiz etmek,
								Site'nin ve uygulamaların performansını arttırmak.
							</strong>
							Örneğin, Site'nin üzerinde çalıştığı farklı sunucuların entegrasyonu,
							Siteyi ziyaret edenlerin sayısının tespit edilmesi ve buna göre performans
							ayarlarının yapılması ya da ziyaretçilerin aradıklarını bulmalarının kolaylaştırılması.
						</li>
						<li>
							<strong>
								Sitenin ve uygulamaların işlevselliğini arttırmak ve
								kullanım kolaylığı sağlamak.
							</strong>
							Örneğin, Siteyi ziyaret eden ziyaretçinin daha sonraki ziyaretinde
							kullanıcı adı bilgisinin ya da arama sorgularının hatırlanması.
						</li>
						<li>
							<strong>
								Kişiselleştirme, hedefleme ve reklamcılık faaliyeti gerçekleştirmek.
							</strong>
							Örneğin, ziyaretçilerin görüntüledikleri sayfa ve ürünler üzerinden
							ziyaretçilerin ilgi alanlarıyla bağlantılı reklam gösterilmesi.
						</li>
					</ul>
					<br>
					<br>
					<br>
					<strong>
						Sitemizde ve Uygulamalarımızda Kullanılan Çerezler
					</strong>
					<br>
					<br>
					Aşağıda sitemizde ve uygulamalarımızda kullandığımız farklı türdeki çerezleri bulabilirsiniz.
					Sitemizde ve uygulamalarımızda hem birinci parti çerezler
					(ziyaret ettiğiniz site tarafından yerleştirilen) hem de üçüncü parti çerezleri
					(ziyaret ettiğiniz site haricindeki sunucular tarafından yerleştirilen) kullanılmaktadır.
					<br>
					<br>
					<strong>
						Zorunlu Çerezler
					</strong>
					<br>
					<br>
					Belli çerezlerin kullanımı sitemizin ve uygulamalarımızın doğru biçimde çalışması
					için zorunludur. Örneğin sitemizde oturum açtığınızda devreye giren kimlik doğrulama
					çerezleri, sitemizde bir sayfadan diğerine geçişinizde etkin olan oturumunuzun
					devam etmesini sağlamaktadır.
					<br>
					<br>
					<br>
					<strong class="text-center">
						Tercih Çerezleri
					</strong>
					<br>
					<br>
					Bu çerezler sizlerin site ve uygulama üzerindeki tercihlerini ve seçimlerinizi
					hatırlayarak sitemizde sunulan hizmetlerin sizin için kişiselleşmesini sağlamaktadır.
					Örneğin sitemiz üzerindeki dil seçiminizi veya bir metin okurken seçmiş olduğunuz
					font boyutunu hatırlamamızı sağlar.
					<br>
					<br>
					<br>
					<strong class="text-center">
						Sosyal Medya Çerezleri
					</strong>
					<br>
					<br>
					Bu çerezler sizlerin sosyal medya kullanımlarınız hakkında bilgilerin toplanmasını sağlar.
					Örneğin Kişiselleştirilmiş reklamlar oluşturulması ya da market araştırmaları yapılması
					için Facebook/Twitter hesaplarınıza ait bilgilerin kullanılması için çerezler kullanılabilir.
					<br>
					<br>
					<br>
					<strong>
						Performans ve Analiz Çerezleri
					</strong>
					<br>
					<br>
					Bu çerezler sayesinde sitemizi ve uygulamalarımızı kullanımınızı ve performans
					analizi yaparak sizlere verdiğimiz hizmetleri daha iyi hale getirebiliyoruz.
					Örneğin bu çerezler sayesinde ziyaretçilerimizin en çok hangi sayfaları görüntülediğini,
					sitemizin gerektiği gibi çalışıp çalışmadığını ve olası problemleri tespit edebiliyoruz.
					<br>
					<br>
					<br>
					<strong>
						Hedefleme veya Reklam Çerezleri
					</strong>
					<br>
					<br>
					Sizlere sitemizde veya sitemiz haricindeki mecralarda ürün ve hizmet tanıtımını
					yapmak için çerezler kullanıyoruz. Ayrıca bazı iş ortaklarımızla sizlere sitemiz
					dahilinde veya dışında reklam ve tanıtım yapmak için iş birliğine gidebiliriz.
					Örneğin, sitemizde gördüğünüz bir reklama tıklayıp tıklamadığınızı,
					eğer reklam ilginizi çektikten sonra o reklam yönlendirdiği sitedeki hizmetten
					faydalanıp faydalanmadığınızı takip etmek için çerezler kullanılabilmektedir.
					<br>
					<br>
					<br>
					<strong>
						Çerezlerin Kullanımını Nasıl Kontrol Edebilirim?
					</strong>
					<br>
					<br>
					Çerez ve benzeri teknolojilerin kullanımı konusunda ziyaretçi ve kullanıcılarımızın
					tercihleri bizler için esastır. Buna karşın, Platformun çalışması için zorunlu
					olan Çerezlerin kullanılması gerekmektedir. Ek olarak bazı çerezlerin kapatılması
					halinde Platformun birtakım işlevlerinin kısmen ya da tamamen çalışmayabileceğini
					hatırlatmak isteriz.
					<br>
					<br>
					Platformda kullanılan çerezlere dair tercihlerinizi ne şekilde yönetebileceğinize
					ilişkin bilgiler aşağıdaki gibidir:
					<ul class="list-circle">
						<li>
							Ziyaretçiler, Platformu görüntüledikleri tarayıcı ayarlarını değiştirerek
							çerezlere ilişkin tercihlerini kişiselleştirme imkânına sahiptir.
							Eğer kullanılmakta olan tarayıcı bu imkânı sunmaktaysa,
							tarayıcı ayarları üzerinden çerezlere ilişkin tercihleri değiştirmek mümkündür.
							Böylelikle, tarayıcının sunmuş olduğu imkânlara göre farklılık gösterebilmekle
							birlikte, veri sahiplerinin çerezlerin kullanılmasını engelleme,
							çerez kullanılmadan önce uyarı almayı tercih etme veya sadece bazı çerezleri
							devre bırakma ya da silme imkânları bulunmaktadır.
						</li>
						<li>
							Bu konudaki tercihler kullanılan tarayıcıya göre değişiklik göstermekle
							birlikte genel açıklamaya
							<a href="https://www.aboutcookies.org" target="_blank">
								<u>https://www.aboutcookies.org</u>
							</a>
							adresinden ulaşmak mümkündür. Çerezlere ilişkin tercihlerin,
							ziyaretçinin Platforma erişim sağladığı her bir cihaz özelinde ayrı ayrı
							yapılması gerekebilecektir. 
						</li>
						<li>
							Google Analytics tarafından yönetilen çerezleri kapatmak için
							<a href="#"> <!-- TODO: Geliştir! -->
								<u>tıklayınız.</u>
							</a>
						</li>
						<li>
							Google tarafından sağlanan kişiselleştirilmiş reklam deneyimini yönetmek için
							<a href="#"> <!-- TODO: Geliştir! -->
								<u>tıklayınız.</u>
							</a> 
						</li>
						<li>
							Birçok firmanın reklam faaliyetleri için kullandığı çerezler bakımından tercihler
							<a href="#"> <!-- TODO: Geliştir! -->
								<u>Your Online Choices</u>
							</a>
							üzerinden yönetilebilir. 
						</li>
						<li>
							Mobil cihazlar üzerinden çerezleri yönetmek için mobil cihaza ait
							ayarlar menüsü kullanılabilir. 
						</li>
						<li>
							Tarayıcınızın ayarlarını değiştirerek çerezlere ilişkin tercihlerinizi
							kişiselleştirme imkânına sahipsiniz.
						</li>
					</ul>
					<table>
						<tr>
							<td class="text-center">
								Adobe Analytics
							</td>
							<td class="text-center">
								<a href="http://www.adobe.com/uk/privacy/opt-out.html" target="_blank">
									<u>
										http://www.adobe.com/uk/privacy/opt-out.html
									</u>
								</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">
								AOL
							</td>
							<td class="text-center">
								<a href="https://help.aol.com/articles/restore-security-settings-and-enable-cookie-settings-on-browser" target="_blank">
									<u>
										https://help.aol.com/articles/restore-security-settings-and-enable-cookie-settings-on-browser
									</u>
								</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">
								Google Adwords
							</td>
							<td class="text-center">
								<a href="https://support.google.com/ads/answer/2662922?hl=en" target="_blank">
									<u>
										https://support.google.com/ads/answer/2662922?hl=en
									</u>
								</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">
								Google Analytics
							</td>
							<td class="text-center">
								<a href="https://tools.google.com/dlpage/gaoptout" target="_blank">
									<u>
										https://tools.google.com/dlpage/gaoptout
									</u>
								</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">
								
							</td>
							<td class="text-center">
								<a href="" target="_blank">
									<u>
										
									</u>
								</a>
							</td>
						</tr>
					</table>
				</p>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
@endsection
