<a href="#" class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	<div class="user-nav d-sm-flex d-none">
		<span class="user-name fw-bolder">{{ $logged_user->firstname }}</span>
		<span class="user-status">{{ $logged_user->group_name }}</span>
	</div>
	<span class="avatar">
		<img src="{{ $logged_user->avatar }}" alt="{{ $logged_user->firstname }}" width="40" height="40" class="round">
		<!--<span class="avatar-status-online"></span>-->
	</span>
</a>
<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
	<a href="{{ site_url('admin/users/edit/' . $logged_user->id) }}" class="dropdown-item">
		<i class="me-50" data-feather="user"></i>
		Profil
	</a>
	<!--<a href="{{ site_url('admin/email/inbox') }}" class="dropdown-item">
		<i class="me-50" data-feather="mail"></i>
		E-posta Kutusu
	</a>
	<a href="{{ site_url('admin/todo') }}" class="dropdown-item">
		<i class="me-50" data-feather="check-square"></i>
		Görevler
	</a>
	<a href="{{ site_url('admin/messages') }}" class="dropdown-item">
		<i class="me-50" data-feather="message-square"></i>
		Mesajlar
	</a>-->
	<div class="dropdown-divider"></div>
	<a href="{{ site_url('admin/settings') }}" class="dropdown-item">
		<i class="me-50" data-feather="settings"></i>
		Ayarlar
	</a>
	<!--<a href="{{ site_url('admin/faq') }}" class="dropdown-item">
		<i class="me-50" data-feather="help-circle"></i>
		SSS
	</a>-->
	<a href="{{ site_url('admin/logout') }}" class="dropdown-item">
		<i class="me-50" data-feather="power"></i>
		Çıkış Yap
	</a>
</div>
