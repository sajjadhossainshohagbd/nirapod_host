@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="mb-0">Category</h4>
				</div>
			</div>
		</div>
		<!-- end page title -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="row mb-2">
							<div class="col-md-12">
								<div class="mb-3"> 
                  <a href="{{ route('add.category') }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus me-2"></i> Add Category</a>
								</div>
							</div>
						</div>
						<!-- end row -->
						<div class="table-responsive mb-4">
							<table class="table table-centered table-nowrap mb-0">
								<thead>
									<tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col" width="30%">Options</th>
									</tr>
								</thead>
								<tbody>
                  @forelse($categories as $key => $category)
                    <tr>
                      <th scope="row">{{ $categories->firstItem() + $key }}</th>
                      <td>{{ $category->name }}</td>
                      <td>
                        <a href="{{ route('edit.category',encrypt($category->id)) }}" class="btn btn-info">{{ __('Edit') }}</a>
                          <a href="{{ route('delete.category',encrypt($category->id)) }}" class="btn btn-danger" onclick="return confirm('Do you want delete this category?')">{{ __('Delete') }}</a>
                      </td>
                    </tr>
                  @empty 
                    <td colspan="8" class="text-center text-info">{{ __('No Category Found!') }}</td>
                  @endforelse
								</tbody>
                {{ $categories->links('pagination::bootstrap-4') }}
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