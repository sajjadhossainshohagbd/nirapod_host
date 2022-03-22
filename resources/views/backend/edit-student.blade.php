@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Edit Student</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('student.update',encrypt($student->id)) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Name</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control" value="{{ $student->student_name }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Email</label>
							<div class="col-md-8">
								<input type="email" name="email" class="form-control" value="{{ $student->email }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Phone</label>
							<div class="col-md-8">
								<input type="number" name="phone" class="form-control" value="{{ $student->phone }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Course Duration</label>
							<div class="col-md-8">
								@if($student->course_duration == 3 || $student->course_duration == 6 || $student->course_duration == 12)
									<select name="course_duration" class="form-control">
										<option value="">Select Duration</option>
										<option value="3" @if($student->course_duration == 3) {{ 'selected' }} @endif>3 Month</option>
										<option value="6" @if($student->course_duration == 6) {{ 'selected' }} @endif>6 Month</option>
										<option value="12" @if($student->course_duration == 12) {{ 'selected' }} @endif>1 Year</option>
									</select>
								@else
									<input type="number" class="form-control" name="course_duration" value="{{ $student->course_duration }}">
								@endif
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
@endsection