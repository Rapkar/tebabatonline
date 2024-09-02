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
    @vite([ 'resources/js/adminpanel/core.js','resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('images/logo.png') }}" data-src="{{ asset('images/logo.png') }}" alt="Image">

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('auth.Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                        </li>
                        @endif
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>
        <div class="container-fluid">
            @auth
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('auth.Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                     

                        <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"  aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  >پست ها</a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts" >
                                <a class="dropdown-item" href="{{ route('newpost') }}">افزودن پست</a>
                                <a class="dropdown-item" href="{{ route('posts') }}">لیست پست ها</a>
                                <a class="dropdown-item" href="{{ route('postnewcat') }}">افزودن دسته بندی</a>
                                <a class="dropdown-item" href="{{ route('postcats') }}">لیست دسته بندی ها </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"  aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  >محصولات</a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts" >
                                <a class="dropdown-item" href="{{ route('newproduct') }}">افزودن محصول</a>
                                <a class="dropdown-item" href="{{ route('productlist') }}">لیست محصولات</a>
                                <a class="dropdown-item" href="{{ route('productnewcat') }}">افزودن دسته بندی</a>
                                <a class="dropdown-item" href="{{ route('productscats') }}">لیست دسته بندی ها </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"  aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  >کاربران</a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="users" >
                                <a class="dropdown-item" href="{{ route('newuser') }}">افزودن کاربر</a>
                                <a class="dropdown-item" href="{{ route('users') }}">لیست کاربران</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"  aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  >سفارشات</a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="users" >
                                <a class="dropdown-item" href="#">لیست سفارشات</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                تنظیمات
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#"></a>
                                <a class="dropdown-item" href="#">کارکرد دیگر</a>
                                <a class="dropdown-item" href="#">何かがここにあります</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                وبسایت
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#"></a>
                                <a class="dropdown-item" href="{{route('home')}}">وبسایت</a>
                                <a class="dropdown-item" href="#">فروشگاه</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @endauth
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>