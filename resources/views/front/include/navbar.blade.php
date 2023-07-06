<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light nav">
    <div class="container">
        <a class="navbar-brand px-3 py-2 rounded rounded-3 text-white" href="{{ route('home') }}">وب سولو</a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{  route('samples') }}">نمونه کارها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{  route('articles') }}">مقالات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">خدمات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">مشتریان</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">درباره ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">تماس با ما</a>
                </li>
            </ul>

            <ul class="navbar-nav auth-link me-auto mb-2">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="{{ route('dashboard') }}">
                           <img src="{{ asset('/images/avatar/avatar-64.png') }}" width="46" height="46" alt="user-image">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">{{ \Illuminate\Support\Facades\Auth::user()->name  }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">پنل کاربری</a></li>
                            <li><a class="dropdown-item" href="#">علاقه مندی ها</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">خروج</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.form') }}"><i class="fa-solid px-2 fa-user-plus"></i><span>ثبت نام</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}"><i class="fa-solid px-2 fa-right-to-bracket"></i><span>ورود</span></a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
