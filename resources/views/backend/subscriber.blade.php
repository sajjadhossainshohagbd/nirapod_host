@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="mb-0">Subscriber List</h4>
				</div>
			</div>
		</div>
		<!-- end page title -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="row mb-2">
							<div class="col-md-6">

							</div>
						</div>
						<!-- end row -->
						<div class="table-responsive mb-4">
							<table class="table table-centered table-nowrap mb-0 text-center">
								<thead>
									<tr>
                    <th>#</th>
                    <th>Email</th>
									</tr>
								</thead>
								<tbody>
                  @forelse($subscribers as $key => $subscriber)
                    <tr>
                      <th scope="row">{{ $subscribers->firstItem() + $key }}</th>
                      <td>{{ $subscriber->email }}</td>
                    </tr>
                  @empty 
                    <td colspan="20" class="text-center text-info">{{ __('No Subscriber Found!') }}</td>
                  @endforelse
								</tbody>
                {{ $subscribers->appends(request()->all())->links('pagination::bootstrap-4') }}
							</table>
						</div>
						<div class="row mt-4">
							<div class="col-sm-6"></div>
							<div class="col-sm-6">
								<div class="float-sm-end"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->
	</div>
	<!-- container-fluid -->
</div>
@endsection