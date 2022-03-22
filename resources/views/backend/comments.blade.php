@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Comments</h6>
          <div class="row">
          </div>
				</div>
				<div class="card-body">
					<div class="row justify-content-center">
              <div class="col-lg-12">
                <table class="table table-responsive text-center">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Approval</th>
                        <th scope="col">Comment</th>
                        {{-- <th scope="col" width="30%">Options</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($comments as $key => $comment)
                      <tr>
                        <th scope="row">{{ $comments->firstItem() + $key }}</th>
                        <td><a href="{{ route('blog',App\Models\Blog::findOrFail($comment->post_id)->slug) }}" target="_blank">{{ Str::words(App\Models\Blog::findOrFail($comment->post_id)->title,2)  ?? "Comment Reply"}}</a></td>
                        <td>{{ $comment->full_name  ?? 'Comment Reply'}}</td>
                        <td>{{ $comment->email ?? 'Comment Reply' }}</td>
                        <td>
                          <input type="checkbox" id="{{ $comment->id }}" switch="info" @if($comment->status == 1) checked @endif onchange="updateStatus(this)" value="{{ $comment->id }}">
                          <label for="{{ $comment->id }}" data-on-label="Yes" data-off-label="No"></label>
                        </td>
                        <td>{{ $comment->comment }}</td>
                        {{-- <td>
                          <a href="{{ route('delete.page',encrypt($comment->id)) }}" class="btn btn-danger" onclick="return confirm('Do you want delete this comment?')">{{ __('Delete') }}</a>
                        </td> --}}
                      </tr>
                    @empty 
                      <td colspan="8" class="text-center text-info">{{ __('No Comment Found!') }}</td>
                    @endforelse
                    </tbody>
                    {{ $comments->links('pagination::bootstrap-4') }}
                </table>
              </div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
@push('js')
  <script>
    function updateStatus(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('comment.status') }}', {_token:'{{ @csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })
                
                    Toast.fire({
                    icon: 'success',
                    title: 'Comment Status Updated Successfully!'
                    });
                }
                else{
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })
                
                    Toast.fire({
                    icon: 'warning',
                    title: 'Something went wrong!'
                    });
                }
            });
        }
  </script>
@endpush
@endsection