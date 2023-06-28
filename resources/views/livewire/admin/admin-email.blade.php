<div>
    @section('admin_title')
        پروفایل کاربری
    @endsection
    @section('breadcrumb')
{{--        {{ Breadcrumbs::render('admin.mobile') }}--}}
    @endsection
    <div class="container">
        <div class="row admin-mobile-section">
            <div class="col-xl-5 col-lg-5 col-md-5">
                <form wire:submit.prevent="editMobile">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">{{ $name }}</label>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">ایمیل:</label>
                        <input type="text" class="form-control" wire:model.defer="email" id="email">
                        @error('email')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group my-4">
                        <input type="submit" class="btn btn-success" value="تایید">
                        <a href="{{ route('admin.profile') }}" class="btn btn-primary">بازگشت</a>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>
