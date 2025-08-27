<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Metas -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="HTML5 Template Webfolio Multi-Purpose themeforest" />
    <meta name="description" content="Webfolio - Multi-Purpose HTML5 Template" />
    <meta name="author" content="" />

    <!-- Title  -->
    <title>@yield('title', 'Webfolio')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/imgs/favicon.ico') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <!-- Plugins -->
    @vite(['resources/css/plugins.css'])

    <!-- Core Style Css -->
    @vite(['resources/css/style.css'])

    @stack('styles')
</head>

<body>
    <!-- ==================== Start Loading ==================== -->
    @include('components.loader')
    <!-- ==================== End Loading ==================== -->

    <div class="cursor"></div>

    <!-- ==================== Start progress-scroll-button ==================== -->
    @include('components.progress-scroll')
    <!-- ==================== End progress-scroll-button ==================== -->

    <!-- ==================== Start Navbar ==================== -->
    @include('components.navbar')
    <!-- ==================== End Navbar ==================== -->

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main class="main-bg o-hidden">
                @yield('content')
            </main>

            <!-- ==================== Start Footer ==================== -->
            @include('components.footer')
            <!-- ==================== End Footer ==================== -->
        </div>
    </div>
    <!-- ==================== End Main ==================== -->

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.4.0.min.js') }}"></script>

    <!-- plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollSmoother.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/smoother-script.js') }}"></script>

    <!-- custom scripts -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    @stack('scripts')
</body>
</html>
