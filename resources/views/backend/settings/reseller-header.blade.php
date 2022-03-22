@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Reseller  Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="reseller_title">
								<input type="text" name="reseller_title" class="form-control" value="{{ Settings('reseller_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="reseller_description">
								<input type="text" name="reseller_description" class="form-control" value="{{ Settings('reseller_description') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Reseller Option Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="reseller_option_one_title">
								<textarea name="reseller_option_one_title" class="form-control">{{ Settings('reseller_option_one_title') }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Reseller Option Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="reseller_option_two_title">
								<textarea name="reseller_option_two_title" class="form-control">{{ Settings('reseller_option_two_title') }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Reseller FAQ Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="reseller_faq_title">
								<textarea name="reseller_faq_title" class="form-control">{{ Settings('reseller_faq_title') }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Reseller FAQ Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="reseller_faq_description">
								<textarea name="reseller_faq_description" class="form-control">{{ Settings('reseller_faq_description') }}</textarea>
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