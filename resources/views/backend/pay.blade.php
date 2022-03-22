@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Pay</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('pay.store',encrypt($payment->id)) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Name</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control" value="{{ $payment->student->student_name }}" readonly>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Amount</label>
							<div class="col-md-8">
								<input type="number" name="amount" class="form-control" value="{{ $payment->amount }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Due Amount</label>
							<div class="col-md-8">
								<input type="number" name="due" class="form-control" value="{{ $payment->due }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Discount Amount</label>
							<div class="col-md-8">
								<input type="number" name="discount" class="form-control" value="{{ $payment->discount }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label class="col-md-3 col-from-label">Status</label>
							<div class="col-md-8">
								<select name="status" class="form-control">
									<option value="0" @if( $payment->status == 0) {{ 'selected' }} @endif>Pending</option>
									<option value="1" @if( $payment->status == 1) {{ 'selected' }} @endif>Completed</option>
								</select>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-success">Pay</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection