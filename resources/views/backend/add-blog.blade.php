@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Add Blog</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('store.blog') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Title</label>
							<div class="col-md-8">
								<input type="text" name="title" class="form-control" required>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Sub Title</label>
							<div class="col-md-8">
								<input type="text" name="sub_title" class="form-control" required>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Banner</label>
							<div class="col-md-8">
								<input type="file" name="banner" class="form-control" required>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Description</label>
							<div class="col-md-8">
								<textarea name="description" id="description" class="form-control" placeholder="Write a description..."></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Meta Title</label>
							<div class="col-md-8">
								<input type="text" name="meta_title" class="form-control">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Meta Description</label>
							<div class="col-md-8">
								<textarea name="meta_description" id="meta_description" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Tags</label>
							<div class="col-md-8">
								<input type="text" name="tags" class="form-control" data-role="tagsinput" required>
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
@push('css')
<link rel="stylesheet" href="https://www.jqueryscript.net/demo/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.css">
@endpush
@push('js')
<script src="{{ asset('backend/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="https://www.jqueryscript.net/demo/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>
<script>
	ClassicEditor.create( document.querySelector( '#description' ) ).catch( error => {
        console.error( error );
    });
	ClassicEditor.create( document.querySelector( '#meta_description' ) ).catch( error => {
        console.error( error );
    });
</script>
@endpush
@endsection