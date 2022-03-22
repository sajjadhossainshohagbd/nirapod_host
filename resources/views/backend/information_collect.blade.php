@extends('backend.layouts.app')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
@endpush
@push('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

	<script>

		$(function () {
             $('#reminder_at').datetimepicker({
				format:'YYYY-MM-DD HH:mm:ss',
			 });
         });
	</script>
@endpush
@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Information Collector</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('information.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Meeting With</label>
							<div class="col-md-8">
								<input type="text" name="meeting_with" class="form-control" value="{{ old('meeting_with') }}" required>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Category</label>
							<div class="col-md-8">
								<select name="category_id" id="category_id" class="form-control">
									<option value="" selected disabled>Select Category</option>
									@foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Name</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">For Whom?</label>
							<div class="col-md-8">
								<input type="text" name="for_whom" class="form-control" value="{{ old('for_whom') }}" required>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Which Course?</label>
							<div class="col-md-8">
								<input type="text" name="which_course" class="form-control" value="{{ old('which_course') }}" required>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Phone</label>
							<div class="col-md-8">
								<input type="number" name="phone" class="form-control" value="{{ old('phone') }}" required>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Email Address</label>
							<div class="col-md-8">
								<input type="email" name="email" class="form-control" value="{{ old('email') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Profession</label>
							<div class="col-md-8">
								<input type="text" name="profession" class="form-control" value="{{ old('profession') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Institution / Company</label>
							<div class="col-md-8">
								<input type="text" name="institution" class="form-control" value="{{ old('institution') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Approxiate Age</label>
							<div class="col-md-8">
								<input type="text" name="approximate_age" class="form-control" value="{{ old('approximate_age') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Address</label>
							<div class="col-md-8">
								<input type="text" name="address" class="form-control" value="{{ old('address') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Additonal Info</label>
							<div class="col-md-8">
								<textarea name="additional" class="form-control">{{ old('additional') }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2" >
							<label class="col-md-3 col-from-label">Reminder Date</label>
							<div class="col-md-8">
								<input type="date" name="reminder_date" id="reminder_date" class="form-control" value="{{ old('reminder_date') }}" required>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    function previewSiteIcon(input){
        var file = $("input[name=site_icon]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#preview-icon").removeClass('d-none');
                $("#preview-icon").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    function previewLogo(input){
        var file = $("input[name=logo]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#preview-logo").removeClass('d-none');
                $("#preview-logo").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection