<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light nav">
    <div class="container">
        <a class="navbar-brand px-3 py-2 rounded rounded-3 text-white" href="#">وب سولو</a>

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
                    <a class="nav-link" href="#">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">خدمات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">نمونه کارها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">مشتریان</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">بلاگ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">درباره ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">تماس با ما</a>
                </li>
            </ul>

            <ul class="navbar-nav auth-link me-auto mb-2">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid px-2 fa-user"></i><span>پنل کاربری</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid px-2 fa-arrow-up-left-from-circle"></i><span>خروج</span></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid px-2 fa-user-plus"></i><span>ثبت نام</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid px-2 fa-right-to-bracket"></i><span>ورود</span></a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
