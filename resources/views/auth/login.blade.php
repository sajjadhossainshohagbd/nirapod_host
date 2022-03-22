{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
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
        <title>Login | Nirapod Host</title>
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
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="{{ url('/') }}" class="mb-5 d-block auth-logo">
                                <img src="{{ asset(Settings('logo')) }}" alt="" height="80" width="400" class="logo logo-dark">
                                <img src="{{ asset(Settings('logo')) }}" alt="" height="80" width="400" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Nirapod Host.</p>
                                </div>
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="p-2 mt-4">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email Address</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required autofocus>
                                        </div>
                
                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required autocomplete="current-password">
                                        </div>
                
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remember" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>
                                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
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
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="backend/libs/jquery/jquery.min.js"></script>
        <script src="backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="backend/libs/metismenu/metisMenu.min.js"></script>
        <script src="backend/libs/simplebar/simplebar.min.js"></script>
        <script src="backend/libs/node-waves/waves.min.js"></script>
        <script src="backend/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="backend/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- App js -->
        <script src="backend/js/app.js"></script>

    </body>
</html>
