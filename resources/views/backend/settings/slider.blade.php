@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Slider Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="slider_title">
								<input type="text" name="slider_title" class="form-control" value="{{ Settings('slider_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Typed Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="slider_typed_title">
								<input type="text" name="slider_typed_title" class="form-control" value="{{ Settings('slider_typed_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="slider_description">
								<textarea name="slider_description" class="form-control">{{ Settings('slider_description') }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Button 1</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="slider_btn_1">
								<input type="text" name="slider_btn_1" class="form-control" value="{{ Settings('slider_btn_1') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Button 1 URL</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="slider_btn_1_url">
								<input type="text" name="slider_btn_1_url" class="form-control" value="{{ Settings('slider_btn_1_url') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Button 2</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="slider_btn_2">
								<input type="text" name="slider_btn_2" class="form-control" value="{{ Settings('slider_btn_2') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Button 2 URL</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="slider_btn_2_url">
								<input type="text" name="slider_btn_2_url" class="form-control" value="{{ Settings('slider_btn_2_url') }}">
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