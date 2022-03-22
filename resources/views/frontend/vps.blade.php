@extends('frontend.layouts.app')

@section('title')
    Nirapod Host - Secure & Trusted Hosting
@endsection
@section('content')
<div class="top-header overlay-video">
	<div class="container">
		<div class="covervid-wrapper" style="overflow: hidden; background-image: url(&quot;img/topbanner03.jpg&quot;); background-size: cover; background-position: center center;">
			<video class="covervid-video" autoplay="" loop="" muted="" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height: auto; width: 1226px;" __idm_id__="741293057">
				<source src="videos/Modem-lights.mp4" type="video/mp4">
			</video>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="wrapper">
					<h1 class="heading">Cheap VPS Server Bangladesh</h1>
					<h3 class="subheading">Enjoy increased flexibility and get the performance you need with our SSD linux vps hosting<br></h3>
				</div>
			</div>
		</div>
	</div>
</div>
@php
    $packages = App\Models\Package::where('position','vps_server')->get();
@endphp
<section class="pricing special sec-up-slider">
	<div class="container">
		<div class="row">
			@foreach($packages as $package)
            <div class="col-sm-12 col-md-4 col-lg-4 wow  fadeInUp animated">
                <div class="wrapper text-left">
                    @if($package->badge !== null)
                    <div class="plans badge feat bg-pink">{{ __($package->badge) }}</div>
                    @endif
                    <div class="top-content">
                        <img class="svg mb-3" src="{{ asset($package->icon) }}" alt="{{ $package->title }}">
                        <div class="title">{{ $package->title }}</div>
                        <div class="fromer">{{ $package->sub_title }}</div>
                        <div class="price"><sup>Tk</sup>{{ $package->amount }} <span class="period">/Month</span></div>
                        <a href="{{ $package->btn_url }}" class="btn btn-default-yellow-fill">{{ $package->btn_name }}</a>
                    </div>
                    <ul class="list-info bg-pink">
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
<section id="features" class="history-section sec-normal exapath">
	<div class="container">
		<div class="sec-main sec-bg1">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<div class="info-content">x
						{!! Settings('vps_page_description') !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection