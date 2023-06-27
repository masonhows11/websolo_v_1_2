<div>
    @section('page_title')
        ویرایش رمز عبور
    @endsection
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-10  dash-index">

                <div class="dash-index-info-title mt-3 mb-5 py-2 px-3">
                    تغییر رمز عبور
                </div>

                <div class="profile-alert">
                    @include('alert.alert')
                </div>

                <div class="row my-3">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="user-email" class="form-label">ایمیل</label>
                            <input type="text"
                                   wire:model.defer="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="user-email">
                            @error('email')
                            <div class="alert alert-danger my-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="current-pass" class="form-label">رمز عبور جاری</label>
                            <input type="password"
                                   wire:model.defer="old_password"
                                   class="form-control @error('old_password') is-invalid @enderror"
                                   id="current-pass" >
                            @error('old_password')
                            <div class="alert alert-danger my-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new-pass" class="form-label">رمز عبور جدید</label>
                            <input type="password"
                                   wire:model.defer="new_password"
                                   class="form-control @error('new_password') is-invalid @enderror"
                                   id="new-pass">
                            @error('new_password')
                            <div class="alert alert-danger my-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pwd-confirm" class="form-label">تکرار رمز عبور جدید</label>
                            <input type="password"
                                   wire:model.defer="confirm_password"
                                   class="form-control @error('confirm_password') is-invalid @enderror"
                                   id="pwd-confirm">

                            @error('confirm_password')
                            <div class="alert alert-danger my-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success">ویرایش</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">انصراف</a>
                        </div>

                    </form>
                </div>


            </div>
        </div>
</div>
