@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">VPS Server Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="vps_title">
								<input type="text" name="vps_title" class="form-control" value="{{ Settings('vps_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="vps_description">
								<input type="text" name="vps_description" class="form-control" value="{{ Settings('vps_description') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Page Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="vps_page_description">
								<textarea type="text" name="vps_page_description" id="vps_page_description" class="form-control">{{ Settings('vps_page_description') }}</textarea>
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
<script src="{{ asset('backend/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script>
ClassicEditor
        .create( document.querySelector( '#vps_page_description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
@endsection