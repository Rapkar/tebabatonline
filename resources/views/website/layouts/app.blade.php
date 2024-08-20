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
                    <div class="col-lg-2">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img class="logo" src="{{ asset('images/logo.png') }}" data-src="{{ asset('images/logo.png') }}" alt="Image">
                        </a>
                    </div>
                    <div class="col-lg-10 align-items-center d-flex">
                        <form method="post">
                            @csrf
                            <input type="text" value="" placeholder="جستجو برای پست ها">
                            <button type="submit">
                                <img src="{{ asset('images/search_icon.png') }}" rel='no-follow' alt='search'>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="container-fluid menu ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <nav class="navbar navbar-expand-lg   ">
                                <ul class="navbar-nav ">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link active " href="#" aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>صفحه اصلی</a>
                                        <!-- <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts" >
                                <a class="dropdown-item" href="{{ route('newpost') }}">افزودن پست</a>
                                <a class="dropdown-item" href="{{ route('posts') }}">لیست پست ها</a>
                                <a class="dropdown-item" href="{{ route('postnewcat') }}">افزودن دسته بندی</a>
                                <a class="dropdown-item" href="{{ route('postcats') }}">لیست دسته بندی ها </a>
                            </div> -->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  " href="#" aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>خدمات ما</a>
                                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts">
                                            <a class="dropdown-item" href="{{ route('newproduct') }}">افزودن محصول</a>
                                            <a class="dropdown-item" href="{{ route('products') }}">لیست محصولات</a>
                                            <a class="dropdown-item" href="{{ route('products') }}">افزودن دسته بندی</a>
                                            <a class="dropdown-item" href="{{ route('products') }}">لیست دسته بندی ها </a>
                                        </div>
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
                        <div class="col-lg-4  col-xs-offset-2  d-flex align-items-center shoppingcard">
                            <ul class="col-lg-12 d-flex">
                                <li class="col-lg-1 d-flex align-items-center"><img src="{{ asset('images/heart.svg') }}" alt="heart"></li>
                                <li class="col-lg-4 d-flex align-items-center "><a href="">ورود | ثبت نام </a></li>
                                <li class="col-lg-5 d-flex align-items-center">
                                    <div class="minicart">
                                        <img class="cart-icon" src="{{ asset('images/cart.svg') }}" alt="cart-icon">
                                        0 تومان
                                        <span class="quanity">0</span>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')
    </div>
    <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><style>
          .path-0{
            animation:pathAnim-0 4s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
          }
          @keyframes pathAnim-0{
            0%{
              d: path("M 0,400 L 0,150 C 109.96172248803828,164.44019138755982 219.92344497607655,178.8803827751196 298,196 C 376.07655502392345,213.1196172248804 422.26794258373207,232.91866028708134 527,201 C 631.7320574162679,169.08133971291866 795.0047846889953,85.44497607655502 895,76 C 994.9952153110047,66.55502392344498 1031.7129186602872,131.30143540669857 1112,156 C 1192.2870813397128,180.69856459330143 1316.1435406698565,165.3492822966507 1440,150 L 1440,400 L 0,400 Z");
            }
            25%{
              d: path("M 0,400 L 0,150 C 83.02392344497608,153.6267942583732 166.04784688995215,157.25358851674642 250,163 C 333.95215311004785,168.74641148325358 418.83253588516754,176.61244019138755 531,171 C 643.1674641148325,165.38755980861245 782.6220095693781,146.29665071770336 881,136 C 979.3779904306219,125.70334928229664 1036.6794258373207,124.20095693779905 1123,128 C 1209.3205741626793,131.79904306220095 1324.6602870813397,140.89952153110048 1440,150 L 1440,400 L 0,400 Z");
            }
            50%{
              d: path("M 0,400 L 0,150 C 87.81818181818181,170.1531100478469 175.63636363636363,190.3062200956938 270,190 C 364.3636363636364,189.6937799043062 465.27272727272725,168.9282296650718 564,146 C 662.7272727272727,123.07177033492822 759.2727272727275,97.98086124401914 859,115 C 958.7272727272725,132.01913875598086 1061.6363636363635,191.1483253588517 1159,204 C 1256.3636363636365,216.8516746411483 1348.1818181818182,183.42583732057415 1440,150 L 1440,400 L 0,400 Z");
            }
            75%{
              d: path("M 0,400 L 0,150 C 115.37799043062202,159.76076555023923 230.75598086124404,169.52153110047848 318,177 C 405.24401913875596,184.47846889952152 464.3540669856459,189.67464114832538 542,183 C 619.6459330143541,176.32535885167462 715.8277511961722,157.7799043062201 818,144 C 920.1722488038278,130.2200956937799 1028.3349282296651,121.20574162679426 1133,123 C 1237.6650717703349,124.79425837320574 1338.8325358851675,137.39712918660285 1440,150 L 1440,400 L 0,400 Z");
            }
            100%{
              d: path("M 0,400 L 0,150 C 109.96172248803828,164.44019138755982 219.92344497607655,178.8803827751196 298,196 C 376.07655502392345,213.1196172248804 422.26794258373207,232.91866028708134 527,201 C 631.7320574162679,169.08133971291866 795.0047846889953,85.44497607655502 895,76 C 994.9952153110047,66.55502392344498 1031.7129186602872,131.30143540669857 1112,156 C 1192.2870813397128,180.69856459330143 1316.1435406698565,165.3492822966507 1440,150 L 1440,400 L 0,400 Z");
            }
          }</style><defs><linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%"><stop offset="5%" stop-color="#4dcbd3"></stop><stop offset="95%" stop-color="#007c7e"></stop></linearGradient></defs><path d="M 0,400 L 0,150 C 109.96172248803828,164.44019138755982 219.92344497607655,178.8803827751196 298,196 C 376.07655502392345,213.1196172248804 422.26794258373207,232.91866028708134 527,201 C 631.7320574162679,169.08133971291866 795.0047846889953,85.44497607655502 895,76 C 994.9952153110047,66.55502392344498 1031.7129186602872,131.30143540669857 1112,156 C 1192.2870813397128,180.69856459330143 1316.1435406698565,165.3492822966507 1440,150 L 1440,400 L 0,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1" class="transition-all duration-300 ease-in-out delay-150 path-0"></path></svg>
    <footer>
        <div class="container-fluid">
            <div class="row px-5 py-5">
                <div class="col-lg-4">
                    <h2>تماس با ما</h2>
                    <a href="tel:09355821032">09355821032</a>
                </div>
                <div class="col-lg-4">
                    <h2>لینک های مفید</h2>
                    <ul>
                        <li><a href="" >کمک به بیماران نیازمند</a></li>
                        <li><a href="" >درباره ما</a></li>
                        <li><a href="" >ارتباط با ما</a></li>
                        <li><a href="" >پیگیری پست</a></li>
                        <li><a href="" >فرم ویزیت و مشاوره</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h2>شبکه های اجتماعی
                    </h2>
                    <ul>
                        <li><a href="" >1</a></li>
                        <li><a href="" >2</a></li>
                        <li><a href="" >3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>