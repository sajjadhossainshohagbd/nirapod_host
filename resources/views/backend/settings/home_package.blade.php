@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Packages @if(request()->query('position')) ({{ Str::replace('_',' ',Str::ucfirst(request()->query('position'))) }}) @endif</h6>
                    <a href="{{ route('add.package',['position' => request()->query('position')]) }}" class="btn btn-info float-end">Add Package</a>
				</div>
				<div class="card-body">
					<div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="row">
                                @forelse($packages as $package)
                                <div class="col-xl-4">
                                    <div class="card pricing-box text-center">
                                        <div class="badge bg-soft-success font-size-12">{{ Str::replace('_',' ',Str::ucfirst($package->position)) }}</div>
                                        <div class="card-body p-4">
                                            <div>
                                                <div class="mt-3">
                                                    <img src="{{ asset($package->icon) }}" alt="">
                                                    <h5 class="mb-1">{{ $package->title }}</h5>
                                                    <p class="text-muted">{{ $package->sub_title }}</p>
                                                    <div class="py-1">
                                                        <h3><sup><small>Tk </small></sup> {{ $package->amount }}/ <span class="font-size-13 text-muted">Per month</span></h3>
                                                    </div>
                                                    <div class="text-center plan-btn my-2"> 
                                                        <a href="{{ $package->btn_url }}" class="btn btn-primary waves-effect waves-light">{{ $package->btn_name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled plan-features mt-3">
                                                @foreach(json_decode($package->options) as $option)
                                                <li>
                                                    <i class="{{ $option->icon }}"></i>
                                                    {{ $option->name }} <br>
                                                    <span class="text-primary ">{{ $option->value }}</span>
                                                </li>
                                                @endforeach
                                            </ul>

                                            <a href="{{ route('edit.package',encrypt($package->id)) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('delete.package',encrypt($package->id)) }}" onclick="return confirm('Do you want delete this package?')" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="text text-info">
                                    {{ __('No Package Found!') }}
                                </div>
                                @endforelse
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