@extends('backend.layouts.app')

@section('content')
<style>
	/* Style the button that is used to open and close the collapsible content */
.collapsible {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .collapsible:hover {
  background-color: #ccc;
}

/* Style the collapsible content. Note: hidden by default */
.option_content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Why Choose Setting</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Title</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="why_choose_title">
								<input type="text" name="why_choose_title" class="form-control" value="{{ Settings('why_choose_title') }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Description</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="why_choose_description">
								<textarea name="why_choose_description" class="form-control">{{ Settings('why_choose_description') }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Options</label>
							<div class="col-md-8">
								<input type="hidden" name="types[]" value="why_choose_options">

								{{-- @foreach(json_decode(Settings('why_choose_options')) as $key => $option)
									<div class="row" @if($key == 0) id="options" @else id="addField" @endif>									
										<div class="col-md-2">
											<input type="text" name="badge[]" placeholder="Badge" class="form-control" value="{{ $option->badge }}">
										</div>
										<div class="col-md-2">
											<input type="text" name="icon[]" placeholder="Icon" class="form-control"  value="{{ $option->icon }}" required>
										</div>
										<div class="col-md-2">
											<input type="text" name="title[]" placeholder="Title" class="form-control"  value="{{ $option->title }}" required>
										</div>
										<div class="col-md-2">
											<textarea name="description[]" placeholder="Description" class="form-control" required>{{ $option->description }}</textarea>
										</div>
										<div class="col-md-2">
											<input type="text" name="btn_name[]" placeholder="Button Name" class="form-control"  value="{{ $option->btn_name }}" required>
										</div>
										<div class="col-md-2">
											<input type="text" name="btn_url[]" placeholder="Button URL" class="form-control"  value="{{ $option->btn_url }}" required>
										</div>
										<div class="col-md-2 mt-2">
											@if($key == 0)
											<div class="btn btn-success" id="more">{{ __('More..') }}</div>
											@else
												<div class="btn btn-danger" id="delete">{{ __('Remove') }}</div>
											@endif
										</div>
									</div>
								@endforeach --}}

								<div class="btn btn-success mb-2" id="more">{{ __('More..') }}</div>


								@foreach(json_decode(Settings('why_choose_options')) as $key => $option)
									<div id="options">
										<div class="option-tab">
											<button type="button" class="collapsible">Option {{ $key+1 }}</button>
											<div class="option_content">
												<div class="row" id="addField">									
													<div class="col-md-10 mb-2">
														<label for="">Badge </label>
														<input type="text" name="badge[]" placeholder="Badge" class="form-control" value="{{ $option->badge }}">
													</div>
													<div class="col-md-10 mb-2">
														<label for="">Icon </label>
														<input type="text" name="icon[]" placeholder="Icon" class="form-control"  value="{{ $option->icon }}" required>
													</div>
													<div class="col-md-10 mb-2">
														<label for="">Title </label>
														<input type="text" name="title[]" placeholder="Title" class="form-control"  value="{{ $option->title }}" required>
													</div>
													<div class="col-md-10 mb-2">
														<label for="">Description </label>
														<textarea name="description[]" placeholder="Description" class="form-control" required>{{ $option->description }}</textarea>
													</div>
													<div class="col-md-10 mb-2">
														<label for="">Button Name </label>
														<input type="text" name="btn_name[]" placeholder="Button Name" class="form-control"  value="{{ $option->btn_name }}" required>
													</div>
													<div class="col-md-10 mb-2">
														<label for="">Button URL </label>
														<input type="text" name="btn_url[]" placeholder="Button URL" class="form-control"  value="{{ $option->btn_url }}" required>
													</div>
													<div class="col-md-10 mb-2">
														<div class="btn btn-danger" id="delete">{{ __('Remove') }}</div>
													</div>
												</div>
												<hr>
											</div>
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
		html += '<div class="col-md-2"><input type="text" name="badge[]" placeholder="Badge" class="form-control"></div><div class="col-md-2"><input type="text" name="icon[]" placeholder="Icon" class="form-control" required></div><div class="col-md-2"><input type="text" name="title[]" placeholder="Title" class="form-control" required></div><div class="col-md-2"><textarea name="description[]" placeholder="Description" class="form-control" required></textarea></div><div class="col-md-2"><input type="text" name="btn_name[]" placeholder="Button Name" class="form-control" required></div><div class="col-md-2"><input type="text" name="btn_url[]" placeholder="Button URL" class="form-control" required></div><div class="col-md-2 mt-2"><div class="btn btn-danger" id="latest-delete">Remove</div></div>';
		html += '</div>';
		$('#options').append(html);
   });
   	$(document).on('click', '#delete', function () {
        $(this).closest('.option-tab').remove();
    });

	$(document).on('click', '#latest-delete', function () {
        $(this).closest('#addField').remove();
    });
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
				content.style.display = "none";
			} else {
				content.style.display = "block";
			}
		});
	}
</script>
@endpush
@endsection