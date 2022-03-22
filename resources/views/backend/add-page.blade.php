@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Add Page</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('store.page') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Title</label>
							<div class="col-md-8">
								<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
								@error('title')
									<div class="alert alert-warning">
										Title is required.
									</div>
								@enderror
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Sub Title</label>
							<div class="col-md-8">
								<input type="text" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror" value="{{ old('sub_title') }}">
								@error('sub_title')
									<div class="alert alert-warning">
										Sub title is required.
									</div>
								@enderror
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Description</label>
							<div class="col-md-8">
								<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Write a description..."></textarea>
								@error('description')
									<div class="alert alert-warning">
										Description is required.
									</div>
								@enderror
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
<script src="{{ asset('backend/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script>
ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection