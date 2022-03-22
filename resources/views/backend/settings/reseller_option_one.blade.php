@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Options</h6>
                    <a href="{{ route('reseller.option.add') }}" class="btn btn-info float-end">Add Option</a>
				</div>
				<div class="card-body">
					<div class="row justify-content-center">
              <div class="col-lg-12">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Position</th>
                          <th scope="col">Icon</th>
                          <th scope="col">Title</th>
                          <th scope="col">URL</th>
                          <th scope="col">Options</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($options as $key => $option)
                      @php
                          $data = json_decode($option->value);
                      @endphp
                        <tr>
                          <th scope="row">{{ $options->firstItem() + $key }}</th>
                          <td>{{ Str::ucfirst(Str::replace('_',' ',$option->key)) }}</td>
                          <td><img src="{{ asset(@$data->icon) }}" alt="" height="50" width="50"></td>
                          <td>{{ @$data->title }}</td>
                          <td>{{ @$data->url }}</td>
                          <td>
                              <a href="{{ route('reseller.option.delete',encrypt($option->id)) }}" class="btn btn-danger" onclick="return confirm('Do you want delete this review?')">{{ __('Delete') }}</a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                      {{ $options->links('pagination::bootstrap-4') }}
                    </table>
              </div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection