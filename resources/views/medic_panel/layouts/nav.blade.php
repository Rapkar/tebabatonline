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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary   ps-5">
    <a class="navbar-brand" href="#">چت <span class="badge bg-danger rounded-pill">1</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger rounded-pill">{{count($notifications)}}</span>
                </a>
                @if($notifications->isNotEmpty())
                    <ul class="dropdown-menu dropdown-menu-end px-4 py-3" aria-labelledby="navbarDropdown">
                        @foreach (notifications as $notification)
                        <li class="mb-2">
                          <a href="{{route('patient_examination',$notification->data['visit_id'])}}">  {{ $notification->data['message'] }} - {{ $notification->created_at->diffForHumans() }}</a>
                        </li>
                        @endforeach
                    </ul>
                @endif

              
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
@if(Route::currentRouteName() != 'patient_examination')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo" src="{{ asset('images/logo.png') }}" alt="Image">

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
@endif
<div class="container-fluid">
    @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>بیماران</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts">
                        <a class="dropdown-item" href="{{ route('medicDashboard') }}">فرم های جدید</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> توصیه ها</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts">
                        <a class="dropdown-item" href="{{ route('recommendation','recomendation') }}">توصیه ها</a>
                        <a class="dropdown-item" href="{{ route('createRecommendation','recomendation') }}">ایجاد توصیه جدید</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> مشکلات</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts">
                        <a class="dropdown-item" href="{{ route('recommendation','problems') }}">مشکلات</a>
                        <a class="dropdown-item" href="{{ route('createRecommendation','problems') }}">ایجاد مشکل جدید</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" aria-labelledby="posts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> توصیه ها دارویی</a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="posts">
                        <a class="dropdown-item" href="{{ route('recommendation','medicinerecomendation') }}"> توصیه های دارویی</a>
                        <a class="dropdown-item" href="{{ route('createRecommendation','medicinerecomendation') }}">ایجاد توصیه دارویی جدید</a>
                    </div>
                </li>




                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        نمایش
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" target="_new" href="{{route('home')}}">وبسایت</a>
                        <a class="dropdown-item" href="#">فروشگاه</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    @endauth
</div>