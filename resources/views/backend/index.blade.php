@extends('backend.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <h1 class="text-center"> Welcome to Nirapod Host Admin Panel  </h1>
        @php 
           $reminders =  App\Models\Information::latest()->where('status',0)->where('reminder_date',"<=",date('Y-m-d'))->get();
        @endphp
        @foreach($reminders as $reminder)
            <div class="alert alert-success" role="alert">
                <div class="row">
                    <h4 class="text-center" style="color: red"><b>Reminder Alert! <a href="{{ route('information.edit',['id' => encrypt($reminder->id),'from' => 'dashboard']) }}">Update</a></b></h4>
                    <h6 class="text-center text-info">Meeting With <b>{{ $reminder->meeting_with }}</b></h6>
                    <h6 class="text-center">Meeting Time : <b>{{ $reminder->created_at->format('d M Y, h:i A') }}</b></h6>
                    <div class="col-md-6 text-center">
                        <h5>Name : <b>{{ $reminder->name }}</b></h5> <br>
                        <h6>Phone : <b>{{ $reminder->phone }}</b></h6>
                        @isset($reminder->email)
                        <h6>Email : <b>{{ $reminder->email }}</b></h6> <br>
                        @endisset
                        <h6>For Whom ? : <b>{{ $reminder->for_whom }}</b></h6>
                        <h6>Which Course ? : <b>{{ $reminder->which_course }}</b></h6>
                    </div>
                    <div class="col-md-6 text-center">
                        @isset($reminder->profession)
                        <h6>Profession : <b>{{ $reminder->profession }}</b></h6> <br>
                        @endisset
                        @isset($reminder->institution )
                        <h6>Institution / Company : <b>{{ $reminder->institution }}</b></h6>
                        @endisset
                        @isset($reminder->address)
                        <h6>Address : <b>{{ $reminder->address }}</b></h6> <br>
                        @endisset
                        @isset($reminder->additional )
                        <h6>Additional Info : <b>{{ $reminder->additional }}</b></h6>
                        @endisset
                    </div>
                </div>
            </div>
        @endforeach
    </div> <!-- container-fluid -->
</div>
@endsection