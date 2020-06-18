<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Commerce') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/vendor.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    @yield('extra-css')
</head>
<body>

    @include('admin.partials.navbar')
    <div class="container-fluid">
        <div class="row">

            @include('admin.partials.toastr-js')
            @include('admin.partials.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
{{--                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">--}}
{{--                </div>--}}

                @yield('content')

            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('extra-js')
    <script>
        $('.element').tooltip();
        $(document).ready(function() {
            clockUpdate();
            setInterval(clockUpdate, 1000);
        });

        function clockUpdate() {
            var date = new Date();
            $('.digital-clock').css({'color': '#fff', 'text-shadow': '0 0 6px #ff0'});
            function addZero(x) {
                if (x < 10) {
                    return x = '0' + x;
                } else {
                    return x;
                }
            }

            function twelveHour(x) {
                if (x > 12) {
                    return x = x - 12;
                } else if (x == 0) {
                    return x = 12;
                } else {
                    return x;
                }
            }

            var h = addZero(twelveHour(date.getHours()));
            var m = addZero(date.getMinutes());
            var s = addZero(date.getSeconds());

            $('.digital-clock').text(h + ':' + m + ':' + s)
        }
    </script>
</body>
</html>
