
<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minia/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jan 2022 09:08:35 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Login | Minia - Minimal Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('contents/admin')}}/images/favicon.ico">

        <!-- preloader css -->
        <link rel="stylesheet" href="{{asset('contents/admin')}}/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{asset('contents/admin')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('contents/admin')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('contents/admin')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <!-- end col -->
                    <div class="col-xxl-12 col-lg-12 col-md-12">
                        <div class="auth-bg pt-md-5 p-4">
                            <div class="bg-overlay bg-primary"></div>
                            <ul class="bg-bubbles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <!-- end bubble effect -->
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-3">

                                                    <div style="margin-top: 220px;" class="text-center">
                                                        <h5 class="mb-0">Welcome Back !</h5>
                                                        <p class="text-muted mt-2">Sign in to continue to Minia.</p>
                                                    </div>
                                                    <form class="mt-4 pt-2" method="POST"  action="{{ route('login') }}">
                                                        @csrf

                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-11">
                                                                    <label class="form-label">Password</label>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <div class="">
                                                                        <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="input-group auth-pass-inputgroup">
                                                                <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                                <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                                    <label class="form-check-label" for="remember-check">
                                                                        Remember me
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="mb-3">
                                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                                        </div>
                                                    </form>

                                                    <div class="mt-4 pt-2 text-center">
                                                        <div class="signin-other-title">
                                                            <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
                                                        </div>

                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item">
                                                                <a href="#"
                                                                    class="social-list-item bg-primary text-white border-primary">
                                                                    <i class="mdi mdi-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="#"
                                                                    class="social-list-item bg-dark text-white border-dark">
                                                                    <i class="mdi mdi-github"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="#"
                                                                    class="social-list-item bg-danger text-white border-danger">
                                                                    <i class="mdi mdi-google"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="mt-5 text-center">
                                                        <p class="text-muted mb-0">Don't have an account ? <a href="auth-register.html"
                                                                class="text-primary fw-semibold"> Signup now </a> </p>
                                                    </div>

                                                <div class="mt-4 mt-md-5 text-center">
                                                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Minia   . Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                                                </div>



                                        <!-- end review carousel -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


        <!-- JAVASCRIPT -->
        <script src="{{asset('contents/admin')}}/libs/jquery/jquery.min.js"></script>
        <script src="{{asset('contents/admin')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('contents/admin')}}/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{asset('contents/admin')}}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{asset('contents/admin')}}/libs/node-waves/waves.min.js"></script>
        <script src="{{asset('contents/admin')}}/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="{{asset('contents/admin')}}/libs/pace-js/pace.min.js"></script>
        <!-- password addon init -->
        <script src="{{asset('contents/admin')}}/js/pages/pass-addon.init.js"></script>

    </body>


<!-- Mirrored from themesbrand.com/minia/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jan 2022 09:08:35 GMT -->
</html>
