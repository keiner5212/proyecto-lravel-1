<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Bikeroll') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @stack('scripts')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield("css")
    <!-- Styles -->
    @stack('styles')
</head>

<body>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('resources/js/app.js') }}"></script>
    @yield("js")
</body>

</html>
