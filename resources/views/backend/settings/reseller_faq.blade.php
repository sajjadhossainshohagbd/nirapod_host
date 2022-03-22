@extends('backend.layouts.app')

@section('content')
<div class="page-content">
	<div class="row">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">Reseller FAQ</h6>
                    <a href="{{ route('reseller.add.faq') }}" class="btn btn-info float-end">Add FAQ</a>
				</div>
				<div class="card-body">
					<div class="row justify-content-center">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Options</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($faqs as $key => $faq)
                                @php
                                    $data = json_decode($faq->value);
                                @endphp
                                  <tr>
                                    <th scope="row">{{ 1 + $key }}</th>
                                    <td>{{ $data->question }}</td>
                                    <td>{{ $data->answer }}</td>
                                    <td>
                                        <a href="{{ route('delete.faq',encrypt($faq->id)) }}" class="btn btn-danger" onclick="return confirm('Do you want delete this review?')">{{ __('Delete') }}</a>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                                {{-- {{ $reviews->links('pagination::bootstrap-4') }}  --}}
                              </table>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection