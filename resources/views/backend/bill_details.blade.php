@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
          <div class="row">
              <div class="col-md-6 text-start">
					        <h6 class="mt-2">Payment Of <b>{{ $student->student_name }}</b></h6>
              </div> 
              <div class="col-md-6 text-end">
                <a href="{{ route('one.time.pay',encrypt($student->id)) }}" class="btn btn-success">{{ __('One Time Payment') }}</a>
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
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Due Amount</th>
                        <th scope="col">Discount Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($payments as $key => $payment)
                      <tr>
                        <th scope="row">{{ $payments->firstItem() + $key }}</th>
                        <td>{{ date('Y-F',strtotime($payment->date)) }}</td>
                        <td>৳{{ $payment->amount }}</td>
                        <td>৳{{ $payment->due }}</td>
                        <td>৳{{ $payment->discount }}</td>
                        <td>
                          @if($payment->status == 0)
                            <span class="badge bg-soft-danger font-size-12">Pending</span>
                          @else
                            <span class="badge bg-soft-success font-size-12">Completed</span>
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('pay',encrypt($payment->id)) }}" class="btn btn-success">{{ __('Pay') }}</a>
                          <a href="{{ route('payment.invoice',encrypt($payment->id)) }}" title="Download Invoice" class="btn btn-info">{{ __('Download') }}</a>
                        </td>
                      </tr>
                    @empty 
                      <td colspan="8" class="text-center text-info">{{ __('No Payments Found!') }}</td>
                    @endforelse
                    </tbody>
                </table>
                {{ $payments->links('pagination::bootstrap-4') }}

              </div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection