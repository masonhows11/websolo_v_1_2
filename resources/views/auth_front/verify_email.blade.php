@extends('include.master_auth')
@section('page_title')
   تایید ایمیل
@endsection
@section('main_content')
    <div class="container">

        <div class="alert-section mt-2">
            @include('include.alert')
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-5 border border-2 rounded-3 my-5">

                <form action="{{ route('verify') }}" method="post" class="d-flex flex-column py-4">
                    @csrf
                    <div class="d-flex flex-column">
                        <div>
                            <h5 class="text-center py-3">کاربر گرامی به سایت وب سولو خوش آمدید.</h5>
                            <p>ثبت نام شما با موفقیت انجام شد.برای فعال سازی حساب کاربری خود،کد فعال سازی ارسالی به ایمیل خود را وارد کنید.</p>
                        </div>
                        <div>
                            <a href="{{ route('ver') }}">در صورت دریافت نکردن ایمیل روی لینک <span class="text-dark">ارسال مجدد کلیک کنید.</span></a>
                            <p>با تشکر.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-outline-secondary">فعال سازی حساب کاربری</button>
                    </div>
                </form>

            </div>
        </div>


    </div>
@endsection
