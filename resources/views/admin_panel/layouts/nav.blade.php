@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@auth
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark   ps-5">
    <a class="navbar-brand" href="#">چت <span class="badge bg-danger rounded-pill">1</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger rounded-pill">3</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>John Doe</strong> sent you a message
                                </div>
                                <small class="text-muted">2 minutes ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Jane Smith</strong> has joined the chat
                                </div>
                                <small class="text-muted">5 minutes ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Bob Johnson</strong> has left the chat
                                </div>
                                <small class="text-muted">10 minutes ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-menu-item" href="#">Clear all notifications</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i>
                    <span class="d-none d-lg-inline"> {{ Auth::user()->name }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="d-none d-lg-inline"> {{ __('auth.Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

</nav>
@endauth
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo" src="{{ $logourl }}" alt="Image">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

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
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>پست ها</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts">
                        <a class="dropdown-item" href="{{ route('newpost') }}">افزودن پست</a>
                        <a class="dropdown-item" href="{{ route('posts') }}">لیست پست ها</a>
                        <a class="dropdown-item" href="{{ route('post_newcat','posts') }}">افزودن دسته بندی</a>
                        <a class="dropdown-item" href="{{ route('postscats','posts') }}">لیست دسته بندی ها </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>محصولات</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts">
                        <a class="dropdown-item" href="{{ route('newproduct') }}">افزودن محصول</a>
                        <a class="dropdown-item" href="{{ route('productlist') }}">لیست محصولات</a>
                        <a class="dropdown-item" href="{{ route('product_newcat','products') }}">افزودن دسته بندی</a>
                        <a class="dropdown-item" href="{{ route('productscats','products') }}">لیست دسته بندی ها </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>کاربران</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="users">
                        <a class="dropdown-item" href="{{ route('newuser') }}">افزودن کاربر</a>
                        <a class="dropdown-item" href="{{ route('users') }}">لیست کاربران</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>سفارشات</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="users">
                        <a class="dropdown-item" href="#">لیست سفارشات</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{route('unisharp.lfm.show')}}" aria-labelledby="files"     >مدیریت فایل ها</a>
 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        تنظیمات
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('events.show')}}">ارسال نوتیف</a>
                        <a class="dropdown-item" href="{{ route('options.login') }}">تنظیمات لاگین</a>
                        <a class="dropdown-item" href="{{route('routecache')}}">پاک کردن کش</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        نمایش
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" target="_new" href="{{route('home')}}">وبسایت</a>
                        <a class="dropdown-item" href="{{route('shop')}}">فروشگاه</a>
                        <a class="dropdown-item" href="{{route('medicDashboard')}}">طبیب</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    @endauth
</div>