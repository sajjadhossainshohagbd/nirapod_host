@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Web Hosting Options</h6>
                    <a href="{{ route('web.hosting.add.option') }}" class="btn btn-info float-end">Add Option</a>
				</div>
				<div class="card-body">
					<div class="row justify-content-center">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Button</th>
                                    <th scope="col">URL</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($options as $key => $option)
                                @php
                                    $data = json_decode($option->value);
                                @endphp
                                  <tr>
                                    <th scope="row">{{ 1 + $key }}</th>
                                    <td><img src="{{ asset($data->image) }}" alt=""></td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->btn_name }}</td>
                                    <td>{{ $data->url }}</td>
                                    <td>
                                        <a href="{{ route('web.hosting.delete.option',encrypt($option->id)) }}" class="btn btn-danger" onclick="return confirm('Do you want delete this option?')">{{ __('Delete') }}</a>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                                {{-- {{ $reviews->links('pagination::bootstrap-4') }}  --}}
                              </table>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection