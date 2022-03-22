<!doctype html>
<html lang="en">
    <head>
        <base href="{{ asset('/') }}">
        <meta charset="utf-8" />
        <title>Dashboard | Nirapod Host</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Multipurpose Admin & Dashboard Template">
        <meta name="author" content="Themesbrand">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset(Settings('site_icon')) }}">

        <!-- Bootstrap Css -->
        <link href="backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="frontend/fonts/cloudicon/cloudicon.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        @stack('css')
    </head>
    <body>

    <body data-topbar="colored" class="sidebar-enable vertical-collpsed">
        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include('backend.inc.header')
            <!-- ========== Left Sidebar Start ========== -->
            @include('backend.inc.sidebar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('content')
                <!-- End Page-content -->
                @include('backend.inc.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">

                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>



                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="backend/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="backend/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" />
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="backend/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" />
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="backend/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="backend/libs/jquery/jquery.min.js"></script>
        <script src="backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="backend/libs/metismenu/metisMenu.min.js"></script>
        <script src="backend/libs/simplebar/simplebar.min.js"></script>
        <script src="backend/libs/node-waves/waves.min.js"></script>
        <script src="backend/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="backend/libs/jquery.counterup/jquery.counterup.min.js"></script>
        @stack('js')
        <!-- App js -->
        <script src="backend/js/app.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            @if (session('success'))
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
                title: '{{ session('success') }}'
                });
            @endif
            @if (session('error'))
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
                title: '{{ session('error') }}'
                });
            @endif
        </script>
    </body>

</html>