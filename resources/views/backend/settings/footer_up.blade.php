@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Footer Up Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Section One</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="footer_up_section_one">
								<div class="row">									
									<div class="col-md-2">
										<input type="text" name="one_title" placeholder="Title" class="form-control"  value="{{ @unserialize(Settings('footer_up_section_one'))['title']}}" required>
									</div>
									<div class="col-md-2">
										<textarea name="one_description" placeholder="Description" class="form-control" required>{{ @unserialize(Settings('footer_up_section_one'))['description']}}</textarea>
									</div>
									<div class="col-md-2">
										<input type="text" name="one_url" placeholder="Button URL" class="form-control"  value="{{ @unserialize(Settings('footer_up_section_one'))['url'] }}" required>
									</div>
								</div>
							</div>
							<label class="col-md-3 col-from-label"> Section Two</label>
							<div class="col-md-8 mt-2">
								<input type="hidden" name="types[]" value="footer_up_section_two">
								<div class="row">									
									<div class="col-md-2">
										<input type="text" name="two_title" placeholder="Title" class="form-control"  value="{{ @unserialize(Settings('footer_up_section_two'))['title'] }}" required>
									</div>
									<div class="col-md-2">
										<textarea name="two_description" placeholder="Description" class="form-control" required>{{ @unserialize(Settings('footer_up_section_two'))['description'] }}</textarea>
									</div>
									<div class="col-md-2">
										<input type="text" name="two_url" placeholder="Button URL" class="form-control"  value="{{ @unserialize(Settings('footer_up_section_two'))['url'] }}" required>
									</div>
								</div>
							</div>
							<label class="col-md-3 col-from-label"> Section Three</label>
							<div class="col-md-8 mt-2">
								<input type="hidden" name="types[]" value="footer_up_section_three">
								<div class="row">									
									<div class="col-md-2">
										<input type="text" name="three_title" placeholder="Title" class="form-control"  value="{{ @unserialize(Settings('footer_up_section_three'))['title'] }}" required>
									</div>
									<div class="col-md-2">
										<textarea name="three_description" placeholder="Description" class="form-control" required>{{ @unserialize(Settings('footer_up_section_three'))['description'] }}</textarea>
									</div>
									<div class="col-md-2">
										<input type="text" name="three_url" placeholder="Button URL" class="form-control"  value="{{ @unserialize(Settings('footer_up_section_three'))['url'] }}" required>
									</div>
								</div>
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
@push('js')
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
@endpush
@endsection