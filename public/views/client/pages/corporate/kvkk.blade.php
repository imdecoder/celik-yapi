@extends('client.layouts.default')

@section('title', $meta['title'] . ' - Çelik Yapı')
@section('description', $meta['description'])
@section('robots', 'index, follow')

@section('styles')
	<style type="text/css">
		.corporate-page .content {
			margin-top: 80px;
		}

		.corporate-page .content p {
			line-height: 28px;
		}

		.corporate-page .content p ul {
			padding: 5px 20px;
		}

		.corporate-page .content p ul li {
			margin-bottom: 10px;
		}

		.corporate-page .content p ul.list-circle li {
			list-style: circle;
		}

		.corporate-page .content p ul.list-square li {
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
						6698 SAYILI KİŞİSEL VERİLERİN KORUNMASI KANUNU (KVKK) BİLGİLENDİRME VE AYDINLATMA METNİ
					</strong>
				</p>
				<br>
				<p>
					<a href="#">
						<u>6698 KVKK VERİ SAHİBİ BAŞVURU FORMU İNDİR</u>
					</a>
					<br>
					<strong>VERİ SORUMLUSU:</strong>
					Firma Adı
					<br>
					<strong>ADRES:</strong>
					19 Mayıs Mah. Ağabali Cad. No: 39/1, İlkadım/Samsun
					<br>
					<strong>VERGİ NO:</strong>
					VERGİ DAİRESİ ADI / VERGİ NUMARASI
				</p>
				<br>
				<br>
				<p>
					<strong>
						Çelik Yapı Market
					</strong>
				</p>
				<p>
					Bundan sonra <strong>"ŞİRKET"</strong> olarak; kişisel verilerinizin işlenmesine,
					korunmasına azami özen gösteriyoruz. Kişisel Verilerin Korunması Kanunu ile ilgili
					mevzuat uyarınca, veri sorumlusu olarak; kişisel verilerin hukuka aykırı olarak işlenmesini
					önlemek, kişisel verilere hukuka aykırı olarak erişilmesini önlemek,
					kişisel verilerin muhafazasını sağlamak amacıyla gerekli her türlü teknik ve
					idari tedbirler alınmaktadır.
				</p>
				<p>
					Bu aydınlatma metni, Kişisel Verilerin Korunması Kanununun ("Kanun") Aydınlatma
					Yükümlülüğünün Yerine Getirilmesinde Uyulacak Usul ve Esaslar Hakkında Tebliğ kapsamında
					veri sorumlusu sıfatıyla <strong>"ŞİRKET"</strong> tarafından hazırlanmıştır.
				</p>
				<p>
					Bu kapsamda, KVK Kanunu’nda tanımlı şekli ile "Veri Sorumlusu" sıfatıyla,
					sizleri aydınlatmak istiyoruz.
				</p>
				<p>
					Bu sorumluluğumuzun tam idraki ile kişisel verilerinizi aşağıda izah edildiği surette ve
					mevzuat tarafından emredilen sınırlar çerçevesinde işlemekteyiz.
					Şirketimiz ile müşteri, tedarikçi, ziyaretçi sıfatı ile paylaştığınız
					kişisel verileriniz KVKK'ya uygun şekilde, faaliyet ve hizmet amaçlarımız ile bağlantılı ve
					ölçülü olarak işlenebilecek, yurtiçindeki üçüncü kişilere aktarılabilecek, saklanacak,
					profilleme için kullanılabilecek ve sınıflandırılabilecektir.
				</p>
				<br>
				<br>
				<p>
					<ol start="1">
						<li>
							<strong>
								1. KİŞİSEL VERİLERİN TOPLANMASI, İŞLENMESİ VE İŞLENME AMAÇLARI:
							</strong>
							<br>
							Kişisel Verilerin Korunması Kanunu ile ilgili mevzuat uyarınca toplanan kişisel verileriniz,
							kanunda öngörülen ilkelere uygun olarak, tamamen veya kısmen, otomatik olarak veyahut
							herhangi bir veri kayıt sisteminin parçası olmak kaydıyla otomatik olmayan yollarla
							elde edilerek, kaydedilerek, depolanarak, değiştirilerek, yeniden düzenlenerek, işlenmektedir.
							<br>
							<br>
							<br>
							<strong>
								Kişisel verileriniz, ŞİRKET faaliyetleri kapsamında Kanunun
								4., 5., 6. maddelerine ve ilgili mevzuata uygun olarak aşağıdaki amaçlar
								doğrultusunda işlenmektedir:
							</strong>
							<br>
							<br>
							<u>Toplanan kişisel verileriniz;</u>
							<ul class="list-circle">
								<li>
									Lojistik Faaliyetlerinin Yürütülmesi
								</li>
								<li>
									Faaliyetlerin Mevzuata Uygun Yürütülmesi
								</li>
								<li>
									Finans Ve Muhasebe İşlerinin Yürütülmesi
								</li>
								<li>
									Firma / Ürün / Hizmetlere Bağlılık Süreçlerinin Yürütülmesi
								</li>
								<li>
									İletişim Faaliyetlerinin Yürütülmesi
								</li>
								<li>
									İş Sürekliliğinin Sağlanması Faaliyetlerinin Yürütülmesi
								</li>
								<li>
									Mal / Hizmet Satış Sonrası Destek Hizmetlerinin Yürütülmesi
								</li>
								<li>
									Mal / Hizmet Satış Süreçlerinin Yürütülmesi
								</li>
								<li>
									Mal / Hizmet Üretim Ve Operasyon Süreçlerinin Yürütülmesi
								</li>
								<li>
									Müşteri İlişkileri Yönetimi Süreçlerinin Yürütülmesi
								</li>
								<li>
									Yetkili Kişi, Kurum Ve Kuruluşlara Bilgi Verilmesi
								</li>
								<li>
									Lojistik Faaliyetlerinin Yürütülmesi
								</li>
								<li>
									Pazarlama Analiz Çalışmalarının Yürütülmesi
								</li>
								<li>
									Talep / Şikayetlerin Takibi
								</li>
								<li>
									Ürün / Hizmetlerin Pazarlama Süreçlerinin Yürütülmesi
								</li>
								<li>
									Reklam / Kampanya / Promosyon Süreçlerinin Yürütülmesi
								</li>
								<li>
									Risk Yönetimi Süreçlerinin Yürütülmesi
								</li>
								<li>
									Ücret Politikasının Yürütülmesi
								</li>
								<li>
									Yatırım Süreçlerinin Yürütülmesi
								</li>
								<li>
									Acil Durum Yönetimi Süreçlerinin Yürütülmesi
								</li>
								<li>
									Bilgi Güvenliği Süreçlerinin Yürütülmesi
								</li>
								<li>
									Faaliyetlerin Mevzuata Uygun Yürütülmesi
								</li>
								<li>
									Firma / Ürün / Hizmetlere Bağlılık Süreçlerinin Yürütülmesi
								</li>
								<li>
									Görevlendirme Süreçlerinin Yürütülmesi
								</li>
								<li>
									İnsan Kaynakları Süreçlerinin Planlanması
								</li>
								<li>
									İş Faaliyetlerinin Yürütülmesi / Denetimi
								</li>
								<li>
									Sözleşme Süreçlerinin Yürütülmesi
								</li>
								<li>
									Şirketimiz ve Şirketimizle iş ilişkisi içerisinde olan ilgili kişilerin
									hukuki, teknik ve ticari-iş güvenliğinin temini amacıyla
									KVKK 5. Ve 6. Maddelerinde belirtilen kişisel veri işleme şartları ve
									amaçları dahilinde işlenecektir.
								</li>
							</ul>
							<br>
							İlgili maddeler gereğince açık rıza alınması gereken durumlarda açık rızanız
							alınmaktadır. Ancak 5.maddenin 2. Fıkrasında yazan şartlara uygun olması
							kaydı ile ilgili kişinin rızası alınmadan kişisel verilerin işlenmesi mümkündür.
							<br>
							<br>
							Kanunların emredici hükümleri gereği gerçek kişilerin bilgilerinin doğru ve
							güncel tutulması esastır. Bu nedenle, belirli zaman aralıkları ile
							kişisel bilgilerinizin güncellenmesi talep edilebilir.
							<br>
							<br>
							<br>
							<strong>
								Yukarıda yazılı amaçlar doğrultusunda, ŞİRKET faaliyetleri ile
								sınırlı olmak üzere, aşağıda yazılı kişisel verileriniz işlenmektedir.
							</strong>
							<br>
							<br>
							<ul class="list-square">
								<li>
									<strong>
										<u>Kimlik Bilgileriniz</u>
									</strong>
									(T.C. kimlik / yabancı kimlik numarası, adınız ve soyadınız, doğum yeri ve tarihi,
									anne ve baba adınız, medeni haliniz, cinsiyetiniz)
								</li>
								<li>
									<strong>
										<u>İletişim bilgileriniz</u>
									</strong>
									(Telefon numaralarınız, iletişim adresi, elektronik posta adresiniz)
								</li>
								<li>
									<strong>
										<u>Lokasyon bilgileriniz</u>
									</strong>
									(İkamet, iş adresiniz, bulunduğunuz yerin konum bilgileri)
								</li>
								<li>
									<strong>
										<u>Finans Bilgileri</u>
									</strong>
									(Faturalandırma ve ödeme bilgileri, banka hesap numarası, IBAN numarası,
									kredi kartı bilgileri, vergi kimlik numarası, vergi dairesi bilgisi, fatura,
									sevk irsaliyeleri, imza sirküleri, teslim tesellüm belgeleri üzerinde
									yer alan kişisel bilgiler, üçüncü kişiler ile yapılan sözleşme eklerinde
									yer alan bilgiler)
								</li>
								<li>
									<strong>
										<u>Pazarlama bilgileriniz</u>
									</strong>
									(Alışveriş geçmişiniz)
								</li>
								<li>
									<strong>
										<u>Hukuki İşlem Bilgileri</u>
									</strong>
									(İlgili kişiler ile olan hukuki irtibat ve sunulan hizmetler, hukuki uyuşmazlıklar
									kapsamında mahkemeler, savcılıklar, arabulucular, hakem heyetleri, adli makamlarla
									yapılan yazışmalardaki kişisel bilgiler, dava ve icra dosyalarındaki bilgiler)
								</li>
								<li>
									<strong>
										<u>Görsel ve İşitsel Kayıtlar</u>
									</strong>
									(Şirket faaliyetleri kapsamında düzenlen belgeler üzerinde yer alan
									fotoğraflarınız, randevu oluşturulması, şirketle iletişim sağlanması ve
									talep şikayet süreçlerinin takibi sırasında basılı formlar, evrak ve
									resmi kimlik belgeleriniz üzerinde yer alan fotoğraf bilgisi, tanıtım,
									bilgilendirme amacıyla şirket internet sayfası, sosyal medya hesaplarımız
									veya yazılı ve görsel medyada, videolar/kamera kayıtlarındaki görüntüleriniz)
								</li>
								<li>
									<strong>
										<u>Fiziksel Mekan Güvenliği Bilgileri</u>
									</strong>
									(Görüntü kaydı alan kamera kayıt bilgileriniz, güvenlik çıkış defter bilgileri,
									tutulan formlardaki bilgiler, araç plaka bilgileri)
								</li>
								<li>
									<strong>
										<u>Talep ve Şikayet Bilgisi</u>
									</strong>
									(İlgili kişilerin, elektronik ve fiziki ortamlardan toplanan bilgiler ve
									kayıtlar, internet ve sosyal medya, online kanallar,
									yönetim sürecine dair bilgiler)
								</li>
							</ul>
						</li>
						<li>
							<strong>
								2. SÜRE
							</strong>
							<br>
							<br>
							Kişisel verileriniz Şirket tarafından 10 (on) yıl saklamaktadır.
							Fiziksel mekan güvenliği bilgileri 1 (bir) ay süreyle saklanacaktır.
							Süre geçtikten sonra kişisel verileriniz Şirket tarafından veya
							talebiniz üzerine Kişisel Verilerin Korunması Kanunu ve ilgili
							yönetmelikler kapsamındaki yöntemler ile silinecek, yok edilecek ve/veya
							anonim hale getirilecektir. Kanunen işlenmesi gereken veriler haricindeki
							kişisel verilerin işlenmesi için verdiğiniz izni her zaman geri alabilirsiniz.
							<br>
							<br>
							<br>
							<strong>
								MADDE 5 - Kişisel verilerin işlenme şartları
							</strong>
							<br>
							<br>
							<br>
							(1) Kişisel veriler ilgili kişinin açık rızası olmaksızın işlenemez.
							<br>
							<br>
							(2) Aşağıdaki şartlardan birinin varlığı hâlinde, ilgili kişinin
							açık rızası aranmaksızın kişisel verilerinin işlenmesi mümkündür:
							<br>
							<br>
							<ol start="1">
								<li>
									Kanunlarda açıkça öngörülmesi.
								</li>
								<li>
									Fiili imkânsızlık nedeniyle rızasını açıklayamayacak durumda
									bulunan veya rızasına hukuki geçerlilik tanınmayan kişinin
									kendisinin ya da bir başkasının hayatı veya beden bütünlüğünün
									korunması için zorunlu olması.
								</li>
								<li>
									Bir sözleşmenin kurulması veya ifasıyla doğrudan doğruya
									ilgili olması kaydıyla, sözleşmenin taraflarına ait
									kişisel verilerin işlenmesinin gerekli olması.
								</li>
								<li>
									Veri sorumlusunun hukuki yükümlülüğünü yerine getirebilmesi
									için zorunlu olması.
								</li>
								<li>
									İlgili kişinin kendisi tarafından alenileştirilmiş olması.
								</li>
								<li>
									Bir hakkın tesisi, kullanılması veya korunması için
									veri işlemenin zorunlu olması.
								</li>
								<li>
									İlgili kişinin temel hak ve özgürlüklerine zarar vermemek kaydıyla,
									veri sorumlusunun meşru menfaatleri için veri işlenmesinin zorunlu olması.
								</li>
							</ol>
							<br>
							<br>
							<br>
							<strong>
								MADDE 6 - Özel nitelikli kişisel verilerin işlenme şartları
							</strong>
							<br>
							<br>
							(1) Kişilerin ırkı, etnik kökeni, siyasi düşüncesi, felsefi inancı, dini, mezhebi veya
							diğer inançları, kılık ve kıyafeti, dernek, vakıf ya da sendika üyeliği, sağlığı,
							cinsel hayatı, ceza mahkûmiyeti ve güvenlik tedbirleriyle ilgili verileri ile biyometrik ve
							genetik verileri özel nitelikli kişisel veridir.
							<br>
							<br>
							(2) Özel nitelikli kişisel verilerin, ilgilinin açık rızası olmaksızın işlenmesi yasaktır.
							<br>
							<br>
							(3) Birinci fıkrada sayılan sağlık ve cinsel hayat dışındaki kişisel veriler,
							kanunlarda öngörülen hâllerde ilgili kişinin açık rızası aranmaksızın işlenebilir.
							Sağlık ve cinsel hayata ilişkin kişisel veriler ise ancak kamu sağlığının korunması,
							koruyucu hekimlik, tıbbî teşhis, tedavi ve bakım hizmetlerinin yürütülmesi,
							sağlık hizmetleri ile finansmanının planlanması ve yönetimi amacıyla,
							sır saklama yükümlülüğü altında bulunan kişiler veya yetkili kurum ve
							kuruluşlar tarafından ilgilinin açık rızası aranmaksızın işlenebilir.
							<br>
							<br>
							(4) Özel nitelikli kişisel verilerin işlenmesinde, ayrıca Kurul tarafından
							belirlenen yeterli önlemlerin alınması şarttır.
						</li>
						<li>
							<strong>
								İŞLENEN KİŞİSEL VERİLERİN KİMLERE VE HANGİ AMAÇLA AKTARILABİLECEĞİ
							</strong>
							<br>
							<br>
							Şirketimiz kişisel verileriniz; 6698 sayılı Kanun'un 8. ve 9. Maddelerinde
							belirtilen kişisel veri işleme şartları ve amaçları çerçevesinde ve öngörülen
							şartlara uymak ve gerekli önlemleri almak kaydıyla, gerçek kişiler veya
							özel hukuk tüzel kişilerine, iş ortaklarımıza, iştirakler ve bağlı ortaklıklarımıza,
							bilişim teknolojileri desteği aldığımız kuruluşlara ve yetkili kamu kurum ve
							kişilerine aktarılabilecektir.
						</li>
						<li>
							<strong>
								YURTDIŞINA AKTARIM
							</strong>
							<br>
							<br>
							KVKK'nın 5 (2) maddesinde belirtilen hukuki sebeplere dayanarak işlenen
							kişisel verileriniz, Şirket’in ürün ve hizmetlerine dair tüm faaliyetlerinin
							veri tabanları yurt dışında olan çevrimiçi yazılım sistemleri aracılığıyla
							gerçekleştirilmesi sebebiyle KVKK'nın 9 (2) maddesindeki yurt dışına aktarım
							şartları doğrultusunda, ilgili kişinin açık rızası temin edilmeksizin,
							<br>
							<br>
							(i) Kişisel Verileri Koruma Kurulu (Bundan sonra "Kurul" olarak anılacaktır.)
							tarafından yeterli korumaya sahip olduğu ilan edilen yabancı ülkelere
							("Yeterli Korumaya Sahip Yabancı Ülke")
							<br>
							<br>
							(ii) Türkiye'deki ve ilgili yabancı ülkedeki veri sorumlularının yeterli
							bir korumayı yazılı olarak taahhüt ettiği ve ilgili aktarım açısından Kurul'un
							izninin bulunduğu yabancı ülke ve/veya ülkeler
							("Yeterli Korumayı Taahhüt Eden Veri Sorumlusunun Bulunduğu Yabancı Ülke") ile
							sınırlı olmak kaydıyla aktarılabilecektir.
							<br>
							<br>
							Yukarıda açıklanan amaçlar kapsamında işlenen kişisel verilerinizin yurt dışına aktarımı,
							KVKK ve ilgili sair mevzuat başta olmak üzere, Kurul tarafından alınan kararlar ve
							ilgili düzenlemelere uygun olarak, Şirketimiz tarafından gerekli özen gösterilerek ve
							gerekli tüm güvenlik önlemler alınarak gerçekleştirilecektir.
						</li>
						<li>
							<strong>
								KİŞİSEL VERİ TOPLAMANIN YÖNTEMİ VE HUKUKİ SEBEPLERİ:
							</strong>
							<br>
							<br>
							<br>
							Kişisel verileriniz, Şirketimiz tarafından değişik yollardan
							(Şirket'in merkezi, satış ofisleri, şubeleri veya diğer
							alt yüklenicileri veya iş ortakları ile iletişime geçebileceğiniz ofis ve
							diğer fiziki ortamlar, internet siteleri, ve benzeri
							elektronik işlem platformları, sosyal medya veya diğer kamuya açık mecralar
							aracılığıyla, düzenleyecekleri eğitim, konferans ve benzeri
							ortamlara katılmanızla, tahkikat yöntemiyle veya diğer grup şirketleri veya
							anlaşmalı oldukları diğer kişi ve kuruluşlar kanalıyla yazılı, sözlü,
							görüntü kaydı veya diğer fiziksel veya elektronik ortamda vs.) elde edilebilir.
							<br>
							<br>
							Kişisel verileriniz, her türlü  yazılı, sözlü, görüntü kaydı veya
							diğer fiziksel veya elektronik ortamda, yukarıda yer verilen amaçlar
							doğrultusunda Şirketçe sunduğumuz ürün ve hizmetlerin belirlenen
							yasal çerçevede sunulabilmesi ve bu kapsamda Şirketimizin sözleşme ve
							yasadan doğan mesuliyetlerini eksiksiz ve doğru bir şekilde
							yerine getirebilmesi gayesi ile edinilir.
							<br>
							<br>
							Kişisel verileriniz, Şirketimiz veya Şirketimiz adına veri işleyen gerçek
							ya da tüzel kişiler tarafından sayılanlarla sınırlı olmamak üzere,
							internet sitesi, dijital kanallar, muhtelif sözleşmeler, elektronik posta,
							başvuru formları gibi araçlar üzerinden, Şirketimiz ile yapılan yazılı veya
							sözlü iletişimler vb. kanallar aracılığıyla sözlü, yazılı veya
							elektronik ortamda toplanmaktadır. Bu amaç ve hukuki sebeplerle toplanan
							kişisel verileriniz KVK Kanunu'nun 5. ve 6. maddelerinde belirtilen
							kişisel veri işleme şartları ve amaçları kapsamında bu metnin
							(1) ve (2) numaralı maddelerinde belirtilen amaçlarla da
							işlenebilmekte ve aktarılabilmektedir.
							<br>
							<br>
							<strong>
								Ayrıca, açık rıza aranmaksızın aşağıda yazılı hukuki sebeplere
								bağlı olarak kişisel verileriniz işlenmektedir.
								Buna göre; kişisel verileriniz,
							</strong>
							<br>
							<br>
							<ul class="list-square">
								<li>
									Kanunlarda açıkça öngörülmesi sebebiyle,
								</li>
								<li>
									Fiili imkânsızlık nedeniyle rızasını açıklayamayacak durumda
									bulunan veya rızasına hukuki geçerlilik tanınmayan kişinin kendisinin
									ya da bir başkasının hayatı veya beden bütünlüğünün korunması
									için zorunlu olması.
								</li>
								<li>
									Şirketimiz ile gerçek ve tüzel kişiler arasındaki sözleşmelerin
									kurulması veya ifasıyla doğrudan doğruya ilgili olması kaydıyla,
									sözleşmenin taraflarına ait kişisel verilerin işlenmesinin gerekli olması,
								</li>
								<li>
									Kişisel verinin, ilgili kişinin kendisi tarafından alenileştirilmiş olması,
								</li>
								<li>
									Bir hakkın tesisi, kullanılması veya korunması için veri işlemenin zorunlu olması,
								</li>
								<li>
									İlgili kişinin temel hak ve özgürlüklerine zarar vermemek kaydıyla, 
									veri sorumlusunun meşru menfaatleri için veri işlenmesinin
									zorunlu olması sebepleriyle,
								</li>
							</ul>
							<br>
							<br>
							<br>
							Kişisel Verilerin Korunması Kanununun 5. ve 6. maddelerine,
							Aydınlatma Yükümlülüğünün Yerine Getirilmesinde Uyulacak Usul ve
							Esaslar Hakkında Tebliğin 5/1-h. maddesine uygun olarak belirtilen
							amaçlara sınırlı olarak işlenmekte, toplanmakta ve aktarılmaktadır.
							Kişisel verileriniz şirket faaliyetleri kapsamında ilgili mevzuatlarda
							yazılı süre kadar muhafaza edilerek saklanmaktadır.
						</li>
						<li>
							<strong>
								Kanunun 11. maddesi uyarıca; herkes,
								veri sorumlusuna başvurarak kendisiyle ilgili olarak;
							</strong>
							<br>
							<br>
							<ul class="list-square">
								<li>
									Kişisel veri işlenip işlenmediğini öğrenme,
								</li>
								<li>
									Kişisel verileri işlenmişse buna ilişkin bilgi talep etme,
								</li>
								<li>
									Kişisel verilerin işlenme amacını ve bunların amacına uygun
									kullanılıp kullanılmadığını öğrenme
								</li>
								<li>
									Yurt içinde veya yurt dışında kişisel verilerin aktarıldığı
									üçüncü kişileri bilme,
								</li>
								<li>
									Kişisel verilerin eksik veya yanlış işlenmiş olması hâlinde bunların
									düzeltilmesini isteme,
								</li>
								<li>
									KVKK'nın 7. maddesinde öngörülen şartlar çerçevesinde kişisel verilerin
									silinmesini veya yok edilmesini isteme,
								</li>
								<li>
									Kişisel verilerin düzeltilmesi, silinmesi, yok edilmesi halinde bu işlemlerin,
									kişisel verilerin aktarıldığı üçüncü kişilere de bildirilmesini isteme,
								</li>
								<li>
									İşlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi
									suretiyle kişinin kendisi aleyhine bir sonucun ortaya çıkmasına itiraz etme,
								</li>
								<li>
									Kişisel verilerin kanuna aykırı olarak işlenmesi sebebiyle zarara uğraması
									hâlinde zararın giderilmesini talep etme, haklarına sahiptir.
								</li>
							</ul>
						</li>
						<li>
							<strong>
								KİŞİSEL VERİ SAHİBİNİN HAKLARI (Başvuru Hakkı):
							</strong>
							<br>
							<br>
							<br>
							Kişisel Verileri Koruma Kanununun "ilgili kişinin haklarını düzenleyen" 11 inci maddesi
							kapsamındaki taleplerinizi, Veri Sorumlusuna Başvuru Usul ve Esasları Hakkında Tebliğe
							göre veri sorumlusu olarak;
							<strong>DOKUZ EYLÜL MAHALLESİ HAVA EĞİTİM YOLU SOKAK NO: 12 / GAZİEMİR, İZMİR</strong>
							adresine, kişisel veri sahibi olan ilgili kişinin
							<strong>http://www.caglayan-ahsap.com</strong> adresinde yer alan
							<strong>BAŞVURU FORMUNU</strong> doldurarak, formun imzalı bir nüshasını
							şirket adresine kimliğinizi tespit edici belgeler ile bizzat elden iletebilir,
							güvenli elektronik imza, mobil imza ya da şirketimize bildirdiğiniz ve şirketimiz
							sisteminde kayıtlı bulunan elektronik posta adresini kullanmak suretiyle
							<strong>caglayanyapi.market@hs02.kep.tr</strong> adresine elektronik posta göndererek,
							yapacağınız şahsi başvuru ile, Noter vasıtasıyla yapacağınız başvuru veya
							Kişisel Verileri Koruma Kurumunun belirlediği yöntemlerle iletebilirsiniz.
							<br>
							<br>
							<br>
							6698 sayılı KVK Kanunu 13/1. maddesi uyarınca, yukarıda belirtilen haklarınızı
							kullanmak amacıyla yapacağınız başvurularınızı yazılı olarak veya
							KVK Kurumunun belirlediği yukarıda yazılı yöntemlerle Şirketimize
							iletmeniz gerekmektedir.
							<br>
							<br>
							Şirketimiz, başvuruda yer alan taleplerinizi, talebin niteliğine göre en kısa sürede
							ve en geç otuz gün içinde ücretsiz olarak sonuçlandıracaktır.
							<br>
							<br>
							Ancak, işlemin ayrıca bir maliyeti gerektirmesi hâlinde, Kurulca belirlenen tarifedeki
							ücret talep edilecektir. Bu kapsamda ilgili kişinin başvurusuna yazılı olarak cevap verilmesi
							halinde, on sayfaya kadar ücret alınmayacak, on sayfanın üzerindeki her bir sayfa için
							1 TL işlem ücreti alınacaktır.
							<br>
							<br>
							Başvuruya karşı verilecek cevabın CD, flaş bellek gibi elektronik kayıt ortamında verilmesi
							halinde şirketimiz tarafından talep edilebilecek ücret kayıt ortamının gerektirdiği
							maliyet miktarını geçmeyecektir.
							<br>
							<br>
							6698 sayılı Kişisel Verilerin Korunması Kanunu'nun
							"Veri Sorumlusunun Aydınlatma Yükümlülüğü" başlıklı 10. maddesi gereğince kişisel
							verilerimin kim tarafından, hangi amaçla işleneceği, işlenen kişisel verilerin kimlere ve
							hangi amaçla aktarılabileceği, kişisel veri toplamanın yöntemi ve hukuki sebebi ve
							Kanun'un 11. maddesinde yer alan haklarım konusunda hazırlanan işbu Aydınlatma Metnini okudum,
							anladım ve veri sorumlusu sıfatına sahip,
							<br>
							<br>
							<br>
							<strong>"ŞİRKET"</strong> tarafından bu konuda detaylı olarak bilgilendirildim.
							<br>
							<br>
							<strong>
								ETK ONAY FORMU
							</strong>
							<br>
							<br>
							6563 sayılı Elektronik Ticaretin Düzenlenmesi Hakkında Kanun ("ETK") kapsamında
							Çelik Yapı (celikyapimarket.com.tr) tarafından yapılacak tüm elektronik
							iletişimlere onay veriyorum.
							<br>
							<br>
							Tarafınızdan gönderilecek bilgilendirme ve kampanya e-postalarını,
							SMS'lerini ve arama'larını almak istiyorum.
						</li>
					</ol>
				</p>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
@endsection
