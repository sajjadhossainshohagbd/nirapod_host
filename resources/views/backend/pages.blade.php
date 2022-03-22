@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Pages</h6>
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('add.page') }}" class="btn btn-info float-end">Add Page</a>
            </div>
          </div>
				</div>
				<div class="card-body">
					<div class="row justify-content-center">
              <div class="col-lg-12">
                <table class="table table-responsive text-center">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Sub Title</th>
                        <th scope="col">URL</th>
                        <th scope="col" width="30%">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($pages as $key => $review)
                      <tr>
                        <th scope="row">{{ $pages->firstItem() + $key }}</th>
                        <td>{{ $review->title }}</td>
                        <td>{{ $review->sub_title }}</td>
                        <td><a href="{{ route('frontend.page',$review->url) }}" target="_blank">{{ route('frontend.page',$review->url) }}</a></td>
                        <td>
                          <a href="{{ route('edit.page',encrypt($review->id)) }}" class="btn btn-info">{{ __('Edit') }}</a>
                            <a href="{{ route('delete.page',encrypt($review->id)) }}" class="btn btn-danger" onclick="return confirm('Do you want delete this review?')">{{ __('Delete') }}</a>
                        </td>
                      </tr>
                    @empty 
                      <td colspan="8" class="text-center text-info">{{ __('No Pages Found!') }}</td>
                    @endforelse
                    </tbody>
                    {{ $pages->links('pagination::bootstrap-4') }}
                </table>
              </div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection