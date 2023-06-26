<div>
    @section('page_title')
       حذف حساب کاربری
    @endsection
    <div class="container">

        <div class="col-xl-12 col-lg-12 col-md-10  dash-index">

            <div class="dash-index-info-title mt-3 mb-5 py-2 px-3">
                حذف حساب کاربری
            </div>

            <div class="row my-3">
                <form wire:submit.prevent="delete">
                    <div class="mb-3 d-flex flex-column">
                        <label for="delete-account" class="form-label my-4">حذف حساب کاربری</label>
                        <button type="submit" id="delete-account" class="btn btn-danger btn-sm">حذف حساب کاربری {{ $user->email }}</button>
                    </div>
                </form>
            </div>

        </div>



    </div>
</div>
