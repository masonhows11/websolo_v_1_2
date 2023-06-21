<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Websolo</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-expand-md bg-light nav">
    <div class="container">
        <a class="navbar-brand px-3 py-2 rounded-4 text-white" href="#">وب سولو</a>

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
        </div>
    </div>
</nav>

<header class="header container">
    <div class="row pt-2 mt-2 border-bottom border-2">
        <div class="img-holder col-lg-6 d-flex justify-content-center">
            <img src="./assets/images/man.svg" alt=""/>
        </div>

        <div class="info col-lg-6 d-flex flex-column justify-content-center">
            <div class="personal-info d-flex flex-column justify-content-center mt-4">
                <h6 class="hello text-center py-2">سلام</h6>
                <h6 class="name text-center py-2">من نعیم هستم</h6>
                <p class="specialization text-center py-2">
                    طراح و توسعه دهنده وب اپلیکیشن
                </p>
            </div>

            <div class="buttons d-flex justify-content-center mt-4">
                <button class="btn btn-hire py-2 px-3 rounded-4 text-center mx-2">
                    استخدام
                </button>
                <button class="btn btn-resume py-2 px-4 rounded-4 text-center mx-2">
                    رزومه
                </button>
            </div>

            <div class="socials mt-4 d-flex flex-row justify-content-center">
                <a class="social-item" href="javascript:void(0)">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
                <a class="social-item" href="javascript:void(0)">
                    <i class="fa-brands fa-telegram"></i>
                </a>
                <a class="social-item" href="javascript:void(0)">
                    <i class="fa-brands fa-github"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="widget">
        <div class="widget-item text-center">
            <h2 class="py-2">0</h2>
            <p>مشتریان خوشحال</p>
        </div>

        <div class="widget-item text-center">
            <h2 class="py-2">0</h2>
            <p>پروژهای کامل شده</p>
        </div>

        <div class="widget-item text-center">
            <h2 class="py-2">0</h2>
            <p>موفقیت ها</p>
        </div>
    </div>
</header>

<section class="container about mt-5">
    <div class="row mt-5">
        <div class="about-img col-md-3">
            <img src="./assets/images/avatar.jpg"
                alt=""
                class="img-thumbnail mb-4"/>
        </div>

        <div class="about-introduce col-md-9">
            <h2 class="title h2 p-1 my-2">نعیم سلطانی</h2>
            <p class="subtitle p-1 my-2">
                برنامه نویس و توسعه دهنده سمت سرور و کاربر
                <span>(Programmer and full-stack develper)</span>
            </p>
            <p class="introduce p-1">
                کارشناس کامپیوتر(نرم افزار) از سال 1396 برنامه نویسی رو شروع کردم تا
                به امروز، علاقه من به تکنولوژی در هر زمینه ای که دوست داشته باشم
                مخصوصا کامپیوتر...
            </p>
            <button class="btn btn-resume rounded mt-3">دریافت رزومه</button>
        </div>
    </div>
</section>

<section class="container services mt-5">
    <div class="text-center">
        <h6 class="subtitle p-2">خدمات</h6>
        <h6 class="section-title my-4">چه کارهایی انجام میدم</h6>
        <p class="service-intro mb-5 pb-4">
            خدماتی که ارائه میدم شامل طراحی و کدنویسی وب سایت ( وب اپلیکیشن ) های
            فروشگاهی ، آموزشی ، وبلاگ ، پروژ های دانشجویی و ....
        </p>

        <div class="row">
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="custom-card card border">
                    <div class="card-body">
                        <i class="fa-solid fa-palette"></i>
                        <h5>طراحی قالب</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="custom-card card border">
                    <div class="card-body">
                        <i class="fa-solid fa-laptop-code"></i>
                        <h5>کدنویسی سمت کاربر</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="custom-card card border">
                    <div class="card-body">
                        <i class="fa-solid fa-code"></i>
                        <h5>برنامه نویسی سمت سرور</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="custom-card card border">
                    <div class="card-body">
                        <i class="fa-solid fa-magnifying-glass-chart"></i>
                        <h5>تحلیل دیتابیس</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-5">
    <div class="skills text-center">
        <h6 class="subtitle p-2">توانایی ها</h6>
        <h6 class="section-title my-4">چرا منو انتخاب میکنی</h6>

        <div class="row text-right mt-4">
            <div class="col-sm-6">
                <h6 class="mb-3">PHP</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 70%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>90%</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">Laravel</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 80%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>90%</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">MYSQL</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 40%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>90%</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">ANALYSIS</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 50%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>90%</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">javascript</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 40%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>90%</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">WEB DESIGN</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 60%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>90%</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">HTML</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 80%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>89%</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">CSS</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 80%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>83%</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">BOOTSTRAP</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 80%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>95%</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">Tailwind</h6>
                <div class="progress">
                    <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 40%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        <span>90%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">

    <div class="portolio text-center mt-5">

        <h6 class="subtitle p-2">نمونه کارها</h6>
        <h6 class="section-title my-4">نمونه کارهارو مشاهده کنید</h6>

        <div class="row row-cols-1  row-cols-md-2 row-cols-lg-3 g-4">


            <div class="col">
                <div class="card">
                    <img src="./assets/images/samples/folio-1.jpg" class="card-img-top" alt="...">
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./assets/images/samples/folio-2.jpg" class="card-img-top" alt="...">
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./assets/images/samples/folio-3.jpg" class="card-img-top" alt="...">
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./assets/images/samples/folio-4.jpg" class="card-img-top" alt="...">
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./assets/images/samples/folio-5.jpg" class="card-img-top" alt="...">
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./assets/images/samples/folio-6.jpg" class="card-img-top" alt="...">
                </div>
            </div>

        </div>
    </div>
</section>

<section class="container">
    <div class="clients text-center mt-5">
        <h6 class="subtitle p-2">مشتریان</h6>
        <h6 class="section-title my-4">نظر مشتریان در مورد من</h6>

        <div id="carouselExampleCaptions"
            class="carousel carousel-dark slide"
            data-bs-ride="true">
            <div class="carousel-indicators">
                <button
                    type="button"
                    data-bs-target="#carouselExampleCaptions"
                    data-bs-slide-to="0"
                    class="active"></button>
                <button
                    type="button"
                    data-bs-target="#carouselExampleCaptions"
                    data-bs-slide-to="1"></button>
                <button
                    type="button"
                    data-bs-target="#carouselExampleCaptions"
                    data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card testmonial-card border">
                        <div class="card-body">
                            <img src="./assets/images/avatar/avatar-1.jpg" alt=""/>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                با استفاده از طراحان گرافیک است.
                            </p>
                            <h1 class="title py-2">رضوان</h1>
                            <h1 class="subtitle">محمدی</h1>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="card testmonial-card border">
                        <div class="card-body">
                            <img src="./assets/images/avatar/avatar-2.jpg" alt=""/>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                با استفاده از طراحان گرافیک است.
                            </p>
                            <h1 class="title py-2">علی</h1>
                            <h1 class="subtitle">دهقانی</h1>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="card testmonial-card border">
                        <div class="card-body">
                            <img src="./assets/images/avatar/avatar-3.jpg" alt=""/>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                با استفاده از طراحان گرافیک است.
                            </p>
                            <h1 class="title py-2">حسین</h1>
                            <h1 class="subtitle">پناهی</h1>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<section class="container">
    <div class="blog text-center">
        <h6 class="subtitle p-2 mt-5">بلاگ</h6>
        <h6 class="section-title my-4">آخرین اخبار</h6>

        <div class="row text-left">
            <div class="col-md-4">
                <div class="card border mb-4">
                    <img
                        src="./assets/images/blog/blog-1.jpg"
                        alt=""
                        class="card-img-top w-100"/>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Bootstrap Framework</h5>

                        <div class="post-details p-2">
                            <a href="javascript:void(0)">توسط: Admin</a>
                            <a href="javascript:void(0)"><i class="fa-regular fa-thumbs-up"></i> 456</a>
                            <a href="javascript:void(0)"><i class="fa-regular fa-comment"></i> 123</a>
                        </div>

                        <p class="py-2">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است.
                        </p>
                        <a class="pt-4" href="javascript:void(0)">ادامه مطلب...</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border mb-4">
                    <img src="./assets/images/blog/blog-2.jpg"
                        alt=""
                        class="card-img-top w-100"/>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Bootstrap Framework</h5>

                        <div class="post-details p-2">
                            <a href="javascript:void(0)">توسط: Admin</a>
                            <a href="javascript:void(0)"><i class="fa-regular fa-thumbs-up"></i> 456</a>
                            <a href="javascript:void(0)"><i class="fa-regular fa-comment"></i> 123</a>
                        </div>

                        <p class="py-2">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است.
                        </p>
                        <a class="pt-4" href="javascript:void(0)">ادامه مطلب...</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border mb-4">
                    <img src="./assets/images/blog/blog-3.jpg"
                        alt=""
                        class="card-img-top w-100"/>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Bootstrap Framework</h5>

                        <div class="post-details p-2">
                            <a href="javascript:void(0)">توسط: Admin</a>
                            <a href="javascript:void(0)"><i class="fa-regular fa-thumbs-up"></i> 456</a>
                            <a href="javascript:void(0)"><i class="fa-regular fa-comment"></i> 123</a>
                        </div>

                        <p class="py-2">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است.
                        </p>
                        <a class="pt-4" href="javascript:void(0)">ادامه مطلب...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-5">
    <div class="hire-me">
        <div class="card bg-custom-primary">
            <div class="card-body text-light">
                <div class="row align-items-center">
                    <div class="col-sm-9 text-center text-sm-left">
                        <h5 class="my-3">برای انجام پروژه های شما منتظرم</h5>
                        <p class="mb-3">
                            مشتری جدید پروژه جدید چالش جدید تجربه جدید منتظرشونم !
                        </p>
                    </div>
                    <div class="col-sm-3 text-center text-sm-right">
                        <button class="btn btn-light rounded-4">انجام میدم!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container contact mt-5">
    <div class="row contact-header text-center">
        <h6 class="subtitle mt-4">ارتباط با من</h6>
        <h6 class="section-title my-5">با من در ارتباط باشید</h6>
        <p class="mb-5 pb-4">
            برای تماس با من ار طریق فرم زیر پیام خودتون رو ارسال کنید ، یا از طریق
            راه های ارتباطی سمت درج شده به طور مستیم با من تماس بگیرید متشکرم.
        </p>
    </div>

    <div class="row contact-body">
        <!--contact form -->
        <div class="form col-sm-6 px-2 py-2 my-2">
            <form>
                <div class="mb-3 mt-3">
                    <input
                        type="email"
                        class="form-control"
                        id="Email"
                        dir="rtl"
                        placeholder="ایمیل"
                        required=""
                    />
                </div>

                <div class="mb-3 mt-3">
                    <input type="text"
                        class="form-control"
                        id="Username"
                        placeholder="نام کاربری"
                        required=""/>
                </div>

                <div class="mb-3 mt-3">
              <textarea
                  name="contact-message"
                  id=""
                  cols="30"
                  rows="5"
                  class="form-control"
                  placeholder="متن پیام"></textarea>
                </div>

                <button type="submit" class="btn btn-custom-primary btn-block rounded w-lg">
                    ارسال پیام
                </button>
            </form>
        </div>

        <!-- contact info -->
        <div class="contact-infor col-sm-6 align-self-center">
            <div class="item d-flex flex-wrap">
                <i class="fa fa-map-marked"></i>
                <div class="mx-2">
                    <h5>آدرس</h5>
                    <p>کشور ایران</p>
                </div>
            </div>
            <div class="item d-flex flex-wrap">
                <i class="fa fa-phone"></i>
                <div class="mx-2">
                    <h5>شماره تلفن</h5>
                    <p>0917 289 0423</p>
                </div>
            </div>
            <div class="item d-flex flex-wrap">
                <i class="fa fa-envelope"></i>
                <div class="mx-2">
                    <h5>آدرس ایمیل</h5>
                    <p>mason.hows11@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="page-footer">
        <div class="row">
            <div class="col-sm-6 d-flex justify-content-center align-items-center">
                <p class="p-5">
                    Copyright
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    ©
                    <a class="footer-copyright" href="#" target="_blank"
                    >Mason_Hows11</a
                    >
                </p>
            </div>

            <div class="col-sm-6 d-flex justify-content-center align-items-center">
                <div class="socials d-flex flex-row p-5">
                    <a class="social-item" href="javascript:void(0)"
                    ><i class="fa-brands fa-facebook-f"></i
                        ></a>
                    <a class="social-item" href="javascript:void(0)"
                    ><i class="fa-brands fa-google-plus-g"></i
                        ></a>
                    <a class="social-item" href="javascript:void(0)"
                    ><i class="fa-brands fa-github"></i
                        ></a>
                    <a class="social-item" href="javascript:void(0)"
                    ><i class="fa-brands fa-telegram"></i
                        ></a>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>






