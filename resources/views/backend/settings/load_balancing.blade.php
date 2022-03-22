@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Load Balancing Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="load_balancing_title">
								<input type="text" name="load_balancing_title" class="form-control" value="{{ Settings('load_balancing_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="load_balancing_description">
								<textarea name="load_balancing_description" class="form-control">{{ Settings('load_balancing_description') }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Section 1 Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="load_section_one_title">
								<input type="text" name="load_section_one_title" class="form-control" value="{{ Settings('load_section_one_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Section 1 Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="load_section_one_description">
								<textarea name="load_section_one_description" class="form-control">{{ Settings('load_section_one_description') }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Section 2 Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="load_section_two_title">
								<input type="text" name="load_section_two_title" class="form-control" value="{{ Settings('load_section_two_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Section 2 Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="load_section_two_description">
								<textarea name="load_section_two_description" class="form-control">{{ Settings('load_section_two_description') }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Section 3 Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="load_section_three_title">
								<input type="text" name="load_section_three_title" class="form-control" value="{{ Settings('load_section_three_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Section 3 Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="load_section_three_description">
								<textarea name="load_section_three_description" class="form-control">{{ Settings('load_section_three_description') }}</textarea>
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