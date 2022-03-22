@extends('frontend.layouts.app')

@section('title')
    Nirapod Host - Secure & Trusted Hosting
@endsection
@section('content')
    <!-- ***** SLIDER ***** -->
	<section id="owl-demo" class="owl-carousel owl-theme owl-loaded owl-drag scrollme">
		<div class="full h-100 sec-bg6">
			<div class="vc-parent">
				<div class="vc-child">
					<div class="top-banner">
						<div class="container animateme pe-5" data-when="exit" data-from="0" data-to="0.75" data-opacity="0" data-translatey="-100">
							<img class="svg custom-element-right" src="{{ asset('frontend/patterns/rack.svg') }}" alt="{{ Settings('slider_title') }}">
							<div class="heading">{{ Settings('slider_title') }} <br>
								<span id="typed1"></span>
							</div>
							<h3 class="subheading">
								<b> {!! Settings('slider_description') !!} </b><br>
                            </h3>
							<a href="{{ Settings('slider_btn_1_url') }}" class="btn btn-default-yellow-fill me-2 mb-2">{{ Settings('slider_btn_1') }}</a>
							<a href="{{ Settings('slider_btn_2_url') }}" class="btn btn-default-pink-fill mb-2">{{ Settings('slider_btn_2') }}</a>
						</div>
						<div class="owl-dots"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ***** PRICING TABLES ***** -->
	@php
		$packages = App\Models\Package::where('position','home_page')->get();
	@endphp
	<section class="pricing special sec-up-slider">
		<div class="container">
			<div class="row">
				@foreach ($packages as $package)
				<div class="col-sm-12 col-md-4 col-lg-4">
					<div class="wrapper first">
						<div class="top-content">
							<img class="svg mb-3" src="{{ asset($package->icon) }}" alt="">
							<div class="title">{{ $package->title }}</div>
							<div class="fromer">{{ $package->sub_title }}</div>
							<div class="price"><sup>Tk</sup>{{ $package->amount }} <span class="period">/month</span>
							</div> <a href="{{ $package->btn_url }}" class="btn btn-default-yellow-fill">{{ $package->btn_name }}</a>
						</div>
						<ul class="list-info">
							@foreach(json_decode($package->options) as $option)
							<li><i class="{{ $option->icon }}"></i>  <span class="c-purple">{{ $option->name }}</span>
								<br> <span>{{ $option->value }}</span>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- ***** LOAD BALANCING ***** -->
	<section class="balancing sec-normal bg-white">
		<div class="h-services">
			<div class="container">
				<div class="randomline">
					<div class="bigline"></div>
					<div class="smallline"></div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="section-heading">{{ Settings('load_balancing_title') }}</h2>
						<p class="section-subheading">{{ Settings('load_balancing_description') }}</p>
					</div>
					<div class="col-md-12">
						<div class="wrap-service load">
							<div class="wow animated fadeInUp fast">
								<img class="svg mt-50 w-100" src="{{ asset('frontend/patterns/balancing.svg') }}" alt="Load Balancing">
							</div>
							<div class="row text-info text-center">
								<div class="col-md-4 pb-2 pt-5"><b class="c-purple">[1] {{ Settings('load_section_one_title') }}</b> 
									<br> <span class="info">{{ Settings('load_section_one_description') }}</span>
								</div>
								<div class="col-md-4 pb-2 pt-5"><b class="c-purple">[2] {{ Settings('load_section_two_title') }}</b> 
									<br> <span class="info">{{ Settings('load_section_two_description') }}</span>
								</div>
								<div class="col-md-4 pb-2 pt-5"><b class="c-purple">[3] {{ Settings('load_section_three_title') }}</b> 
									<br> <span class="info">{{ Settings('load_section_three_description') }}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ***** FEATURES ***** -->
	<section class="services sec-normal motpath sec-bg4">
		<div class="container">
			<div class="service-wrap">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="section-heading">{{ Settings('why_choose_title') }}</h2>
						<p class="section-subheading">{{ Settings('why_choose_description') }}</p>
					</div>
					@foreach(json_decode(Settings('why_choose_options')) as $key => $option)
					<div class="col-sm-12 col-md-4 wow animated fadeInUp fast">
						<div class="service-section">

							<div class="plans badge feat bg-pink">{{ $option->badge }}</div>
							<i class="{{ $option->icon }}"></i>
							<div class="title">{{ $option->title }}</div>
							<p class="subtitle">{{ $option->description }}</p> <a href="{{ $option->btn_url }}" class="btn btn-default-yellow-fill">{{ $option->btn_name }}</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- ***** CASE STUDY ***** -->

	@php
		$reviews = App\Models\Review::latest()->get();
	@endphp
	<section class="casestudy mt-4">
		<div class="container">
			<div class="sec-main sec-up bg-pink mb-0">
				<img src="{{ asset(Settings('review_background_image')) }}" data-src="{{ asset(Settings('review_background_image')) }}" class="lazyload" alt="Case Study">
				<div class="plans badge feat bg-purple">{{ Settings('reivew_badge') }}</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-9">
						<div class="slider-container slider-filter">
							<div class="slider-wrap">
								<div class="swiper-container main-slider" data-autoplay="4000" data-touch="1" data-mouse="0" data-slides-per-view="responsive" data-loop="1" data-speed="1200" data-mode="horizontal" data-xs-slides="1" data-sm-slides="1" data-md-slides="1" data-lg-slides="1">
									<div class="swiper-wrapper">
										@foreach($reviews as $review)
										<div class="swiper-slide">
											<h3 class="author">{{ $review->customer_name }}</h3>
											<div class="content-info">
												<p>{{ $review->review }}</p>
												<div class="mb-3"></div> <a href="{{ $review->url }}" class="btn btn-default-yellow-fill mb-2">{{ $review->button }}</a>
											</div>
										</div>
										@endforeach
									</div>
									<div class="pagination vertical-mode pagination-index"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ***** HELP ***** -->
	<section class="services help pt-4 pb-80">
		<div class="container">
			<div class="service-wrap">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-4">
						<div class="help-container">
							<a href="{{ unserialize(Settings('footer_up_section_one'))['url'] }}" class="help-item">
								<div class="img">
									<img class="svg ico" src="{{ asset('frontend/fonts/svg/livechat.svg') }}" height="65" alt="">
								</div>
								<div class="inform">
									<div class="title">{{ unserialize(Settings('footer_up_section_one'))['title'] }}</div>
									<div class="description">{{ unserialize(Settings('footer_up_section_one'))['description'] }}</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-4">
						<div class="help-container">
							<a href="{{ url(unserialize(Settings('footer_up_section_two'))['url']) }}" class="help-item">
								<div class="img">
									<img class="svg ico" src="{{ asset('frontend/fonts/svg/emailopen.svg') }}" height="65" alt="">
								</div>
								<div class="inform">
									<div class="title">{{ unserialize(Settings('footer_up_section_two'))['title'] }}</div>
									<div class="description">{{ unserialize(Settings('footer_up_section_two'))['description'] }}</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-4">
						<div class="help-container">
							<a href="{{ url(unserialize(Settings('footer_up_section_three'))['url']) }}" class="help-item">
								<div class="img">
									<img class="svg ico" src="{{ asset('frontend/fonts/svg/book.svg') }}" height="65" alt="">
								</div>
								<div class="inform">
									<div class="title">{{ unserialize(Settings('footer_up_section_three'))['title'] }}</div>
									<div class="description">{{ unserialize(Settings('footer_up_section_one'))['description'] }}</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection