<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <?php
    $head = \Illuminate\Support\Facades\DB::table('head') -> orderByDesc('id') -> where('status',1) -> get();
    if(count($head)>0){
    foreach($head as $value){
    ?>
    {!! $value->name  !!}
    <?php
    }
    }
    ?>
    @include('partials.meta')
    <title>XO TEXTILE</title>
        <link rel="preload" href="{{ asset('frontend/css/libs.css')}}" as="style">
        <link rel="preload" href="{{ asset('frontend/swiper/swiper.min.css')}}" as="style">
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" as="style">
        <link rel="preload" href="{{ asset('frontend/css/main.css')}}" as="style">
        <link rel="preload" href="{{ asset('frontend/css/media.css')}}" as="style">
        <link rel="preload" href="{{ asset('frontend/js/libs.js')}}" as="script">
        <link rel="preload" href="{{ asset('frontend/swiper/swiper.min.js')}}" as="script">
        <link rel="preload" href="{{ asset('frontend/js/main-slider.js')}}" as="script">
        <link rel="preload" href="{{ asset('frontend/js/TweenMax.min.js')}}" as="script">
        <link rel="preload" href="{{ asset('frontend/js/wow.min.js')}}" as="script">
        <link rel="preload" href="{{ asset('frontend/js/main.js')}}" as="script">
        <link rel="stylesheet" href="{{ asset('frontend/css/libs.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/swiper/swiper.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/main.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/media.css')}}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('frontend/img/favicon/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('frontend/img/favicon/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend/img/favicon/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/img/favicon/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('frontend/img/favicon/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend/img/favicon/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('frontend/img/favicon/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('frontend/img/favicon/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/img/favicon/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('frontend/img/favicon/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('frontend/img/favicon/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/favicon/favicon-16x16.png')}}">
        <meta name="theme-color" content="#ffffff">
<!--        <script src="//code.jivosite.com/widget/tpfQc5VliX" async></script>-->
</head>
<body>
    <div class="main">
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
    </div>
    <script src="{{ asset('frontend/js/libs.js')}}"></script>
    <script src="{{ asset('frontend/swiper/swiper.min.js')}}"></script>
    <script src="{{ asset('frontend/js/main-slider.js')}}"></script>
    <script src="{{ asset('frontend/js/TweenMax.min.js')}}"></script>
    <script src="{{ asset('frontend/js/wow.min.js')}}"></script>
    <script src="{{ asset('frontend/js/main.js')}}"></script>
    @include('partials.js')
</body>
</html>
