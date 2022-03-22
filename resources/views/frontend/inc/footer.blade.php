<footer class="footer">
	<img class="logo-bg logo-footer" src="{{ asset('frontend/img/symbol.svg') }}" alt="logo">
	<div class="container">
		<div class="footer-top">
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="heading">Hosting</div>
					<ul class="footer-menu">
						<li class="menu-item"><a href="{{ route('web.hosting') }}">Shared Hosting</a>
						</li>
						<li class="menu-item"><a href="{{ route('dedicated.server') }}">Dedicated Server</a>
						</li>
						<li class="menu-item"><a href="{{ route('vps.server') }}">Cloud Virtual (VPS)</a>
						</li>
						<li class="menu-item"><a href="domains">Domain Names</a>
						</li>
					</ul>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="heading">Support</div>
					<ul class="footer-menu">
						<li class="menu-item">
							<a href="{{ route('contact.us') }}">Contact Us</a>
						</li>
					</ul>
				</div>
				<div class="col-sm-6 col-md-3">
					<a>
						<img class="svg logo-footer" src="{{ asset('frontend/img/logo.svg') }}" alt="logo">
					</a>
					<div class="copyrigh">2021 © Nirapod Host - All rights reserved</div>
					<div class="soc-icons"> <a href=""><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-youtube"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="subcribe news">
		<div class="container">
			<div class="row">
				<form action="#" class="w-100">
					<div class="col-md-6 offset-md-3">
						<div class="general-input">
							<form action="{{ route('subscribe.store') }}" method="post">
								<input class="fill-input" type="email" name="email" data-i18n="[placeholder]header.login">
								<input type="submit" value="SUBSCRIBE" class="btn btn-default-yellow-fill">
							</form>
						</div>
					</div>
					<div class="col-md-6 offset-md-3 text-center pt-4">
						<p>Subscribe to our newsletter to receive news and updates</p>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<ul class="footer-menu">
						{{-- <li id="drop-lng" class="btn-group btn-group-toggle">
							<label data-lng="en-US" for="option1" class="btn btn-secondary">
								<input type="radio" name="options" id="option1" checked>EN</label>
							<label data-lng="pt-BN" for="option2" class="btn btn-secondary">
								<input type="radio" name="options" id="option2">BN</label>
						</li> --}}
						<li class="menu-item by">Developed By <span class="c-pink">♥</span> by <a href="http://nirapodhost.com" target="_blank">Nirapod Host</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="payment-list">
						<li>
							<p>Payments We Accept</p>
						</li>
						<li><i class="fab fa-cc-visa"></i>
						</li>
						<li><i class="fab fa-cc-mastercard"></i>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>