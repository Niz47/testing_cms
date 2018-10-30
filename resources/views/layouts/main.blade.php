<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Red dot is a revolutionary new payments company that is rapidly building a network in Myanmar. We make a range of innovative products and services available to everyone through our huge network of local Red dot shops.">
    <meta name="keywords" content="visa, pre pay visan, easy bills, online payment, pay bills, utility bill payment, mobile top up, electronic top up, e-top up, Myanmar, Mobile e-top up">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Red dot Pre Pay Visa') }}</title>
    <link rel="Shortcut Icon" href="{{ asset('favicon.ico') }} " />

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body  data-spy="scroll" data-target=".navbar" data-offset="50">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/smoothscroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
