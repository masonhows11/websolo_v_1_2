<div>
    @section('page_title')
       حذف حساب کاربری
    @endsection
    <div class="container">

        <div class="dash-index-info-title mt-3 mb-5 py-2 px-3">
            حذف حساب کاربری
        </div>

        <div class="row my-3">

            <form wire:submit.prevent="delete">

                <div class="mb-3">
                    <button type="submit" class="btn btn-danger btn-sm">حذف حساب کاربری</button>
                </div>

            </form>

        </div>

    </div>
</div>
