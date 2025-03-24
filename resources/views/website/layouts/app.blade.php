<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/ico.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::check())
    <meta name="user-id" content="{{ Auth::user()->id }}">
    @else
    <meta name="user-id" content="0"> <!-- Or handle as needed -->
    @endif
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
                    <div class="col-lg-5 align-items-center d-md-flex d-none ">
                        <nav class="navbar navbar-expand-lg   ">
                            <ul class="navbar-nav ">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('home')}}">صفحه اصلی</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>خدمات ما</a>
                                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="users">
                                        <a class="dropdown-item" href="{{route('visit')}}">
                                            <img src="{{ asset('images/website/menu_a.webp') }}">
                                            ویزیت آنلاین
                                            <p>برای ویزیت آنلاین همین حالا کلیک کن و فرم رو پر کن</p>

                                        </a>
                                        <a class="dropdown-item" href="{{route('diseases')}}">
                                            <img src="{{ asset('images/website/menu_b.webp') }}">
                                            بیماری ها بر اساس اعضای بدن
                                            <p>می تونی بر اساس تک تک اعضای بدن، بیماری ها رو بررسی کنی و راهکار های درمانی شو بخونی</p>
                                        </a>
                                        <a class="dropdown-item" href="{{route('shop')}}">
                                            <img src="{{ asset('images/website/menu_c.webp') }}">
                                            فروشگاه داروها و محصولات ارگانیک
                                            <p>با محصولات گیاهی ما بیماری خود را شفا ببخشید</p>

                                        </a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('shop')}}">فروشگاه</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link  " href="{{route('visit')}}">فرم ویزیت و مشاوره</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 menu d-md-flex d-none">
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

    <div class="col-lg-3 menu d-flex d-md-none">
     <div class="row w-100">
        <div class="col-3 text-center "><a href="#" >خانه</a></div>
        <div class="col-3 text-center"><a href="#" >دسته بندی</a></div>
        <div class="col-3 text-center"><a href="#" >سبدخرید</a></div>
        <div class="col-3 text-center"><a href="#" >من</a></div>
     </div>
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
                        <li><a href="{{route('visit')}}">فرم ویزیت و مشاوره</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="text-center pb-4">شبکه های اجتماعی
                    </h2>
                    <ul class="d-flex align-items-center justify-content-center">
                        <li><a href="https://eitaa.com/joinchat/972619795Cd4df4765f0"><img src="{{asset('images/Eita.svg') }}"></a></li>
                        <li><a href="https://www.instagram.com/tabibet_online?igsh=NTc4MTIwNjQ2YQ=="><img src="{{asset('images/insta.svg') }}"></a></li>
                        <li><a href="http://t.me/tebeslami_14"><img src="{{asset('images/telegram.svg') }}"></a></li>
                    </ul>
                    <h3>تماس با ما</h3>
                    <h4><a href="te:09355821032">09355821032</a></h4>
                </div>
            </div>
        </div>
    </footer>
    <script>
    // window.User = {
    //     id: {{ optional(auth()->user())->id }},
    //     // You can add more user data here if needed
    // };
</script>
</body>

</html>