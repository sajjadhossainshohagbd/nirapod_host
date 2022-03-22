@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Web Hosting Header  Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_header_title">
								<input type="text" name="web_hosting_header_title" class="form-control" value="{{ Settings('web_hosting_header_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_header_description">
								<input type="text" name="web_hosting_header_description" class="form-control" value="{{ Settings('web_hosting_header_description') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Option Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_option_title">
								<input type="text" name="web_hosting_option_title" class="form-control" value="{{ Settings('web_hosting_option_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Options</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_header_options">

								@foreach(json_decode(Settings('web_hosting_header_options')) as $key => $option)
								<div class="row" @if($key == 0) id="options" @else id="addField" @endif>									
									<div class="col-md-10">
										<input type="text" name="title[]" placeholder="Title" class="form-control" value="{{ $option }}">
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
	$("#more").click(function () {
       var html = '<div class="row mt-2" id="addField">';
       html += '<div class="col-md-10"><input type="text" name="title[]" placeholder="Title" class="form-control"></div><div class="col-md-2 mt-2"><div class="btn btn-danger" id="delete">Remove</div></div>';
       html += '</div>';
       $('#options').append(html);
   	});
   	$(document).on('click', '#delete', function () {
        $(this).closest('#addField').remove();
    });
</script>
@endpush
@endsection