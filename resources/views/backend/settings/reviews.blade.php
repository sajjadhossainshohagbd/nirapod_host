@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Review</h6>
                    <a href="{{ route('add.review') }}" class="btn btn-info float-end">Add Review</a>
				</div>
				<div class="card-body">
					<div class="row justify-content-center">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Reviews</th>
                                    <th scope="col">Button</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Options</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $key => $review)
                                  <tr>
                                    <th scope="row">{{ $reviews->firstItem() + $key }}</th>
                                    <td>{{ $review->customer_name }}</td>
                                    <td>{{ $review->review }}</td>
                                    <td>{{ $review->button }}</td>
                                    <td>{{ $review->url }}</td>
                                    <td>
                                        <a href="{{ route('delete.review',encrypt($review->id)) }}" class="btn btn-danger" onclick="return confirm('Do you want delete this review?')">{{ __('Delete') }}</a>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                                {{ $reviews->links('pagination::bootstrap-4') }}
                              </table>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection