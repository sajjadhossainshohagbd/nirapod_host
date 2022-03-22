@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">My Profile</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Name </label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label"> Email Address</label>
							<div class="col-md-8">
								<input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Password </label>
							<div class="col-md-8">
								<input type="password" name="password" class="form-control">
								@error('password')
								<div class="text text-danger">
									{{ __('Password doesn\'t match!') }}
								</div>
								@enderror
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Confirm Password </label>
							<div class="col-md-8">
								<input type="password" name="password_confirmation" class="form-control">
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