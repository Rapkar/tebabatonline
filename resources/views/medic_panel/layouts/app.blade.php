<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/ico.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title ?? 'Default Title' }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite([ 'resources/js/adminpanel/core.js','resources/css/app.css'])
</head>

<body>
    <div id="app">
        @include('medic_panel.layouts.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>