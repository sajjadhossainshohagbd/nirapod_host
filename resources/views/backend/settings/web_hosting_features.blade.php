@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Web Hosting Features</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Badge title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_badge">
								<input type="text" name="web_hosting_feature_badge" class="form-control" value="{{ Settings('web_hosting_feature_badge') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_package">

								@foreach(json_decode(Settings('web_hosting_feature_package')) as $key => $option)
								<div class="row" @if($key == 0) id="options" @else id="addField" @endif>									
									<div class="col-md-2 mb-2">
										<input type="text" name="title[]" placeholder="Title" class="form-control"  value="{{ $option->title }}" required>
									</div>
									<div class="col-md-2 mb-2">
										<input type="text" name="subtitle[]" placeholder="Sub Title" class="form-control"  value="{{ $option->subtitle }}">
									</div>
									<div class="col-md-2 mb-2">
										<input type="number" name="price[]" placeholder="Price" class="form-control"  value="{{ $option->price }}">
									</div>
									<div class="col-md-2 mb-2">
										<input type="text" name="btn_name[]" placeholder="Button Name" class="form-control"  value="{{ $option->btn_name }}" required>
									</div>
									<div class="col-md-2 mb-2">
										<input type="text" name="url[]" placeholder="Button URL" class="form-control"  value="{{ $option->url }}" required>
									</div>
									{{-- <div class="col-md-2 mt-2">
										@if($key == 0)
										<div class="btn btn-success" id="more">{{ __('More..') }}</div>
										@else
											<div class="btn btn-danger" id="delete">{{ __('Remove') }}</div>
										@endif
									</div> --}}
								</div>
								@endforeach
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 1 </label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_1">
								{{-- {{ dd(json_decode(Settings('web_hosting_feature_package_1'))) }} --}}
								@foreach(json_decode(Settings('web_hosting_feature_package_1')) as $key => $option)
								<div class="row" @if($key ==0) id="options1" @else id="addField1" @endif>
									<div class="col-md-2">
										<input type="text" name="feature1[]" placeholder="Feature" class="form-control" value="{{ $option->feature_name }}" required>
									</div>
									<div class="col-md-2">
										<input type="text" name="feature1_value_1[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature1 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature1_value_2[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature2 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature1_value_3[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature3 }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key ==0)
											<div class="btn btn-success" onclick="addField(1,'options1')">{{ __('More..') }}</div>
										@else
										<div class="btn btn-danger" onclick="remvoeField(1,this)">{{ __('Remove') }}</div>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 2 title</label>
							<div class="col-md-6">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_2_title">
								<input type="text" name="web_hosting_feature_package_2_title" class="form-control" value="{{ Settings('web_hosting_feature_package_2_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 2 </label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_2">
								@foreach(json_decode(Settings('web_hosting_feature_package_2')) as $key => $option)
								<div class="row" @if($key ==0) id="options2" @else id="addField2" @endif>
									<div class="col-md-2">
										<input type="text" name="feature2[]" placeholder="Feature" class="form-control" value="{{ $option->feature_name }}" required>
									</div>
									<div class="col-md-2">
										<input type="text" name="feature2_value_1[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature1 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature2_value_2[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature2 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature2_value_3[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature3 }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key ==0)
											<div class="btn btn-success" onclick="addField(2,'options2')">{{ __('More..') }}</div>
										@else
										<div class="btn btn-danger" onclick="remvoeField(2,this)">{{ __('Remove') }}</div>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 3 title</label>
							<div class="col-md-6">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_3_title">
								<input type="text" name="web_hosting_feature_package_3_title" class="form-control" value="{{ Settings('web_hosting_feature_package_3_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 3 </label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_3">
								@foreach(json_decode(Settings('web_hosting_feature_package_3')) as $key => $option)
								<div class="row" @if($key ==0) id="options3" @else id="addField3" @endif>
									<div class="col-md-2">
										<input type="text" name="feature3[]" placeholder="Feature" class="form-control" value="{{ $option->feature_name }}" required>
									</div>
									<div class="col-md-2">
										<input type="text" name="feature3_value_1[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature1 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature3_value_2[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature2 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature3_value_3[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature3 }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key ==0)
											<div class="btn btn-success" onclick="addField(3,'options3')">{{ __('More..') }}</div>
										@else
										<div class="btn btn-danger" onclick="remvoeField(3,this)">{{ __('Remove') }}</div>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 4 title</label>
							<div class="col-md-6">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_4_title">
								<input type="text" name="web_hosting_feature_package_4_title" class="form-control" value="{{ Settings('web_hosting_feature_package_4_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 4 </label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_4">
								@foreach(json_decode(Settings('web_hosting_feature_package_4')) as $key => $option)
								<div class="row" @if($key ==0) id="options4" @else id="addField4" @endif>
									<div class="col-md-2">
										<input type="text" name="feature4[]" placeholder="Feature" class="form-control" value="{{ $option->feature_name }}" required>
									</div>
									<div class="col-md-2">
										<input type="text" name="feature4_value_1[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature1 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature4_value_2[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature2 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature4_value_3[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature3 }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key ==0)
											<div class="btn btn-success" onclick="addField(4,'options4')">{{ __('More..') }}</div>
										@else
											<div class="btn btn-danger" onclick="remvoeField(4,this)">{{ __('Remove') }}</div>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 5 title</label>
							<div class="col-md-6">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_5_title">
								<input type="text" name="web_hosting_feature_package_5_title" class="form-control" value="{{ Settings('web_hosting_feature_package_5_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 5 </label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_5">
								@foreach(json_decode(Settings('web_hosting_feature_package_5')) as $key => $option)
								<div class="row" @if($key ==0) id="options5" @else id="addField5" @endif>
									<div class="col-md-2">
										<input type="text" name="feature5[]" placeholder="Feature" class="form-control" value="{{ $option->feature_name }}" required>
									</div>
									<div class="col-md-2">
										<input type="text" name="feature5_value_1[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature1 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature5_value_2[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature2 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature5_value_3[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature3 }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key ==0)
											<div class="btn btn-success" onclick="addField(5,'options5')">{{ __('More..') }}</div>
										@else
											<div class="btn btn-danger" onclick="remvoeField(5,this)">{{ __('Remove') }}</div>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 6 title</label>
							<div class="col-md-6">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_6_title">
								<input type="text" name="web_hosting_feature_package_6_title" class="form-control" value="{{ Settings('web_hosting_feature_package_6_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 6 </label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_6">
								@foreach(json_decode(Settings('web_hosting_feature_package_6')) as $key => $option)
								<div class="row" @if($key ==0) id="options6" @else id="addField6" @endif>
									<div class="col-md-2">
										<input type="text" name="feature6[]" placeholder="Feature" class="form-control" value="{{ $option->feature_name }}" required>
									</div>
									<div class="col-md-2">
										<input type="text" name="feature6_value_1[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature1 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature6_value_2[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature2 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature6_value_3[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature3 }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key ==0)
											<div class="btn btn-success" onclick="addField(6,'options6')">{{ __('More..') }}</div>
										@else
											<div class="btn btn-danger" onclick="remvoeField(6,this)">{{ __('Remove') }}</div>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 7 title</label>
							<div class="col-md-6">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_7_title">
								<input type="text" name="web_hosting_feature_package_7_title" class="form-control" value="{{ Settings('web_hosting_feature_package_7_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 7 </label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_7">
								@foreach(json_decode(Settings('web_hosting_feature_package_7')) as $key => $option)
								<div class="row" @if($key ==0) id="options7" @else id="addField7" @endif>
									<div class="col-md-2">
										<input type="text" name="feature7[]" placeholder="Feature" class="form-control" value="{{ $option->feature_name }}" required>
									</div>
									<div class="col-md-2">
										<input type="text" name="feature7_value_1[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature1 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature7_value_2[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature2 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature7_value_3[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature3 }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key ==0)
											<div class="btn btn-success" onclick="addField(7,'options7')">{{ __('More..') }}</div>
										@else
											<div class="btn btn-danger" onclick="remvoeField(7,this)">{{ __('Remove') }}</div>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 8 title</label>
							<div class="col-md-6">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_8_title">
								<input type="text" name="web_hosting_feature_package_8_title" class="form-control" value="{{ Settings('web_hosting_feature_package_8_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Package Feature 8</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="web_hosting_feature_package_8">
								@foreach(json_decode(Settings('web_hosting_feature_package_8')) as $key => $option)
								<div class="row" @if($key ==0) id="options8" @else id="addField8" @endif>
									<div class="col-md-2">
										<input type="text" name="feature8[]" placeholder="Feature" class="form-control" value="{{ $option->feature_name }}" required>
									</div>
									<div class="col-md-2">
										<input type="text" name="feature8_value_1[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature1 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature8_value_2[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature2 }}">
									</div>
									<div class="col-md-2">
										<input type="text" name="feature8_value_3[]" placeholder="Feature Value" class="form-control" value="{{ $option->feature3 }}">
									</div>
									<div class="col-md-2 mt-2">
										@if($key ==0)
											<div class="btn btn-success" onclick="addField(8,'options8')">{{ __('More..') }}</div>
										@else
											<div class="btn btn-danger" onclick="remvoeField(8,this)">{{ __('Remove') }}</div>
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
       html += '<div class="col-md-2"> <input type="text" name="title[]" placeholder="Title" class="form-control" required></div><div class="col-md-2"> <input type="text" name="subtitle[]" placeholder="Sub Title" class="form-control"></div><div class="col-md-2"> <input type="number" name="price[]" placeholder="Price" class="form-control"></div><div class="col-md-2"> <input type="text" name="btn_name[]" placeholder="Button Name" class="form-control" required></div><div class="col-md-2"> <input type="text" name="url[]" placeholder="Button URL" class="form-control" required></div><div class="col-md-2 mt-2"> <div class="btn btn-danger" id="delete">{{ __('Remove') }}</div></div>';
       html += '</div>';
       $('#options').append(html);
   });
   	$(document).on('click', '#delete', function () {
        $(this).closest('#addField').remove();
    });

	function addField(num,option){
		var html = '<div class="row" id="addField'+num+'">';
		html += '<div class="col-md-2"> <input type="text" name="feature'+num+'[]" placeholder="Feature" class="form-control" required></div><div class="col-md-2"> <input type="text" name="feature'+num+'_value_1[]" placeholder="Feature Value" class="form-control"></div><div class="col-md-2"> <input type="text" name="feature'+num+'_value_2[]" placeholder="Feature Value" class="form-control"></div><div class="col-md-2"> <input type="text" name="feature'+num+'_value_3[]" placeholder="Feature Value" class="form-control"></div><div class="col-md-2 mt-2"><div class="btn btn-danger" onclick="remvoeField('+num+',this)">{{ __('Remove') }}</div></div>';
		html += '</div>';
		$("#options"+num+"").append(html);
	}
	function remvoeField(num,eta)
	{
		$(eta).closest("#addField"+num+"").remove();
	}
</script>
@endpush
@endsection