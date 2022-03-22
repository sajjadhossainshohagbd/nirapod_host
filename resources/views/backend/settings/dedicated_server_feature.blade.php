@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Dedicated Server Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Feature Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="feature_title">
								<input type="text" name="feature_title" class="form-control" value="{{ Settings('feature_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Feature 1 Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="feature_one_title">
								<input type="text" name="feature_one_title" class="form-control" value="{{ Settings('feature_one_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Feature 2 Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="feature_two_title">
								<input type="text" name="feature_two_title" class="form-control" value="{{ Settings('feature_two_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Feature 3 Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="feature_three_title">
								<input type="text" name="feature_three_title" class="form-control" value="{{ Settings('feature_three_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Feature 3 Option</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="dedicated_server_features">

								@foreach(json_decode(Settings('dedicated_server_features')) as $key => $option)
								<div class="row" @if($key == 0) id="options3" @else id="addField3" @endif>									
									<div class="col-md-2">
										<input type="text" name="feature1[]" placeholder="Feature 1" class="form-control" value="{{ $option->feature1 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature2[]" placeholder="Feature 2 " class="form-control" value="{{ $option->feature2 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature3[]" placeholder="Feature 3" class="form-control" value="{{ $option->feature3 }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key == 0)
										<div class="btn btn-success" onclick="addField(3)">{{ __('More..') }}</div>
										@else
											<div class="btn btn-danger" onclick="remvoeField(3,this)">{{ __('Remove') }}</div>
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

	function addField(num){
		var html = '<div class="row mt-2" id="addField'+num+'">';
       html += '<div class="col-md-2"> <input type="text" name="feature1[]" placeholder="Feature 1" class="form-control"></div><div class="col-md-2"> <input type="text" name="feature2[]" placeholder="Feature 2 " class="form-control"></div><div class="col-md-2"> <input type="text" name="feature3[]" placeholder="Feature 3" class="form-control"></div><div class="col-md-2 mt-2"><div class="btn btn-danger" onclick="remvoeField('+num+',this)">Remove</div></div>';
       html += '</div>';
       $('#options'+num+'').append(html);
	}
	function remvoeField(num,eta)
	{
		$(eta).closest("#addField"+num+"").remove();
	}
</script>
@endpush
@endsection