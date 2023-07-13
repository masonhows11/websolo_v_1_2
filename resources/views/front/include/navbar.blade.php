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
                    <a class="nav-link" href="{{ route('services') }}">خدمات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customers') }}">مشتریان</a>
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
                    <li class="nav-item"><a class="nav-link mx-2 py-2 px-2 user-name-link text-center" href="{{ route('dashboard') }}">{{ __('messages.dashboard') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-user "></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out "></i></a></li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.form') }}">ثبت نام</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}">ورود</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
