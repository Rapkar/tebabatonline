<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/ico.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>طبابت آنلاین</title>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.bunny.net"> -->
    <!-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->

    <!-- Scripts -->
    @vite([ 'resources/js/website/core.js'])
</head>

<body>
    <div id="app" class="py-3">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-center">
                        <a class="navbar-brand ms-2" href="{{ route('home') }}">
                            <img class="logo" src="{{ asset('images/logo.svg') }}" data-src="{{ asset('images/logo.png') }}" alt="Image">
                        </a>
                        <form method="post">
                            @csrf
                            <input type="text" value="" placeholder="جستجو برای پست ها">
                            <button type="submit">
                                <img src="{{ asset('images/search_icon.png') }}" rel='no-follow' alt='search'>
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-5 align-items-center d-flex">
                        <nav class="navbar navbar-expand-lg   ">
                            <ul class="navbar-nav ">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>صفحه اصلی</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>خدمات ما</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>فروشگاه</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link  " href="#" aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>فرم ویزیت و مشاوره</a>
                                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="users">
                                        <a class="dropdown-item" href="#">کاربر</a>
                                        <a class="dropdown-item" href="#">لیست کاربران</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 menu">
                        <div class="   d-flex align-items-center shoppingcard">
                            @auth
                            <ul class="col-lg-12 d-flex">
                                <li class="col-lg-4 d-flex align-items-center  justify-content-center pt-1" style="white-space: nowrap;">
                                    <a href="{{route('userDashboard')}}">
                                        {{ Auth::user()->name }}
                                        <img class="user-icon" src="{{ asset('images/user.svg') }}" alt="user-icon">
                                    </a>
                                </li>

                                <li class="col-lg-3 d-flex align-items-center pt-2  cart-box "><a href="">
                                        <img class="cart-icon" src="{{ asset('images/cart.svg') }}" alt="cart-icon">
                                        <span class="quanity">{{$cart}}</span>

                                    </a>
                                    @include('website.layouts.minicart',$orderitems)

                                </li>

                            </ul>
                            @else
                            <ul class="col-lg-12 d-flex">
                                <li class="col-lg-2 d-flex align-items-center "><a href="{{route('auth')}}">ورود </a></li>
                                <li class="col-lg-5 d-flex align-items-center">
                                    <a href="/register/" class="register">

                                        ثبت نام
                                        <img class="user-icon" src="{{ asset('images/user.svg') }}" alt="user-icon">
                                    </a>
                                </li>
                                <li class="col-lg-3 d-flex align-items-center cart-box "><a href="">
                                        <img class="cart-icon" src="{{ asset('images/cart.svg') }}" alt="cart-icon">
                                        <span class="quanity">{{$cart}}</span>

                                    </a>
                                    @include('website.layouts.minicart',$orderitems)
                                </li>

                            </ul>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid  ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">

                        </div>

                    </div>
                </div>
            </div>
        </header>

        @yield('content')
    </div>

    <footer>
        <div class="container">
            <div class="row px-5 py-5">
                <div class="col-lg-4 offset-lg-2">
                    <h2>لینک های مفید</h2>
                    <ul>
                        <li><a href="">کمک به بیماران نیازمند</a></li>
                        <li><a href="">درباره ما</a></li>
                        <li><a href="">ارتباط با ما</a></li>
                        <li><a href="">پیگیری پست</a></li>
                        <li><a href="">فرم ویزیت و مشاوره</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="text-center pb-4">شبکه های اجتماعی
                    </h2>
                    <ul class="d-flex align-items-center justify-content-center">
                        <li><a href=""><img src="{{asset('images/Eita.svg') }}"></a></li>
                        <li><a href=""><img src="{{asset('images/insta.svg') }}"></a></li>
                        <li><a href=""><img src="{{asset('images/telegram.svg') }}"></a></li>
                    </ul>
                    <h3>تماس با ما</h3>
                    <h4>09355821032</h4>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>