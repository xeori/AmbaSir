@include('sweetalert::alert')

<!DOCTYPE html>
<!-- Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template Author:
NobleUI Website: https://www.nobleui.com Portfolio:
https://themeforest.net/user/nobleui/portfolio Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin License: For each use you must
have a valid license purchased only from above link in order to legally use the
theme for your project. -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta
            name="description"
            content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="NobleUI">
        <meta
            name="keywords"
            content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

        <title>AmbaSir | Login</title>

        <style>
            .authlogin-side-wrapper {
                with: 100%;
                height: 100%;
                background-image: url("images/login.png");
            }
        </style>

        <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
            rel="stylesheet">
        <!-- End fonts -->

        <!-- core:css -->
        <link
            rel="stylesheet"
            href="{{ asset('backend/assets/vendors/core/core.css') }}">
        <!-- endinject -->

        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->

        <!-- inject:css -->
        <link
            rel="stylesheet"
            href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
        <!-- endinject -->

        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
        <!-- End layout styles -->

        <link
            rel="shortcut icon"
            href="{{ asset('backend/assets/images/favicon.png') }}"/>
    </head>
    <body >
        <div class="main-wrapper">
            <div class="page-wrapper full-page">
                <div class="page-content d-flex align-items-center justify-content-center">

                    <div class="row w-100 mx-0 auth-page">
                        <div class="col-md-8 col-xl-6 mx-auto">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4 pe-md-0">
                                        <div class="authlogin-side-wrapper"></div>
                                    </div>
                                    <div class="col-md-8 ps-md-0">
                                        <div class="auth-form-wrapper px-4 py-5">
                                            <a href="#" class="noble-ui-logo logo-light d-block mb-2">Amba<span>sir</span></a>
                                            <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>

                                            @if(session('errorMessage'))
                                            <div id="alertMessage" class="alert alert-danger" role="alert">
                                                <i data-feather="alert-circle"></i>
                                                {{ session('errorMessage') }}
                                            </div>
                                            @endif

                                            <form action="{{ route('login-proses') }}" class="forms-sample" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="userEmail" class="form-label">Email address</label>
                                                    <input
                                                        type="email"
                                                        name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="userEmail"
                                                        placeholder="Email">

                                                    @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="userPassword" class="form-label">Password</label>
                                                    <input
                                                        type="password"
                                                        name="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="userPassword"
                                                        autocomplete="current-password"
                                                        placeholder="Password">

                                                    @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div>

                                                    <button
                                                        type="submit"
                                                        class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                        Login
                                                    </button>
                                                </div>
                                                <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a>

                                                <p class="mb-1">
                                                <a href="{{ route('forgot_password') }}" class="d-block mt-3 text-muted">Forgot your password?</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- core:js -->
        <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
        <!-- endinject -->

        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->

        <!-- inject:js -->
        <script
            src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/template.js') }}"></script>
        <!-- endinject -->
        <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
        <!-- Custom js for this page -->
        <!-- End custom js for this page -->

    </body>
</html>
