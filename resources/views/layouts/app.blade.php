<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Commerce') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/vendor.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        @include('layouts.partials.navbar')
        <main class="py-4">
            @include('layouts.partials.message')
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    @yield('extra_js')
    <script>
        $('.element').tooltip();

        $('.carousel').carousel();
    </script>
</body>
</html>
