@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Add Package</h6>
                    <a href="{{ route('package') }}" class="btn btn-info float-end">Back to Packages</a>
				</div>
				<div class="card-body">
					<div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card pricing-box text-center">
                                        <form action="{{ route('store.package') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body p-4">
                                                <div>
                                                    <div class="mt-3">
                                                        <h6>Package Position</h6>
                                                        <select name="position" id="position">
                                                            <option value="home_page" @if(request()->query('position') == 'home_page') selected @endif>Home Page</option>
                                                            <option value="reseller" @if(request()->query('position') == 'reseller') selected @endif>Reseller</option>
                                                            <option value="ssd" @if(request()->query('position') == 'ssd') selected @endif>SSD Web Hosting</option>
                                                            <option value="dedicated_server" @if(request()->query('position') == 'dedicated_server') selected @endif>Dedicated Server</option>
                                                            <option value="vps_server" @if(request()->query('position') == 'vps_server') selected @endif>VPS Server</option>
                                                        </select>
                                                        <h6>SVG</h6>
                                                        <input type="file" name="icon" class="form-control">
                                                        <h5 class="mb-1">Package Badge</h5>
                                                        <input type="text" name="badge" class="form-control">
                                                        <h5 class="mb-1">Package Title</h5>
                                                        <input type="text" name="title" class="form-control" required>
                                                        <h5 class="mb-1">Package Sub Title</h5>
                                                        <input type="text" name="sub_title" class="form-control" required>
                                                        <div class="py-1">
                                                            <h3><sup><small>Tk </small></sup> <input type="number" name="amount">/ <span class="font-size-13 text-muted">Per month</span></h3>
                                                        </div>
                                                        <div class="text-center plan-btn my-2"> 
                                                            <input type="text" name="btn_name" class="form-control mb-2" placeholder="Button Name" required>
                                                            <input type="text" name="btn_url" class="form-control" placeholder="Button URL" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="list-unstyled plan-features mt-3">
                                                    <div class="row" id="options">
                                                        <div class="col-md-3">
                                                            <input type="text" name="option_icon[]" placeholder="Icon" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="option_name[]" placeholder="Name" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="option_value[]" placeholder="Value" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="btn btn-success" id="more">{{ __('More..') }}</div>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div>
                                            <button type="submit" class="btn btn-success p-2 mb-2">Add Package</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('js')
<script>
    $("#more").click(function () {
       var html = '<div class="row" id="addField">';
       html += '<div class="col-md-3 mt-2"><input type="text" name="option_icon[]" placeholder="Icon" class="form-control"></div>';
       html += '<div class="col-md-3 mt-2"><input type="text" name="option_name[]" placeholder="Name" class="form-control"></div>';
       html += '<div class="col-md-3 mt-2"><input type="text" name="option_value[]" placeholder="Value" class="form-control"></div>';
       html += '<div class="col-md-3 mt-2"><button class="btn btn-danger" id="delete">{{ __("Remove") }}</button></div>';
       html += '</div>';
       $('#options').append(html);
   });
   $(document).on('click', '#delete', function () {
        $(this).closest('#addField').remove();
    });
</script>
@endpush