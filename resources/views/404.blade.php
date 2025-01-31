<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - 404</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite([ 'resources/js/adminpanel/core.js','resources/css/app.css'])
</head>
<body>
 <!-- Error 404 Template 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 min-vh-100 d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h2 class="d-flex justify-content-center align-items-center gap-2 mb-4">
            <span class="display-1 fw-bold">4</span>
            <span class="display-1 fw-bold">0</span>
            <span class="display-1 fw-bold bsb-flip-h">4</span>
          </h2>
       
          <h3 class="h2 mb-2">Oops! You're lost.</h3>
          <p class="mb-5">The page you are looking for was not found.</p>
          <a class="btn bsb-btn-5xl btn-dark rounded-pill px-5 fs-6 m-0" href="{{ route('home') }}" role="button">Back to Home</a>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
