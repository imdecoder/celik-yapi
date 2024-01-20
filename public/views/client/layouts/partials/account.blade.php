<!-- Account -->
<div class="account-form-wrapper">
	<div class="container">
		<div class="search-results-wrapper">
			<div class="btn-search-close">
				<i class="ion-ios-close-empty black"></i>
			</div>
		</div>
		<div class="account-wrapper">
			<ul class="account-tab text-center">
				<li class="active">
					<a href="#login" data-toggle="tab">
						Giriş Yap
					</a>
				</li>
				<li>
					<a href="#register" data-toggle="tab">
						Kayıt Ol
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade in active" id="login">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<form method="post" class="form-customer form-login">
								<div class="form-group">
									<label for="email">
										E-posta adresi
									</label>
									<input type="email" name="email" class="form-control form-account" id="email">
								</div>
								<div class="form-group">
									<label for="password">
										Şifre
									</label>
									<input type="password" name="password" class="form-control form-account" id="password">
								</div>
								<div class="btn-button-group mg-top-30 mg-bottom-15">
									<button type="submit" class="zoa-btn btn-login hover-white">
										Giriş Yap
									</button>
								</div>
							</form>
							<!--<div class="social-group-button">
								<a href="" class="twitter button">
									<div class="slide">
										<p>
											Connect with Twitter
										</p>
									</div>
									<div class="icon">
										<i class="fa fa-twitter">
										</i>
									</div>
								</a>
								<a href="" class="facebook button">
									<div class="slide">
										<p>
											Connect with Facebook
										</p>
									</div>
									<div class="icon">
										<i class="fa fa-facebook">
										</i>
									</div>
								</a>
							</div>-->
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
				<div class="tab-pane fade" id="register">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<form method="post" class="form-customer form-login">
								<div class="form-group">
									<label for="firstname">
										Ad
									</label>
									<input type="text" name="firstname" class="form-control form-account" id="firstname">
								</div>
								<div class="form-group">
									<label for="lastname">
										Soyad
									</label>
									<input type="text" name="lastname" class="form-control form-account" id="lastname">
								</div>
								<div class="form-group">
									<label for="email">
										E-posta adresi
									</label>
									<input type="email" name="email" class="form-control form-account" id="email">
								</div>
								<div class="form-group">
									<label for="password">Şifre</label>
									<input type="password" name="password" class="form-control form-account" id="password">
								</div>
								<div class="btn-button-group mg-top-30 mg-bottom-15">
									<button type="submit" class="zoa-btn btn-login hover-white">
										Kayıt Ol
									</button>
								</div>
							</form>
							<span class="text-note">
								<a href="#">Gizlilik & Şartları</a> okudum ve kabul ediyorum.
							</span>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Account -->
