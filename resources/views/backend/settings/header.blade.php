@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Header Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Header Menus</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="header_menus">

								@foreach(json_decode(Settings('header_menus')) as $key => $option)
								<div class="row" @if($key == 0) id="options" @else id="addField" @endif>									
									<div class="col-md-5">
										<input type="text" name="menu_name[]" placeholder="Menu Name" class="form-control" value="{{ $option->menu_name }}">
									</div>
									<div class="col-md-5">
										<input type="text" name="menu_url[]" placeholder="Menu URL" class="form-control" value="{{ $option->menu_url }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key == 0)
										<div class="btn btn-success" id="more">{{ __('More..') }}</div>
										@else
											<div class="btn btn-danger" id="delete">{{ __('Remove') }}</div>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Phone Number</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="header_phone">
								<input type="number" name="header_phone" class="form-control" value="{{ Settings('header_phone') }}">
							</div>
						</div>
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Login Button URL</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="login_btn_url">
								<input type="text" name="login_btn_url" class="form-control" value="{{ Settings('login_btn_url') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Menu Background Color</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="header_menu_background">
								<input type="text" name="header_menu_background" class="form-control" value="{{ Settings('header_menu_background') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Menu Color</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="header_menu_color">
								<input type="text" name="header_menu_color" class="form-control" value="{{ Settings('header_menu_color') }}">
							</div>
						</div>
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Site Logo</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="logo">
								<input type="file" name="logo" class="form-control" onchange="previewLogo(this)">
								<img src="{{ asset(Settings('logo')) }}" id="preview-logo" height="100" width="80%">
							</div>
						</div> 
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Site Icon</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="site_icon">
								<input type="file" name="site_icon" class="form-control" onchange="previewSiteIcon(this)">
								<img src="{{ asset(Settings('site_icon')) }}" id="preview-icon" height="100" width="100">
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

	$("#more").click(function () {
       var html = '<div class="row mt-2" id="addField">';
       html += '<div class="col-md-5"><input type="text" name="menu_name[]" placeholder="Menu Name" class="form-control"></div><div class="col-md-5"><input type="text" name="menu_url[]" placeholder="Menu URL" class="form-control"></div><div class="col-md-2 mt-2"><div class="btn btn-danger" id="delete">Remove</div></div>';
       html += '</div>';
       $('#options').append(html);
   	});
   	$(document).on('click', '#delete', function () {
        $(this).closest('#addField').remove();
    });
</script>
@endpush
@endsection