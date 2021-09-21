<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? '' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('fe/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('fe/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('fe/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('fe/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mentor - v2.2.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        @include('layouts.fe._navbar')

    </header>
    <!-- End Header -->

    @yield('fe-content')

    <!-- ======= Footer ======= -->
    @include('layouts.fe._footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('fe/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('fe/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fe/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('fe/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('fe/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('fe/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('fe/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('fe/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('fe/js/main.js') }}"></script>

</body>

</html>
