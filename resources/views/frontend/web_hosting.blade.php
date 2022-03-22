@extends('frontend.layouts.app')

@section('title')
    Nirapod Host - Secure & Trusted Hosting
@endsection
@section('content')
<div class="top-header item6 overlay-image-grad">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="wrapper">
					<h1 class="heading">{{ Settings('web_hosting_header_title') }}</h1>
					<h3 class="subheading">{{ Settings('web_hosting_header_description') }}</h3>
					<div class="included">
						<!--<h4>Need of a website? Select from a variety of website hosting plans on offer and create your presence online today.</h4>-->
						@foreach(json_decode(Settings('web_hosting_header_options')) as $option)
						<ul>
							<li><i class="fas fa-check-circle"></i> {{ $option }}</li>
						</ul>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@php
    $packages = App\Models\Package::where('position','ssd')->get();
@endphp
<section class="pricing special">
	<div class="container">
		<div class="row">
			@foreach($packages as $package)
            <div class="col-sm-12 col-md-4 col-lg-4">
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
{{-- <section class="getready sec-grad-yellow-to-black-right">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="column-support-txt">
					<div class="column-support-title">
						<h2>Pay for real web hosting technologies, not marketing!</h2>
					</div>
					<div class="column-support-subtitle">Unlimited Web Hosting features for the Best Price!</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="btn-floats"> <a href="{{ route('why.nirapod.host') }}" class="btn btn-default-pink-fill">Why Nirapod Host?</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="features" class="history-section feat01 sec-normal">
	<div class="container">
		<div class="sec-main sec-bg1">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h3>We designed these ssd web hosting packages <br>Because we were tired of what we saw in the web hosting industry</h3>
				</div>
			</div>
			<div class="accordion faq">
				<div class="panel-wrap">
					<div class="panel-title"> <span>Slow web hosting on old school dedicated servers plagued with downtime</span>
						<div class="float-right"> <i class="fa fa-question c-pink"></i>
						</div>
					</div>
				</div>
				<div class="panel-wrap">
					<div class="panel-title"> <span>Lackluster customer support that takes hours to respond.</span>
						<div class="float-right"> <i class="fa fa-question c-pink"></i>
						</div>
					</div>
				</div>
				<div class="panel-wrap">
					<div class="panel-title"> <span>Fake customer reviews persuading you to buy.</span>
						<div class="float-right"> <i class="fa fa-question c-pink"></i>
						</div>
					</div>
				</div>
				<div class="panel-wrap">
					<div class="panel-title"> <span>Weak hosting packages that lacked much needed features.</span>
						<div class="float-right"> <i class="fa fa-question c-pink"></i>
						</div>
					</div>
				</div>
				<div class="panel-wrap">
					<div class="panel-title"> <span>Home based one man company trying his luck in the hosting business</span>
						<div class="float-right"> <i class="fa fa-question c-pink"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}
<section id="features" class="history-section feat01 sec-normal">
	<div class="container">
		<div class="sec-main sec-bg1">
			@php
        		$options = App\Models\Settings::where('key','web_hosting_options')->get();
			@endphp
			<div class="col-md-10 text-center">
				<h3 class="section-heading">{{ Settings('web_hosting_option_title') }}</h3>
			</div>
			@foreach($options as $option)
			@php
				$data = json_decode($option->value);
			@endphp
			<div class="row">
				<div class="col-md-12 col-lg-6 wow animated fadeInUp fast first">
					<img class="svg" src="{{ asset($data->image) }}" alt="DDoS protection">
				</div>

				<div class="col-md-12 col-lg-5 offset-lg-1">
					<div class="info-content">
						<h4>{{ $data->title }}</h4>
						<p>{{ $data->description }}</p>
					</div>
					<a href="{{ $data->url }}" class="btn btn-default-yellow-fill mt-3">{{ $data->btn_name }}</a>
				</div>
			</div>
			@endforeach
			
		</div>
	</div>
</section>
<section class="sec-normal  sec-bg3 motpath">
	<div class="best-plans pricing">
		<div class="container">
			<div class="randomline">
				<div class="bigline"></div>
				<div class="smallline"></div>
			</div>
			<div class="sec-main sec-bg1">
				<div class="plans badge feat bg-pink">{{ Settings('web_hosting_feature_badge') }}</div>
				<div class="row">
					<div class="col-sm-12">
						<div id="table-container" class="table-responsive-lg">
							<table id="maintable" class="table">
								<thead>
									<tr>
										<td></td>
										@foreach(json_decode(Settings('web_hosting_feature_package')) as $key => $option)
										<td>
											<div class="title">{{ $option->title }}</div>
											<div class="price"><sup>Tk</sup>{{ $option->price }}<span class="period">/year</span>
											</div>
											<div class="info">{{ $option->subtitle }}</div> <a href="{{ $option->url }}" class="btn btn-default-yellow-fill">{{ $option->btn_name }} </a>
											<br>
										</td>
										@endforeach
									</tr>
								</thead>
								<tbody>
									@foreach(json_decode(Settings('web_hosting_feature_package_1')) as $option)
									<tr>
										<td class="title-table">{{ $option->feature_name }}</td>
										<td>{!! $option->feature1 !!}</td>
										<td>{!! $option->feature2 !!}</td>
										<td>{!! $option->feature3 !!}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="4" class="title-table" style="text-align:center">
											<div class="title">{{ Settings('web_hosting_feature_package_2_title') }}</div>
										</td>
									</tr>
									@foreach(json_decode(Settings('web_hosting_feature_package_2')) as $option)
									<tr>
										<td class="title-table">{{ $option->feature_name }}</td>
										<td>{!! $option->feature1 !!}</td>
										<td>{!! $option->feature2 !!}</td>
										<td>{!! $option->feature3 !!}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="4" class="title-table" style="text-align:center">
											<div class="title">{{ Settings('web_hosting_feature_package_3_title') }}</div>
										</td>
									</tr>
									@foreach(json_decode(Settings('web_hosting_feature_package_3')) as $option)
									<tr>
										<td class="title-table">{{ $option->feature_name }}</td>
										<td>{!! $option->feature1 !!}</td>
										<td>{!! $option->feature2 !!}</td>
										<td>{!! $option->feature3 !!}</td>
									</tr>
									@endforeach

									<tr>
										<td colspan="4" class="title-table" style="text-align:center">
											<div class="title">{{ Settings('web_hosting_feature_package_4_title') }}</div>
										</td>
									</tr>
									@foreach(json_decode(Settings('web_hosting_feature_package_4')) as $option)
									<tr>
										<td class="title-table">{{ $option->feature_name }}</td>
										<td>{!! $option->feature1 !!}</td>
										<td>{!! $option->feature2 !!}</td>
										<td>{!! $option->feature3 !!}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="4" class="title-table" style="text-align:center">
											<div class="title">{{ Settings('web_hosting_feature_package_5_title') }}</div>
										</td>
									</tr>
									@foreach(json_decode(Settings('web_hosting_feature_package_5')) as $option)
									<tr>
										<td class="title-table">{{ $option->feature_name }}</td>
										<td>{!! $option->feature1 !!}</td>
										<td>{!! $option->feature2 !!}</td>
										<td>{!! $option->feature3 !!}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="4" class="title-table" style="text-align:center">
											<div class="title">{{ Settings('web_hosting_feature_package_6_title') }}</div>
										</td>
									</tr>
									@foreach(json_decode(Settings('web_hosting_feature_package_6')) as $option)
									<tr>
										<td class="title-table">{{ $option->feature_name }}</td>
										<td>{!! $option->feature1 !!}</td>
										<td>{!! $option->feature2 !!}</td>
										<td>{!! $option->feature3 !!}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="4" class="title-table" style="text-align:center">
											<div class="title">{{ Settings('web_hosting_feature_package_7_title') }}</div>
										</td>
									</tr>
									@foreach(json_decode(Settings('web_hosting_feature_package_7')) as $option)
									<tr>
										<td class="title-table">{{ $option->feature_name }}</td>
										<td>{!! $option->feature1 !!}</td>
										<td>{!! $option->feature2 !!}</td>
										<td>{!! $option->feature3 !!}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="4" class="title-table" style="text-align:center">
											<div class="title">{{ Settings('web_hosting_feature_package_8_title') }}</div>
										</td>
									</tr>
									@foreach(json_decode(Settings('web_hosting_feature_package_8')) as $option)
									<tr>
										<td class="title-table">{{ $option->feature_name }}</td>
										<td>{!! $option->feature1 !!}</td>
										<td>{!! $option->feature2 !!}</td>
										<td>{!! $option->feature3 !!}</td>
									</tr>
									@endforeach
									<tr>
										<td class="border-0 sticky-stopper"></td>
										@foreach(json_decode(Settings('web_hosting_feature_package')) as $key => $option)
										<td>
											<a href="{{ $option->url }}" class="btn btn-default-yellow-fill">{{ $option->btn_name }}</a>
										</td>
										@endforeach
									</tr>
								</tbody>
							</table>
							<div id="bottom_anchor"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection