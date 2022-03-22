@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">One Time Payment </h6>
				</div>
				<div class="card-body">
					<form action="{{ route('one.time.pay.bill') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="admission_id" value="{{ $student->id }}">
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Name</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control" value="{{ $student->student_name }}" readonly>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Amount</label>
							<div class="col-md-8">
								<input type="number" name="amount" class="form-control">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Due Amount</label>
							<div class="col-md-8">
								<input type="number" name="due" class="form-control">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Discount Amount</label>
							<div class="col-md-8">
								<input type="number" name="discount" class="form-control">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Pay Status</label>
							<div class="col-md-8">
								<select name="status" class="form-control">
									<option value="0" >Pending</option>
									<option value="1">Completed</option>
								</select>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-success">Pay For One Time</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection