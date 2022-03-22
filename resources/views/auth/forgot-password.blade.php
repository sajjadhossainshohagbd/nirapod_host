{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<!doctype html>
<html lang="en">

    <head>
        <base href="{{ asset('/') }}">
        <meta charset="utf-8" />
        <title>Reset Password | Nirapod Host</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset(Settings('site_icon')) }}">

        <!-- Bootstrap Css -->
        <link href="backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        <div class="account-pages my-5  pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div>
                            
                            <a href="{{ url('/') }}" class="mb-5 d-block auth-logo">
                                <img src="{{ asset(Settings('logo')) }}" alt="" height="80" width="400" class="logo logo-dark">
                                <img src="{{ asset(Settings('logo')) }}" alt="" height="80" width="400" class="logo logo-light">
                            </a>
                            <div class="card">
                               
                                <div class="card-body p-4"> 
    
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Reset Password</h5>
                                    </div>
                                    <div class="p-2 mt-4">
                                        @if (session('status'))
                                        <div class="alert alert-success text-center mb-4" role="alert">
                                            {{ __(session('status')) }}
                                        </div>
                                        @endif
                                        <form action="{{ route('password.email') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                            </div>
                                            
                                            <div class="mt-3 text-end">
                                                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Reset</button>
                                            </div>
                
    
                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Remember It ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Sign in </a></p>
                                            </div>
                                        </form>
                                    </div>
                
                                </div>
                            </div>
                            
                            <div class="mt-5 text-center">
                                <p> <script>document.write(new Date().getFullYear())</script> © Nirapod Host. Developed By <i class="mdi mdi-heart text-danger"></i> <a href="https://nirapodhost.com/">Nirapod Host</a></p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
    </body>
</html>