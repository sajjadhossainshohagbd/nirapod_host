@extends('frontend.layouts.app')

@section('title')
    Nirapod Host - Secure & Trusted Hosting
@endsection
@push('css')
	<link href="{{ asset('frontend/css/filter.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
	<link href="{{ asset('frontend/css/mixitup.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
@endpush
@push('js')
	<script defer src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/mixitup.multifilter.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/mixevents.js') }}"></script>
	<script src="{{ asset('frontend/js/filter.js') }}"></script>
@endpush
@section('content')
<div class="top-header item7 overlay">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="wrapper">
					<h1 class="heading">{{ Settings('dedicated_server_header_title') }}</h1>
					<h3 class="subheading">{{ Settings('dedicated_server_header_description') }}
					</h3>
					<a class="btn btn-default-pink-fill cd-filter-trigger wow animated shake delay-2s animated" style="visibility: visible; animation-name: shake;"><i class="fa fa-filter"></i> Show Filter</a>
				</div>
			</div>
		</div>
	</div>
</div>
@php
    $packages = App\Models\Package::where('position','dedicated_server')->get();
@endphp
<div class="mixcontainer pb-5 pt-4 sec-bg2 motpath" data-ref="container" id="MixItUp753A46">
	<div class="container ">
		<div class="pricing special">
			<div class="p-0 m-0">
				@foreach($packages as $package)
				<div class="mix ssd hdd newyork cores4" data-size="0">
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
				<div class="gap"></div>
				<div class="gap"></div>
				<div class="gap"></div>
			</div>
		</div>
		<div class="cd-fail-message">" No items could be found matching the criteria "</div>
	</div>
</div>
<section id="features" class="history-section sec-normal">
	<div class="container">
		<div class="randomline">
			<div class="bigline"></div>
			<div class="smallline"></div>
		</div>
		<div class="sec-main sec-bg1">
			<!--        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="info-content">
              <h4>SO Installation</h4>
              <p>But I must explain to you how all this mistaken idea of <a href="#" class="golink">denouncing pleasure</a> and praising pain was born and I will. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>
          <div class="col-md-10 offset-md-1 pt-5 wow animated fadeInUp fast">
            <img class="svg" src="frontend/patterns/os.svg" alt="dns redundant">
          </div>
        </div>-->
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<div class="info-content">
						{!! Settings('dedicated_server_page_description') !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="sec-normal sec-bg1">
	<div class="best-plans pricing">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="section-heading">{{ Settings('feature_title') }}</h2>
				</div>
				<div class="col-sm-12">
					<div class="table-responsive-lg">
						<table class="table sample mt-5">
							<thead>
								<tr>
									<td><span class="title">{{ Settings('feature_one_title') }} </span>
									</td>								
									<td>
										<div class="title">{{ Settings('feature_two_title') }}</div>
									</td>
									<td>
										<div class="title">{{ Settings('feature_three_title') }}</div>
									</td>
								</tr>
								
							</thead>
							<tbody>
								@foreach(json_decode(Settings('dedicated_server_features')) as $option)
								<tr>
									<td class="title-table"><span class="fas fa-check-circle mr-2"></span> {{ $option->feature1 }}</td>
									<td><span class="fas fa-check-circle mr-2 f-20"></span>  {{ $option->feature2 }}</td>
									<td><span class="fas fa-check-circle mr-2 f-20"></span> {{ $option->feature3 }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection