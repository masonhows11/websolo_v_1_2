@extends('admin.auth_admin.layout')
@section('dash_auth_title')
    ورود پنل مدیریت
@endsection
@section('dash_auth_content')
    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 col-md-10 my-2 alert-dive">
                @include('alert.alert')
            </div>
        </div>

        <div class="row">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                {{--                <img alt="Logo" src="#" class="logo-login my-5"/>--}}
                <h3 class="my-5 admin-logo-login">وب سولو</h3>
                <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto admin-login-form">

                    <form action="{{ route('admin.login') }}" method="post" class="form w-100" novalidate="novalidate"
                          id="kt_sign_in_form">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">ورود به پنل مدیریت</h1>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark" for="email">ایمیل</label>
                            <input class="form-control form-control-lg form-control-solid"
                                   id="email"
                                   type="text"
                                   dir="ltr"
                                   style="direction: ltr"
                                   name="email" autocomplete="off"/>
                            @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">ادامه</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('custom_scripts')

@endpush
