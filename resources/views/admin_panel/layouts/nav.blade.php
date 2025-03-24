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
<div class="col-lg-10 position-fixed float-left ms-auto sidebar chatboxfull" style="display:none">
    <section>
        <div class="container py-5  ">

            <div class="row">

                <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                    <h5 class="font-weight-bold mb-3 text-center text-lg-start">Member</h5>

                    <div class="card">
                        <div class="card-body">

                            <ul class="list-unstyled mb-0">
                                @foreach ($sendmessages as $senderId => $messages )
                                @php $firstMessage = $messages->sortByDesc('created_at')->first() @endphp

                                <li class="p-2 border-bottom bg-body-tertiary">
                                    <a href="#!" class="d-flex justify-content-between">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0"> {{ $firstMessage->sender->name }}</p>
                                                <p class="small text-muted">{{ $firstMessage->text }} </p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-muted mb-1">{{ $firstMessage->created_at->diffForHumans() }}</p>
                                            <span class="badge bg-danger float-end">{{count($messages)}}</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-7 col-xl-8">

                    <ul class="list-unstyled chatboxmessages" id="chatboxmessages">
                        @foreach ($sendmessages as $item )
                      

                        @foreach ($item as $message )

                        <li class="d-flex justify-content-between mb-4 {{ ($message->sender->id == Auth::id()) ? "self":"" }}">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">{{$message->sender->name}}</p>
                                    <p class="text-muted small mb-0"><i class="far fa-clock"></i> {{$message->created_at->diffForHumans()}}</p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                        {{$message->text}}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @endforeach

                    </ul>
                    <div class="d-flex flex-column ">
                        <textarea></textarea>
                        <br>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-rounded float-end">Send</button>
                    </div>

                </div>

            </div>

        </div>
    </section>
</div>
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark   ps-5">
    <div class="mini chatbtn open" style=""> <a class="navbar-brand text-white w-100 text-center" href="#">چت <span class="badge bg-danger rounded-pill">1</span></a></div>
    <div class="mini chatbtn close" style="display:none"> <a class="navbar-brand text-white w-100 text-center" href="#">چت <span class="badge bg-danger rounded-pill">1</span></a></div>

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
                        <a class="dropdown-item" href="{{route('medicDashboard')}}">پرطرفدار ترینها</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>کاربران</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="users">
                        <a class="dropdown-item" href="{{ route('newuser') }}">افزودن کاربر</a>
                        <a class="dropdown-item" href="{{ route('users') }}">لیست کاربران</a>
                        <a class="dropdown-item" href="{{ route('users') }}">افزودن نقش</a>
                        <a class="dropdown-item" href="{{ route('users') }}">لیست نقش ها</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="users" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>سفارشات</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="users">
                        <a class="dropdown-item" href="{{route('order.list')}}">لیست سفارشات</a>
                        <a class="dropdown-item" href="{{route('order.chart')}}"> نمودار فروش</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{route('unisharp.lfm.show')}}" aria-labelledby="files">مدیریت فایل ها</a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        تنظیمات
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('options.login') }}">تنظیمات </a>
                        <a class="dropdown-item" href="{{route('routecache')}}">پاک کردن کش</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        تیکت
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('options.login') }}">تیکت ها </a>
                        <a class="dropdown-item" href="{{route('routecache')}}">ارسال تیکت</a>
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
                        <a class="dropdown-item" href="{{route('medicDashboard')}}">Api</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    @endauth
</div>