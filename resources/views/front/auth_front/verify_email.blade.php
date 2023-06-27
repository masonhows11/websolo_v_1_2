@extends('front.include.master_auth')
@section('page_title')
   تایید ایمیل
@endsection
@section('main_content')
    <div class="container">

        <div class="alert-section mt-2">
            @include('alert.alert')
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-5 border border-2 rounded-3 my-5">

                <form action="{{ route('verify') }}" method="post" class="d-flex flex-column py-4">
                    @csrf

                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">ایمیل</label>
                        <input type="email" class="@error('email') is-invalid @enderror form-control" id="email" name="email">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3 mt-3">
                        <label for="code" class="form-label">کد فعال سازی</label>
                        <input type="text" class="@error('code') is-invalid @enderror form-control" id="code" name="code">
                    </div>
                    @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="d-flex flex-column">
                        <div class="my-3">
                            <p class="text-center">کد فعال سازی ارسالی به ایمیل خود را وارد کنید.</p>
                        </div>
                        <div class="my-3">
                            <p class="text-center"> در صورت دریافت نکردن ایمیل روی <a href="{{ route('resend.email.prompt') }}"> لینک ارسال مجدد </a> کلیک کنید.</p>
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
