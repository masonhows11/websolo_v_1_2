
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
                <form wire:submit.prevent="save">

                    <div class="mb-3 mt-3">
                        <input type="email" wire:model.defer="email" class="form-control" id="Email" dir="rtl"
                               placeholder="ایمیل" autocomplete="on" />
                    </div>

                    @error('email')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3 mt-3">
                        <input type="text" wire:model.defer="name" class="form-control" id="Username"
                               placeholder="نام کاربری" autocomplete="on" />
                    </div>
                    @error('name')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3 mt-3">
                        <textarea wire:model.defer="message" id="" cols="30" rows="5" class="form-control"
                                  placeholder="متن پیام" autocomplete="on" ></textarea>
                    </div>

                    @error('message')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                    @enderror

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
@push('front_custom_scripts')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        window.addEventListener('show-result', ({detail: {type, message}}) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
    </script>
@endpush
