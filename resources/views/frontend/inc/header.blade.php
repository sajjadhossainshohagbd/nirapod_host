<!-- ***** NEWS ***** -->
<div class="sec-bg3 p-2 pe-3 infonews">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 news">
				{{-- <div class="m-0 h6">
					<div class="badge bg-purple me-2"><span class="align-text-top">Update</span>
					</div> <small class="text-light">10% discount for new user!. <a class="c-yellow" href="gaming">Take the offer! <i class="fas fa-arrow-circle-right"></i></a></small>
				</div> --}}
			</div>
			<div class="col-md-6 link">
				<div class="infonews-nav float-end"> 
					<a href="{{ route('contact.us') }}">Support</a>
					<a href="{{ Settings('login_btn_url') }}">Login</a>
					<a href="tel:{{ Settings('header_phone') }}">{{ Settings('header_phone') }}</a>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- <style>
	.menu-wrap .nav-menu .main-menu a{
		color: {{ Settings('header_menu_color') }} !important;
	}
</style> --}}
<!-- ***** NAV MENU DESKTOP ****** -->
<div class="menu-wrap desktop" >
	<div class="nav-menu">
		<div class="container">
			<div class="row">
				<div class="col-2 col-md-2" style="background: {{ Settings('header_menu_background') }} !important;padding: 10px; text-align: -webkit-center">
					<a href="{{ url('/') }}">
						<img class="svg logo-menu" src="{{ asset(Settings('logo')) }}" alt="Logo">
					</a>
				</div>
				<nav id="menu" class="col-10 col-md-10">
					<div class="navigation float-end">
						<button class="menu-toggle"> <span class="icon"></span>
							<span class="icon"></span>
							<span class="icon"></span>
						</button>
						<ul class="main-menu nav navbar-nav navbar-right">
							@foreach(json_decode(Settings('header_menus')) as $key => $option)
							<li class="menu-item me-2">
								<a class="m-0 pe-1 " href="{{ $option->menu_url }}">{{ $option->menu_name }}</a>
							</li>
							@endforeach
							<li class="menu-item">
								<a class="pe-0 me-0" href="{{ Settings('login_btn_url') }}">
									<div class="btn btn-default-yellow-fill question"> <i class="fas fa-lock ps-1"></i> 
									</div>
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- ***** NAV MENU MOBILE ****** -->
<div class="menu-wrap mobile">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<a href="index">
					<img class="svg logo-menu" src="{{ asset(Settings('logo')) }}" alt="Logo">
				</a>
			</div>
			<div class="col-6">
				<nav class="nav-menu">
					<button id="nav-toggle" class="menu-toggle"> 
						<span class="icon"></span>
						<span class="icon"></span>
						<span class="icon"></span>
					</button>
					<div class="main-menu">
						@foreach(json_decode(Settings('header_menus')) as $key => $option)
						<div class="menu-item"> 
							<a href="{{ $option->menu_url }}">{{ $option->menu_name }}</a>
						</div>
						@endforeach
						<div>
							<a href="{{ Settings('login_btn_url') }}">
								<div class="btn btn-default-yellow-fill mt-3"> <i class="fas fa-lock ps-1"></i> </div>
							</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
{{-- <!-- ***** BTN DEMOS ****** -->
<div class="content-btn-demos">
	<a href="https://inebur.com/antler/overview/#themes" target="_blank">
		<div class="btn-demos btn btn-default-fill mb-2">
			<div><span>45+</span>
				<br>DEMOS</div>
		</div>
	</a>
	<!-- ***** BTN BUY ****** -->
	<a href="https://themeforest.net/item/antler-hosting-provider-whmcs-template/23139614" target="_blank">
		<div class="btn-demos btn btn-default-fill">
			<div><span>Buy</span>
				<br>NOW</div>
		</div>
	</a>
</div> --}}
<!-- ***** BTN COLORS ****** -->
<ul class="color-scheme">
	<li class="pink" data-bs-toggle="tooltip" data-bs-placement="left" title="Pink Mode">
		<a href="#" data-rel="pink" class="styleswitch"></a>
	</li>
	<li class="blue" data-bs-toggle="tooltip" data-bs-placement="left" title="Blue Mode">
		<a href="#" data-rel="blue" class="styleswitch"></a>
	</li>
	<li class="green" data-bs-toggle="tooltip" data-bs-placement="left" title="Green Mode">
		<a href="#" data-rel="green" class="styleswitch"></a>
	</li>
	<li class="dark" data-bs-toggle="tooltip" data-bs-placement="left" title="Dark Mode">
		<a href="#" data-rel="dark" class="styleswitch"></a>
	</li>
</ul>
{{-- <!-- ***** TRANSLATION ****** -->
<section id="drop-lng" class="btn-group btn-group-toggle toplang">
	<label data-lng="en-US" for="option1" class="btn btn-secondary mb-2">
		<input type="radio" name="options" id="option1" checked>EN</label>
	<label data-lng="pt-PT" for="option2" class="btn btn-secondary">
		<input type="radio" name="options" id="option2">PT</label>
</section> --}}
