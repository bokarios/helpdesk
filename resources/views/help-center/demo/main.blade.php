<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Help Desk')
    </title>
    <link rel="stylesheet" href="{{ asset('demo/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('demo/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('demo/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('demo/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('demo/css/onboarding.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('demo/css/widgets.css') }}">
    <link rel="stylesheet" href="{{ asset('demo/css/dashboard.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('demo/css/owl.theme.default.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('demo/css/owl.carousel.min.css') }}"> --}}

    @yield('styles')
</head>

<body>
    <input type="hidden" id="defaultOpen">
    @yield('content')

    <!--scripts sources-->
    <script src="{{ asset('demo/js/jquery.js') }}"> </script>
    <script src="{{ asset('demo/js/bootstrap.js') }}"></script>
    <script src="{{ asset('demo/js/counter.js') }}"></script>
    <script src="{{ asset('demo/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('demo/js/index.js') }}"></script>
    <script src="{{ asset('demo/js/pageloader.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    @yield('scripts')
</body>

</html>  