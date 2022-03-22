@extends('frontend.layouts.app')

@section('title')
    Nirapod Host - Secure & Trusted Hosting
@endsection
@push('css')
	<link href="frontend/css/filter.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
	<link href="frontend/css/mixitup.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
@endpush
@push('js')
	<script defer src="frontend/js/mixitup.min.js"></script>
	<script defer src="frontend/js/mixitup.multifilter.min.js"></script>
	<script defer src="frontend/js/mixevents.js"></script>
	<script src="frontend/js/filter.js"></script>
@endpush
@section('content')
<div class="top-header item7 overlay">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="wrapper">
					<h3 class="heading">{{ $page->title }}</h3>
					<h3 class="subheading">{{ $page->sub_title }}
					</h3>
					<a class="btn btn-default-pink-fill cd-filter-trigger wow animated shake delay-2s animated" style="visibility: visible; animation-name: shake;"><i class="fa fa-filter"></i> Show Filter</a>
				</div>
			</div>
		</div>
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
						{!! $page->description !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection