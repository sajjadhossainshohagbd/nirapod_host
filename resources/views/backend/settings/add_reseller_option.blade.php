@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Add Option</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Option Position</label>
							<div class="col-md-8">
								<select name="types[]" id="types" class="form-control">
									<option value="reseller_option_one"> Option One</option>
									<option value="reseller_option_two"> Option Two</option>
								</select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Title</label>
							<div class="col-md-8">
								<input type="text" name="title" class="form-control">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Icon</label>
							<div class="col-md-8">
								<input type="file" name="icon" class="form-control">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">URL</label>
							<div class="col-md-8">
								<input type="text" name="url" class="form-control">
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