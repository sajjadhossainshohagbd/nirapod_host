@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Review Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Review Badge</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="reivew_badge">
								<input type="text" name="reivew_badge" class="form-control" value="{{ Settings('reivew_badge') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Review Background Image</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="review_background_image">
								<input type="file" name="review_background_image" class="form-control" onchange="previewLogo(this)">
								<img src="{{ asset(Settings('review_background_image')) }}" id="preview-logo" alt="" height="100" width="100">
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Update</button>
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
        var file = $("input[name=review_background_image]").get(0).files[0];
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