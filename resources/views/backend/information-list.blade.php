@extends('backend.layouts.app')

@section('content')

<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="mb-0">Information List</h4>
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
								<div class="mb-3"> 
                  <a href="{{ route('information.collect') }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus me-2"></i> Add Info</a>
								</div>
							</div>
              <form action="" method="get">
                <div class="col-md-4">
                  <select name="month">
                    <option value="01"@if(request()->month == "01") selected @endif>Januaray</option>
                    <option value="02" @if(request()->month == "02") selected @endif>February</option>
                    <option value="03" @if(request()->month == "03") selected @endif>March</option>
                    <option value="04" @if(request()->month == "04") selected @endif>April</option>
                    <option value="05" @if(request()->month == "05") selected @endif>May</option>
                    <option value="06" @if(request()->month == "06") selected @endif>June</option>
                    <option value="07" @if(request()->month == "07") selected @endif>July</option>
                    <option value="08" @if(request()->month == "08") selected @endif>August</option>
                    <option value="09" @if(request()->month == "09") selected @endif>September</option>
                    <option value="10" @if(request()->month == "10") selected @endif>October</option>
                    <option value="11" @if(request()->month == "11") selected @endif>November</option>
                    <option value="12" @if(request()->month == "12") selected @endif>December</option>
                  </select>
                  <input type="number" name="year" placeholder="Year" value="{{ request()->year }}">
                </div>

                <div class="col-md-2 mt-2">
                  <button type="submit" class="btn btn-info">Search</button>
                </div>
							</form>

						</div>
						<!-- end row -->
						<div class="table-responsive mb-4">
							<table class="table table-centered table-nowrap mb-0">
								<thead>
									<tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Meeting With</th>
                    <th scope="col">Name</th>
                    <th scope="col">For Whom</th>
                    <th scope="col">Which Course</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Profession</th>
                    <th scope="col">Ins.</th>
                    <th scope="col">Appro. Age</th>
                    <th scope="col">Address</th>
                    <th scope="col">Additional</th>
                    <th scope="col">Reminder At</th>
                    <th scope="col">Status</th>
                    <th scope="col" width="30%">Options</th>
									</tr>
								</thead>
								<tbody>
                  @forelse($informations as $key => $info)
                    <tr>
                      <th scope="row">{{ $informations->firstItem() + $key }}</th>
                      <td>{{ $info->category->name }}</td>
                      <td>{{ $info->meeting_with }}</td>
                      <td>{{ $info->name }}</td>
                      <td>{{ $info->for_whom }}</td>
                      <td>{{ $info->which_course }}</td>
                      <td>{{ $info->phone }}</td>
                      <td>{{ $info->email ?? '-' }}</td>
                      <td>{{ $info->profession }}</td>
                      <td>{{ $info->institution }}</td>
                      <td>{{ $info->approximate_age }}</td>
                      <td>{{ $info->address }}</td>
                      <td>{{ $info->additional }}</td>
                      <td>{{ $info->reminder_date }} , {{ date('h:i A',strtotime($info->reminder_time)) }}</td>
                      <td>
                        @if($info->status == 1)
                          <span class="badge rounded-pill bg-success">Completed</span>
                        @else
                          <span class="badge rounded-pill bg-info">Pending</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('information.edit',encrypt($info->id)) }}" class="btn btn-info">{{ __('Edit') }}</a>
                         
                      </td>
                    </tr>
                  @empty 
                    <td colspan="20" class="text-center text-info">{{ __('No Info Found!') }}</td>
                  @endforelse
								</tbody>
                {{ $informations->appends(request()->all())->links('pagination::bootstrap-4') }}
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