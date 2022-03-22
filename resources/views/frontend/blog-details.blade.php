@extends('frontend.layouts.app')

@section('title')
{{ $blog->title }} - Nirapod Host - Secure & Trusted Hosting
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
@section('meta')
	<meta name="og:title" content="{{ $blog->meta_title }} - Nirapod Host - Secure & Trusted Services">
	<meta name="og:image" content="{{ asset($blog->banner) }}">
	<meta name="og:description" content="{{ strip_tags($blog->meta_description) }}">
	<meta name="og:keywords" content="{!! $blog->meta_keywords !!}">
@endsection
@section('content')
<!-- ***** BANNER ***** -->
<div class="top-header">
	<img class="svg pattern" src="{{ asset('frontend/patterns/promopath.svg') }}" alt="blog-grid">
	<div class="total-grad-inverse"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="wrapper">
					<div class="heading">{{ $blog->title }}</div>
					<div class="subheding">{{ $blog->sub_title }}</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ***** BLOG DETAILS ***** -->
<section class="shopping blog sec-normal sec-bg2 motpath">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="wrap-blog">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="sec-normal pt-0">
								<div class="sec-main sec-bg1">
									<div class="action-content">
										<img src="{{ asset($blog->banner) }}" data-src="{{ asset($blog->banner) }}" class="img-responsive lazyload" alt="photo">
									</div>
									<div class="row text-blog">
										<div class="col-sm-12 col-md-12 col-lg-6 p-0">
											<div class="timer d-flex align-items-center"> <i class="icon-calendar"></i>
												<span class="ps-2 pe-4"> {{ $blog->created_at->format('F d, Y') }}</span>
												<i class="icon-clock"></i>
												<span class="ps-2"> {{ $blog->created_at->format('H:i A') }}</span>
											</div>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 p-0">
											<div class="social-icon"> 
												<a href="https://www.facebook.com/sharer/sharer.php?u={{ url($blog->slug) }}&display=popup"><i class="fab fa-facebook-f"></i></a>
												<a href="https://twitter.com/intent/tweet?url={{ url($blog->slug) }}"><i class="fab fa-twitter"></i></a>
												<a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url($blog->slug) }}&t={{ $blog->meta_keywords }}"><i class="fab fa-linkedin-in"></i></a>
											</div>
										</div>
									</div>
									<hr>
									<div class="heading blog">
										{!! $blog->description !!}
										
									</div>
									<div class="blog-info">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@php
							$comments = App\Models\Comment::where('post_id',$blog->id)->whereNull('comment_id')->where('status',1)->paginate(5);
						@endphp
						<div class="col-md-12 col-lg-12 mb-80">
							<div class="sec-main sec-bg1">
								<div class="heading blog"><a href="#">{{ App\Models\Comment::where('post_id',$blog->id)->whereNull('comment_id')->where('status',1)->count() }} Comments</a>
								</div>
								<div class="line"></div>
								@foreach($comments as $comment)
								<div class="media"> <a href="javascript:void()" onclick="showReply({{ $comment->id }})" class="plans badge badge-pill feat bg-green">Reply</a>
									<img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" data-src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" class="media-object lazyload" alt="photo">
									<div class="media-body">
										<h4 class="media-heading">{{ $comment->full_name }}</h4>
										<div class="text-blog mt-0 d-flex align-items-center"> <i class="icon-calendar"></i>
											<span class="ps-2 pe-4"> {{ $comment->created_at->format('F d, Y') }}</span>
											<i class="icon-clock"></i>
											<span class="ps-2"> {{ $comment->created_at->format('H:i A') }}</span>
										</div>
										<div class="text-comments">
											{{ $comment->comment }}
										</div>
									</div>
									<div class="media d-none" id="comment_{{ $comment->id }}">
										<div class="media-body">
											<h4 class="media-heading">Reply to Comment</h4>
											<div class="text-blog">
												<form action="{{ route('comment.reply') }}" method="post">
													@csrf
													<input type="hidden" name="post_id" value="{{ $blog->id }}">
													<input type="hidden" name="comment_id" value="{{ $comment->id }}">
													<input type="text" name="comment"  class="form-control" placeholder="Reply....">
													<button type="submit" class="btn btn-info">{{ __('Submit') }}</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<hr>
								@php
									$comment_replies = App\Models\Comment::where('post_id',$blog->id)->whereNotNull('comment_id')->where('comment_id',$comment->id)->where('status',1)->get();
								@endphp
								@foreach($comment_replies as $reply)
								<div class="media answer">
									<img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" data-src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" class="media-object lazyload" alt="photo">
									<div class="media-body">
										<h4 class="media-heading">{{ $reply->full_name }}</h4>
										<div class="text-blog mt-0 d-flex align-items-center"> <i class="icon-calendar"></i>
											<span class="ps-2 pe-4"> {{ $reply->created_at->format('F d, Y') }}</span>
											<i class="icon-clock"></i>
											<span class="ps-2">{{ $reply->created_at->format('H:i A') }}</span>
										</div>
										<div class="text-comments">
											{{ $reply->comment }}
										</div>
									</div>
								</div>
								@endforeach
								@endforeach
								{{ $comments->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
					<div class="sec-main sec-bg1">
						<div class="randomline">
							<div class="bigline"></div>
							<div class="smallline"></div>
						</div>
						<div class="cd-filter-block mb-0">
							<div class="cd-filter-content p-0 sec-bx">
								<div class="heading blog"><a href="#">Leave a Comment</a>
								</div>
								<form action="{{ route('comment.store') }}" method="post">
									@csrf
									<div class="row">
										<div class="col-md-12 col-lg-6 position-relative">
											<label><i class="fas fa-user-tie"></i>
											</label>
											<input id="fullname" type="text" name="full_name" placeholder="Full Name" required="">
										</div>
										<div class="col-md-12 col-lg-6 position-relative">
											<label><i class="fas fa-envelope"></i>
											</label>
											<input id="email" type="email" name="email" placeholder="Email Address" required="">
										</div>
										<input type="hidden" name="post_id" value="{{ $blog->id }}">
										<div class="col-md-12 position-relative">
											<div class="form-group mt-4">
												<textarea id="comment" name="comment" class="form-control" rows="5" placeholder="Comment..." required></textarea>
											</div>
										</div>
										<div class="col-md-12 mt-5">
											<button type="submit" value="Submit" class="btn btn-default-yellow-fill">Submit Comment</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
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
										</div> <a href="{{ route('blog',$post->slug) }}" class="c-grey"><small><i class="far fa-file-alt"></i> {!! Str::limit($blog->description,10) !!}</small></a>
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
							@if(session('success'))
								<div class="text text-success">
									{{ session('success') }}
								</div>
							@else
								<div class="text text-warning">
									{{ session('error') }}
								</div>
							@endif
							<div class="col-md-12 col-lg-12 cd-filter-block mb-0">
								<form action="{{ route('subscribe.store') }}" method="post">
									@csrf
									<input type="email" name="email" placeholder="news@youremail.com" autocomplete="off" required=""> <button type="submit" class="btn btn-default-pink-fill w-100 mt-3">Subscribe</button>
								</form>
							</div>
						</div>
					</div>
					<div class="tags">
						<div class="heading active">Tags</div>
						<div class="line active"></div>
						@foreach(explode(',',$blog->meta_keywords) as $tag)
							<a href="{{ route('blog',['search' => $tag]) }}" class="badge bg-light text-dark f-15 mr-3 my-2">{{ $tag }}</a>
						@endforeach
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>

@push('js')
	<script>
		function showReply(id)
		{
			$("#comment_"+id+"").removeClass('d-none');
		}
	</script>
@endpush
@endsection