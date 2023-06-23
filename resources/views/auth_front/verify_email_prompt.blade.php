@extends('include.master_auth')
@section('page_title')
    ارسال مجدد ایمیل
@endsection
@section('main_content')
    <div class="container">

        <div class="alert-section mt-2">
            @include('include.alert')
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-5 border border-2 rounded-3 my-5">
                <form action="{{ route('resend.email') }}" method="post" class="d-flex flex-column py-4">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">ایمیل</label>
                        <input type="email" class="@error('email') is-invalid @enderror form-control" id="code" name="code">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 mt-3">
                        <button type="submit" class="btn btn-outline-secondary">ارسال ایمیل فعال سازی</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
