@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Students</h6>
          <div class="row">
            <div class="col-md-6 mt-2">
              <form action="" method="get">
                <input type="text" name="search" placeholder="Type name Or email Or phone Or course name" autocomplete="off" value="{{ request()->search }}" class="form-control float-left">
                <button type="submit" class="btn btn-success mt-2">Search</button>
              </form>
            </div>
            <div class="col-md-6">
              <a href="{{ route('admission') }}" class="btn btn-info float-end">Add Student</a>
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
                        <th scope="col">Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Course Duration</th>
                        <th scope="col">Due Amount</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col" width="30%">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($students as $key => $review)
                      <tr>
                        <th scope="row">{{ $students->firstItem() + $key }}</th>
                        <td>{{ $review->student_name }}</td>
                        <td><a href="{{ route('students',['search' => $review->course_name ]) }}">{{ $review->course_name }}</a></td>
                        <td>{{ $review->course_duration }} Months</td>
                        <td>৳{{ $review->due_amount }}</td>
                        <td>৳{{ $review->paid_amount }}</td>
                        <td>{{ $review->email ?? '-' }}</td>
                        <td>{{ $review->phone }}</td>
                        <td>
                          <a href="{{ route('payment.details',encrypt($review->id)) }}" class="btn btn-success">{{ __('Payment') }}</a>
                          <a href="{{ route('student.edit',encrypt($review->id)) }}" class="btn btn-info">{{ __('Edit') }}</a>
                            <a href="{{ route('student.delete',encrypt($review->id)) }}" class="btn btn-danger" onclick="return confirm('Do you want delete this review?')">{{ __('Delete') }}</a>
                        </td>
                      </tr>
                    @empty 
                      <td colspan="8" class="text-center text-info">{{ __('No Students Found!') }}</td>
                    @endforelse
                    </tbody>
                    {{ $students->links('pagination::bootstrap-4') }}
                </table>
              </div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection