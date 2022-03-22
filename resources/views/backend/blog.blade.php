@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Blog</h6>
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('add.blog') }}" class="btn btn-info float-end">Add Blog</a>
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
                    @forelse($blogs as $key => $blog)
                      <tr>
                        <th scope="row">{{ $blogs->firstItem() + $key }}</th>
                        <td>{{ $blog->title }}</td>
                        <td>{{ Str::limit($blog->sub_title,20) }}</td>
                        <td><a href="{{ route('blog',$blog->slug) }}" target="_blank">{{ route('blog',$blog->slug) }}</a></td>
                        <td>
                          <a href="{{ route('edit.blog',encrypt($blog->id)) }}" class="btn btn-info">{{ __('Edit') }}</a>
                            <a href="{{ route('delete.blog',encrypt($blog->id)) }}" class="btn btn-danger" onclick="return confirm('Do you want delete this blog?')">{{ __('Delete') }}</a>
                        </td>
                      </tr>
                    @empty 
                      <td colspan="8" class="text-center text-info">{{ __('No Blogs Found!') }}</td>
                    @endforelse
                    </tbody>
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </table>
              </div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection