<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">وب سولو</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
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
                @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ \Illuminate\Support\Facades\Auth::user()->role == 'admin' ? 'admin' : 'user' }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">ورود</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">ثبت نام</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
