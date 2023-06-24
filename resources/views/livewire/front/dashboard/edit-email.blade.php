<div>
    @section('page_title')
      ویرایش ایمیل کاربر
    @endsection
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-10  dash-index">

                <div class="row my-3">
                    <form wire:submit.prevent="save">
                        @csrf
                        <div class="dash-index-info-title mt-3 mb-5 py-2 px-3">
                            ایمیل کاربر
                        </div>

                        <input type="hidden" value="{{ $user->id }}" name="user">
                        <div class="col-xl-8 col-lg-8 my-3">
                            <label for="user-name" class="form-label">آدرس ایمیل :</label>
                            <input type="text"
                                   dir="ltr"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="user-name"
                                   name="email"
                                   value="{{ $user->email }}">
                            @error('email')
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
