@extends('frontend.layouts.app')

@section('title')
    Blog - Nirapod Host - Secure & Trusted Hosting
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
<div class="top-header">
	<img class="svg pattern" src="{{ asset('frontend/patterns/promopath.svg') }}" alt="blog-grid">
	<div class="total-grad-inverse"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="wrapper">
					<div class="heading text-center">Blog</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ***** Blog Grid ***** -->
<section class="services blog sec-normal pt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="service-wrap">
					<div class="row">
						@forelse($blogs as $blog)
						<div class="col-md-12 col-lg-12 col-xl-6 mb-5">
							<div class="action-content">
								<img src="{{ asset($blog->banner) }}" data-src="{{ asset($blog->banner) }}" class="img-responsive lazyload mt-0" alt="photo">
							</div>
							<div class="service-section m-0">
								<div class="title mt-0">{{ $blog->title }}</div>
								<p class="subtitle">{{ Str::limit($blog->sub_title,80) }}</p>
								<hr>
								<div class="small d-flex align-items-center"> <b class="icon-calendar text-dark"></b>
									<span class="ps-2 pe-4"> {{ $blog->created_at->format('F d, Y') }}</span>
									<b class="icon-man text-dark"></b>
									<span class="ps-2"> by Nirapod Host</span>
								</div> <a href="{{ route('blog',$blog->slug) }}" class="btn btn-default-yellow-fill">Continue Reading</a>
							</div>
						</div>
						@empty
						<div class="col-md-12 col-lg-12 col-xl-6 mb-5">
							<div class="text-center text-info">
								{{ __('No Post Found!') }}
							</div>
						</div>
						@endforelse
					</div>
					{{ $blogs->appends(request()->all())->links('pagination::bootstrap-4') }}
				</div>
			</div>
			<!-- sidebar -->
			<div class="col-md-4">
				<aside class="sidebar">

					<form action="{{ route('blog') }}" method="GET">
						<div class="cd-filter-block checkbox-group">
							<input type="text" class="input" name="search" value="{{ request()->search }}" placeholder="Search..." />
						</div>
					</form>
					<div class="posts">
						<div class="tabs">
							<div class="tabs-header">
								<ul class="list">
									<li class="active">Newest article</li>
								</ul>
							</div>
							<div class="tabs-content">
								<div class="tabs-item active">
									@foreach($latest_post as $post)
									<div class="item-wrap">
										<a href="{{ route('blog',$post->slug) }}">
											<img src="{{ asset($post->banner) }}" data-src="{{ asset($post->banner) }}" class="img lazyload" alt="">
										</a>
										<div class="heading-article"><a href="{{ route('blog',$post->slug) }}">{{ Str::words($post->title,2) }}</a>
										</div> <a href="{{ route('blog',@$post->slug) }}" class="c-grey"><small><i class="far fa-file-alt"></i> {!! Str::limit(@$blog->description,10) !!}</small></a>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="categories">
						<div class="heading active">Archives</div>
						<div class="line active"></div>
						@foreach($archive as $year => $months)
							<div class="heading"><a href="{{ route('blog',['year' => $year]) }}">{{ $year }}</a>  <span>{{ count($months) }}</span>
							</div>
						@endforeach
					</div>
					<div class="newsletter">
						<div class="heading active">Newsletter</div>
						<div class="line active"></div>
						<p><small class="text-muted">Subscribe to our newsletter to receive news and updates. Enter your Email!</small>
						</p>
						<div class="row">
							<div class="col-md-12 col-lg-12 cd-filter-block mb-0">
								<input type="email" name="email" placeholder="news@youremail.com" required=""> <a href="#" class="btn btn-default-pink-fill w-100 mt-3">Subscribe</a>
							</div>
						</div>
					</div>
					<div class="tags">
						<div class="heading active"> Tags</div>
						<div class="line active"></div> 
						@foreach(array_unique(preg_replace('/[^a-zA-Z 0-9]+/','', explode(',',$blogs->pluck('meta_keywords')))) as $tag)
							<a href="{{ route('blog',['search' => $tag]) }}" class="badge bg-light text-dark f-15 mr-3 my-2">{{ $tag }}</a>
						@endforeach
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>
@endsection