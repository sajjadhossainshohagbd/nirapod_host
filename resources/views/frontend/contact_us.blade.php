@extends('frontend.layouts.app')

@section('title')
    Nirapod Host - Secure & Trusted Hosting
@endsection
@push('js')
	<script>
		$("#contactForm2").on("submit", function (t) {
        $.ajax({
            type: "POST",
            url: "{{ route('send.email') }}",
            data: $(this).serialize(),
            success: function (data) {
                $("#msgSubmit").fadeIn(100).show();
            }
        }), t.preventDefault()
    })
	</script>
@endpush
@section('content')
<div class="top-header motpath">
	<div class="total-grad-inverse"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb-4">
				<div class="wrapper">
					<div class="heading">Contact us</div>
					<div class="subheding">Don't worry! We have support premium 24/7/365. We are looking forward waiting for your contact.</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section id="ticket" class="exapath pb-80">
	<div class="container">
		<div class="sec-main sec-up mb-0 sec-bg1">
			<div class="randomline">
				<div class="bigline"></div>
				<div class="smallline"></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-lg-12 cd-filter-block mb-0">
					<div class="form-contact cd-filter-content p-0 sec-bx">
						<div class="text-center">
							<h2 class="section-heading">Full out the Contact form to contact us</h2>
							<p>We Will Help You To Choose The Best Plan!</p>
						</div>
						<form id="contactForm2" action="{{ route('send.email') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-md-6 position-relative">
									<input id="name" type="text" name="name" placeholder="Full Name" required="" class="form-control">
								</div>
								<div class="col-md-6 position-relative">
									<input id="email" type="email" name="email" placeholder="Email Address" required="" class="form-control mb-4">
								</div>
								<div class="col-md-6 position-relative">
									<input id="subject" type="text" name="subject" placeholder="Subject" required="" class="form-control">
								</div>
								<div class="col-md-6 position-relative">
									<div class="cd-select mt-4">
										<label class="db"></label>
										<select id="department" name="department" class="select-filter form-control">
											<option value="">Choose Department</option>
											<option value="Support/Help Desk">Support/Help Desk</option>
											<option value="Commercial Department">Commercial Department</option>
											<option value="Sales Department">Sales Department</option>
											<option value="Schedule Metings">Schedule Metings</option>
										</select>
									</div>
								</div>
								<div class="col-md-6 position-relative">
									<div class="form-group mt-4">
										<textarea id="message" name="message" class="form-control" rows="5" placeholder="Message..."></textarea>
									</div>
								</div>
								<div class="col-md-6 position-relative mt-5">
									<input name="newsletter" type="checkbox" id="checkbox" class="filter">
									<label for="checkbox" class="checkbox-label c-grey mb-4"><span>I have read and accept the terms of the privacy policy - <a href="legal" class="golink">RGPD</a></span>
									</label>
									<button type="submit" value="Submit" class="btn btn-default-yellow-fill float-start me-3">Submit Ticket</button>
									<button type="reset" value="reset" class="btn btn-default-fill mt-0 mb-3 mr-3">Reset</button>
									<br>
								</div>
								@if(session('success'))
								<div class="col-md-12 mt-4">
									<h3 class="c-pink"> Message Submitted!</h3>
								</div>
								@endif
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection