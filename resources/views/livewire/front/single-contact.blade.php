<div>
    @section('page_title')
       تماس با ما
    @endsection
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
                        <input type="email" class="form-control" id="Email" dir="rtl" placeholder="ایمیل" autocomplete="on" required="required"/>
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="Username" placeholder="نام کاربری" autocomplete="on" required="required"/>
                    </div>

                    <div class="mb-3 mt-3">
                         <textarea name="contact-message" id="" cols="30" rows="5" class="form-control" placeholder="متن پیام" autocomplete="on" required="required"></textarea>
                    </div>

                    <button type="submit" class="btn btn-custom-primary btn-block rounded w-lg">
                        ارسال پیام
                    </button>
                </form>
            </div>

            <!-- contact info -->
            <div class="contact-info col-sm-6 align-self-center">

                <div class="item d-flex flex-wrap">
                    <i class="fa fa-map-marked"></i>
                    <div class="mx-2">
                        <h5>آدرس</h5>
                        <p>{{ env('CONTACT_ADDRESS')  }}</p>
                    </div>
                </div>

                <div class="item d-flex flex-wrap">
                    <i class="fa fa-phone"></i>
                    <div class="mx-2 phone-number">
                        <h5>شماره تماس</h5>
                        <p>{{  env('CONTACT_PHONE') }}</p>
                    </div>
                </div>

                <div class="item d-flex flex-wrap">
                    <i class="fa fa-envelope"></i>
                    <div class="mx-2">
                        <h5>آدرس ایمیل</h5>
                        <p>{{  env('CONTACT_EMAIL') }}</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
