<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="md.shefat" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Admin panel</title>
        <!-- loader-->
        <link href="{{ asset('contents/admin') }}/assets/css/pace.min.css" rel="stylesheet" />
        <script src="{{ asset('contents/admin') }}/assets/js/pace.min.js"></script>
        <!--favicon-->
        <link rel="icon" href="/icon2.png" type="image/x-icon" />
        <!-- simplebar CSS-->
        @stack('cssplugin')
        <link href="{{ asset('contents/admin') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <!-- Bootstrap core CSS-->
        <link href="{{ asset('contents/admin') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- animate CSS-->
        <link href="{{ asset('contents/admin') }}/assets/css/animate.css" rel="stylesheet" type="text/css" />
        <!-- Icons CSS-->
        <link href="{{ asset('contents/admin') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <!-- Metismenu CSS-->
        <link href="{{ asset('contents/admin') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        <!-- Custom Style-->
        <link href="{{ asset('contents/admin') }}/assets/css/app-style.css" rel="stylesheet" />
        <link href="{{ asset('contents/admin') }}/custom.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        @stack('css')
    </head>

    <body class="bg-theme bg-theme2">
        @include('include.flash')
        <!-- Start wrapper-->
        <div id="wrapper">

            <!--Start sidebar-wrapper-->
            <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
                @include('layouts.admin.nav_sidebar')
            </div>
            <!--End sidebar-wrapper-->

            <!--Start topbar header-->
            <header class="topbar-nav">
                @include('layouts.admin.topbar')
            </header>
            <!--End topbar header-->

            <div class="clearfix"></div>

            <div class="content-wrapper">
                <div class="container-fluid">
                    <!--Start Dashboard Content-->

                    @yield('content')

                    <!--start overlay-->
                    <div class="overlay"></div>
                    <!--end overlay-->
                </div>
                <!-- End container-fluid-->
            </div>
            <!--End content-wrapper-->
            <!--Start Back To Top Button-->
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
            <!--End Back To Top Button-->

            <!--Start footer-->
            <footer class="footer">
                <div class="container">
                    <div class="text-center">
                        Copyright © 2020 Admin Panel
                    </div>
                </div>
            </footer>
            <!--End footer-->

            <!--start color switcher-->
            <div class="right-sidebar">
                <div class="switcher-icon">
                    <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
                </div>
                <div class="right-sidebar-content">
                    <p class="mb-0">Gaussion Texture</p>
                    <hr />

                    <ul class="switcher">
                        <li id="theme1"></li>
                        <li id="theme2"></li>
                        <li id="theme3"></li>
                        <li id="theme4"></li>
                        <li id="theme5"></li>
                        <li id="theme6"></li>
                    </ul>

                    <p class="mb-0">Gradient Background</p>
                    <hr />

                    <ul class="switcher">
                        <li id="theme7"></li>
                        <li id="theme8"></li>
                        <li id="theme9"></li>
                        <li id="theme10"></li>
                        <li id="theme11"></li>
                        <li id="theme12"></li>
                        <li id="theme13"></li>
                        <li id="theme14"></li>
                        <li id="theme15"></li>
                    </ul>
                </div>
            </div>
            <!--end color switcher-->
        </div>
        <!--End wrapper-->

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('contents/admin') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('contents/admin') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('contents/admin') }}/assets/js/bootstrap.min.js"></script>

        <!-- simplebar js -->
        <script src="{{ asset('contents/admin') }}/assets/plugins/simplebar/js/simplebar.js"></script>
        <!-- Metismenu js -->
        <script src="{{ asset('contents/admin') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="{{ asset('contents/admin') }}/axios.js"></script>
        @stack('jsplugin')
        <!-- Custom scripts -->
        <script src="{{ asset('contents/admin') }}/assets/js/app-script.js"></script>
        <script src="{{ asset('contents/admin') }}/custom.js"></script>

        @stack('js')

    </body>
</html>
