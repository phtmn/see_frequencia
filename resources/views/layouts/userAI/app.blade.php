<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.userAI.meta')

    <link rel="icon" sizes="180x180" href="assets/favicon/favicon.png">
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png"> -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png"> -->
    <!-- <link rel="manifest" href="assets/favicon/site.webmanifest"> -->
    <link rel="mask-icon" color="#6366f1" href="assets/favicon/safari-pinned-tab.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" id="google-font">
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/aos/dist/aos.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/img-comparison-slider/dist/styles.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('assets/css/theme.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <style id="customizer-styles"></style>
</head>

<body class="bg-secondary">
    @include('layouts.userAI.scripts')
    <div class="page-loading active">
        {{-- -<div class="page-loading-inner">
            <div class="page-spinner"></div><span>Carregando...</span>
        </div> --}}
    </div>

    @include('layouts.userAI.header')
    <main>
        @yield('content')
    </main>


</body>

</html>